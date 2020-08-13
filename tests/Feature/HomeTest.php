<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\User;
use Illuminate\Support\Facades\Auth;

class HomeTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testindex()
    {
        $this->loginWithFakeUser();
        $response = $this->get('/');

        $response->assertStatus(200);
    }
    public function loginWithFakeUser()
    {
        $user = User::first();
        $this->be($user);
    }
}
