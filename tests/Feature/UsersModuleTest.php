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
            ->assertSessionHasErrors(['name' => 'El campo nombre es obligatorio']);

        $this->assertDatabaseMissing('users', [
            'email' => 'jjuan@example.com'
        ]);

        // $this->assertEquals(0, User::cout());
    }

    /** @test */
    function the_email_is_required()
    {
        $this->from('/usuarios/nuevo')->post('/usuarios/', [
            'name' => 'jjuan',
            'password' => '654321'
        ])->assertRedirectToRoute('users.create')
            ->assertSessionHasErrors(['email' => 'El campo email es obligatorio']);

        $this->assertDatabaseMissing('users', [
            'name' => 'jjuan'
        ]);
    }

    /** @test */
    function the_password_is_required()
    {
        $this->from('/usuarios/nuevo')->post('/usuarios/', [
            'name' => 'jjuan',
            'email' => '6543@example.com'
        ])->assertRedirectToRoute('users.create')
            ->assertSessionHasErrors(['password' => 'El campo password es obligatorio']);

        $this->assertDatabaseMissing('users', [
            'name' => 'jjuan'
        ]);
    }

    /** @test */
    function the_email_must_be_valid()
    {
        $this->from('/usuarios/nuevo')->post('/usuarios/', [
            'name' => 'jjuan',
            'email' => 'correo-no-valido',
            'password' => '654321'
        ])->assertRedirectToRoute('users.create')
            ->assertSessionHasErrors(['email' => 'El correo debe ser válido']);

        $this->assertDatabaseMissing('users', [
            'name' => 'jjuan'
        ]);
    }

    /** @test */
    function the_email_must_be_unique()
    {
        User::create([
            'name' => 'jjuan',
            'email' => 'jjuan32@example.com',
            'password' => '654321'
        ]);

        $this->from('/usuarios/nuevo')->post('/usuarios/', [
            'name' => 'gab jjuan',
            'email' => 'jjuan32@example.com',
            'password' => '65432fds1'
        ])->assertRedirectToRoute('users.create')
            ->assertSessionHasErrors(['email' => 'El correo no está disponible']);

        $this->assertDatabaseMissing('users', [
            'name' => 'gab jjuan'
        ]);
    }

    /** @test */
    function the_password_must_be_more_than_6_characters()
    {
        $this->from('/usuarios/nuevo')->post('/usuarios/', [
            'name' => 'jjuan',
            'email' => '6543@example.com',
            'password' => '54657'
        ])->assertRedirectToRoute('users.create')
            ->assertSessionHasErrors(['password' => 'Debe ser mayor a 6 carácteres']);

        $this->assertDatabaseMissing('users', [
            'name' => 'jjuan'
        ]);
    }
}   