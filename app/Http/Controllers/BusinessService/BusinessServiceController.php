<?php

namespace App\Http\Controllers\BusinessService;

use App\Http\Controllers\Controller;
use App\Http\Requests\BusinessService\BusinessServiceCreateRequest;
use App\Http\Requests\BusinessService\BusinessServiceUpdateRequest;
use App\Http\Resources\BusinessService\BusinessServiceCollection;
use App\Http\Resources\BusinessService\BusinessServiceResource;
use App\Models\BusinessProfile;
use App\Models\BusinessService;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class BusinessServiceController extends Controller
{
    /**
     * @OA\Get(
     *      path="/api/business-profiles/{business_profile}/services",
     *      operationId="business-services",
     *      security={{"bearerAuth":{}}},
     *      tags={"Business profile"},
     *      summary="Services list for given business profile",
     *      description="Returns services list for given business profile",
	 * 		@OA\Parameter(
	 * 			name="business_profile",
     *          description="Business profile id",
     *          required=true,
     *          in="path",
     *          example=1,
     *          @OA\Schema(
     *              type="integer"
     *          )
	 * 		),
     *      @OA\Response(
     *          response=200,
     *          description="OK",
     *          @OA\JsonContent(ref="#/components/schemas/BusinessServiceCollection")
     *      ),
     * )
     */
    public function index(BusinessProfile $businessProfile)
    {
		return new BusinessServiceCollection($businessProfile->services);
    }

    /**
     * @OA\Post(
     *      path="/api/business-profiles/{business_profile}/services",
     *      operationId="business-services-create",
     *      security={{"bearerAuth":{}}},
     *      tags={"Business profile"},
     *      summary="Creates new service for given business profile",
     *      description="Returns created service data",
	 * 		@OA\Parameter(
	 * 			name="business_profile",
     *          description="Business profile id",
     *          required=true,
     *          in="path",
     *          example=1,
     *          @OA\Schema(
     *              type="integer"
     *          )
	 * 		),
	 * 		@OA\RequestBody(
     *          required=true,
     *          @OA\JsonContent(ref="#/components/schemas/BusinessServiceCreateRequest")
     *      ),
     *      @OA\Response(
     *          response=201,
     *          description="Created",
     *          @OA\JsonContent(ref="#/components/schemas/BusinessServiceResource")
     *      ),
     *      @OA\Response(
     *          response=422,
     *          description="Validation failed",
     *          @OA\JsonContent(ref="#/components/schemas/UnprocessableContentResponse")
     *      ),
     * )
     */
    public function store(BusinessServiceCreateRequest $request)
    {
        $service = BusinessService::create($request->validated());

		return (new BusinessServiceResource($service))
			->response()
			->setStatusCode(Response::HTTP_CREATED);
    }

    /**
     * @OA\Get(
     *      path="/api/services/{id}",
     *      operationId="service-id",
     *      security={{"bearerAuth":{}}},
     *      tags={"Business service"},
     *      summary="Get service information",
     *      description="Returns service data by id",
     *      @OA\Parameter(
     *          name="id",
     *          description="Service id",
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
     *          @OA\JsonContent(ref="#/components/schemas/BusinessServiceResource")
     *       ),
     * )
     */
    public function show(BusinessService $service)
    {
        return new BusinessServiceResource($service);
    }

    /**
     * @OA\Put(
     *      path="/api/services/{id}",
     *      operationId="service-update",
     *      security={{"bearerAuth":{}}},
     *      tags={"Business service"},
     *      summary="Updates service by id",
     *      description="Returns updated service",
	 * 		@OA\Parameter(
     *          name="id",
     *          description="Service id",
     *          required=true,
     *          in="path",
     *          example=1,
     *          @OA\Schema(
     *              type="integer"
     *          )
     *      ),
	 * 		@OA\RequestBody(
     *          required=true,
     *          @OA\JsonContent(ref="#/components/schemas/BusinessServiceUpdateRequest")
     *      ),
     *      @OA\Response(
     *          response=200,
     *          description="OK",
     *          @OA\JsonContent(ref="#/components/schemas/BusinessServiceResource")
     *      ),
     *      @OA\Response(
     *          response=422,
     *          description="Validation failed",
     *          @OA\JsonContent(ref="#/components/schemas/UnprocessableContentResponse")
     *      ),
     * )
     */
    public function update(BusinessServiceUpdateRequest $request, BusinessService $service)
    {
		$service->update($request->validated());

        return new BusinessServiceResource($service); 
    }

     /**
     * @OA\Delete(
     *      path="/api/services/{id}",
     *      operationId="service-delete",
     *      security={{"bearerAuth":{}}},
     *      tags={"Business service"},
     *      summary="Deletes service by id",
     *      description="Deletes service by id",
	 * 		@OA\Parameter(
     *          name="id",
     *          description="Service id",
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
    public function destroy(BusinessService $service)
    {
        $service->delete();

		return response()->json(null);
    }
}
