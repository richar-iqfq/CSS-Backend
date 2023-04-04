<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\DB;
use Tests\TestCase;

class UsersModuleTest extends TestCase
{
    use RefreshDatabase; //Recrea las migraciones antes de ejecutar las pruebas

    /** @test */
    public function it_shows_the_users_list(): void
    {
        User::factory()->create([
            'name' => 'Joel',
            'website' => 'thelastofus.com'
        ]);

        User::factory()->create([
            'name' => 'Ellie'
        ]);

        $this->get('/usuarios')
            ->assertStatus(200)
            ->assertSee('Listado de Usuarios')
            ->assertSee('Joel')
            ->assertSee('Ellie');
    }

    /** @test */
    public function it_shows_a_default_message_if_the_users_list_is_empty()
    {
        // DB::table('users')->truncate();

        $this->get('/usuarios')
            ->assertStatus(200)
            ->assertSee('No hay usuarios registrados.');
    }

    /** @test */
    public function it_displays_the_users_details()
    {
        $user = User::factory()->create([
            'name' => 'Ricardo Ambriz'
        ]);

        $this->get('/usuarios/'.$user->id)
            ->assertStatus(200)
            ->assertSee('Ricardo Ambriz');
    }

    /** @test */
    public function it_displays_a_404_error_if_the_user_is_not_found()
    {
        $this->get('/usuarios/999')
            ->assertStatus(404)
            ->assertSee('Página no encontrada');
    }

    /** @test */
    function it_creates_a_new_user()
    {
        $this->post('/usuarios/', [
            'name' => 'Jose Juan',
            'email' => 'jjuan@example.com',
            'password' => '654321'
        ])->assertRedirectToRoute('users.index');

        $this->assertCredentials([
            'name' => 'Jose Juan',
            'email' => 'jjuan@example.com',
            'password' => '654321'
        ]);
    }

    /** @test */
    function the_name_is_required()
    {
        $this->from('/usuarios/nuevo')->post('/usuarios/', [
            'email' => 'jjuan@example.com',
            'password' => '654321'
        ])->assertRedirectToRoute('users.create')
            ->assertSessionHasErrors(['name' => 'field name is required']);

        $this->assertDatabaseMissing('users', [
            'email' => 'jjuan@example.com'
        ]);

        // $this->assertEquals(0, User::cout());
    }
}   