<?php

namespace App\Virtual\Response\UnprocessableContent;
/**
 * @OA\Schema(
 *     title="Error",
 *     description="Error",
 *     @OA\Xml(
 *         name="Error"
 *     )
 * )
 */
class UnprocessableContentResponseError
{
    /**
     * @OA\Property(
     *     title="name",
     *     description="Faild field name",
	 * 	   @OA\Items(
	 * 			type="string",
	 * 			description="Error message"
	 * 	   )
     * )
     *
     * @var array
     */
    private $name;
}
