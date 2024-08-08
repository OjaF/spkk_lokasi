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

    public function test_matriks_nilai_preferensi_marketing()
    {
        $user = User::factory()->make();
        Auth::login($user);

        $penilaian = new PenilaianController();
        $hasil = $penilaian->getPenilaianTopsis('marketing');

        $matriks = $hasil['dataTambahan'];
        $matriks_nilai_preferensi = $matriks['nilai_preferensi'];

        $this->assertEquals(9, count($matriks_nilai_preferensi));

        $epsilon = 0.0001;

        $answer = [
            0.7709,
            0.7637,
            0.7272,
            0.3107,
            0.3023,
            0.7794,
            0.3347,
            0.3637,
            0.1335
        ];

        $check = true;

        for ($i = 0; $i < count($matriks_nilai_preferensi); $i++) {
            if (abs($matriks_nilai_preferensi[$i] - $answer[$i]) > $epsilon) {
                $check = false;
                break;
            }
        }

        $this->assertTrue($check);
    }

    public function test_matriks_nilai_preferensi_finance()
    {
        $user = User::factory()->make();
        Auth::login($user);

        $penilaian = new PenilaianController();
        $hasil = $penilaian->getPenilaianTopsis('finance');

        $matriks = $hasil['dataTambahan'];
        $matriks_nilai_preferensi = $matriks['nilai_preferensi'];

        $this->assertEquals(9, count($matriks_nilai_preferensi));

        $epsilon = 0.0001;

        $answer = [
            0.7370,
            0.7677,
            0.7341,
            0.3149,
            0.3496,
            0.7030,
            0.3715,
            0.3766,
            0.2875,
        ];

        $check = true;

        for ($i = 0; $i < count($matriks_nilai_preferensi); $i++) {
            if (abs($matriks_nilai_preferensi[$i] - $answer[$i]) > $epsilon) {
                $check = false;
                break;
            }
        }

        $this->assertTrue($check);
    }

    public function test_matriks_nilai_preferensi_direktur()
    {
        $user = User::factory()->make();
        Auth::login($user);

        $penilaian = new PenilaianController();
        $hasil = $penilaian->getPenilaianTopsis('stakeholder');

        $matriks = $hasil['dataTambahan'];
        $matriks_nilai_preferensi = $matriks['nilai_preferensi'];

        $this->assertEquals(9, count($matriks_nilai_preferensi));

        $epsilon = 0.0001;

        $answer = [
            0.7718,
            0.7791,
            0.7101,
            0.2503,
            0.3515,
            0.7220,
            0.3140,
            0.3586,
            0.2029,
        ];

        $check = true;

        for ($i = 0; $i < count($matriks_nilai_preferensi); $i++) {
            if (abs($matriks_nilai_preferensi[$i] - $answer[$i]) > $epsilon) {
                $check = false;
                break;
            }
        }

        $this->assertTrue($check);
    }
}
