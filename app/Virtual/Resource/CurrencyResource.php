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
class CurrencyResource
{
    /**
     * @OA\Property(
     *     title="Item",
     *     description="Data wrapper"
     * )
     *
     * @var \App\Virtual\Models\Currency
     */
    private $item;
}
