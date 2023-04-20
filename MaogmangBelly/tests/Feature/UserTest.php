<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use Illuminate\Support\Facades\Validator;
use App\Models\User;


class UserTest extends TestCase
{
    use RefreshDatabase;

    public function test_user_can_register()
    {
        $data = [
            'name' => 'John Doe',
            'email' => 'johndoe@example.com',
            'password' => 'password',
            'password_confirmation' => 'password',
        ];

        $validator = Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);

        $this->assertTrue($validator->passes());

        $this->post('/register', $data)
            ->assertStatus(302)
            ->assertRedirect('/');
    }

    public function test_user_can_login()
    {
        $user = User::factory()->create();

        // Log in the user
        $response = $this->post('/login', [
            'email' => $user->email,
            'password' => 'password',
        ]);


        // Assert that the response is successful
        $response->assertStatus(302);

        // Assert that the user was authenticated
        $this->assertAuthenticatedAs($user);
    }
}
