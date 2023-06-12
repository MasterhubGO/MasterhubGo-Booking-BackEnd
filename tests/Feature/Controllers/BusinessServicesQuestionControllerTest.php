<?php

namespace Tests\Feature\Controllers;

use App\Http\Controllers\BusinessService\BusinessServicesQuestionController;
use App\Models\BusinessProfile;
use App\Models\BusinessRole;
use App\Models\BusinessService;
use App\Models\Currency;
use Database\Factories\BusinessProfileFactory;
use Database\Factories\BusinessServiceFactory;
use Database\Factories\BusinessServicesQuestionFactory;
use Database\Factories\UserFactory;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Artisan;
use Tests\TestCase;

class BusinessServicesQuestionControllerTest extends TestCase
{
	use RefreshDatabase, WithFaker;

	public function setUp(): void
	{
		parent::setUp();

		$user = UserFactory::new()->create();

		auth()->login($user);

		BusinessRole::create(['role' => 'Индивидуальный мастер']);
		Currency::create(['alpha_code' => 'RUB', 'numeric_code' => '643', 'sign' => '₽']);
		BusinessProfileFactory::new()->count(2)->create();
		BusinessServiceFactory::new()->create(['user_id' => $user->id, 'business_id' => BusinessProfile::first()->id]);
		BusinessServiceFactory::new()->create([
			'user_id' => $user->id, 
			'business_id' => BusinessProfile::orderByDesc('id')->first()->id
		]);
	}

    public function test_getting_questions_belongs_to_service(): void
    {
		BusinessServicesQuestionFactory::new()->count(3)->create(['service_id' => BusinessService::first()->id]);
		BusinessServicesQuestionFactory::new()->count(2)->create(['service_id' => BusinessService::orderByDesc('id')->first()->id]);

        $response = $this->get(action([BusinessServicesQuestionController::class, 'index'], ['service' => 1]));

        $response->assertOk();
		$response->assertJsonStructure(['count', 'items', 'total']);
		$response->assertJsonPath('items.0.service_id', 1);
		$this->assertCount(3, $response->json('items'));
    }

	public function test_creating_question_belongs_to_service()
	{
		$question = $this->faker()->realTextBetween(5, 2000);
		$answer = $this->faker()->realTextBetween(5, 2000);

		$response = $this->post(action(
			[BusinessServicesQuestionController::class, 'store'], 
			[
				'service' => BusinessService::first()->id,
			]
		), [
			'question' => $question,
			'answer' => $answer,
		]);

		$response->assertCreated();
		$response->assertJsonStructure(['item' => ['id', 'service_id', 'question', 'answer']]);
		$response->assertJsonPath('item.question', $question);
		$response->assertJsonPath('item.answer', $answer);
		$this->assertDatabaseCount('business_services_questions', 1);
	}

	public function test_getting_question()
	{
		$question = BusinessServicesQuestionFactory::new()->create();

		$response = $this->get(action(
			[BusinessServicesQuestionController::class, 'show'], 
			['question' => $question->id],
		));

		$response->assertOk();
		$response->assertJsonStructure(['item' => ['id', 'service_id', 'question', 'answer']]);
		$response->assertJsonPath('item.id', $question->id);
	}

	public function test_updating_question()
	{
		$question = BusinessServicesQuestionFactory::new()->create();
		$questionText = $this->faker()->realTextBetween(5, 2000);
		$answerText = $this->faker()->realTextBetween(5, 2000);

		$response = $this->putJson(action(
			[BusinessServicesQuestionController::class, 'update'],
			['question' => $question->id,]
		), [
			'question' => $questionText,
			'answer' => $answerText,
		]);

		$response->assertOk();
		$response->assertJsonStructure(['item' => ['id', 'service_id', 'question', 'answer']]);
		$response->assertJsonPath('item.question', $questionText);
		$response->assertJsonPath('item.answer', $answerText);
	}

	public function test_deleting_question()
	{
		$question = BusinessServicesQuestionFactory::new()->create();

		$response = $this->delete(action(
			[BusinessServicesQuestionController::class, 'destroy'],
			['question' => $question->id],
		));

		$response->assertOk();
		$this->assertDatabaseMissing('business_services_questions', ['id' => $question->id]);
	}
}
