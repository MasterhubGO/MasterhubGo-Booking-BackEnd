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
class UserUpdateRequest
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
     *      title="Gender",
     *      description="Gender",
     *      example="male"
     * )
     *
     * @var string
     */
    public $gender;

    /**
     * @OA\Property(
     *      title="Role",
     *      description="Role bayer or seller",
     *      example="buyer"
     * )
     *
     * @var string
     */
    public $user_role;
}
