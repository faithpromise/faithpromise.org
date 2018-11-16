<?php

use Illuminate\Support\Facades\Log;

function resized_image_url($image_path, $width, $format = null) {

    $image_path_parts = parse_url($image_path);
    $image_path = $image_path_parts['path'];
    $url_params = empty($image_path_parts['query']) ? [] : explode('&', $image_path_parts['query']);
    if ($format !== null) {
        $format_suffix = '-' . $format . '.${3}';
        $image_path = preg_replace('/(-(square|tall|wide))?\.(jpg|png)$/', $format_suffix, $image_path_parts['path']);
    }

    $v = asset_exists($image_path) ? filemtime(asset_path($image_path)) : 'not-found';
    array_unshift($url_params, 'v=' . $v);

    $img_url = config('site.cdn_url') . '/resized/' . $width . '/' . $image_path . (count($url_params) ? '?' . implode('&', $url_params) : '');

    return $img_url;

}

function open_graph_url_filter($url) {
    return 'http://' . preg_replace('/(http:)?\/\//', '', $url);
}

function asset_path($path) {
    return config('site.assets_path') . '/' . $path;
}

function asset_exists($path) {

    // LATER: Optimize for multiple calls to this method in a single request
    $exists = is_file(asset_path($path));

    if (!$exists) {
        Log::critical('Image not found: ' . $path . '. May need to upload it.');
    }

    return $exists;
}

function doc_url($file_name) {

    $doc_path = asset_path('docs/' . $file_name);
    $v = file_exists($doc_path) ? filemtime($doc_path) : 'not-found';

    return 'http:' . config('site.cdn_url') . '/docs/' . $file_name . '?v=' . $v;
}

function cdn_image_raw($image_path, $format = null) {

    $query_string = asset_exists($image_path) ? '?v=' . filemtime(asset_path($image_path)) : '';

    if ($format !== null) {
        $format_suffix = '-' . $format . '.jpg';
        $image_path = preg_replace('/(-(square|tall|wide))?\.jpg$/', $format_suffix, $image_path);
    }

    return 'http:' . config('site.cdn_url') . '/' . $image_path . $query_string;
}

function cdn_image($display_width, $image_width, $image_path, $format = null) {

    // Not a local image. Return
    if ('images/' !== substr($image_path, 0, 7)) {
        return $image_path;
    }

    $image_path_parts = parse_url($image_path);
    $image_path = $image_path_parts['path'];
    $url_params = empty($image_path_parts['query']) ? [] : explode('&', $image_path_parts['query']);
    if ($format !== null) {
        $format_suffix = '-' . $format . '.${3}';
        $image_path = preg_replace('/(-(square|tall|wide))?\.(jpg|png)$/', $format_suffix, $image_path_parts['path']);
    }

    $v = asset_exists($image_path) ? filemtime(asset_path($image_path)) : 'not-found';
    array_unshift($url_params, 'v=' . $v);

    $img_url = config('site.cdn_url') . '/' . $display_width . '/' . $image_width . '/' . $image_path . (count($url_params) ? '?' . implode('&', $url_params) : '');

    return $img_url;
}

