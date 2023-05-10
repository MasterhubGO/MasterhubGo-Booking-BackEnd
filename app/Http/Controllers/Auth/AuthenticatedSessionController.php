<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;

class AuthenticatedSessionController extends Controller
{
    /**
     * @OA\Post(
     *      path="/login",
     *      operationId="loginUser",
     *      tags={"Authentication"},
     *      summary="Authenticate a user",
     *      description="Authenticates a user and returns the user data along with the authentication token",
     *      @OA\RequestBody(
     *          required=true,
     *          @OA\JsonContent(ref="#/components/schemas/LoginRequest")
     *      ),
     *      @OA\Response(
     *          response=200,
     *          description="User authenticated successfully",
     *          @OA\JsonContent(
     *              @OA\Property(property="user", ref="#/components/schemas/User"),
     *              @OA\Property(property="token", type="string", description="Authentication token")
     *          )
     *      ),
     *      @OA\Response(
     *          response=401,
     *          description="Unauthorized"
     *      ),
     *      @OA\Response(
     *          response=422,
     *          description="Validation Error"
     *      )
     * )
     */

    public function store(LoginRequest $request): Response
    {
        $request->authenticate();

        $request->session()->regenerate();

        $token = $request->user()->createToken($request->user()->password)->plainTextToken;

        return response([
            'user' => $request->user(),
            'token' => $token,
        ], Response::HTTP_CREATED);
    }

    /**
     * @OA\Post(
     *      path="/logout",
     *      operationId="logoutUser",
     *      security={{"bearerAuth":{}}},
     *      tags={"Authentication"},
     *      summary="Logout current user",
     *      description="Logs out the currently authenticated user",
     *      @OA\Response(
     *          response=200,
     *          description="User logged out successfully",
     *          @OA\JsonContent(
     *              @OA\Property(property="message", type="string", example="User logged out successfully")
     *          )
     *      ),
     *      @OA\Response(
     *          response=401,
     *          description="Unauthorized",
     *          @OA\JsonContent(
     *              @OA\Property(property="message", type="string", example="Unauthorized")
     *          )
     *      )
     * )
     */

    public function destroy(Request $request): Response
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        $request->user()->currentAccessToken()->delete();

        return response()->noContent();
    }
}
