<?php

use App\Campus;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class CampusesSeeder extends Seeder {
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {

        DB::table('campuses')->truncate();

        $this->makeRecord("pellissippi", "Pellissippi Campus", "West Knoxville, TN", "10740 Faith Promise Lane", "Knoxville", "TN", "37931", 35.96411, -84.16774, "['Saturdays at 6:00 pm','Sundays at 8:45, 10:00, & 11:30 am']", "https://goo.gl/maps/0uDbp", "https://goo.gl/maps/SQgvq", 1);
        $this->makeRecord("online", "Internet Campus", "Worldwide", "10740 Faith Promise Lane", "Knoxville", "TN", "37931", null, null, "['Saturdays at 6:00 pm','Sundays at 9:00 am, 10:20 am, 11:45 am & 9:00 pm']", null, null, 6);
        $this->makeRecord("blount", "Blount Campus", "Maryville, TN", "539 North Foothills Plaza Drive", "Maryville", "TN", "37801", 35.74338, -83.99434, "['Sundays at 9:00, 10:15, & 11:30 am']", "https://goo.gl/maps/bgo00", "https://goo.gl/maps/JPeuK", 2);
        $this->makeRecord("north", "North Knox Campus", "North Knoxville, TN", "5830 Haynes-Sterchi Road", "Knoxville", "TN", "37912", 36.02564, -83.96852, "['Sundays at 9:30 & 11:00 am']", "https://goo.gl/maps/khSGr", "https://goo.gl/maps/cFj4L", 3);
        $this->makeRecord("anderson", "Anderson Campus", "Clinton, TN", "96 Mariner Point Dr", "Clinton", "TN", "37716", 36.07426, -84.16326, "['Sundays at 10:30 am']", "https://goo.gl/maps/Vntqq", "https://goo.gl/maps/8PjfC", 4);
        $this->makeRecord("campbell", "Campbell Campus", "LaFollette, TN", "2301 Jacksboro Pike Suite 3", "LaFollette", "TN", "37766", 36.34477, -84.16185, "['Sundays at 10:30 am']", "https://goo.gl/maps/ypsrw", "https://goo.gl/maps/gWW6y", 5);
    }

    private function makeRecord($slug, $name, $location, $address, $city, $state, $zip, $lat, $lng, $times, $map_url, $directions_url, $sort) {
        (new Campus([
            'slug'           => $slug,
            'name'           => $name,
            'location'       => $location,
            'address'        => $address,
            'city'           => $city,
            'state'          => $state,
            'zip'            => $zip,
            'lat'            => $lat,
            'lng'            => $lng,
            'times'          => $times,
            'map_url'        => $map_url,
            'directions_url' => $directions_url,
            'sort'           => $sort,
            'created_at'     => Carbon::now(),
            'updated_at'     => Carbon::now()
        ]))->save();
    }
}

