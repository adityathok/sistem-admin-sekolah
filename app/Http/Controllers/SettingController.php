<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use Illuminate\Http\Request;
use App\Models\Setting;
use Illuminate\Support\Facades\Storage;

class SettingController extends Controller
{
    public function umum(Request $request)
    {
        $items = [
            'nama_lembaga',
            'alamat_lembaga',
            'kota_lembaga',
            'tahun_pelajaran',
            'pimpinan_lembaga',
            'logo_lembaga'
        ];

        //handle submit
        if ($request['nama_lembaga']) {

            foreach ($items as $item) {
                if ($item == 'logo_lembaga') {
                    continue;
                }
                Setting::set($item, $request[$item]);
            }

            if ($request['logo_lembaga']) {
                $oldimg = Setting::get('logo_lembaga');
                if ($oldimg && Storage::disk('public')->exists($oldimg)) {
                    Storage::disk('public')->delete($oldimg);
                }
                $path = $request->file('logo_lembaga')->store('images', 'public');
                Setting::set('logo_lembaga', $path);
            }

            session()->now('success', 'Pengaturan berhasil disimpan');
        }

        $settings = Setting::getMultiple($items);

        return Inertia::render('Setting/Umum', [
            'settings' => $settings,
            'flash' => [
                'success' => $request->session()->get('success'),
            ],
        ]);
    }

    public function jenjang(Request $request)
    {

        //handle submit
        if ($request['jenjang']) {
            $settings = Setting::set('jenjang', $request['jenjang']);
            session()->now('success', 'jenjang berhasil disimpan');
        }

        $settings = Setting::get('jenjang');

        return Inertia::render('Setting/Jenjang', [
            'settings' => json_decode($settings, true),
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
