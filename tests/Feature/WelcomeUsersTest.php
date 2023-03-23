<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class WelcomeUsersTest extends TestCase
{
    /** @test */
    function it_welcomes_users_with_nickname()
    {
        $this->get('/saludo/ricardo/White')
            ->assertStatus(200)
            ->assertSee('Bienvenido Ricardo, tu apodo es White');
    }

    /** @test */
    function it_welcomes_users_without_nickname()
    {
        $this->get('/saludo/ricardo')
            ->assertStatus(200)
            ->assertSee('Bienvenido Ricardo');
    }
}
