<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class UserTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    use RefreshDatabase, WithFaker;

    public function test_the_user_registration(): void
    {
        $response = $this->post('/api/user/register', [
            'name' => $this->faker->name,
            'email' => $this->faker->unique()->safeEmail,
            'password' => 'password123',
            'password_confirmation' => 'password123'
        ]);

        $response->assertStatus(201);
    }

    public  function test_the_user_login(): void 
    {
        $response = $this->post('/api/user/login', [
            'email' => $this->faker->unique()->safeEmail,
            'password' => 'password123',
        ]);
        
        $response->assertStatus(201);
    }
}
