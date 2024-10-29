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

    public function jenjang(Request $request)
    {
        $message = null;

        if ($request['jenjang']) {
            $settings = Setting::set('jenjang', $request['jenjang']);
            $message = 'sukses';
            session()->now('success', 'jenjang berhasil disimpan');
        }

        $settings = Setting::get('jenjang');

        return Inertia::render('Setting/Jenjang', [
            'settings' => json_decode($settings, true),
            'message' => $message,
            'flash' => [
                'success' => $request->session()->get('success'),
            ],
        ]);
    }

    public function store(Request $request)
    {

        foreach ($request['items'] as $item) {
            Setting::set($item, $request[$item]);
        }

        return redirect()->route($request['redirect'])->with('success', 'Pengaturan berhasil disimpan!');
    }
}
