<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use Illuminate\Http\Request;
use App\Models\Setting;

class SettingController extends Controller
{
    public function umum(Request $request)
    {
        $settings = Setting::getMultiple([
            'nama_lembaga',
            'alamat_lembaga',
            'kota_lembaga',
            'tahun_pelajaran',
            'pimpinan_lembaga',
        ]);

        return Inertia::render('Setting/Umum', [
            'settings' => $settings,
            'flash' => [
                'success' => $request->session()->get('success'),
            ],
        ]);
    }

    public function store(Request $request)
    {
        Setting::set('nama_lembaga', $request['nama_lembaga']);
        return redirect()->route('setting.umum')->with('success', 'Pengaturan berhasil disimpan!');
    }
}
