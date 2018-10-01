<?php

namespace Tests\Feature\Services;

use App\Service;
use App\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;

class ViewServicesTest extends TestCase
{
    use DatabaseMigrations;

    /** @test */
    public function users_can_view_list_of_services()
    {
        $service = factory(Service::class, 3)->create();

        $response = $this->actingAs(factory(User::class)->create())
            ->get('services');

        $response->assertStatus(200);
        $response->assertJsonCount(3, 'data');
        $response->assertJsonFragment([
            'title' => $service[0]->title
        ]);
    }

    /** @test */
    public function guest_cannot_view_services()
    {
        factory(Service::class)->create();

        $response = $this->get('services');

        $response->assertStatus(302);
        $response->assertRedirect('/login');
    }
}
