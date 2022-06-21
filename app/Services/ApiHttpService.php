<?php

namespace App\Services;

use GuzzleHttp\Client;
use Illuminate\Support\Facades\Log;

class ApiHttpService 
{
    /**
     * @vars
     */
    protected $client;

    /**
     * OTPService constructor.
     */
    public function __construct()
    {
        $this->client = new Client([
            'base_uri'      => config('app.api_http.url'),
            'timeout'       => config('app.api_http.timeout'),
            'http_errors'   => false
        ]);
    }

    /**
     * Validate Code
     *
     * @param $id
     * @param string $code
     * @return bool|object
     */
    public function get($route, $params = [])
    {
        // Data for logs
        $data_for_log = [
            'url'       => request()->fullUrl(),
            'email'     => request()->get('email'),
            'IP'        => $_SERVER['REMOTE_ADDR'],
            'message'   => '',
        ];

        try {
            $response = $this->client->get(config('app.api_http.version'). $route, [
                'headers' => [
                    'Content-Type'  => 'application/json'
                ],
                // 'json'    => $body,
                'verify'    => false // VERIFICACIÓN HTTPS - HTTP
            ]);
            return json_decode($response->getBody()->getContents());
        } catch (\GuzzleHttp\Exception\ConnectException $e) {
            Log::error('guzzle_connect_exception', $data_for_log + ['message' => $e->getMessage()]);
            // return 'Conexión OTP fallida.';
            // dd(['message' => $e->getMessage()]);
        } catch (\GuzzleHttp\Exception\RequestException $e) {
            Log::error('guzzle_connection_timeout', $data_for_log + ['message' => $e->getMessage()]);
            // dd(['message' => $e->getMessage()]);
            // return 'Petición OTP fallida.';
        } catch (\Exception $e) {
            Log::error('guzzle_error', $data_for_log + ['message' => $e->getMessage()]);
            // dd(['message' => $e->getMessage()]);
            // return 'Guzzle';
        }
        return null;
    }
}
