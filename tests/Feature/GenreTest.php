<?php

namespace Tests\Feature;

use App\Genre;
use App\User;
use Faker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Http\UploadedFile;
use Maklad\Permission\Models\Role;
use Tests\TestCase;

class GenreTest extends TestCase
{
    use WithFaker;


    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_index()
    {
        $this->loginWithFakeUser();
        $respnse = $this->get('genre');
        $respnse->assertOk();

    }
    public function test_create()
    {
        $this->loginWithFakeUser();
        $respnse = $this->get('genre/create');
        $respnse->assertOk();

    }

    public function testـstore()
    {
       $this->loginWithFakeUser();
       $file = UploadedFile::fake()->image('avatar.jpg');

        $response = $this->post('genre',[
            'name' => $this->faker()->name(),
            'slug' => $this->faker()->slug(),
            'file' => $file,
        ]);

        $response->assertStatus(302);

    }
     public function test_edit()
    {
        $this->loginWithFakeUser();
        $genre = Genre::first();
        $respnse = $this->get('genre/' . $genre->_id . '/edit');
        $respnse->assertOk();

    }

    public function testـupdate()
    {

        $this->loginWithFakeUser();
        $genre = Genre::first();
        $file = UploadedFile::fake()->image('avatar.jpg');

        $response = $this->putJson('genre/' . $genre->_id, [
            'name' => $this->faker()->name(),
            'slug' => $this->faker()->slug(),
            'file' => $file,
        ]);

        $response->assertStatus(302);

    }

    public function loginWithFakeUser()
    {
        $user = User::first();
        $this->be($user);
    }
}
