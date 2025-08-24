<?php

namespace App\Helpers;

class HttpClient {
    private $ch;
    private $options = [];

    public function __construct() {
        $this->ch = curl_init();
        $this->setDefaultOptions();
    }

    private function setDefaultOptions() {
        $this->options = [
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_SSL_VERIFYPEER => false,
            CURLOPT_SSL_VERIFYHOST => false,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_IPRESOLVE => CURL_IPRESOLVE_V4
        ];
    }

    public function post($url, $data, array $headers = []) {
        $this->options[CURLOPT_URL] = $url;
        $this->options[CURLOPT_POST] = true;
        $this->options[CURLOPT_POSTFIELDS] = is_array($data) ? json_encode($data) : $data;
        $this->options[CURLOPT_HTTPHEADER] = $headers;

        curl_setopt_array($this->ch, $this->options);
        
        try {
            $response = curl_exec($this->ch);
            if(curl_errno($this->ch)) {
                throw new \Exception(curl_error($this->ch));
            }
            return $response;
        } finally {
            curl_close($this->ch);
        }
    }

    public function get($url, array $headers = []) {
        $this->options[CURLOPT_URL] = $url;
        $this->options[CURLOPT_HTTPGET] = true;
        $this->options[CURLOPT_HTTPHEADER] = $headers;

        curl_setopt_array($this->ch, $this->options);

        try {
            $response = curl_exec($this->ch);
            if(curl_errno($this->ch)) {
                throw new \Exception(curl_error($this->ch)); 
            }
            return $response;
        } finally {
            curl_close($this->ch);
        }
    }
}