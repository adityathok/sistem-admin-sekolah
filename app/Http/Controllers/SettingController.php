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

            //upload gambar logo_lembaga
            if ($request['logo_lembaga'] && $request->file('logo_lembaga')) {
                //hapus gambar sebelumnya
                $oldimg = Setting::get('logo_lembaga');
                if ($oldimg && Storage::disk('public')->exists($oldimg)) {
                    Storage::disk('public')->delete($oldimg);
                }
                //upload dan beri nama baru
                $path = $request->file('logo_lembaga')->storeAs('images/' . date('Y/m'), 'logo_lembaga_' . uniqid() . '.' . $request->file('logo_lembaga')->getClientOriginalExtension(), 'public');
                Setting::set('logo_lembaga', $path);
            }

            session()->now('success', 'Pengaturan berhasil disimpan');
        }

        $settings = Setting::getMultiple($items);
        $settings['logo_lembaga_url'] = Storage::url(Setting::get('logo_lembaga'));

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
