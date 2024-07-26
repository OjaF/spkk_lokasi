<?php

namespace Tests\Unit;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Factories\Factory;
use Tests\TestCase;
use App\Models\User;


class KriteriaTest extends TestCase
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

    public function test_halaman_kriteria()
    {
        $user = User::factory()->make();

        $response = $this->actingAs($user)->get('/kriteria');

        $response->assertStatus(200);
        $response->assertViewIs('kriteria.showkriteria');
        $response->assertViewHas('dataKriteria');
    }

    public function test_tambah_kriteria()
    {
        $user = User::factory()->make();

        $response = $this->actingAs($user)->get('/kriteria');
        $response = $this->actingAs($user)->post('/kriteria/create', [
            'kode' => 'C99',
            'nama' => 'Kriteria 99',
            'bobot' => 1,
            'role' => 'marketing',
            'atribut' => 'cost'
        ]);

        // dd($response);

        $response->assertStatus(302);
        $response->assertRedirect('/kriteria');

        $this->assertDatabaseHas('kriterias', [
            'kode' => 'C99',
            'nama_kriteria' => 'Kriteria 99',
            'bobot' => 1,
            'role' => 'marketing',
            'atribut' => 'cost'
        ]);
    }

    public function test_edit_kriteria()
    {
        $user = User::factory()->make();

        $response = $this->actingAs($user)->get('/kriteria');
        $response = $this->actingAs($user)->post('/kriteria/update', [
            'id' => 1,
            'kode' => 'C99',
            'nama' => 'Kriteria 99',
            'bobot' => 1,
            'role' => 'marketing',
            'atribut' => 'cost'
        ]);

        $response->assertStatus(302);
        $response->assertRedirect('/kriteria');

        $this->assertDatabaseHas('kriterias', [
            'kode' => 'C99',
            'nama_kriteria' => 'Kriteria 99',
            'bobot' => 1,
            'role' => 'marketing',
            'atribut' => 'cost'
        ]);
    }

    public function test_hapus_kriteria()
    {
        $user = User::factory()->make();

        $response = $this->actingAs($user)->get('/kriteria');
        $response = $this->actingAs($user)->post('/kriteria/delete', [
            'id' => 1
        ]);

        $response->assertStatus(302);
        $response->assertRedirect('/kriteria');

        $this->assertDatabaseMissing('kriterias', [
            'id' => 1
        ]);
    }
}
