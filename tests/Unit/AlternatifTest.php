<?php

namespace Tests\Unit;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\DB;
use Tests\TestCase;
use App\Models\User;

class AlternatifTest extends TestCase
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

    public function test_halaman_alternatif()
    {
        $user = User::factory()->make();

        $response = $this->actingAs($user)->get('/alternatif');

        $response->assertStatus(200);
        $response->assertViewIs('alternatif.showalternatif');
        $response->assertViewHas('dataAlternatif');
    }

    public function test_tambah_alternatif()
    {
        $user = User::factory()->make();

        $response = $this->actingAs($user)->get('/alternatif');
        $response = $this->actingAs($user)->post('/alternatif/add', [
            'kode' => 'A99',
            'nama_alternatif' => 'Alternatif 1',
            'keterangan' => 'Keterangan 1',
        ]);

        $response->assertStatus(302);
        $response->assertRedirect('/alternatif');

        $this->assertDatabaseHas('alternatifs', [
            'kode' => 'A99',
            'nama_alternatif' => 'Alternatif 1',
            'keterangan' => 'Keterangan 1',
        ]);
    }

    public function test_edit_alternatif()
    {
        $user = User::factory()->make();

        $response = $this->actingAs($user)->get('/alternatif');
        $response = $this->actingAs($user)->post('/alternatif/update', [
            'id' => 1,
            'kode' => 'A99',
            'nama_alternatif' => 'Alternatif 1',
            'keterangan' => 'Keterangan 1',
        ]);

        $response->assertStatus(302);
        $response->assertRedirect('/alternatif');

        $this->assertDatabaseHas('alternatifs', [
            'id' => 1,
            'kode' => 'A99',
            'nama_alternatif' => 'Alternatif 1',
            'keterangan' => 'Keterangan 1',
        ]);
    }

    public function test_hapus_alternatif()
    {
        $user = User::factory()->make();

        $response = $this->actingAs($user)->get('/alternatif');
        $response = $this->actingAs($user)->post('/alternatif/delete', [
            'id' => 1
        ]);

        $response->assertStatus(302);
        $response->assertRedirect('/alternatif');

        $this->assertDatabaseMissing('alternatifs', [
            'id' => 1
        ]);
    }
}
