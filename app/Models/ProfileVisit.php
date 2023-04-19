<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class ProfileVisit extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function visitor()
    {
        return $this->belongsTo(User::class, 'visitor_id');
    }

    public function visited()
    {
        return $this->belongsTo(User::class, 'visited_id');
    }
}
