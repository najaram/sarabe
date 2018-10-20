<?php

namespace Tests\Feature\Activities;

use App\Activity;
use App\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;

class ViewActivityTest extends TestCase
{
    use DatabaseMigrations;

    /** @test */
    public function a_user_can_view_an_activity()
    {
        $user = factory(User::class)->create();
        $activity = factory(Activity::class)->create();

        $response = $this->actingAs($user)
            ->get("/activities/{$activity->id}");

        $response->assertStatus(200);
        $response->assertJsonFragment([
            'title' => $activity->title
        ]);
    }

    /** @test */
    public function guests_cannot_view_activity()
    {
        $activity = factory(Activity::class)->create();

        $response = $this->get("/activities/{$activity->id}");

        $response->assertStatus(302);
        $response->assertRedirect('/login');
    }
}
