<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use Illuminate\Http\Request;
use App\Models\Setting;

class SettingController extends Controller
{
    public function umum(Request $request)
    {
        $message = '';

        if ($request['nama_lembaga']) {
            Setting::set('nama_lembaga', $request['nama_lembaga']);
            $message = 'Berhasil disimpan';
        }

        return Inertia::render('Setting/Umum', [
            'settings' => [
                'nama_lembaga' => Setting::get('nama_lembaga'),
                'alamat_lembaga' => Setting::get('alamat_lembaga'),
            ],
            'message' => $message
        ]);
    }
}
