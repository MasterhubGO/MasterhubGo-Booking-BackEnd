<?php

namespace App\Virtual\Models;
/**
 * @OA\Schema(
 *     title="Currency",
 *     description="Currency model. Implements country currency codes according to ISO 4217 standard",
 *     @OA\Xml(
 *         name="Currency"
 *     )
 * )
 */
class Currency
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
     *      title="Alpha code",
     *      description="Currency alphabetical code",
     *      example="RUB"
     * )
     *
     * @var string
     */
    public $alpha_code;

    /**
     * @OA\Property(
     *      title="Numeric code",
     *      description="Currency numeric code",
     *      example="643"
     * )
     *
     * @var string
     */
    public $numeric_code;

    /**
     * @OA\Property(
     *     title="Fraction",
     *     description="Number of fractional units (e.g. in dollar 100 cents)",
     *     example=100,
     *     format="int32",
	 *	   minimum=0,
	 *	   multipleOf=10,
     *     type="integer"
     * )
     *
     * @var integer
     */
    public $fraction;

    /**
     * @OA\Property(
     *     title="Sign",
     *     description="Currency sign",
     *     example="₽",
     *     type="string",
	 * 	   nullable=true
     * )
     *
     * @var string
     */
    public $sign;

}
