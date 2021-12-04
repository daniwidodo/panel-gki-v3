<?php namespace Tests\Repositories;

use App\Models\Agape;
use App\Repositories\AgapeRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class AgapeRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var AgapeRepository
     */
    protected $agapeRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->agapeRepo = \App::make(AgapeRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_agape()
    {
        $agape = Agape::factory()->make()->toArray();

        $createdAgape = $this->agapeRepo->create($agape);

        $createdAgape = $createdAgape->toArray();
        $this->assertArrayHasKey('id', $createdAgape);
        $this->assertNotNull($createdAgape['id'], 'Created Agape must have id specified');
        $this->assertNotNull(Agape::find($createdAgape['id']), 'Agape with given id must be in DB');
        $this->assertModelData($agape, $createdAgape);
    }

    /**
     * @test read
     */
    public function test_read_agape()
    {
        $agape = Agape::factory()->create();

        $dbAgape = $this->agapeRepo->find($agape->id);

        $dbAgape = $dbAgape->toArray();
        $this->assertModelData($agape->toArray(), $dbAgape);
    }

    /**
     * @test update
     */
    public function test_update_agape()
    {
        $agape = Agape::factory()->create();
        $fakeAgape = Agape::factory()->make()->toArray();

        $updatedAgape = $this->agapeRepo->update($fakeAgape, $agape->id);

        $this->assertModelData($fakeAgape, $updatedAgape->toArray());
        $dbAgape = $this->agapeRepo->find($agape->id);
        $this->assertModelData($fakeAgape, $dbAgape->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_agape()
    {
        $agape = Agape::factory()->create();

        $resp = $this->agapeRepo->delete($agape->id);

        $this->assertTrue($resp);
        $this->assertNull(Agape::find($agape->id), 'Agape should not exist in DB');
    }
}
