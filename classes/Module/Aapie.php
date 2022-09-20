<?php

namespace Module;

use Enum\Request;

class Aapie
{

    private string $url;

    public function __construct(string $url)
    {
        $this->url = $url;
    }

    private function call(Request $method): bool|string
    {

        $curl = curl_init($this->url);

        switch ($method) {
            case Request::GET:

                // execute curl call
                curl_setopt($curl, CURLOPT_URL, $this->url);

                break;
            default;
                //TODO: implement UnexpectedMethodException.
                throw new \Exception('Unexpected method given:' . $method->value);
        }

        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

        $response = curl_exec($curl);

        if (!$response) {
            //TODO: implement ConnectionException.
            throw new \Exception('Connection Error');
        }

        curl_close($curl);

        return $response;

    }

    public function get($associative = true): mixed
    {
        return json_decode($this->call(Request::GET), $associative);
    }

}