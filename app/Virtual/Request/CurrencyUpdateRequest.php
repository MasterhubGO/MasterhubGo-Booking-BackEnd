<?php

namespace App\Virtual\Request;
/**
 * @OA\Schema(
 *      title="Currency update request",
 *      description="Updates currency",
 *      type="object",
 *      required={}
 * )
 */
class CurrencyUpdateRequest
{
    /**
     * @OA\Property(
     *      title="alpha_code",
     *      description="Alphabetical code",
	 * 		minLength=3,
	 * 		maxLength=3,
     *      example="BYN",
     * )
     *
     * @var string
     */
    public $alpha_code;

    /**
     * @OA\Property(
     *      title="numeric_code",
     *      description="numeric code",
	 * 		minLength=3,
	 * 		maxLength=3,
     *      example="936"
     * )
     *
     * @var string
     */
    public $numeric_code;

    /**
     * @OA\Property(
     *      title="fraction",
     *      description="Number of fractional units (e.g. in dollar 100 cents)",
     *      example=100,
	 * 		multipleOf=10,
	 * 		minimum=0,
	 * 		default=100
     * )
     *
     * @var integer
     */
    public $fraction;

    /**
     * @OA\Property(
     *      title="sign",
     *      description="Currency sign",
	 *      example="₽",
     * )
     *
     * @var string
     */
    public $sign;
}
