<?php

namespace App\Virtual\Resource;
/**
 * @OA\Schema(
 *     title="BusinessServiceResource",
 *     description="BusinessService resource",
 *     @OA\Xml(
 *         name="BusinessServiceResource"
 *     )
 * )
 */
class UserCollection
{
	/**
     * @OA\Property(
     *     title="Count",
     *     description="Number of items in response",
	 *     example=1,
     * )
     *
     * @var integer
     */
    private $count;

    /**
     * @OA\Property(
     *     title="Items",
     *     description="Data wrapper"
     * )
     *
     * @var \App\Virtual\Models\User[]
     */
    private $items;
}
