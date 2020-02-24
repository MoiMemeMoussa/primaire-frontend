<?php

namespace App\Controller;

use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Serializer;

class RestAPI
{
    public function callGET($url, $className = NULL)
    {
        $client = curl_init("localhost:8080/" . $url);

        curl_setopt($client, CURLOPT_RETURNTRANSFER, true);

        $jsonResponse = curl_exec($client);

        if ($className)
        {
            $encoders = array(new JsonEncoder());
            $normalizers = array(new ObjectNormalizer());

            $serializer = new Serializer($normalizers, $encoders);

            $response = $serializer->deserialize($jsonResponse, $className, 'json');
        }
        else
        {
            $response = json_decode($jsonResponse);
        }

        return $response;
    }
}
