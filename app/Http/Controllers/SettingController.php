<?php

namespace App\Http\Controllers;

use Inertia\Inertia;

use Illuminate\Http\Request;

class SettingController extends Controller
{
    public function general(Request $request)
    {
        return Inertia::render('Setting/General', [
            'nama_lembaga' => '',
            'status' => '',
        ]);
    }
}
