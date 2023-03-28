<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Tests\TestCase;
use Tests\Feature\JWTAuth;

class AuthUsersTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    /**
     * Test a successful login.
     *
     * @return void
     */
   /*  public function test_UserCanSuccessfullyLogin()
    {
        $password = $this->faker->password(6);
        $user = User::factory()->create([
            'password' => Hash::make($password),
        ]);

        $response = $this->postJson('/api/auth/login', [
            'email' => $user->email,
            'password' => $password,
        ]);

        $response->assertStatus(200)
            ->assertJsonStructure([
                'access_token',
                'token_type',
                'expires_in',
            ]);

        $this->assertTrue(Auth::check());
    }
 */
    public function test_UserCanRegister()
    {
        $userData = [
            'name' => 'Juanita',
            'surname' => 'Mandarina',
            'email' => 'juanita@example.com',
            'password' => 'password',
            'password_confirmation' => 'password',
            'phone' => '123456789',
            'city' => 'Malaga',
            'address' => 'Calle mandarina',
            'postcode' => '08001',
            'isAdmin' => false
        ];

        $response = $this->postJson('/api/auth/register', $userData);

        $response->assertStatus(201)
            ->assertJson([
                'message' => 'Usuario registrado con éxito',
                'user' => [
                    'name' => 'Juanita',
                    'surname' => 'Mandarina',
                    'email' => 'juanita@example.com',
                    'phone' => '123456789',
                    'city' => 'Malaga',
                    'address' => 'Calle mandarina',
                    'postcode' => '08001',
                    'isAdmin' => false
                ]
            ]);

        $this->assertDatabaseHas('users', [
            'name' => 'Juanita',
            'surname' => 'Mandarina',
            'email' => 'juanita@example.com',
            'phone' => '123456789',
            'city' => 'Malaga',
            'address' => 'Calle mandarina',
            'postcode' => '08001',
            'isAdmin' => false
        ]);
    }

    /* public function test_userCanLogout()
    {
        $user = User::factory()->create([
            'email' => 'user@example.com',
            'password' => bcrypt('password'),
        ]);

        $token = auth()->login($user);

        $response = $this->withHeaders([
            'Authorization' => 'Bearer' . $token,
        ])->json('POST', 'api/auth/logout');

        $response->assertStatus(200)
                ->assertJson([
                    'message' => 'El usuario terminó la sesión con éxito',
                ]);

        $this->assertGuest();
    } */

   /*  public function testRefresh()
    {
        $user = User::factory()->create();
        $token = auth()->login($user);

        $response = $this->postJson('/api/auth/refresh', [], [
            'Authorization' => 'Bearer ' . $token,
        ]);

        $response->assertStatus(200)
            ->assertJsonStructure([
                'access_token',
                'token_type',
                'expires_in',
            ]);

        $this->assertNotEquals($token, $response['access_token']);
    } */

   /*  public function test_UserProfile()
    {
        // Create a user
        $user = User::factory()->create();

        // Create a token for the user
        $token = auth()->login($user);

        // Make a request to the userProfile endpoint
        $response = $this->withHeaders([
            'Authorization' => 'Bearer ' . $token,
        ])->get('/api/auth/user-profile');

        // Assert that the response status code is 200 OK
        $response->assertStatus(200);

        // Assert that the response JSON contains the user data
        $response->assertJsonStructure([
            'name',
            'surname', 
            'email', 
            'email_verified_at', 
            'phone',  
            'city', 
            'address', 
            'postcode', 
            'isAdmin', 
            ]);
    } */
}
