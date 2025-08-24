<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Log;

class DigiFlazzController extends Controller
{
    private $client;
    private $baseUrl = "https://api.digiflazz.com";
    private $api;

    public function __construct()
    {
        $this->api = \DB::table('setting_webs')->where('id', 1)->first();
        $this->client = new Client([
            'base_uri' => $this->baseUrl,
            'timeout' => 30,
            'verify' => false
        ]);
    }

    public function order($uid = null, $zone = null, $service = null, $order_id = null)
    {
        $target = $uid . $zone;
        $sign = md5($this->api->username_digi . $this->api->api_key_digi . strval($order_id));
        $api_postdata = [
            'username' => $this->api->username_digi,
            'buyer_sku_code' => $service,
            'customer_no' => "$target",
            'ref_id' => strval($order_id),
            'sign' => $sign,
        ];

        return $this->connect("/v1/transaction", $api_postdata);
    }

    public function status($poid = null, $pid = null, $uid = null, $zone = null)
    {
        $target = $uid . $zone;
        $sign = md5($this->api->username_digi . $this->api->api_key_digi . strval($poid));

        $data = [
            'command' => 'status-pasca',
            'username' => $this->api->username_digi,
            'buyer_sku_code' => $pid,
            'customer_no' => $target,
            'ref_id' => $poid,
            'sign' => $sign
        ];        

        return $this->connect("/v1/transaction", $data);
    }

    public function harga()
    {
        $sign = md5($this->api->username_digi . $this->api->api_key_digi . "pricelist");
        $data = [
            'username' => $this->api->username_digi,
            'sign' => $sign
        ];

        return $this->connect('/v1/price-list', $data);
    }

    private function connect($url, $data)
    {
        try {
            $headers = [
                'Content-Type' => 'application/json',
                'Accept' => 'application/json'
            ];

            // Jika API menggunakan Basic Auth
            // $headers['Authorization'] = 'Basic ' . base64_encode($this->api->api_key_digi . ':');
            
            // Atau jika API menggunakan Bearer token
            $headers['Authorization'] = 'Bearer ' . $this->api->api_key_digi;

            $response = $this->client->post($url, [
                'headers' => $headers,
                'json' => $data
            ]);

            return json_decode($response->getBody(), true);
        } catch (\Exception $e) {
            Log::error("DigiFlazz API Error: " . $e->getMessage());
            return [
                'status' => 'error',
                'message' => $e->getMessage()
            ];
        }
    }
}
