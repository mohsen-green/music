<?php

namespace Tests\Feature;

use App\Album;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\User;
use Illuminate\Http\UploadedFile;
use App\Artist;
class AlbumTest extends TestCase
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
        $respnse = $this->get('album');
        $respnse->assertOk();

    }
    public function test_create()
    {
        $this->loginWithFakeUser();
        $respnse = $this->get('album/create');
        $respnse->assertOk();

    }

    public function testـstore()
    {

         $this->loginWithFakeUser();
        $file = UploadedFile::fake()->image('avatar.jpg');

        $artist = Artist::create([
            'name' => $this->faker()->name(),
            'des' => $this->faker()->address,
            'img' => $file,
            'sex' => 'man',
        ]);

        $response = $this->post('album', [

            'name' => $this->faker()->name(),
            'name_artist' => $artist->_id,
            'img' => $file,

        ]);
        $response->assertStatus(302);

    }

    public function test_edit()
    {
         $this->loginWithFakeUser();
         $album = Album::first();
         $respnse = $this->get('album/' . $album->_id . '/edit');
         $respnse->assertOk();

    }


    public function loginWithFakeUser()
    {
        $user = User::first();
        $this->be($user);
    }


}
