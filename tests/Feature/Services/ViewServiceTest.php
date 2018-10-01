<?php

namespace Tests\Feature\Services;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;
use App\User;
use App\Service;

class ViewServiceTest extends TestCase
{
    use DatabaseMigrations;

    /** @test */
    public function users_can_view_a_service()
    {
        $user = factory(User::class)->create();
        $service = factory(Service::class)->create([
            'user_id' => $user
        ]);

        $response = $this->actingAs(factory(User::class)->create())
            ->get("services/{$service->id}");

        $response->assertStatus(200);
        $response->assertJsonFragment([
            'user_id' => $user->id,
            'title' => $service->title
        ]);
    }

    /** @test */
    public function guest_cannot_view_a_service()
    {
        $user = factory(User::class)->create();
        $service = factory(Service::class)->create([
            'user_id' => $user
        ]);

        $this->get("services/{$service->id}")
            ->assertStatus(302)
            ->assertRedirect('/login');
    }
}
