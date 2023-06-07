<?php

namespace App\Http\Controllers\ApiDocumentation;


use Illuminate\Http\Request;
/**
 * @OA\Info(
 *     version="1.0",
 *     title="MusterhubGo",
 *     description="This api is for working with musterhabGo",
 *     @OA\Contact(
 *         email="artem.yablochnyi@gmail.com"
 *     ),
 * )

 * @OA\Server(
 *     description="Laravel Swagger API server",
 *     url=L5_SWAGGER_CONST_HOST
 * )
 * @OA\SecurityScheme(
 *      securityScheme="bearerAuth",
 *      type="http",
 *      scheme="bearer"
 * )
 */
class Controller extends \App\Http\Controllers\Controller
{
}
