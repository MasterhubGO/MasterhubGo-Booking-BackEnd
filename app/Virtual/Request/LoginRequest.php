<?php

namespace App\Virtual\Request;
/**
 * @OA\Schema(
 *      title="Update User request",
 *      description="Update user request body data",
 *      type="object",
 *      required={"name"}
 * )
 */
class LoginRequest
{
    /**
     * @OA\Property(
     *      title="Email",
     *      description="Email",
     *      example="example@example.com"
     * )
     *
     * @var string
     */
    public $email;

    /**
     * @OA\Property(
     *      title="Password",
     *      description="Password",
     *      example="password"
     * )
     *
     * @var string
     */
    public $password;
}
