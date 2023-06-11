<?php

namespace App\Virtual\Resource\BusinessService;
/**
 * @OA\Schema(
 *     title="BusinessServiceCollection",
 *     description="BusinessService collection",
 *     @OA\Xml(
 *         name="BusinessServiceCollection"
 *     )
 * )
 */
class BusinessServiceCollection
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
     * @var \App\Virtual\Models\BusinessService[]
     */
    private $items;

	/**
     * @OA\Property(
     *     title="Total",
     *     description="Number of items in database",
	 *     example=1,
     * )
     *
     * @var integer
     */
    private $total;
}
