<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Artisan;
use Tests\TestCase;

class PermissionsTest extends TestCase
{

    use RefreshDatabase, WithFaker;

    public function setUp() : void
    {
        parent::setUp();

        $this->artisan('migrate:fresh --seed');
    }

    public function test_register_and_see_welcome ()
    {


        $name = $this->faker->name;
        $email = $this->faker->email;
        $employee = $this->faker->jobTitle;
        $password = $this->faker->password(8);


        $response = $this->post('/register', [
           'name' => $name,
            'email' => $email,
            'employee' => $employee,
            'password' => $password,
            'password_confirmation' => $password
        ]);


        $response->assertRedirect('home');

        $user = User::where([
            'name' => $name,
            'email' => $email,
            'employee' => $employee
        ])->first();
        $this->assertNotNull($user);


        $response = $this->actingAs($user)->get('home');
        $response->assertStatus(200);
    }

    public function test_cannot_access_admin()
    {

        $user = User::create([
            'name' => 'testas',
            'email' => 'testas@testas.com',
            'employee' => 'IT Manager',
            'password' => $this->faker->password(8),
            'password_confirmation' =>  $this->faker->password(8),
            'role_id' => 3
        ]);
        $this->actingAs($user);

        $response = $this->get('admin/user');
        $response->assertStatus(403);

        $response = $this->get('admin/user/create');
        $response->assertStatus(403);

        $response = $this->post('admin/user', [
            'name' => $this->faker->name,
            'email' => $this->faker->email,
            'employee' => $this->faker->jobTitle,
            'password' => $this->faker->password,
            'password_confirmation' => $this->faker->password
        ]);
        $response->assertStatus(403);

        $response = $this->get('admin/user/1/edit');
        $response->assertStatus(403);

        $response = $this->put('admin/user/1', [
            'name' => $this->faker->name,
            'email' => $this->faker->email,
            'employee' => $this->faker->jobTitle,
            'password' => $this->faker->password,
            'password_confirmation' => $this->faker->password
        ]);
        $response->assertStatus(403);

        $response = $this->delete('admin/user/1');
        $response->assertStatus(403);

    }
}
