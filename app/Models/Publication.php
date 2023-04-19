<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Publication extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function visited()
    {
        return $this->belongsTo(User::class);
    }
}
