<?php

namespace App\Virtual\ValueObjects;
/**
 * @OA\Schema(
 *     title="Price",
 *     description="Price",
 *     @OA\Xml(
 *         name="Price"
 *     )
 * )
 */
class Price
{
    /**
     * @OA\Property(
     *     title="amount",
     *     description="Amount",
     *     example=129.99
     * )
     *
     * @var number
     */
    public $amount;

    /**
     * @OA\Property(
     *     title="Currency",
     *     description="Currency",
     * )
     *
     * @var \App\Virtual\Models\Currency
     */
    public $currency;

}
