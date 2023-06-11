<?php

namespace App\Virtual\Resource\BusinessService;
/**
 * @OA\Schema(
 *     title="BusinessServicesQuestionResource",
 *     description="BusinessService question resource",
 *     @OA\Xml(
 *         name="BusinessServicesQuestionResource"
 *     )
 * )
 */
class BusinessServicesQuestionResource
{
    /**
     * @OA\Property(
     *     title="Items",
     *     description="Data wrapper"
     * )
     *
     * @var \App\Virtual\Models\BusinessServicesQuestion
     */
    private $item;
}
