<?php

namespace App\Virtual\Resource\BusinessService;
/**
 * @OA\Schema(
 *     title="BusinessServicesQuestionCollection",
 *     description="BusinessServices question collection",
 *     @OA\Xml(
 *         name="BusinessServicesQuestionCollection"
 *     )
 * )
 */
class BusinessServicesQuestionCollection
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
     * @var \App\Virtual\Models\BusinessServicesQuestion[]
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
