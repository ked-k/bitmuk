<?php

namespace App\Http\Controllers\Backend;

use App\DataTables\MerchantDataTable;
use App\DataTables\UserDataTable;
use App\Helpers\FileHelper;
use App\Http\Controllers\Controller;
use App\Http\Requests\CreateUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Models\admin;
use App\Models\Kyc;
use App\Models\User;
use App\Models\Wallet;
use App\Rules\MatchOldPassword;
use Exception;
use Hash;
use Illuminate\Http\Request;
use Laracasts\Flash\Flash;


class UserController extends Controller
{
    /**
     * Display a listing of the User.
     *
     * @param UserDataTable $userDataTable
     * @return Response
     */
    public function index(UserDataTable $userDataTable)
    {
        return $userDataTable->render('backend.users.index');
    }


    public function merchant(MerchantDataTable $merchantDataTable)
    {
        return $merchantDataTable->render('backend.merchant.index');
    }

    /**
     * Show the form for creating a new User.
     *
     * @return Response
     */
    public function create()
    {
        return view('backend.users.create');
    }

    /**
     * Store a newly created User in storage.
     *
     * @param CreateUserRequest $request
     *
     * @return Response
     */
    public function store(CreateUserRequest $request)
    {
        $modifyData = array(
            'password' => Hash::make($request->password),
            'avatar' => FileHelper::uploadImage($request),
            'status' => checkbox_filter($request->status),
            '2fa' => checkbox_filter($request['2fa']),
        );
        $input = array_merge($request->all(), $modifyData);


        /** @var User $user */
        $user = User::create($input);

        Flash::success('User Created');

        return redirect(route('admin.users.index'));
    }

    /**
     * Display the specified User.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var User $user */
        $user = User::find($id);

        if (empty($user)) {
            Flash::error('not_found');

            return redirect(route('admin.users.index'));
        }

        return view('backend.users.show')->with('user', $user);
    }

    /**
     * Show the form for editing the specified User.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        /** @var User $user */
        $user = User::exclude('password')->find($id);

        if (empty($user)) {
            Flash::error('not_found');

            return redirect(route('admin.users.index'));
        }


        return view('backend.users.edit')->with('user', $user);
    }

    /**
     * Update the specified User in storage.
     *
     * @param int $id
     * @param UpdateUserRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateUserRequest $request)
    {
        /** @var User $user */
        $user = User::find($id);

        if (empty($user)) {
            Flash::error('not_found');

            return redirect(route('admin.users.index'));
        }

        $modifyData = array(
            'password' => Hash::make($request->password),
            'avatar' => FileHelper::uploadImage($request, 'image', $user),
            'status' => checkbox_filter($request->status),
            '2fa' => checkbox_filter($request['2fa']),
        );

        $user->fill(array_merge($request->all(), $modifyData));
        $user->save();

        Flash::success('user updated');

        return redirect()->back();
    }

    /**
     * Remove the specified User from storage.
     *
     * @param int $id
     *
     * @return Response
     * @throws Exception
     *
     */
    public function destroy($id)
    {
        /** @var User $user */
        $user = User::find($id);

        if (empty($user)) {
            Flash::error('not_found');
            return redirect(route('admin.users.index'));
        }

        FileHelper::deleteImage($user);
        $user->delete();

        Flash::success('user deleted');

        return redirect(route('admin.users.index'));
    }


    public function changeStatus(Request $request)
    {
        $user = User::find($request->user_id);

        $user->status = $request->status;
        $user->save();
        return response()->json(['success' => 'Status change successfully.']);
    }

    public function change2fa(Request $request)
    {
        $user = User::find($request->user_id);
        $user['2fa'] = $request->status;
        $user->save();
        return response()->json(['success' => '2fa change successfully']);
    }

    public function addBalanceView($id)
    {
        $wallet = Wallet::pluck('name', 'name');
        return view('backend.users.add_balance', compact('id', 'wallet'));
    }

    public function addBalance(Request $request)
    {
        $user = User::find($request->id);
        $ammount = $request->amount;
        $wallet = $request->wallet;

        $user->addMoney($ammount, $wallet);
        Flash::success('Balance Add Successfully');
        return redirect()->back();
    }


    public function removeBalanceView($id)
    {
        $wallet = Wallet::pluck('name', 'name');
        return view('backend.users.remove_balance', compact('id', 'wallet'));
    }


    public function removeBalance(Request $request)
    {
        $user = User::find($request->id);
        $ammount = $request->amount;
        $wallet = $request->wallet;

        $user->removeMoney($ammount, $wallet);
        Flash::success('Balance Add Successfully');
        return redirect()->back();
    }

    public function kycUpdate(Request $request)
    {
        Kyc::updateOrCreate(
            ['user_id' => $request->id],
            ['status' => $request->status,]
        );
        Flash::success('Kyc Update Successfully');
        return redirect()->back();
    }


    public function adminUpdate(Request $request)
    {
        admin::find($request->user_id)->update([
            'name' => $request->name,
            'email' => $request->email
        ]);

        return response()->json(['success' => 'done']);
    }


    public function updatePassword(Request $request)
    {

        $request->validate([
            'current_password' => ['required', new MatchOldPassword],
            'new_password' => ['required'],
            'new_confirm_password' => ['same:new_password'],
        ]);

        admin::find(auth()->user()->id)->update(['password' => Hash::make($request->new_password)]);

        return response()->json(['success' => 'done']);
    }

}
