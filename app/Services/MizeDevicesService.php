<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;
use Mockery\Exception;

class MizeDevicesService
{

    private $username = "TEST";
    private $password = "123";

    private $headers = [
        'App-Code' => 2,
        'Client-Name' => 'nahdi',
    ];


    public function myResource($order_products)
    {
        $arrayData = [];
        foreach ($order_products as $order_product) {
            $arrayData[] = [
                'id' => $order_product->id,
                'itemCode' => $order_product->product_code,
            ];
        }
        $body = [
            'username' => $this->username,
            'password' => $this->password,
            'arrayData' => $arrayData,
        ];

        try {
            $response = Http::withoutVerifying()
                ->withHeaders($this->headers)
                ->withOptions(["verify" => false])
                ->post('https://mr.njazsoft.com:8443/apiKaraz/actions/myResource', $body)
                ->body();


            $response = json_decode($response, true);

            return @$response['list'] ?? [];

        } catch (Exception $exception) {
            return [];
        }
    }


}
