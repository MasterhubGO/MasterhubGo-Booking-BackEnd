<?php

namespace App\Virtual\Models;
/**
 * @OA\Schema(
 *     title="Service Feedback",
 *     description="BusinessServiceFeedback model",
 *     @OA\Xml(
 *         name="Business Service Feedback"
 *     )
 * )
 */
class BusinessServiceFeedback
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

		// 'numeric_code',
		// 'fraction',
		// 'sign',

    /**
     * @OA\Property(
     *      title="alpha_code",
     *      description="Alphabetical code",
     *      example="RUB"
     * )
     *
     * @var string
     */
    public $alpha_code;

    /**
     * @OA\Property(
     *      title="Numeric code",
     *      description="Email",
     *      example=""
     * )
     *
     * @var string
     */
    public $numeric_code;

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
    private $fraction;

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
    private $sign;
}
