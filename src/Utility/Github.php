<?php

namespace App\Utility;

use App\Utility\Curl;

class Github
{
    public static function SearchUsers($search)
    {
        $url = 'https://api.github.com/search/users?q=' . $search . '&client_id=' . GITHUB_API_KEY . '&client_secret=' . GITHUB_API_SECRET;

        $json = Curl::Get($url);

        return $json;
    }

    public static function GetFollowers($login, $page = 1)
    {
        $url = 'https://api.github.com/users/' . $login . '/followers?page=' . $page;

        $json = Curl::Get($url);

        return $json;
    }
}