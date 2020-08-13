<?php

namespace Tests\Feature;

use App\User;
use Faker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Auth;
use Maklad\Permission\Models\Role;
use Tests\TestCase;
use Maklad\Permission\Models\Permission;
use UsersuperadminSeeder;

class admininstratorTest extends TestCase
{

    use WithFaker;

    /**
     * A basic feature test example.
     *
     * @return void
     */

    /*
    ''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''
     *author:mohsenbaghri
    ''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''
    !name:seedr
    ?param:
     *des:run seedr befor run test
    '''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''
     */
    public function testـcreate_index_user()
    {
        // قبل از تست از کامنت خارج شود و بعد از اولین تست کامن شود
       // $this->seed();
        $this->loginWithFakeUser();
        $respnse = $this->get('admin');
        $respnse->assertOk();

    }
    public function test_create_form_user()
    {

        $this->loginWithFakeUser();
        $respnse = $this->get('admin/create');
        $respnse->assertOk();

    }
    public function test_edit_form_user()
    {

        $this->loginWithFakeUser();
        $user = User::first();
        $respnse = $this->get('admin/' . $user->_id . '/edit');
        $respnse->assertOk();

    }
    public function testـstore_admin_user()
    {
// dd($this->faker()->name($maxNbChars = 5));

        $this->loginWithFakeUser();
        $role = Role::first();

        $file = UploadedFile::fake()->image('avatar.jpg');
        $response = $this->json('POST', 'admin', [
            'name' => $this->faker()->name(),
            'email' => $this->faker()->email(),
            'password' => '123456',
            'role' => $role->_id,
            'image' => $file,

        ]);

        $response->assertStatus(302);

    }

    public function testـupdate_admin_user()
    {
        $this->loginWithFakeUser();
        $role = Role::first();

        $file = UploadedFile::fake()->image('avatar.jpg');
        $user = User::first();
        $response = $this->putJson('admin/' . $user->_id, [

            'name' => $this->faker()->name(),
            'email' => $this->faker()->email(),
            'password' => '123456',
            'role' => $role->_id,
            'image' => $file,

        ]);

        $response->assertStatus(302);

    }

    public function loginWithFakeUser()
    {
        $user = User::first();
        $this->be($user);
    }

}
