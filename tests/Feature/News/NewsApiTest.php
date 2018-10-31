<?php

namespace Tests\Feature\News;

use App\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;

class NewsApiTest extends TestCase
{
    use DatabaseMigrations;

    /** @test */
    public function authenticated_user_can_see_news()
    {
        $response = $this->actingAs(factory(User::class)->create())
            ->get('news-api?path=top-headlines?country=ph');

        $response->assertJsonStructure([
            'status',
            'totalResults',
            'articles'
        ]);
        $response->assertSuccessful();
    }

    /** @test */
    public function guests_cannot_see_news()
    {
        $response = $this->get('news-api?path=top-headlines?country=ph');

        $response->assertStatus(302);
        $response->assertRedirect('/login');
    }
}
