<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class ApiCheckController extends Controller
{
    public function check($user_id = null, $zone_id = null, $game = null)
    {
    	$api = \DB::table('setting_webs')->where('id',1)->first();

    $params = [
        'api_key' => $api->topupindo_api ?? '',
        'game'    => $game,
        'user_id' => $user_id,
        'zone_id' => $zone_id
    ];
        
        $result = $this->connect($params);
        // dd(ENV("KBRSTORE_API"));
        // dd($result);
         // Cek apakah $result bukan null dan punya key 'code'
            if (($result['result']['status'] ?? null) == '200') {
            return [
                'status' => ['code' => 200],
                'data' => [
                    'userNameGame' => $result['nickname'] ?? null
                ]
            ];
        } else {
        return [
            'status' => ['code' => 1]
        ];
    }
    }

    public function connect($data = null)
    {
     $game = strtolower(str_replace(' ', '-', $data['game'])); // sudah diperbaiki
    $url = 'https://alfathan.my.id/api/game/'. $game .'/?id=' . urlencode($data['user_id']) . '&zone='. $data['zone_id'] .'&server=' . $data['zone_id'] . '&key=' . $data['api_key'];

    \Log::info("Full API URL: " . $url); // <<< LOGGING URL YANG DIKIRIMKAN

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
    curl_setopt($ch, CURLOPT_IPRESOLVE, CURL_IPRESOLVE_V4);

    $chresult = curl_exec($ch);
    curl_close($ch);

    \Log::info("Raw API response: " . $chresult); // log response mentah

    $json_result = json_decode($chresult, true);
    if (json_last_error() !== JSON_ERROR_NONE) {
        \Log::error('JSON decode error: ' . json_last_error_msg());
    }

    return $json_result;

    }
}