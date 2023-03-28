<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CRUDUserTest extends TestCase
{
    /**
     * A basic feature test example.
     */

    use RefreshDatabase;



    public function test_usersListCanBeReadByAnAdmin(){
        $this->withExceptionHandling();

        $admin = User::factory()->create(['isAdmin'=>true]);
        $this->actingAs($admin);

        $users = User::factory()->create();

        $response = $this->get('/usersList');

        $response->assertSee($users->name);
        $response->assertStatus(200)
                ->assertViewIs('usersList');
    }

    public function test_anUserCanBeShowedToAnAdmin()
    {
        $this->withExceptionHandling();

        $admin = User::factory()->create(['isAdmin'=>true]);
        $this->actingAs($admin);

        $user = User::factory()->create();

        $response = $this->get(route('showUser', $user->id));
        $response->assertSee($user->userName);
        $response->assertStatus(200)
                ->assertViewIs('showUser');
    }

    public function test_anUserCanBeDeletedByAnAdmin()
    {
        $this->withExceptionHandling();

        $user = User::factory()->create(['isAdmin'=>false]);
        $this->assertCount(1, User::all());

        $userAdmin = User::factory()->create(['isAdmin'=>true]);
        $this->actingAs($userAdmin);

        $response = $this->delete(route('deleteUser', $user->id));
        $this->assertCount(1, User::all());
    }

    public function test_AnUserCanBeUpdatedByAnAdmin(){

        $this->withExceptionHandling();

        $user = User::factory()->create();
        $this->assertCount(1, User::all());

        $userAdmin = User::factory()->create(['isAdmin'=>true]);
        $this->actingAs($userAdmin);

        $response = $this->patch(route('updateUser', $user->id),['name' => 'New name']);
        $this->assertEquals('New name', User::first()->name);
    }
}

