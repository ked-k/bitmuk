<?php

namespace App\Actions\Fortify;

use App\Models\User;
use Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use Laravel\Fortify\Contracts\CreatesNewUsers;
use NrmlCo\LaravelApiKeys\LaravelApiKeys;

class CreateNewUser implements CreatesNewUsers
{
    use PasswordValidationRules;

    /**
     * Validate and create a newly registered user.
     *
     * @param array $input
     * @return \App\Models\User
     */
    public function create(array $input)
    {
        Validator::make($input, [
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'phone' => ['required', 'string', 'max:255'],
            'email' => [
                'required',
                'string',
                'email',
                'max:255',
                Rule::unique(User::class),
            ],
            'password' => $this->passwordRules(),

            //if merchant
            'merchant_name' => ['required_if:role,==,merchant'],
            'merchant_email' => ['required_if:role,==,merchant'],
            'merchant_address' => ['required_if:role,==,merchant'],
            'merchant_proof' => ['required_if:role,==,merchant'],

        ])->validate();


        $country = json_decode($input['country']);

        $merchantData = [];
        if (isset($input['role']) && $input['role'] === 'merchant') {
            $merchantData = [
                'role' => $input['role'],
                'merchant_name' => $input['merchant_name'],
                'merchant_email' => $input['merchant_email'],
                'merchant_address' => $input['merchant_address'],
                'merchant_proof' => $input['merchant_proof'],
                'status' => false,
            ];

        }

        $validateData = [
            'first_name' => $input['first_name'],
            'last_name' => $input['last_name'],
            'country' => $country->name,
            'phone' => '+' . $country->calling_code . ' ' . $input['phone'],
            'email' => $input['email'],
            'password' => Hash::make($input['password']),
        ];


        $user = User::create(array_merge($validateData, $merchantData));

        if ($user->role === 'merchant') {
            Auth::setUser($user);
            $name = $user->merchant_name;
            LaravelApiKeys::create('SANDBOX', ['name' => $name]);
        }
        return $user;
    }
}
