<?php

namespace App\FaithPromise;

class BibleApi {

    public static function loadPassages(&$passages) {

        $passages->each(

            function ($item) use (&$result) {
                if (empty($item->passage_text)) {
                    $text = self::fetchPassage(str_replace(' ', '.', $item->passage));
                    $item->passage_text = $text[0]->text;
                    $item->save();
                }
            }
        );

        return $passages;
    }

    public static function fetchPassage($passage) {

        $token = 'ZIGlR1ySsK0JrLUuma0hn2MJYvwe325F0g04xIEf';
        $url = 'https://bibles.org/v2/passages.js?q[]=' . $passage . '&version=eng-NASB';

        // Set up cURL
        $ch = curl_init();
        // Set the URL
        curl_setopt($ch, CURLOPT_URL, $url);
        // don't verify SSL certificate
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
        // Return the contents of the response as a string
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        // Follow redirects
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
        // Set up authentication
        curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
        curl_setopt($ch, CURLOPT_USERPWD, "$token:X");

        // Do the request
        $result = json_decode(curl_exec($ch));
        curl_close($ch);

        return $result->response->search->result->passages;

    }

}