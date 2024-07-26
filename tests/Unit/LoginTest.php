<?php

namespace Tests\Unit;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\DB;
use Tests\TestCase;

class LoginTest extends TestCase
{
    use RefreshDatabase;
    public function setUp(): void
    {
        parent::setUp();
        $this->initDatabase();
    }

    public function tearDown(): void
    {
        $this->resetDatabase();
        parent::tearDown();
    }

    public function test_halaman_login()
    {
        $response = $this->get('/');
        $response->assertStatus(200);
    }

    public function test_login()
    {
        $response = $this->post('/login', [
            'username' => 'admin',
            'password' => 'adminadmin'
        ]);

        $response->assertRedirect('/dashboard');
    }

    public function test_login_gagal()
    {
        $response = $this->post('/login', [
            'username' => 'admin',
            'password' => 'admin'
        ]);

        $response->assertRedirect('/');
    }
}
