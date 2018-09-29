<?php

namespace Tests\Feature\Members;

use App\Member;
use App\User;
use Carbon\Carbon;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;

class UpdateMemberTest extends TestCase
{
    use DatabaseMigrations;

    /** @test */
    public function user_can_update_a_member()
    {
        $this->withoutExceptionHandling();
        $member = factory(Member::class)->create();

        $response = $this->actingAs(factory(User::class)->create())
            ->put("members/{$member->id}", [
                'first_name' => 'Daenerys',
                'last_name'  => 'Targaryen',
                'birthday'   => Carbon::now(),
                'phone'      => '1234',
                'address'    => 'Dragon stone'
            ]);

        $response->assertStatus(200);
        $this->assertDatabaseHas('members', [
            'first_name' => 'Daenerys',
            'last_name'  => 'Targaryen'
        ]);
    }
}
