<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laratrust\Traits\LaratrustUserTrait;

class User extends Authenticatable
{
    use LaratrustUserTrait;
    use HasFactory, Notifiable;

    protected $fillable = [
        'name', 'email', 'password', 'status',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function getNameAttribute($value)
    {
        return ucfirst($value);
    }

    public function scopeWhereRole($query,$role_name)
    {
        return $query->whereHas('roles',function($q) use ($role_name){
            return $q->whereIn('name', (array)$role_name)
                    ->orWhereIn('id',(array)$role_name);
        });
    }
    public function scopeWhereRoleNot($query,$role_name)
    {
        return $query->whereHas('roles',function($q) use ($role_name){
            return $q->whereNotIn('name', (array)$role_name)
                    ->WhereNotIn('id',(array)$role_name);
        });
    }
    public function scopeWhenSearch($query,$search)
    {
        return $query->when($search,function($q) use ($search){
            return $q->where('name','like',"%$search%" );
        });
    }

    public function scopeWhenRole($query,$role_id)
    {
        return $query->when($role_id,function($q) use ($role_id){
            return $this->scopeWhereRole($q,$role_id);
        });
    }

    // relations

    public function enrollments()
    {
        return $this->hasMany(Enrollment::class);
    }

    public function payments()
    {
        return $this->hasMany(Payment::class);
    }

    public function profile()
    {
        return $this->hasOne(Profile::class, 'email');
    }

    public function services()
    {
        return $this->belongsToMany(Service::class, 'order_services');
    }


    public function service_reviews()
    {
        return $this->hasMany(ServiceReview::class);
    }

    public function order_services()
    {
        return $this->hasMany(OrderService::class);

    }


    public function payment_services()
    {
        return $this->hasMany(PaymentService::class);

    }

    public function payment_registers()
    {
        return $this->hasMany(PaymentRegister::class);

    }



    public function delete()
    {
        $this->order_services()->delete();
        $this->enrollments()->delete();
        $this->service_reviews()->delete();

        return parent::delete();
    }
}
