<?php

namespace App\Http\Controllers;

use Inertia\Inertia;

use Illuminate\Http\Request;

class SettingController extends Controller
{
    public function umum(Request $request)
    {
        return Inertia::render('Setting/Umum', [
            'nama_lembaga' => '',
            'status' => '',
        ]);
    }
}
