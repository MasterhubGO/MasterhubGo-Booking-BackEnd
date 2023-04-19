<?php

namespace App\Http\Controllers\Cabinets;

use App\Http\Controllers\Controller;
use App\Http\Requests\Cabinets\UserUpdateRequest;
use App\Http\Resources\Cabinets\UserResource;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return new UserResource(User::find(Auth::id()));
    }
    public function update(UserUpdateRequest $request, string $id)
    {
        $data = $request->validated();
        $user = User::find($id);
        $user->update($data);
        $user->save();
    }
    public function destroy(string $id)
    {
        $user = User::find($id);
        $user->delete();
    }
}