function bible_verses($scriptures) {

    $links = '';
    $scriptures = explode(';', $scriptures);

    foreach ($scriptures as $bookRefs):

        $bookRefs = trim($bookRefs); // Genesis 1:26-28, 2:15-25, 3:1-20

        $temp = preg_match('/^([0-9]\s)?[a-zA-Z]+\s/', $bookRefs, $parts, PREG_OFFSET_CAPTURE); // Genesis OR 1 Kings
        $book = trim($parts[0][0]);

        $refs = explode(',', str_replace(' ', '', preg_replace('/^([0-9]\s)?[a-zA-Z]+\s/', '', $bookRefs))); // [1:26-28,2:15-25,3:1-20]
        $book_names = ['Genesis', 'Exodus', 'Leviticus', 'Numbers', 'Deuteronomy', 'Joshua', 'Judges', 'Ruth', '1 Samuel', '2 Samuel', '1 Kings', '2 Kings', '1 Chronicles', '2 Chronicles', 'Ezra', 'Nehemiah', 'Esther', 'Job', 'Psalm', 'Proverbs', 'Ecclesiastes', 'Song of Solomon', 'Isaiah', 'Jeremiah', 'Lamentations', 'Ezekiel', 'Daniel', 'Hosea', 'Joel', 'Amos', 'Obadiah', 'Jonah', 'Micah', 'Nahum', 'Habakkuk', 'Zephaniah', 'Haggai', 'Zechariah', 'Malachi', 'Matthew', 'Mark', 'Luke', 'John', 'Acts', 'Romans', '1 Corinthians', '2 Corinthians', 'Galatians', 'Ephesians', 'Philippians', 'Colossians', '1 Thessalonians', '2 Thessalonians', '1 Timothy', '2 Timothy', 'Titus', 'Philemon', 'Hebrews', 'James', '1 Peter', '2 Peter', '1 John', '2 John', '3 John', 'Jude', 'Revelation'];
        $book_abbreviations = ['Gen', 'Exod', 'Lev', 'Num', 'Deut', 'Josh', 'Judg', 'Ruth', '1Sam', '2Sam', '1Kgs', '2Kgs', '1Chr', '2Chr', 'Ezra', 'Neh', 'Esth', 'Job', 'Ps', 'Prov', 'Eccl', 'Song', 'Isa', 'Jer', 'Lam', 'Ezek', 'Dan', 'Hos', 'Joel', 'Amos', 'Obad', 'Jonah', 'Mic', 'Nah', 'Hab', 'Zeph', 'Hag', 'Zech', 'Mal', 'Matt', 'Mark', 'Luke', 'John', 'Acts', 'Rom', '1Cor', '2Cor', 'Gal', 'Eph', 'Phil', 'Col', '1Thess', '2Thess', '1Tim', '2Tim', 'Titus', 'Phlm', 'Heb', 'Jas', '1Pet', '2Pet', '1John', '2John', '3John', 'Jude', 'Rev'];
        $book_abbrev = $book_abbreviations[array_search($book, $book_names)];

        foreach ($refs as $key => $ref) { // $ref = 1:26-28

            if (strpos($ref, ':')) {
                $chapter = strtok($ref, ':'); // 1
            }

            $verse = substr(strstr($ref, ':'), 1); // 26-28
            $links[] = '<a class="BibleRef" href="https://www.bible.com/bible/100/' . $book_abbrev . '.' . $chapter . '.' . $verse . '" target="_blank">' . ($key === 0 ? $book_abbrev . ' ' : '') . $chapter . ':' . $verse . '</a>';

        }

    endforeach;

    return implode(', ', $links);

}

function share_facebook($url, $redirect_url = null) {
    $app_id = config('site.facebook_app_id');
    $redirect_url = is_null($redirect_url) ? $url : $redirect_url;

    return 'https://www.facebook.com/dialog/share?app_id=' . $app_id . '&display=popup&href=' . $url . '&redirect_uri=' . $redirect_url;
}

function share_twitter($url) {
    return 'https://twitter.com/intent/tweet?text=Check+it+out&url=' . $url;
}

function facebook_url($username) {
    return 'https://www.facebook.com/' . $username;
}

function twitter_url($username) {
    return 'https://twitter.com/' . $username;
}

function instagram_url($username) {
    return 'https://instagram.com/' . $username;
}

function pinterest_url($username) {
    return 'https://www.pinterest.com/' . $username . '/';
}

function youtube_url($username) {
    return 'https://www.youtube.com/user/' . $username;
}

function vimeo_url($username) {
    return 'https://vimeo.com/' . $username;
}

function github_url($username) {
    return 'https://github.com/' . $username;
}

function social_url($service, $username) {
    return call_user_func($service . '_url', $username);
}

function excerpt($str, $desired_length, $ellipses = '...') {
    $parts = preg_split('/([\s\n\r]+)/', strip_tags($str), null, PREG_SPLIT_DELIM_CAPTURE);
    $parts_count = count($parts);

    $length = 0;

    for ($last_part = 0; $last_part < $parts_count; ++$last_part) {
        $length += strlen($parts[$last_part]);
        if ($length > $desired_length) {
            break;
        }
    }

    $new_str = trim(implode(array_slice($parts, 0, $last_part)));

    if (strlen($str) > strlen($new_str)) {
        $new_str .= $ellipses;
    }

    return $new_str;
}