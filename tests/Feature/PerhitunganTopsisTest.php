<?php

namespace Tests\Feature;

use App\Http\Controllers\PenilaianController;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class PerhitunganTopsisTest extends TestCase
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

    public function test_matriks_nilai_alternatif()
    {
        $user = User::factory()->make();
        Auth::login($user);

        $penilaian = new PenilaianController();
        $hasil = $penilaian->getPenilaianTopsis('marketing');
        
        $matriks = $hasil['matriks'];
        $matriks_nilai_alternatif = $matriks['matriks_nilai_alternatif'];
        dd($matriks_nilai_alternatif);
        $this->assertEquals(9, count($matriks_nilai_alternatif));
    }
}
