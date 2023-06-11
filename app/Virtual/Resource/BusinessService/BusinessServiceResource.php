<?php

namespace App\Virtual\Resource\BusinessService;
/**
 * @OA\Schema(
 *     title="BusinessServiceResource",
 *     description="BusinessService resource",
 *     @OA\Xml(
 *         name="BusinessServiceResource"
 *     )
 * )
 */
class BusinessServiceResource
{
    /**
     * @OA\Property(
     *     title="Items",
     *     description="Data wrapper"
     * )
     *
     * @var \App\Virtual\Models\BusinessService
     */
    private $item;
}
