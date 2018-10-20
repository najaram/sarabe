<?php

namespace Tests\Feature\Activities;

use App\Activity;
use App\User;
use Carbon\Carbon;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;

class CreateActivityTest extends TestCase
{
    use DatabaseMigrations;

    private function validParams($params = [])
    {
        return array_merge([
            'title'    => 'Example title',
            'schedule' => Carbon::now(),
            'content'  => 'Example content'
        ], $params);
    }

    /** @test */
    public function user_can_create_an_activity()
    {
        $user = factory(User::class)->create();

        $this->assertEquals(0, $user->activities()->count());

        $response = $this->actingAs($user)
            ->post('/activities', [
                'user_id'  => $user->id,
                'title'    => 'Example title',
                'schedule' => Carbon::now(),
                'content'  => 'Example content'
            ]);

        $response->assertStatus(201);
        $response->assertJsonFragment([
            'title' => 'Example title',
        ]);
        tap(Activity::latest('id')->first(), function ($activity) use ($response) {
            $this->assertEquals('Example title', $activity->title);
            $this->assertNotNull($activity->schedule);
            $this->assertEquals('Example content', $activity->content);
        });
        $this->assertEquals(1, $user->activities()->count());
    }

    /** @test */
    public function activity_title_is_required()
    {
        $user = factory(User::class)->create();

        $response = $this->actingAs($user)
            ->post('/activities', $this->validParams([
                'user_id' => $user->id,
                'title'   => ''
            ]));

        $response->assertStatus(302);
        $response->assertSessionHasErrors('title');
    }

    /** @test */
    public function activity_title_should_be_a_string()
    {
        $user = factory(User::class)->create();

        $response = $this->actingAs($user)
            ->post('/activities', $this->validParams([
                'user_id' => $user->id,
                'title'   => 1234
            ]));

        $response->assertStatus(302);
        $response->assertSessionHasErrors('title');
    }

    /** @test */
    public function activity_title_should_be_in_255_length()
    {
        $user = factory(User::class)->create();

        $response = $this->actingAs($user)
            ->post('/activities', $this->validParams([
                'user_id' => $user->id,
                'title'   => str_repeat('a', 256)
            ]));

        $response->assertStatus(302);
        $response->assertSessionHasErrors('title');
    }

    /** @test */
    public function activity_schedule_is_required()
    {
        $user = factory(User::class)->create();

        $response = $this->actingAs($user)
            ->post('/activities', $this->validParams([
                'user_id'  => $user->id,
                'schedule' => ''
            ]));

        $response->assertStatus(302);
        $response->assertSessionHasErrors('schedule');
    }

    /** @test */
    public function activity_schedule_should_be_a_valid_date()
    {
        $user = factory(User::class)->create();

        $response = $this->actingAs($user)
            ->post('/activities', $this->validParams([
                'user_id'  => $user->id,
                'schedule' => 'invaliddate'
            ]));

        $response->assertStatus(302);
        $response->assertSessionHasErrors('schedule');
    }

    /** @test */
    public function activity_content_is_required()
    {
        $user = factory(User::class)->create();

        $response = $this->actingAs($user)
            ->post('/activities', $this->validParams([
                'user_id' => $user->id,
                'content' => ''
            ]));

        $response->assertStatus(302);
        $response->assertSessionHasErrors('content');
    }
}
