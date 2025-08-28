<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Event;
use Illuminate\Auth\Events\Registered;

class UserControllerTest extends TestCase
{
    use RefreshDatabase;

    public function test_bisa_membuat_user_baru()
    {
        Event::fake();

        $admin = User::factory()->create(['role' => 'admin']);
        $this->actingAs($admin);

        $response = $this->postJson('/users', [
            'nama' => 'Budi',
            'email' => 'budi@example.com',
            'password' => 'password123',
            'password_confirmation' => 'password123',
            'role' => 'siswa'
        ]);

        $response->assertStatus(201)
            ->assertJsonFragment(['email' => 'budi@example.com']);

        $this->assertDatabaseHas('users', [
            'email' => 'budi@example.com',
            'nama' => 'Budi'
        ]);

        Event::assertDispatched(Registered::class);
    }

    public function test_bisa_melihat_daftar_user()
    {
        $admin = User::factory()->create(['role' => 'admin']);
        $this->actingAs($admin);

        User::factory()->create(['email' => 'test@example.com']);

        $response = $this->getJson('/users');

        $response->assertStatus(200)
            ->assertJsonFragment(['email' => 'test@example.com']);
    }

    public function test_bisa_update_user()
    {
        $admin = User::factory()->create(['role' => 'admin']);
        $this->actingAs($admin);

        $user = User::factory()->create();

        $response = $this->putJson("/users/{$user->id}", [
            'nama' => 'Nama Update',
            'email' => 'update@example.com',
            'password' => 'passwordbaru',
            'password_confirmation' => 'passwordbaru',
            'role' => 'guru'
        ]);

        $response->assertStatus(200)
            ->assertJsonFragment(['email' => 'update@example.com']);

        $this->assertDatabaseHas('users', [
            'email' => 'update@example.com',
            'nama' => 'Nama Update'
        ]);
    }

    public function test_bisa_hapus_user()
    {
        $admin = User::factory()->create(['role' => 'admin']);
        $this->actingAs($admin);

        $user = User::factory()->create();

        $response = $this->deleteJson("/users/{$user->id}");

        $response->assertStatus(204);

        $this->assertDatabaseMissing('users', [
            'id' => $user->id
        ]);
    }
}
