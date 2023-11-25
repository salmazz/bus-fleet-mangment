<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class AuthTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    /** @test */
    public function testUserCanRegister()
    {
        // Generating a unique email for the test
        $email = 'test' . rand(1, 10000) . '@example.com';

        $response = $this->postJson('/api/register', [
            'name' => 'Test User',
            'email' => $email,
            'password' => 'password',
            'password_confirmation' => 'password',
        ]);

        $response->assertStatus(201); // Expecting HTTP Status 201 (Created)
        $this->assertDatabaseHas('users', ['email' => $email]); // Check if user is in the database
    }

    /** @test */
    public function testUserCanLogin()
    {
        // Generating a unique email for the test
        $email = 'test' . rand(1, 10000) . '@example.com';

        // Creating a user with the unique email
        $user = User::factory()->create([
            'email' => $email,
            'password' => bcrypt('password'),
        ]);

        // Attempting to login with the created user's credentials
        $response = $this->postJson('/api/login', [
            'email' => $email,
            'password' => 'password',
        ]);

        $response->assertStatus(200); // Expecting HTTP Status 200 (OK)
        $response->assertJsonStructure(['token']); // Checking for the presence of a token in the response
    }
}
