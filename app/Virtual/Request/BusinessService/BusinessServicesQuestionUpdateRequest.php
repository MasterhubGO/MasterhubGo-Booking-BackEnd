<?php

namespace App\Virtual\Request\BusinessService;

/**
 * @OA\Schema(
 *      title="BusinessServicesQuestionUpdateRequest",
 *      description="Updates question",
 *      type="object",
 * )
 */
class BusinessServicesQuestionUpdateRequest
{
	/**
     * @OA\Property(
     *      title="question",
     *      description="Text of the question",
	 *      minimum=5,
	 *      maximum=3000,
     * )
     *
     * @var string
     */
    public $question;

    /**
     * @OA\Property(
     *      title="answer",
     *      description="Text of the answer",
	 *      minimum=5,
	 *      maximum=3000,
     * )
     *
     * @var string
     */
    public $answer;
}
