<?php

namespace Tests\Feature\Members;

use App\User;
use Carbon\Carbon;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;

class CreateMembersTest extends TestCase
{
    use DatabaseMigrations;

    private function validParams($overrides = [])
    {
        return array_merge([
            'first_name' => 'Jon',
            'last_name'  => 'Snow',
            'birthday'   => Carbon::now(),
            'phone'      => '1234567',
            'address'    => 'Winterfell'
        ], $overrides);
    }

    /** @test */
    public function users_can_create_members()
    {
        $response = $this->actingAs(factory(User::class)->create())
            ->post('members', [
                'first_name' => 'Jon',
                'last_name'  => 'Snow',
                'birthday'   => Carbon::now(),
                'phone'      => '1234',
                'address'    => 'Winterfell'
            ]);

        $response->assertStatus(201);
        $this->assertDatabaseHas('members', [
            'first_name' => 'Jon'
        ]);
    }

    /** @test */
    public function first_name_is_required()
    {
        $response = $this->actingAs(factory(User::class)->create())
            ->post('members', [
                'first_name' => ''
            ]);

        $response->assertStatus(302);
        $response->assertSessionHasErrors('first_name');
    }

    /** @test */
    public function first_name_should_be_a_string()
    {
        $response = $this->actingAs(factory(User::class)->create())
            ->post('members', $this->validParams([
                'first_name' => 1234
            ]));

        $response->assertStatus(302);
        $response->assertSessionHasErrors('first_name');
    }

    /** @test */
    public function birthday_should_be_date()
    {
        $response = $this->actingAs(factory(User::class)->create())
            ->post('members', $this->validParams([
                'birthday' => 1234567
            ]));

        $response->assertStatus(302);
        $response->assertSessionHasErrors('birthday');
    }

    /** @test */
    public function guest_users_cannot_create_a_member()
    {
        $response = $this->post('members', $this->validParams());

        $response->assertStatus(302);
        $response->assertRedirect('/login');
    }
}
