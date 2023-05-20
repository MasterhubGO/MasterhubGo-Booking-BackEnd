<?php

namespace App\Http\Controllers\Support;

use App\Http\Controllers\Controller;
use App\Http\Requests\Support\CurrencyCreateRequest;
use App\Http\Requests\Support\CurrencyUpdateRequest;
use App\Http\Resources\Support\CurrencyResource;
use App\Models\Currency;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class CurrencyController extends Controller
{
    /**
     * @OA\Get(
     *      path="/api/currencies/",
     *      operationId="currency",
     *      security={{"bearerAuth":{}}},
     *      tags={"Currency"},
     *      summary="Get currencies list",
     *      description="Returns currencies list",
     *      @OA\Response(
     *          response=200,
     *          description="Successful operation",
     *          @OA\JsonContent(ref="#/components/schemas/CurrencyResource")
     *       ),
     * )
     */
    public function index()
    {
        return CurrencyResource::collection(Currency::all());
    }

    /**
     * @OA\Post(
     *      path="/api/currencies",
     *      operationId="currency-create",
     *      security={{"bearerAuth":{}}},
     *      tags={"Currency"},
     *      summary="Creates new currency",
     *      description="Returns created currency data",
	 * 		@OA\RequestBody(
     *          required=true,
     *          @OA\JsonContent(ref="#/components/schemas/CurrencyCreateRequest")
     *      ),
     *      @OA\Response(
     *          response=201,
     *          description="Created",
     *          @OA\JsonContent(ref="#/components/schemas/Currency")
     *      ),
     *      @OA\Response(
     *          response=422,
     *          description="Validation failed",
     *          @OA\JsonContent(ref="#/components/schemas/UnprocessableContentResponse")
     *      ),
     * )
     */
    public function store(CurrencyCreateRequest $request)
    {
        $currency = Currency::create($request->validated());

		return response()->json($currency, Response::HTTP_CREATED);
    }

    /**
     * @OA\Get(
     *      path="/api/currencies/{id}",
     *      operationId="currency-id",
     *      security={{"bearerAuth":{}}},
     *      tags={"Currency"},
     *      summary="Get currency information",
     *      description="Returns currency data by id",
     *      @OA\Parameter(
     *          name="id",
     *          description="Currency id",
     *          required=true,
     *          in="path",
     *          example=1,
     *          @OA\Schema(
     *              type="integer"
     *          )
     *      ),
     *      @OA\Response(
     *          response=200,
     *          description="Successful operation",
     *          @OA\JsonContent(ref="#/components/schemas/Currency")
     *       ),
     * )
     */
    public function show(Currency $currency)
    {
        return response()->json($currency);
    }

    /**
     * @OA\Put(
     *      path="/api/currencies/{id}",
     *      operationId="currency-update",
     *      security={{"bearerAuth":{}}},
     *      tags={"Currency"},
     *      summary="Updates currency by id",
     *      description="Returns updated currency",
	 * 		@OA\Parameter(
     *          name="id",
     *          description="Currency id",
     *          required=true,
     *          in="path",
     *          example=1,
     *          @OA\Schema(
     *              type="integer"
     *          )
     *      ),
	 * 		@OA\RequestBody(
     *          required=true,
     *          @OA\JsonContent(ref="#/components/schemas/CurrencyUpdateRequest")
     *      ),
     *      @OA\Response(
     *          response=200,
     *          description="OK",
     *          @OA\JsonContent(ref="#/components/schemas/Currency")
     *      ),
     *      @OA\Response(
     *          response=422,
     *          description="Validation failed",
     *          @OA\JsonContent(ref="#/components/schemas/UnprocessableContentResponse")
     *      ),
     * )
     */
    public function update(CurrencyUpdateRequest $request, Currency $currency)
    {
        $currency->update($request->validated());

		return response()->json($currency);
    }

    /**
     * @OA\Delete(
     *      path="/api/currencies/{id}",
     *      operationId="currency-delete",
     *      security={{"bearerAuth":{}}},
     *      tags={"Currency"},
     *      summary="Deletes currency by id",
     *      description="Deletes currency by id",
	 * 		@OA\Parameter(
     *          name="id",
     *          description="Currency id",
     *          required=true,
     *          in="path",
     *          example=1,
     *          @OA\Schema(
     *              type="integer"
     *          )
     *      ),
     *      @OA\Response(
     *          response=200,
     *          description="Deleted successfully",
     *      ),
     * )
     */
    public function destroy(Currency $currency)
    {
        $currency->delete();

		return response()->json(null);
    }
}
