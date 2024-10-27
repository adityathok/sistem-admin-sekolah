<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

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

    public static function setMultiple(array $settings)
    {
        $data = [];
        foreach ($settings as $key => $value) {
            $data[] = [
                'key' => $key,
                'value' => is_array($value) ? json_encode($value) : $value,
            ];
        }

        DB::table('settings')->upsert($data, ['key'], ['value']);
    }

    public static function getMultiple(array $keys, $default = [])
    {
        $results = [];
        foreach ($keys as $key) {
            $results[$key] = self::get($key, $default);
        }
        return $results;
    }
}
