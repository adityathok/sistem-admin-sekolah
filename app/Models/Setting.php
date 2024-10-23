<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    //fillable
    protected $fillable = ['key', 'value'];

    //ambil setting
    public static function get($key, $default = null)
    {
        $setting = self::where('key', $key)->first();
        return $setting ? $setting->value : $default;
    }

    //simpan setting
    public static function set($key, $value)
    {
        // Jika value adalah array, kita konversi ke JSON
        if (is_array($value)) {
            $value = json_encode($value);
        }
        return self::updateOrCreate(['key' => $key], ['value' => $value]);
    }
}
