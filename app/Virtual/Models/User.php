<?php

namespace App\Virtual\Models;
/**
 * @OA\Schema(
 *     title="User",
 *     description="User model",
 *     @OA\Xml(
 *         name="User"
 *     )
 * )
 */
class User
{
    /**
     * @OA\Property(
     *     title="ID",
     *     description="ID",
     *     format="int64",
     *     example=1
     * )
     *
     * @var integer
     */
    private $id;

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
     *     title="Created at",
     *     description="Created at",
     *     example="2020-01-27 17:50:45",
     *     format="datetime",
     *     type="string"
     * )
     *
     * @var \DateTime
     */
    private $created_at;

    /**
     * @OA\Property(
     *     title="Updated at",
     *     description="Updated at",
     *     example="2020-01-27 17:50:45",
     *     format="datetime",
     *     type="string"
     * )
     *
     * @var \DateTime
     */
    private $updated_at;

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
     *     example="buyer"
     * )
     *
     * @var string
     */
    public $user_role;

	//TODO Добавить ссылку на BusinessProfileResource когда появится
	/**
	 * @OA\Property(
     *      title="Business profiles",
     *      description="List of user businesses",
     * )
     *
     * @var object
	 */
	public $business_profiles;
}
