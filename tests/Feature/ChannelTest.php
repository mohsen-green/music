<?php

namespace Tests\Feature;

use App\Album;
use App\Artist;
use App\Channel;
use App\Music;
use App\User;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Http\UploadedFile;
use Tests\TestCase;
use App\Genre;
class ChannelTest extends TestCase
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
        $respnse = $this->get('channel');
        $respnse->assertOk();

    }
    public function test_create()
    {
        $this->loginWithFakeUser();
        $respnse = $this->get('channel/create');
        $respnse->assertOk();

    }

    public function testـstore()
    {

         $this->loginWithFakeUser();
        $file = UploadedFile::fake()->image('avatar.jpg');

        $response = $this->post('channel', [
            'name' => $this->faker()->name(),
            'des' => $this->faker()->name(),
            'img' => $file,
            'music' => [Music::latest()->first()->_id],
            'data' => $this->faker()->date()

        ]);
        $response->assertStatus(302);

    }
    public function test_edit()
    {
        $this->loginWithFakeUser();
        $channel = Channel::first();
        $respnse = $this->get('channel/' . $channel->_id . '/edit');
        $respnse->assertOk();

    }

    public function testـupdate()
    {

         $this->loginWithFakeUser();
        $channel = Channel::first();
       $file = UploadedFile::fake()->image('avatar.jpg');

        $response = $this->put('channel/' . $channel->_id, [

            'name' => $this->faker()->name(),
            'des' => $this->faker()->name(),
            'img' => $file,
            'music' => [Music::latest()->first()->_id],
            'data' => $this->faker()->date(),
            'channelid'=>$channel->_id

            ]);

        $response->assertStatus(302);

    }

    public function loginWithFakeUser()
    {
        $user = User::first();
        $this->be($user);
    }

    public function music_id()
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

        $music = $this->post('music', [
            'name' => $this->faker()->name(),
            'color' => $this->faker()->colorName,
            'data' => $this->faker()->date(),
            'img' => $fileimage,
            'music' => $filemusic,
            'genre' => $genre->_id,
            'album' => $album->_id,
            'artist' => $artist->_id,
        ]);

    }

}
