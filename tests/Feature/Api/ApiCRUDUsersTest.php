<?php

namespace Tests\Feature\Api;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use App\Models\User;
use Tests\TestCase;

class ApiCRUDUsersTest extends TestCase
{
    /**
     * A basic feature test example.
     * @return void
     */
    use RefreshDatabase;

    /*  public function test_checkIfUserCanDeleteItsProfile(): void
     {
        $user = User::factory()->create();
        $token = auth()->login($user);

        $response = $this->withHeaders([
            'Authorization' => 'Bearer' . $token,
        ])->delete(route('destroyUserApi', [$user->id]));

         $response->assertStatus(200)
            ->assertJson([
                    'message' => 'Tu perfil se ha eliminado correctamente',
                ]);
     } */

     /* public function test_checkIfUserCanUpdateItsProfile(): void
     {
        $user = User::factory()->create();

        $newUserData = [
            'name' => 'name',
            'surname' => 'surname',
            'email' => 'email',
            'password' => 'password',
            'phone' => 'phone',
            'city' => 'city',
            'address' => 'address',
            'postcode' => 'postcode',
            'isAdmin' => false
        ];

        $token = auth()->login($user);

        $response = $this->withHeaders([
            'Authorization' => 'Bearer ' . $token,
        ])->put(route('updateUserApi', [$user->id]), $newUserData);

        $response->assertStatus(200);

        $user->refresh();

        $this->assertEquals($newUserData['name'], $user->name);
        $this->assertEquals($newUserData['surname'], $user->surname);
        $this->assertEquals($newUserData['email'], $user->email);
        $this->assertEquals($newUserData['password'], $user->password);
        $this->assertEquals($newUserData['phone'], $user->phone);
        $this->assertEquals($newUserData['city'], $user->city);
        $this->assertEquals($newUserData['address'], $user->address);
        $this->assertEquals($newUserData['postcode'], $user->postcode);
        $this->assertEquals(0, $user->isAdmin);
     } */
}
