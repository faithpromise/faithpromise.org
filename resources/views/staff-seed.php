<textarea style="width: 100%; height: 900px;">
<?php

foreach ($staff as $member):

    $campus = $member->campus;
    $teams = $member->teams;
    $ministries = $member->ministries;

    $bio = preg_replace('/\n(\s*\n)+/', '</p><p>', $member->bio);
    $bio = preg_replace('/\n/', '<br>', $bio);
    if (strlen($bio)) {
        $bio = '<p>' . $bio . '</p>';
    }

    echo "\$staff_member = new Staff([\n";

    if (!is_null($campus)) {
        echo "'campus_id' => Campus::where('slug', '=', '" . $campus->slug . "')->first()->id,\n";
    }

    echo "'slug' => '" . $member->slug . "',\n";
    echo "'first_name' => '" . $member->first_name . "',\n";
    echo "'last_name' => '" . $member->last_name . "',\n";
    echo "'display_name' => '" . $member->display_name . "',\n";
    echo "'title' => " . json_encode($member->title) . ",\n";
    echo "'email' => '" . $member->email . "',\n";
    echo "'phone_ext' => '" . $member->phone_ext . "',\n";
    echo "'bio' => " . json_encode($bio) . ",\n";
    echo "'sort' => " . $member->sort . ",\n";
    echo "'created_at' => Carbon::now(),\n";
    echo "'updated_at' => Carbon::now(),\n";

    echo "]);\n";
    echo "\$staff_member->save();\n";

    foreach ($teams as $team) {
        echo "\$staff_member->teams()->attach(";
        echo "\\App\\Team::where('slug', '=', '" . $team->slug . "')->first()->id";
        echo ");\n";
    }

    foreach ($ministries as $ministry) {
        echo "\$staff_member->ministries()->attach(";
        echo "\\App\\Ministry::where('slug', '=', '" . $ministry->slug . "')->first()->id";
        echo ");\n";
    }

    echo "\n\n";

endforeach;

?>

</textarea>