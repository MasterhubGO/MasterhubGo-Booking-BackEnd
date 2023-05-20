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
class BusinessServiceResource
{
    /**
     * @OA\Property(
     *     title="Data",
     *     description="Data wrapper"
     * )
     *
     * @var \App\Virtual\Models\BusinessService[]
     */
    private $data;
}
