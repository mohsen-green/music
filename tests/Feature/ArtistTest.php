<?php

namespace Tests\Feature;

use App\Artist;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\User;
use Illuminate\Http\UploadedFile;
class ArtistTest extends TestCase
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
        $respnse = $this->get('artist');
        $respnse->assertOk();

    }
    public function test_create()
    {
        $this->loginWithFakeUser();
        $respnse = $this->get('artist/create');
        $respnse->assertOk();

    }

    public function testـstore()
    {

         $this->loginWithFakeUser();
        $file = UploadedFile::fake()->image('avatar.jpg');

        $response = $this->post('artist', [

            'name' => $this->faker()->name(),
            'des' => $this->faker()->name(),
            'img' => $file,
            'sex' => 'man',

        ]);
        $response->assertStatus(302);

    }
    public function test_edit()
    {
         $this->loginWithFakeUser();
         $artist = Artist::first();
         $respnse = $this->get('artist/' . $artist->_id . '/edit');
         $respnse->assertOk();

    }

    public function testـupdate()
    {

        $this->loginWithFakeUser();
        $artist = Artist::first();
        $file = UploadedFile::fake()->image('avatar.jpg');

        $response = $this->put('artist/'.$artist->_id, [

            'name' => $this->faker()->name(),
            'des' => $this->faker()->name(),
            'img' => $file,
            'sex' => 'man',

        ]);

         $response->assertStatus(302);

    }

    public function loginWithFakeUser()
    {
        $user = User::first();
        $this->be($user);
    }

}
