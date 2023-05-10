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
class RegisterRequest
{
    /**
     * @OA\Property(
     *      title="Name",
     *      description="Name",
     *      example="John"
     * )
     *
     * @var string
     */
    public $name;

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

    /**
     * @OA\Property(
     *      title="Password confirmation",
     *      description="Password confirmation",
     *      example="password"
     * )
     *
     * @var string
     */
    public $password_confirmation;
}
