<?php

namespace Tests\Feature\Services;

use App\Service;
use App\User;
use Carbon\Carbon;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;

class UpdateServiceTest extends TestCase
{
    use DatabaseMigrations;

    private function validParams($overrides = [])
    {
        return array_merge([
            'title'    => 'Updated title',
            'schedule' => Carbon::now(),
            'note'     => 'Updated content'
        ], $overrides);
    }

    /** @test */
    public function can_update_a_service()
    {
        $user = factory(User::class)->create();
        $service = factory(Service::class)->create([
            'user_id' => $user->id,
        ]);

        $response = $this->actingAs(factory(User::class)->create())
            ->put("services/{$service->id}", $this->validParams([
                'user_id' => $user->id
            ]));

        $response->assertStatus(200);
        $response->assertJsonFragment([
            'title' => 'Updated title'
        ]);
    }

    /** @test */
    public function title_is_required()
    {
        $user = factory(User::class)->create();
        $service = factory(Service::class)->create([
            'user_id' => $user->id,
        ]);

        $response = $this->actingAs(factory(User::class)->create())
            ->put("services/{$service->id}", $this->validParams([
                'user_id' => $user->id,
                'title'   => ''
            ]));

        $response->assertStatus(302);
        $response->assertSessionHasErrors('title');
    }

    /** @test */
    public function title_should_be_string()
    {
        $user = factory(User::class)->create();
        $service = factory(Service::class)->create([
            'user_id' => $user->id,
        ]);

        $response = $this->actingAs(factory(User::class)->create())
            ->put("services/{$service->id}", $this->validParams([
                'user_id' => $user->id,
                'title'   => 12345
            ]));

        $response->assertStatus(302);
        $response->assertSessionHasErrors('title');
    }

    /** @test */
    public function schedule_should_be_a_date()
    {
        $user = factory(User::class)->create();
        $service = factory(Service::class)->create([
            'user_id' => $user->id,
        ]);

        $response = $this->actingAs(factory(User::class)->create())
            ->put("services/{$service->id}", $this->validParams([
                'user_id'  => $user->id,
                'schedule' => 'example date'
            ]));

        $response->assertStatus(302);
        $response->assertSessionHasErrors('schedule');
    }

    /** @test */
    public function user_id_should_exist()
    {
        $user = factory(User::class)->create();
        $service = factory(Service::class)->create([
            'user_id' => $user->id,
        ]);

        $response = $this->actingAs(factory(User::class)->create())
            ->put("services/{$service->id}", $this->validParams([
                'user_id' => 99999,
            ]));

        $response->assertStatus(302);
        $response->assertSessionHasErrors('user_id');
    }

    /** @test */
    public function note_is_nullable()
    {
        $this->withoutExceptionHandling();
        $user = factory(User::class)->create();
        $service = factory(Service::class)->create([
            'user_id' => $user->id,
        ]);

        $response = $this->actingAs(factory(User::class)->create())
            ->put("services/{$service->id}", $this->validParams([
                'user_id' => $user->id,
                'note'    => '',
            ]));

        $response->assertStatus(200);
        $response->assertJsonFragment([
            'title' => 'Updated title',
        ]);
    }
}
