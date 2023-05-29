<?php

namespace App\Virtual\Resource;
/**
 * @OA\Schema(
 *     title="UserResource",
 *     description="User resource",
 *     @OA\Xml(
 *         name="UserResource"
 *     )
 * )
 */
class UserResource
{
    /**
     * @OA\Property(
     *     title="Item",
     *     description="Data wrapper"
     * )
     *
     * @var \App\Virtual\Models\User
     */
    private $item;
}
