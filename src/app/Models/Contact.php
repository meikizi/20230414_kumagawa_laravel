<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;

    protected $fillable = [
        'last_name',
        'first_name',
        'fullname',
        'gender',
        'email',
        'postcode',
        'address',
        'building_name',
        'opinion',
        'created_at',
        'updated_at'
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
        'created_at'        => 'datetime:Y/m/d',
        'updated_at'        => 'datetime:Y/m/d',
    ];

    public function scopeFullnameSearch($query, $fullname)
    {
        if (!empty($fullname)) {
            $query->where('fullname', 'like', '%' . $fullname . '%');
        }
    }

    public function scopeGenderSearch($query, $gender)
    {
        if (!empty($gender)) {
            $query->where('gender', $gender);
        }
    }

    public function scopeCreated_atSearch($query, $created_at)
    {
        if (!empty($created_at)) {
            $query->where('created_at', $created_at);
        }
    }

    public function scopeEmailSearch($query, $email)
    {
        if (!empty($email)) {
            $query->where('email', 'like', '%' . $email . '%');
        }
    }
}
