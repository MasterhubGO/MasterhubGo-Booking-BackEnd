<?php

namespace App\Virtual\Resource;
/**
 * @OA\Schema(
 *     title="CurrencyResource",
 *     description="Currency resource",
 *     @OA\Xml(
 *         name="CurrencyResource"
 *     )
 * )
 */
class CurrencyCollection
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
     * @var \App\Virtual\Models\Currency[]
     */
    private $items;
}
