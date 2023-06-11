<?php

namespace App\Virtual\Models;
/**
 * @OA\Schema(
 *     title="BusinessServicesQuestion",
 *     description="BusinessServicesQuestion model",
 *     @OA\Xml(
 *         name="BusinessServicesQuestion"
 *     )
 * )
 */
class BusinessServicesQuestion
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
     *      title="service_id",
     *      description="Related business service id",
     *      format="int64",
     *      example=1
     * )
     *
     * @var integer
     */
    public $service_id;

    /**
     * @OA\Property(
     *      title="question",
     *      description="Question text",
     * )
     *
     * @var string
     */
    public $question;

    /**
     * @OA\Property(
     *      title="answer",
     *      description="Answer text",
     * )
     *
     * @var string
     */
    public $answer;

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
