<?php

namespace App\Virtual\Request\BusinessService;
/**
 * @OA\Schema(
 *      title="BusinessServiceUpdateRequest",
 *      description="Updates service",
 *      type="object",
 *      required={}
 * )
 */
class BusinessServiceUpdateRequest
{
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
     *     description="Price",
     *     example=12.99,
	 *	   minimum=0,
     * )
     *
     * @var integer
     */
    public $price;

    /**
     * @OA\Property(
     *     title="currency_id",
     *     description="Currency id",
     *     example="1",
	 * 	   format="int64",
     * )
     *
     * @var integer
     */
    public $currency_id;

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
	 * 	   minimum=1,
	 *     example=45
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
}
