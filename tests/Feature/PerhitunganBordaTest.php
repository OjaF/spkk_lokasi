<?php

namespace Tests\Feature;

use App\Http\Controllers\PenilaianController;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class PerhitunganBordaTest extends TestCase
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

    public function test_nilai_borda()
    {
        $user = User::factory()->make();
        Auth::login($user);

        $penilaian = new PenilaianController();
        $hasil = $penilaian->getPenilaianBorda();

        $this->assertEquals(9, count($hasil));

        $epsilon = 0.0001;

        $answer = [
            0.2209,
            0.2334,
            0.1667,
            0.0250,
            0.0371,
            0.1973,
            0.0456,
            0.0666,
            0.0076
        ];

        $check = true;

        for ($i = 0; $i < count($hasil); $i++) {
            if (abs($hasil[$i]['nilai_borda'] - $answer[$i]) > $epsilon) {
                $check = false;
                break;
            }
            // dd($hasil[$i]['nilai_borda']);
        }

        $this->assertTrue($check);
    }
}
