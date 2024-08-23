<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class Jsonplaceholder
{
    const BASE_URL = 'https://jsonplaceholder.typicode.com';
    const LIMIT = 10;

    public static function getUsers()
    {
        $response = Http::get(self::BASE_URL . "/users");

        return (new self)->returnOrThrow($response);
    }

    public static function getPosts($offset = 0)
    {
        $response = Http::get(self::BASE_URL . '/posts', [
            '_start' => $offset,
            '_limit' => self::LIMIT,
        ]);

        return (new self)->returnOrThrow($response);
    }

    public static function getComments($offset = 0)
    {
        $response = Http::get(self::BASE_URL . '/comments', [
            '_start' => $offset,
            '_limit' => self::LIMIT,
        ]);

        return (new self)->returnOrThrow($response);
    }

    private function returnOrThrow($response): object|array|null
    {
        $response->throw();

        return $response->object();
    }
}
