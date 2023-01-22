<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Devinweb\LaravelYouCanPay\Traits\Billable;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, Billable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'phone',
        'address',
        'lname',
        'city',
        'zip_code',
        'country_code',
        'state'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * Get the customer info to send them when we generate the form token.
     *
     * @return array
     */
    public function getCustomerInfo()
    {
        return [
        'name'         => $this->name,
        'address'      => $this->address,
        'zip_code'     => $this->zip_code,
        'city'         => $this->city,
        'state'        => $this->state,
        'country_code' => $this->country_code,
        'phone'        => $this->phone,
        'email'        => $this->email,
        ];
    }

    public function biens(){
        return $this->hasMany(Bien::class);
    }
}
