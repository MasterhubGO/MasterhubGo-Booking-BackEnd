<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BusinessRole extends Model
{
    use HasFactory;
    protected $table = 'business_roles';
    protected $fillable = ['role'];

    public function business()
    {
        return $this->hasMany(BusinessProfile::class);
    }
}
