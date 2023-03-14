<?php

namespace Tests\Feature\Clients;

use App\Models\Client;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ListClientTest extends TestCase
{
    use RefreshDatabase;
    /** @test */
    public function can_fetch_single_client(): void
    {
        $this->withoutExceptionHandling();
        $client= Client::factory()->create();

        $response= $this->getJson('/api/v1/clients/'.$client->getRouteKey());

        $response->assertSee($client->firstname);
        
    }
}
