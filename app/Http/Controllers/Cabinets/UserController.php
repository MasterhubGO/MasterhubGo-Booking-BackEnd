<?php

namespace App\Http\Controllers\Cabinets;

use App\Http\Controllers\Controller;
use App\Http\Resources\Cabinets\UserResource;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index()
    {
        return UserResource::collection(User::find(Auth::id()));
    }
}
