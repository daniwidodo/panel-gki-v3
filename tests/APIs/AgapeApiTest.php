<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\Agape;

class AgapeApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_agape()
    {
        $agape = Agape::factory()->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/agapes', $agape
        );

        $this->assertApiResponse($agape);
    }

    /**
     * @test
     */
    public function test_read_agape()
    {
        $agape = Agape::factory()->create();

        $this->response = $this->json(
            'GET',
            '/api/agapes/'.$agape->id
        );

        $this->assertApiResponse($agape->toArray());
    }

    /**
     * @test
     */
    public function test_update_agape()
    {
        $agape = Agape::factory()->create();
        $editedAgape = Agape::factory()->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/agapes/'.$agape->id,
            $editedAgape
        );

        $this->assertApiResponse($editedAgape);
    }

    /**
     * @test
     */
    public function test_delete_agape()
    {
        $agape = Agape::factory()->create();

        $this->response = $this->json(
            'DELETE',
             '/api/agapes/'.$agape->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/agapes/'.$agape->id
        );

        $this->response->assertStatus(404);
    }
}
