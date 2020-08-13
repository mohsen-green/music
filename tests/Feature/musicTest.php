<?php

namespace Tests\Feature;

use App\Album;
use App\Artist;
use App\Genre;
use App\User;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Http\UploadedFile;
use Tests\TestCase;
use App\Music;
use Illuminate\Foundation\Testing\RefreshDatabase;

class musicTest extends TestCase
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
        $respnse = $this->get('music');
        $respnse->assertOk();

    }
    public function test_create()
    {
        $this->loginWithFakeUser();
        $respnse = $this->get('music/create');
        $respnse->assertOk();

    }

    public function testـstore()
    {

        $this->loginWithFakeUser();
        $fileimage = UploadedFile::fake()->image('avatar.jpg');
        $filemusic = UploadedFile::fake()->create('music.mp3');

// ساخت رابطه ها
        $genre = Genre::create(
            ['name' => $this->faker()->name(),
                'slug' => $this->faker()->slug(),
                'img' => $fileimage,
            ]);
        $artist = Artist::create([
            'name' => $this->faker()->name(),
            'des' => $this->faker()->address,
            'img' => $fileimage,
            'sex' => 'man',
        ]);
        $album = Album::create([
            'name' => $this->faker()->name(),
            'name_artist' => $this->faker()->name(),
            'img' => $fileimage,
        ]);

        $response = $this->post('music', [
            'name' => $this->faker()->name(),
            'color' => $this->faker()->colorName,
            'data' => $this->faker()->date(),
            'img' => $fileimage,
            'music' => $filemusic,
            'genre' => $genre->_id,
            'album' => $album->_id,
            'artist' => $artist->_id,
        ]);

        $response->assertStatus(302);

    }
     public function test_edit()
    {
        $this->loginWithFakeUser();
        $genre = Music::first();
        $respnse = $this->get('music/' . $genre->_id . '/edit');
        $respnse->assertOk();

    }

     public function testـupdate()
     {





        $this->loginWithFakeUser();
        $music = Music::latest()->first()->_id;

        $response = $this->put('music/'.$music, [
            'name' => $this->faker()->name(),
            'color' => $this->faker()->colorName,
            'data' => $this->faker()->date(),
            'music_id'=>$music,
            'genre' => Genre::latest()->first()->_id,
            'album' => Album::latest()->first()->_id,
            'artist' => Artist::latest()->first()->_id,


        ]);
        $response->assertStatus(302);

     }

    public function loginWithFakeUser()
    {
        $user = User::first();
        $this->be($user);
    }
}
