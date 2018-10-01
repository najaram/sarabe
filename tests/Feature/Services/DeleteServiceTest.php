<?php

namespace Tests\Feature\Services;

use App\Service;
use App\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;

class DeleteServiceTest extends TestCase
{
    use DatabaseMigrations;

    /** @test */
    public function can_delete_a_service()
    {
        $user = factory(User::class)->create();
        $service = factory(Service::class)->create([
            'user_id' => $user->id,
        ]);

        $this->assertDatabaseHas('services', [
            'title' => $service->title
        ]);

        $response = $this->actingAs(factory(User::class)->create())
            ->delete("services/{$service->id}");

        $response->assertStatus(204);
    }

    /** @test */
    public function guest_cannot_delete_a_service()
    {
        $user = factory(User::class)->create();
        $service = factory(Service::class)->create([
            'user_id' => $user->id,
        ]);

        $response = $this->delete("services/{$service->id}");

        $response->assertStatus(302);
    }

    /** @test */
    public function cannot_delete_a_non_existent_service()
    {
        $response = $this->actingAs(factory(User::class)->create())
            ->delete("services/1234567");

        $response->assertStatus(404);
    }
}
