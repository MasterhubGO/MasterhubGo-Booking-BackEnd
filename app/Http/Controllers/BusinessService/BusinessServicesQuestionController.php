<?php

namespace App\Http\Controllers\BusinessService;

use App\Http\Controllers\Controller;
use App\Http\Requests\BusinessService\BusinessServicesQuestionCreateRequest;
use App\Http\Requests\BusinessService\BusinessServicesQuestionUpdateRequest;
use App\Http\Requests\BusinessServiceQuestionCreateRequest;
use App\Http\Resources\BusinessService\BusinessServicesQuestionCollection;
use App\Http\Resources\BusinessService\BusinessServicesQuestionResource;
use App\Models\BusinessService;
use App\Models\BusinessServicesQuestion;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class BusinessServicesQuestionController extends Controller
{
    /**
     * @OA\Get(
     *      path="/api/services/{service}/questions",
     *      operationId="questions",
     *      security={{"bearerAuth":{}}},
     *      tags={"Business service"},
     *      summary="Questions list for given service",
     *      description="Returns questions list for given service",
	 * 		@OA\Parameter(
	 * 			name="service",
     *          description="Business service id",
     *          required=true,
     *          in="path",
     *          example=1,
     *          @OA\Schema(
     *              type="integer"
     *          )
	 * 		),
	 * 		@OA\Parameter(
	 * 			name="limit",
     *          description="Number of items to return",
     *          required=false,
     *          in="query",
     *          example=20,
     *          @OA\Schema(
     *              type="integer"
     *          )
	 * 		),
	 * 		@OA\Parameter(
	 * 			name="page",
     *          description="Page",
     *          required=false,
     *          in="query",
     *          example=1,
     *          @OA\Schema(
     *              type="integer"
     *          )
	 * 		),
     *      @OA\Response(
     *          response=200,
     *          description="OK",
     *          @OA\JsonContent(ref="#/components/schemas/BusinessServicesQuestionCollection")
     *      ),
     * )
     */
    public function index(int $serviceId)
    {
        $questions = BusinessServicesQuestion::query()
			->where('service_id', $serviceId)
			->orderBy('id')
			->paginate(request()->limit);

		return new BusinessServicesQuestionCollection($questions);
    }

    /**
     * @OA\Post(
     *      path="/api/services/{service}/questions",
     *      operationId="questions-create",
     *      security={{"bearerAuth":{}}},
     *      tags={"Business service"},
     *      summary="Creates new question for given business service",
     *      description="Returns created question data",
	 * 		@OA\Parameter(
	 * 			name="service",
     *          description="Business service id",
     *          required=true,
     *          in="path",
     *          example=1,
     *          @OA\Schema(
     *              type="integer"
     *          )
	 * 		),
	 * 		@OA\RequestBody(
     *          required=true,
     *          @OA\JsonContent(ref="#/components/schemas/BusinessServicesQuestionCreateRequest")
     *      ),
     *      @OA\Response(
     *          response=201,
     *          description="Created",
     *          @OA\JsonContent(ref="#/components/schemas/BusinessServicesQuestionResource")
     *      ),
     *      @OA\Response(
     *          response=422,
     *          description="Validation failed",
     *          @OA\JsonContent(ref="#/components/schemas/UnprocessableContentResponse")
     *      ),
     * )
     */
    public function store(BusinessServicesQuestionCreateRequest $request)
    {
        $question = BusinessServicesQuestion::create($request->validated());

		return (new BusinessServicesQuestionResource($question))
			->response()
			->setStatusCode(Response::HTTP_CREATED);
    }

    /**
     * @OA\Get(
     *      path="/api/questions/{id}",
     *      operationId="question-id",
     *      security={{"bearerAuth":{}}},
     *      tags={"Business service question"},
     *      summary="Get question information",
     *      description="Returns question data by id",
     *      @OA\Parameter(
     *          name="id",
     *          description="Question id",
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
     *          @OA\JsonContent(ref="#/components/schemas/BusinessServicesQuestionResource")
     *       ),
     * )
     */
    public function show(BusinessServicesQuestion $question)
    {
		return new BusinessServicesQuestionResource($question);
    }

    /**
     * @OA\Put(
     *      path="/api/questions/{id}",
     *      operationId="question-update",
     *      security={{"bearerAuth":{}}},
     *      tags={"Business service question"},
     *      summary="Updates question by id",
     *      description="Returns updated question",
	 * 		@OA\Parameter(
     *          name="id",
     *          description="Question id",
     *          required=true,
     *          in="path",
     *          example=1,
     *          @OA\Schema(
     *              type="integer"
     *          )
     *      ),
	 * 		@OA\RequestBody(
     *          required=true,
     *          @OA\JsonContent(ref="#/components/schemas/BusinessServicesQuestionUpdateRequest")
     *      ),
     *      @OA\Response(
     *          response=200,
     *          description="OK",
     *          @OA\JsonContent(ref="#/components/schemas/BusinessServicesQuestionResource")
     *      ),
     *      @OA\Response(
     *          response=422,
     *          description="Validation failed",
     *          @OA\JsonContent(ref="#/components/schemas/UnprocessableContentResponse")
     *      ),
     * )
     */
    public function update(BusinessServicesQuestionUpdateRequest $request, BusinessServicesQuestion $question)
    {
        $question->update($request->validated());

		return new BusinessServicesQuestionResource($question);
    }

    /**
     * @OA\Delete(
     *      path="/api/questions/{id}",
     *      operationId="question-delete",
     *      security={{"bearerAuth":{}}},
     *      tags={"Business service question"},
     *      summary="Deletes question by id",
     *      description="Deletes question by id",
	 * 		@OA\Parameter(
     *          name="id",
     *          description="Question id",
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
    public function destroy(BusinessServicesQuestion $question)
    {
        $question->delete();

		return response()->json(null);
    }
}
