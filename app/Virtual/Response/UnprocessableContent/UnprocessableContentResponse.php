<?php

namespace App\Virtual\Response\UnprocessableContent;
/**
 * @OA\Schema(
 *     title="UnprocessableContentResponse",
 *     description="Response when validation failed",
 *     @OA\Xml(
 *         name="UnprocessableContentResponse"
 *     )
 * )
 */
class UnprocessableContentResponse
{
    /**
     * @OA\Property(
     *     title="message",
     *     description="Error message"
     * )
     *
     * @var string
     */
    private $message;

    /**
     * @OA\Property(
     *     title="errors",
     *     description="Object with errors"
     * )
     *
     * @var \App\Virtual\Response\UnprocessableContent\UnprocessableContentResponseError
     */
    private $errors;
}
