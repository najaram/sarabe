<?php

namespace Tests\Feature\Services;

use App\Events\Service\ServiceCreated;
use App\Service;
use App\User;
use Carbon\Carbon;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Support\Facades\Event;
use Tests\TestCase;

class CreateServiceTest extends TestCase
{
    use DatabaseMigrations;

    public function validParams($params = [])
    {
        return array_merge([
            'title' => 'An example title',
            'schedule' => Carbon::now(),
            'note' => 'An example note'
        ], $params);
    }

    /** @test */
    public function user_can_create_a_service()
    {
        $user = factory(User::class)->create();

        $response = $this->actingAs($user)
            ->post('services', [
                'user_id'  => $user->id,
                'title'    => 'An example title',
                'schedule' => Carbon::now(),
                'note'     => 'An example note'
            ]);

        $response->assertStatus(201);
        $this->assertDatabaseHas('services', [
            'user_id' => $user->id,
            'title'   => 'An example title',
            'note'    => 'An example note'
        ]);
    }

    /** @test */
    public function user_id_is_required_to_create_a_service()
    {
        $user = factory(User::class)->create();

        $response = $this->actingAs($user)
            ->post('services', [
                'user_id'  => '',
                'title'    => 'An example title',
                'schedule' => Carbon::now(),
                'note'     => 'An example note'
            ]);

        $response->assertStatus(302);
        $response->assertSessionHasErrors('user_id');
    }

    /** @test */
    public function user_id_should_exists_to_create_a_service()
    {
        $user = factory(User::class)->create();

        $response = $this->actingAs($user)
            ->post('services', [
                'user_id'  => 9999,
                'title'    => 'An example title',
                'schedule' => Carbon::now(),
                'note'     => 'An example note'
            ]);

        $response->assertStatus(302);
        $response->assertSessionHasErrors('user_id');
    }

    /** @test */
    public function event_is_fired_when_a_service_is_created()
    {
        Event::fake([ServiceCreated::class]);
        $service = factory(Service::class)->create();
        $user = factory(User::class)->create();

        $this->actingAs($user)
            ->post('services', $this->validParams([
                'user_id' => $user->id
            ]));

        Event::assertDispatched(ServiceCreated::class, function ($event) use ($service) {
            return $event->service->id == $service->id;
        });
    }
}
