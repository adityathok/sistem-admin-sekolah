<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Setting;

class SettingsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Setting::set('nama_lembaga', 'Yayasan Pendidikan Bangsa');
        Setting::set('alamat_lembaga', 'Jl. Kemerdekaan No. 6 Sukoharjo');
        Setting::set('kota_lembaga', 'Sukoharjo');
        Setting::set('tahun_pelajaran', date('Y') . '/' . date('Y', strtotime('+1 year')));
        Setting::set('pimpinan_lembaga', 'Fulan Fulana S.Pd');
        Setting::set('jenjang', json_encode(['KB', 'TK', 'SD', 'SMP', 'SMA', 'Pondok']));
    }
}
