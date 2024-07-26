<?php

namespace Tests\Unit;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\DB;
use Tests\TestCase;
use App\Models\User;

class SubKriteriaTest extends TestCase
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

    public function test_halaman_subkriteria()
    {
        $user = User::factory()->make();

        $response = $this->actingAs($user)->get('/subkriteria');

        $response->assertStatus(200);
        $response->assertViewIs('subkriteria.showsubkriteria');
        $response->assertViewHas('dataKriteria');
    }

    public function test_tambah_subkriteria()
    {
        $user = User::factory()->make();

        $response = $this->actingAs($user)->get('/subkriteria');
        $response = $this->actingAs($user)->post('/subkriteria/add', [
            'kriteria' => 1,
            'nama' => 'Sub Kriteria 1',
            'nilai' => 1,
            'role' => 'marketing'
        ]);

        $response->assertStatus(302);
        $response->assertRedirect('/subkriteria');

        $this->assertDatabaseHas('sub_kriterias', [
            'id_kriteria' => 1,
            'nama_subkriteria' => 'Sub Kriteria 1',
            'nilai' => 1,
            'role' => 'marketing'
        ]);
    }

    public function test_edit_subkriteria()
    {
        $user = User::factory()->make();

        $response = $this->actingAs($user)->get('/subkriteria');
        $response = $this->actingAs($user)->post('/subkriteria/update', [
            'id' => 1,
            'kriteria' => 1,
            'nama' => 'Sub Kriteria 1',
            'nilai' => 1,
            'role' => 'marketing'
        ]);

        $response->assertStatus(302);
        $response->assertRedirect('/subkriteria');

        $this->assertDatabaseHas('sub_kriterias', [
            'id' => 1,
            'id_kriteria' => 1,
            'nama_subkriteria' => 'Sub Kriteria 1',
            'nilai' => 1,
            'role' => 'marketing'
        ]);
    }

    public function test_hapus_subkriteria()
    {
        $user = User::factory()->make();

        $response = $this->actingAs($user)->get('/subkriteria');
        $response = $this->actingAs($user)->post('/subkriteria/delete', [
            'id' => 1
        ]);

        $response->assertStatus(302);
        $response->assertRedirect('/subkriteria');

        $this->assertDatabaseMissing('sub_kriterias', [
            'id' => 1
        ]);
    }
}
