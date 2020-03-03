<?php

namespace App\Utils;

use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Normalizer\ArrayDenormalizer;
use Symfony\Component\Serializer\Normalizer\GetSetMethodNormalizer;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Serializer;
use Unirest;

class RestAPI
{
    public function getAll($relativeUrl, $type)
    {
        $encoders = [new JsonEncoder()];
        $normalizers = [new ArrayDenormalizer(), new GetSetMethodNormalizer()];

        $serializer = new Serializer($normalizers, $encoders);

        $url = "http://localhost:8080/" . $relativeUrl;

        $jsonArray = Unirest\Request::get($url)->raw_body;

        $entityName = "App\\Entity\\" . $type . "[]";

        return $serializer->deserialize($jsonArray, $entityName, 'json');
    }

    public function post($relativeUrl, $entity)
    {
        $encoders = [new JsonEncoder()];
        $normalizers = [new ObjectNormalizer()];

        $serializer = new Serializer($normalizers, $encoders);

        $url = "http://localhost:8080/" . $relativeUrl;

        $jsonObject = $serializer->serialize($entity, 'json');

        Unirest\Request::post($url, ["Content-Type" => "application/json"], $jsonObject);
    }
}
