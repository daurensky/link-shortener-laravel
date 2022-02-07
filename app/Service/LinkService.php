<?php

namespace App\Service;

use App\Models\Link;
use Illuminate\Database\QueryException;
use Illuminate\Support\Str;

class LinkService
{
    public function getOrCreate($url): string
    {
        if ($link = Link::where('original', $url)->first()) {
            return $this->getFullUrl($link->hash);
        } else {
            return $this->createWithUniqueHash($url);
        }
    }

    private function createWithUniqueHash($url): string
    {
        try {
            $link = Link::create([
                'hash' => Str::random(6),
                'original' => $url
            ]);

            return $this->getFullUrl($link->hash);
        } catch (QueryException $exception) {
            $code = $exception->errorInfo[1];

            if ($code === 1062) {
                $this->createWithUniqueHash($url);
            }
        }
    }

    private function getFullUrl($hash): string
    {
        return config('app.url') . '/' . $hash;
    }
}