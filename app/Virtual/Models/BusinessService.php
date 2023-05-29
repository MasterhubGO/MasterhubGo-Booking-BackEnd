<?php

namespace App\Virtual\Models;
/**
 * @OA\Schema(
 *     title="BusinessService",
 *     description="BusinessService model",
 *     @OA\Xml(
 *         name="BusinessService"
 *     )
 * )
 */
class BusinessService
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
    public $id;

    /**
     * @OA\Property(
     *      title="business_id",
     *      description="Related business profile id",
     *      format="int64",
     *      example=1
     * )
     *
     * @var integer
     */
    public $business_id;

    /**
     * @OA\Property(
     *      title="title",
     *      description="Service title",
     * )
     *
     * @var string
     */
    public $title;

    /**
     * @OA\Property(
     *     title="Price",
     *     description="Price object",
     * )
     *
     * @var \App\Virtual\ValueObjects\Price
     */
    public $price;

    /**
     * @OA\Property(
     *     title="description",
     *     description="Service description",
	 * 	   nullable=true
     * )
     *
     * @var string
     */
    public $description;

    /**
     * @OA\Property(
     *     title="duration",
     *     description="Duration in minutes",
	 *     format="int32",
	 * 	   minimum=1
     * )
     *
     * @var integer
     */
    public $duration;

    /**
     * @OA\Property(
     *     title="is_field",
     *     description="Indicates whether the service can be provided in the fields",
     * )
     *
     * @var boolean
     */
    public $is_field;

	/**
     * @OA\Property(
     *     title="user_id",
     *     description="Owner id",
     *     example="1",
	 * 	   format="int64",
     * )
     *
     * @var integer
     */
    public $user_id;

	/**
     * @OA\Property(
     *     title="created_at",
     *     description="Date and time of creation",
	 * 	   format="datetime",
	 * 	   example="2023-05-28T13:51:36.000000Z",
     * )
     *
     * @var string
     */
    public $created_at;

	/**
     * @OA\Property(
     *     title="description",
     *     description="Date and time of updation",
	 * 	   format="datetime",
	 * 	   example="2023-05-28T13:51:36.000000Z",
     * )
     *
     * @var string
     */
    public $updated_at;
}
