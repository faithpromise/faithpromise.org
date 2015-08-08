<?php

use App\Ministry;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class EventsSeeder extends Seeder {
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {

        DB::table('events')->truncate();

        DB::table('events')->insert([
            'ministry_id' => null,
            'title'       => 'Bible Reading Plan & Fast',
            'dates_text'  => 'dates will go here',
            'image'       => 'bible-plan.jpg',
            'excerpt'     => 'Information about our church-wide Bible reading plan and fast...',
            'description' => '<p>Ever considered reading through the Bible? Beginning January 1st, all of Faith Promise will once again begin reading the same <a href="/bibleplan">Bible plan</a> for 2015. In addition, January 5th, we will begin a three-week fast together. Pick up a copy of the devotional booklet at your campus, or <a href="http://blog.faithpromise.org/wp-content/uploads/2015/01/fasting-booklet-inside-2015.pdf" target="_blank">download it here</a>.</p>',
            'is_featured' => 1,
            'publish_at'  => Carbon::now()->startOfYear(),
            'expire_at'   => Carbon::now()->endOfYear(),
            'sort'        => 1,
            'created_at'  => Carbon::now(),
            'updated_at'  => Carbon::now()
        ]);

        DB::table('events')->insert([
            'ministry_id' => Ministry::where('slug', '=', 'fpstudents')->first()->id,
            'title'       => 'Student Conference',
            'dates_text'  => 'dates will go here',
            'image'       => 'student-conference.jpg',
            'excerpt'     => 'We\'re holding a conference for fpStudents this summer at the Pellissippi Campus...',
            'description' => '<p>The Movement Conference "We Are One" July 15th  19th, 2015</p><p>Cost  $149</p><p>We\'re holding a conference for fpStudents this summer at the Pellissippi Campus. It will be a jam-packed, four-night, high-energy experience.</p><p>Students will stay together with their small groups where they will have time to build friendships and learn together from Gods word. We will have corporate Worship with relevant teaching and amazing games. There will also be some special events that they dont want to miss. You do not want your students and or their friends to miss out on an awesome experience.</p><p>Get more info <a href="http://fpstudents.org/c/hsm-pel/?tdo_tag=events">here</a>!</p>',
            'is_featured' => 1,
            'publish_at'  => Carbon::now()->subMonth(1)->startOfDay(),
            'expire_at'   => Carbon::now()->addDays(24)->endOfDay(),
            'sort'        => 1,
            'created_at'  => Carbon::now(),
            'updated_at'  => Carbon::now()
        ]);

        DB::table('events')->insert([
            'ministry_id' => null,
            'title'       => 'Global Leadership Summit',
            'dates_text'  => 'dates will go here',
            'image'       => 'global-leadership-summit.jpg',
            'excerpt'     => 'August 6-7, 2015 at Faith Promise Church. More info...',
            'description' => '<p>Ready to join our staff team and get a wold-class infusion of leadership training? Whether you lead a small group, your family, a business, or a team, you have influence.</p><p>Sharpen your skills with us this August 6-7, 2015, as Faith Promise Church once again hosts the Global Leadership Summit. Both our Pellissippi & Blount Campuses are host site locations.<p>Check out this year\'s speaker lineup and register, <a href="/summit">here</a>.</p>',
            'is_featured' => 1,
            'publish_at'  => Carbon::now()->subMonth(2)->startOfDay(),
            'expire_at'   => Carbon::now()->addDays(39)->endOfDay(),
            'sort'        => 1,
            'created_at'  => Carbon::now(),
            'updated_at'  => Carbon::now()
        ]);

        DB::table('events')->insert([
            'ministry_id' => Ministry::where('slug', '=', 'groups')->first()->id,
            'title'       => 'Groups Conference',
            'dates_text'  => 'dates will go here',
            'image'       => 'groups-conference.jpg',
            'excerpt'     => 'A gathering for group leaders & those interested in leading a group.',
            'description' => '<p>Since groups are an integral part of what we do at Faith Promise, our group leaders are very important to us. We want to equip our leaders to Encounter God, Embrace Others, Engage the World Around Us, and Expand Gods Kingdom through their group</p><p>Whether you are an existing leader or you would like to know more about group leadership at Faith Promise, please register for the Come Alive Groups Conference on August 14-15 at the Pellissippi Campus. We will meet Friday from 6-9 pm and Saturday from 8:30 am-12:00 pm. Dinner on Friday and breakfast on Saturday will be provided. Childcare is also available by reservation.</p><p><a href="https://integration.fellowshipone.com/integration/FormBuilder/FormBuilder.aspx?fCode=UXhEPpYn8C4a/EjQxDmscA==&cCode=RtKBDolfiPuZJp8o1+0ARA==" target="_blank">Register here</a>.</p>',
            'is_featured' => 1,
            'publish_at'  => Carbon::now()->subMonth(2)->startOfDay(),
            'expire_at'   => Carbon::now()->addDays(31)->startOfDay(),
            'sort'        => 1,
            'created_at'  => Carbon::now(),
            'updated_at'  => Carbon::now()
        ]);

        DB::table('events')->insert([
            'ministry_id' => Ministry::where('slug', '=', 'fpkids')->first()->id,
            'title'       => 'Child Dedications',
            'dates_text'  => 'dates will go here',
            'image'       => 'child-dedications.jpg',
            'excerpt'     => 'Want your child to be dedicated in a worship service?',
            'description' => '<p>Do you ever wonder how youll survive parenthood? Making the commitment to raise your child to follow Jesus is an excellent first step, and we want to be a part of that decision. Let us join you on this journey! Child Dedications will be held on September 15th.  For more info or to register, <a href="/dedication">click here</a>.</p>',
            'is_featured' => 1,
            'publish_at'  => Carbon::now()->subMonth(2)->startOfDay(),
            'expire_at'   => Carbon::now()->addDays(31)->startOfDay(),
            'sort'        => 1,
            'created_at'  => Carbon::now(),
            'updated_at'  => Carbon::now()
        ]);

        DB::table('events')->insert([
            'ministry_id' => Ministry::where('slug', '=', 'fpkids')->first()->id,
            'title'       => 'fpKids Summer Camp',
            'dates_text'  => 'dates will go here',
            'image'       => 'kids-camp.jpg',
            'excerpt'     => 'Want your child to be dedicated in a worship service?',
            'description' => '<p>We\'re packing up fpKIDS and heading to Dayton, TN!  We can\'t wait to take your child for a fun-filled week of summer camp, June 23-26.  Make sure your fpKID doesn\'t miss out!  <a href="http://blog.faithpromise.org/2014/03/fpkids-summer-camp-2014/" target="_blank"">Register here!</a>',
            'is_featured' => 1,
            'publish_at'  => Carbon::now()->subMonth(2)->startOfDay(),
            'expire_at'   => Carbon::now()->addDays(40)->startOfDay(),
            'sort'        => 1,
            'created_at'  => Carbon::now(),
            'updated_at'  => Carbon::now()
        ]);
    }
}

