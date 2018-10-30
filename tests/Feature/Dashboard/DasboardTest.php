<?php

namespace Tests\Feature\Dashboard;

use App\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;

class DasboardTest extends TestCase
{
    use DatabaseMigrations;

    /** @test */
    public function user_can_see_dashboard_page()
    {
        $response = $this->actingAs(factory(User::class)->create())
            ->get('dashboard');

        $response->assertViewIs('pages.dashboard.index');
    }
}
