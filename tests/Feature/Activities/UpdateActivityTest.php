<?php

namespace Tests\Feature\Activities;

use App\Activity;
use App\User;
use Carbon\Carbon;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;

class UpdateActivityTest extends TestCase
{
    use DatabaseMigrations;

    private function validParams($overrides = [])
    {
        return array_merge([
            'title'    => 'Example Updated title',
            'schedule' => Carbon::parse('2018-11-25'),
            'content'  => 'Example Updated Content'
        ], $overrides);
    }

    /** @test */
    public function user_can_update_an_activity()
    {
        $activity = factory(Activity::class)->create();
        $user = factory(User::class)->create();

        $response = $this->actingAs($user)
            ->put("/activities/{$activity->id}", $this->validParams([
                'user_id' => $user->id
            ]));

        $response->assertStatus(200);
        $response->assertJson([
            'data' => [
                'title'    => 'Example Updated title',
                'schedule' => 'November 25, 2018',
                'content'  => 'Example Updated Content'
            ]
        ]);
    }

    /** @test */
    public function guests_user_cannot_update_an_activity()
    {
        $activity = factory(Activity::class)->create();

        $response = $this->put("/activities/{$activity->id}", $this->validParams());

        $response->assertStatus(302);
        $response->assertRedirect('/login');
    }

    /** @test */
    public function user_cannot_update_an_invalid_activity()
    {
        $user = factory(User::class)->create();

        $response = $this->actingAs($user)
            ->put("/activities/9999", $this->validParams([
                'user_id' => $user->id
            ]));

        $response->assertStatus(404);
    }

    /** @test */
    public function activity_title_field_is_required()
    {
        $activity = factory(Activity::class)->create();

        $user = factory(User::class)->create();

        $response = $this->actingAs($user)
            ->put("/activities/{$activity->id}", $this->validParams([
                'user_id' => $user->id,
                'title' => ''
            ]));

        $response->assertStatus(302);
        $response->assertSessionHasErrors('title');
    }

    /** @test */
    public function activity_schedule_field_is_required()
    {
        $activity = factory(Activity::class)->create();

        $user = factory(User::class)->create();

        $response = $this->actingAs($user)
            ->put("/activities/{$activity->id}", $this->validParams([
                'user_id' => $user->id,
                'schedule' => ''
            ]));

        $response->assertStatus(302);
        $response->assertSessionHasErrors('schedule');
    }

    /** @test */
    public function activity_content_field_is_required()
    {
        $activity = factory(Activity::class)->create();

        $user = factory(User::class)->create();

        $response = $this->actingAs($user)
            ->put("/activities/{$activity->id}", $this->validParams([
                'user_id' => $user->id,
                'content' => ''
            ]));

        $response->assertStatus(302);
        $response->assertSessionHasErrors('content');
    }
}
