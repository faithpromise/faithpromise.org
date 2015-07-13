<?php

use App\MissionLocation;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class MissionTripsSeeder extends Seeder
{

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table('mission_trips')->truncate();

        DB::table('mission_trips')->insert([
            'mission_location_id' => MissionLocation::where('ident', '=', 'costa-rica')->first()->id,
            'cost'                => '$1,500',
            'seats'               => null,
            'description'         => 'Helping with development, growth and training of the FP Costa Rica Campus.',
            'contact'             => 'Jody Kenyon',
            'contact_email'       => 'jodyk@faithpromise.org',
            'is_full'             => 0,
            'starts_at'           => Carbon::now()->subDays(60),
            'ends_at'             => Carbon::now()->subDays(54),
            'created_at'          => Carbon::now(),
            'updated_at'          => Carbon::now()
        ]);

        DB::table('mission_trips')->insert([
            'mission_location_id' => MissionLocation::where('ident', '=', 'haiti')->first()->id,
            'cost'                => '$1,500',
            'seats'               => null,
            'description'         => 'Through our partnership with The 410 Bridge, team members have an opportunity to journey to a beautiful, rural La Croix, Haiti to serve with community members and churches as they share the hope of Christ and work to transform their community. Teams will work with community leaders to help unify and mobilize the community to implement strategic development and discipleship programs. Learn, worship, serve, and grow as you walk alongside community members and build relationships through home visits, service and evangelism projects, teaching in schools, family ministry and more.',
            'contact'             => 'Dave and Tonja Breaux',
            'contact_email'       => 'tonjab@faithpromise.org',
            'is_full'             => 0,
            'starts_at'           => Carbon::now()->addDays(35),
            'ends_at'             => Carbon::now()->addDays(41),
            'created_at'          => Carbon::now(),
            'updated_at'          => Carbon::now()
        ]);

        DB::table('mission_trips')->insert([
            'mission_location_id' => MissionLocation::where('ident', '=', 'mexico')->first()->id,
            'cost'                => '$1,650',
            'seats'               => null,
            'description'         => 'The Monterrey Mission trip is a great experience for your first time or families that want to experience missions together. We partner with Back2Back.org ministries to invest our time, labor and heart in children?s homes and impoverished neighborhoods. We bring care for today and hope for tomorrow.',
            'contact'             => 'Gina McClain',
            'contact_email'       => 'ginam@faithpromise.org',
            'is_full'             => 0,
            'starts_at'           => Carbon::now()->subDays(3),
            'ends_at'             => Carbon::now()->addDays(3),
            'created_at'          => Carbon::now(),
            'updated_at'          => Carbon::now()
        ]);

        DB::table('mission_trips')->insert([
            'mission_location_id' => MissionLocation::where('ident', '=', 'big-creek-ky')->first()->id,
            'cost'                => '$100',
            'seats'               => null,
            'description'         => 'Join Faith Promise Church as we partner with Big Creek Missions in Bear Branch, KY. Big Creek Missions is a Christian ministry center in Bear Branch, Kentucky that works to connect churches and volunteer groups from across the country with needs that exist in the Leslie, Clay, and Perry County areas. Possible Projects include: - Assisting local churches with renovation projects - Assisting local low-income residents with construction needs such as roofing, wheelchair ramps, windows, weatherization, and lawn care.',
            'contact'             => 'Allison Dunford',
            'contact_email'       => null,
            'is_full'             => 0,
            'starts_at'           => Carbon::now()->addDays(52),
            'ends_at'             => Carbon::now()->addDays(53),
            'created_at'          => Carbon::now(),
            'updated_at'          => Carbon::now()
        ]);

        DB::table('mission_trips')->insert([
            'mission_location_id' => MissionLocation::where('ident', '=', 'honduras')->first()->id,
            'cost'                => null,
            'seats'               => null,
            'description'         => 'We\'re taking a medical mission team to Honduras on July 11-18. We will need doctors, nurses, therapists, pharmacists, helpers, and those who want to be involved in evangelism.',
            'contact'             => 'Ron Noe',
            'contact_email'       => 'missions@faithpromise.org',
            'is_full'             => 0,
            'starts_at'           => Carbon::now()->addDays(70),
            'ends_at'             => Carbon::now()->addDays(76),
            'created_at'          => Carbon::now(),
            'updated_at'          => Carbon::now()
        ]);

        DB::table('mission_trips')->insert([
            'mission_location_id' => MissionLocation::where('ident', '=', 'east-asia')->first()->id,
            'cost'                => '$2,000',
            'seats'               => null,
            'description'         => 'East Asia is a part of the world where there are few believers and most have never even heard of Jesus. On this trip, you will spend time meeting and getting to know the local people. Through that process you will have the opportunity to share the story of Christ with people who may have never heard the story of what God did for them. You will see God open eyes and hearts as he speaks through you to the people of East Asia.',
            'contact'             => 'Jamie Davis',
            'contact_email'       => 'jamied@faithpromise.org',
            'is_full'             => 0,
            'starts_at'           => Carbon::now()->addDays(70),
            'ends_at'             => Carbon::now()->addDays(76),
            'created_at'          => Carbon::now(),
            'updated_at'          => Carbon::now()
        ]);

        DB::table('mission_trips')->insert([
            'mission_location_id' => MissionLocation::where('ident', '=', 'south-africa')->first()->id,
            'cost'                => '$3,000',
            'seats'               => null,
            'description'         => 'This team will partner with Faith Promise?s very own, Chris Ladd and will assist in the work he is doing with the Children?s Cup (http://www.childrenscup.org/).',
            'contact'             => 'Zac Stephens',
            'contact_email'       => 'zacs@faithpromise.org',
            'is_full'             => 0,
            'starts_at'           => Carbon::now()->addDays(10),
            'ends_at'             => Carbon::now()->addDays(16),
            'created_at'          => Carbon::now(),
            'updated_at'          => Carbon::now()
        ]);
    }
}
