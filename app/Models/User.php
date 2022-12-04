<?php

namespace App\Models;

use App\Http\Traits\Excludable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Fortify\TwoFactorAuthenticatable;
use NrmlCo\LaravelApiKeys\HasApiKeys;
use Spatie\Activitylog\Traits\LogsActivity;

/**
 * Class User
 * @package App\Models
 * @version January 2, 2022, 11:34 am UTC
 *
 * @property string $first_name
 * @property string $last_name
 * @property string $email
 * @property string $phone
 * @property string $Avatar
 * @property string $address
 * @property string $city
 * @property string $state
 * @property string $zip
 * @property string $country
 * @property boolean $status
 * @property boolean $2fa
 * @property string $password
 */
class User extends Authenticatable implements MustVerifyEmail
{
    use Notifiable, HasFactory, Excludable, LogsActivity, TwoFactorAuthenticatable, HasApiKeys;


    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'first_name' => 'required',
        'last_name' => 'required',
        'email' => 'required',
        'phone' => 'required',
        'country' => 'required',
    ];
    protected static $logName = "user";
    public $fillable = [
        'first_name',
        'last_name',
        'role',
        'email',
        'phone',
        'avatar',
        'address',
        'city',
        'state',
        'zip',
        'country',
        'status',
        '2fa',
        'merchant_name',
        'merchant_email',
        'merchant_address',
        'merchant_proof',
        'password'
    ];
    protected $hidden = ['password'];
    protected $with = ['balance', 'withdrawAccount', 'withdraw', 'kyc'];
    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'first_name' => 'string',
        'last_name' => 'string',
        'email' => 'string',
        'phone' => 'string',
        'avatar' => 'string',
        'address' => 'string',
        'city' => 'string',
        'state' => 'string',
        'zip' => 'string',
        'country' => 'string',
        'status' => 'boolean',
        '2fa' => 'boolean',
        'password' => 'string'
    ];



    public function getDescriptionForEvent(string $eventName): string
    {
        return "You Have {$eventName} user";
    }

    public function isMerchant(): bool
    {
        return $this->role === 'merchant';
    }

    public function isUser(): bool
    {
        return $this->role === 'user';
    }


    public function isActive()
    {
        return $this->status === true;
    }

    public function isInActive()
    {
        return $this->status === false;
    }


    public function getFullNameAttribute()
    {
        return "{$this->first_name} {$this->last_name}";
    }

    public function tickets()
    {
        return $this->hasMany(Ticket::class);
    }

    public function withdrawAccount()
    {
        return $this->hasMany(WithdrawAccount::class);
    }

    public function totalWithdraw()
    {
        return $this->withdraw()->where('status', 'success')->sum('amount');
    }

    public function withdraw()
    {
        return $this->hasMany(Withdraw::class);
    }

    public function kyc()
    {
        return $this->hasMany(Kyc::class);
    }

    public function successTransition()
    {
        return $this->transition()->where('status', 'success')->count();
    }

    public function transition()
    {
        return $this->hasMany(Transaction::class);
    }

    public function getReferrals()
    {
        return ReferralProgram::all()->map(function ($program) {
            return ReferralLink::getReferral($this, $program);
        });
    }

    public function addMoney($amount, $wallet)
    {
        $balance = $this->balance()->where('wallet_name', $wallet)->firstOrNew(
            ['user_id' => $this->id],
            ['wallet_name' => $wallet]
        );
        $balance->amount += $amount;
        $balance->save();
    }

    public function balance()
    {
        return $this->hasMany(Balance::class);
    }

    public function removeMoney($amount, $wallet)
    {
        $balance = $this->balance()->where('wallet_name', $wallet)->firstOrNew(
            ['user_id' => $this->id],
            ['wallet_name' => $wallet]
        );
        $balance->amount -= $amount;
        $balance->save();
    }

}
