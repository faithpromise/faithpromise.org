<?php

use App\Ministry;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class EventsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table('events')->truncate();

        DB::table('events')->insert([
            'ministry_id' => null,
            'ident'       => 'bible-reading-plan',
            'title'       => 'Bible Reading Plan & Fast',
            'image'       => 'bible-plan.jpg',
            'excerpt'     => 'Information about our church-wide Bible reading plan and fast...',
            'description' => '<p>Ever considered reading through the Bible? Beginning January 1st, all of Faith Promise will once again begin reading the same <a href="/bibleplan">Bible plan</a> for 2015. In addition, January 5th, we will begin a three-week fast together. Pick up a copy of the devotional booklet at your campus, or <a href="http://blog.faithpromise.org/wp-content/uploads/2015/01/fasting-booklet-inside-2015.pdf" target="_blank">download it here</a>.</p>',
            'is_featured' => 1,
            'starts_at'   => Carbon::now()->month(1)->day(1)->hour(0)->minute(0)->second(0),
            'ends_at'     => Carbon::now()->month(12)->day(31)->hour(23)->minute(59)->second(59),
            'publish_at'  => Carbon::now()->month(1)->day(1)->hour(0)->minute(0)->second(0),
            'expires_at'  => Carbon::now()->month(12)->day(31)->hour(23)->minute(59)->second(59),
            'sort'        => 1,
            'created_at'  => Carbon::now(),
            'updated_at'  => Carbon::now()
        ]);

        DB::table('events')->insert([
            'ministry_id' => Ministry::whereIdent('fpstudents')->first()->id,
            'ident'       => 'student-conference',
            'title'       => 'Student Conference',
            'image'       => 'student-conference.jpg',
            'excerpt'     => 'We\'re holding a conference for fpStudents this summer at the Pellissippi Campus...',
            'description' => '<p>The Movement Conference "We Are One" July 15th  19th, 2015</p><p>Cost  $149</p><p>We\'re holding a conference for fpStudents this summer at the Pellissippi Campus. It will be a jam-packed, four-night, high-energy experience.</p><p>Students will stay together with their small groups where they will have time to build friendships and learn together from Gods word. We will have corporate Worship with relevant teaching and amazing games. There will also be some special events that they dont want to miss. You do not want your students and or their friends to miss out on an awesome experience.</p><p>Get more info <a href="http://fpstudents.org/c/hsm-pel/?tdo_tag=events">here</a>!</p>',
            'is_featured' => 1,
            'starts_at'   => Carbon::now()->addDays(20)->hour(0)->minute(0)->second(0),
            'ends_at'     => Carbon::now()->addDays(24)->hour(0)->minute(0)->second(0),
            'publish_at'  => Carbon::now()->subMonth(1)->hour(0)->minute(0)->second(0),
            'expires_at'  => Carbon::now()->addDays(25)->hour(0)->minute(0)->second(0),
            'sort'        => 1,
            'created_at'  => Carbon::now(),
            'updated_at'  => Carbon::now()
        ]);

        DB::table('events')->insert([
            'ministry_id' => null,
            'ident'       => 'global-leadership-summit',
            'title'       => 'Global Leadership Summit',
            'image'       => 'global-leadership-summit.jpg',
            'excerpt'     => 'August 6-7, 2015 at Faith Promise Church. More info...',
            'description' => '<p>Ready to join our staff team and get a wold-class infusion of leadership training? Whether you lead a small group, your family, a business, or a team, you have influence.</p><p>Sharpen your skills with us this August 6-7, 2015, as Faith Promise Church once again hosts the Global Leadership Summit. Both our Pellissippi & Blount Campuses are host site locations.<p>Check out this year\'s speaker lineup and register, <a href="/summit">here</a>.</p>',
            'is_featured' => 1,
            'starts_at'   => Carbon::now()->addDays(38)->hour(0)->minute(0)->second(0),
            'ends_at'     => Carbon::now()->addDays(39)->hour(0)->minute(0)->second(0),
            'publish_at'  => Carbon::now()->subMonth(2)->hour(0)->minute(0)->second(0),
            'expires_at'  => Carbon::now()->addDays(40)->hour(0)->minute(0)->second(0),
            'sort'        => 1,
            'created_at'  => Carbon::now(),
            'updated_at'  => Carbon::now()
        ]);

        DB::table('events')->insert([
            'ministry_id' => Ministry::whereIdent('groups')->first()->id,
            'ident'       => 'groups-conference',
            'title'       => 'Groups Conference',
            'image'       => 'groups-conference.jpg',
            'excerpt'     => 'A gathering for group leaders & those interested in leading a group.',
            'description' => '<p>Since groups are an integral part of what we do at Faith Promise, our group leaders are very important to us. We want to equip our leaders to Encounter God, Embrace Others, Engage the World Around Us, and Expand Gods Kingdom through their group</p><p>Whether you are an existing leader or you would like to know more about group leadership at Faith Promise, please register for the Come Alive Groups Conference on August 14-15 at the Pellissippi Campus. We will meet Friday from 6-9 pm and Saturday from 8:30 am-12:00 pm. Dinner on Friday and breakfast on Saturday will be provided. Childcare is also available by reservation.</p><p><a href="https://integration.fellowshipone.com/integration/FormBuilder/FormBuilder.aspx?fCode=UXhEPpYn8C4a/EjQxDmscA==&cCode=RtKBDolfiPuZJp8o1+0ARA==" target="_blank">Register here</a>.</p>',
            'is_featured' => 1,
            'starts_at'   => Carbon::now()->addDays(30)->hour(0)->minute(0)->second(0),
            'ends_at'     => Carbon::now()->addDays(31)->hour(0)->minute(0)->second(0),
            'publish_at'  => Carbon::now()->subMonth(2)->hour(0)->minute(0)->second(0),
            'expires_at'  => Carbon::now()->addDays(32)->hour(0)->minute(0)->second(0),
            'sort'        => 1,
            'created_at'  => Carbon::now(),
            'updated_at'  => Carbon::now()
        ]);
    }
}

