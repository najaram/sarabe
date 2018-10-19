<?php

namespace Tests\Feature\Activities;

use App\Activity;
use App\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;

class ViewActivitiesTest extends TestCase
{
    use DatabaseMigrations;

    /** @test */
    public function users_can_see_list_of_activities()
    {
        $activity = factory(Activity::class, 3)->create();

        $response = $this->actingAs(factory(User::class)->create())
            ->get('/activities');

        $response->assertStatus(200);
        $response->assertJsonFragment([
            'title' => $activity[0]->title
        ]);
    }

    /** @test */
    public function guests_users_cannot_see_list_of_activities()
    {
        $response = $this->get('/activities');

        $response->assertStatus(302);
        $response->assertRedirect('/login');
    }
}
