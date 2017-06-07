<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class UserTest extends TestCase
{
    use DatabaseTransactions;
    
    /**
     * Test User Sign Up.
     *
     * @return void
     */
    public function testUserSignup()
    {
        $response = $this->json('POST', '/api/signup', [
                'name' => 'joe',
                'email' => 'joe@test.com',
                'password' => 'password',
            ]);

        // $data = $response->getData();
        $response
            ->assertStatus(201)
            ->assertJson([
                "message" => "Successfully created user!"
                ]);

        $this->assertDatabaseHas('users', [
            'email' => 'joe@test.com'
        ]);
    }
}
