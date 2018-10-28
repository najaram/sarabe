<?php

namespace Tests\Feature\Activities;

use App\Activity;
use App\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;

class DeleteActivityTest extends TestCase
{
    use DatabaseMigrations;

    /** @test */
    public function user_can_delete_an_activity()
    {
        $user = factory(User::class)->create();
        $activity = factory(Activity::class)->create();

        $response = $this->actingAs($user)
            ->delete("activities/{$activity->id}");

        $response->assertStatus(204);
    }

    /** @test */
    public function guest_user_cannot_delete_an_activity()
    {
        $activity = factory(Activity::class)->create();

        $response = $this->delete("activities/{$activity->id}");

        $response->assertStatus(302);
        $response->assertRedirect('/login');
    }

    /** @test */
    public function other_users_can_delete_an_activity()
    {
        $userA = factory(User::class)->create();
        $userB = factory(User::class)->create();
        $activity = factory(Activity::class)->create(['user_id' => $userA->id]);

        $response = $this->actingAs($userB)
            ->delete("activities/{$activity->id}");

        $response->assertStatus(204);
    }
}
