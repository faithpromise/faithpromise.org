<?php

namespace App\Http\Controllers;

use FaithPromise\Shared\Models\BiblePlan;
use FaithPromise\Shared\Models\Campus;
use FaithPromise\Shared\Models\Event;
use FaithPromise\Shared\Models\Ministry;
use FaithPromise\Shared\Models\Missionary;
use FaithPromise\Shared\Models\MissionLocation;
use FaithPromise\Shared\Models\MissionTrip;
use FaithPromise\Shared\Models\Organization;
use FaithPromise\Shared\Models\Series;
use FaithPromise\Shared\Models\Staff;
use App\TagGroup;
use FaithPromise\Shared\Models\Video;
use FaithPromise\Shared\Models\Team;
use FaithPromise\Shared\Models\VolunteerPosition;
use FaithPromise\Shared\Models\VolunteerSkill;
use Conner\Tagging\Tag;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\DB;

class MigrateController extends BaseController {

    public function index() {
        return '
            <a href="' . route('migrate') . '">migrate all</a><br>
            <a href="' . route('migrateCampuses') . '">campuses</a><br>
            <a href="' . route('migrateEvents') . '">events</a><br>
            <a href="' . route('migrateSeries') . '">series</a><br>
            <a href="' . route('migrateStaff') . '">staff</a><br>
            <a href="' . route('migrateMissions') . '">missions</a><br>
            <a href="' . route('migrateVolunteer') . '">volunteer positions</a><br>
        ';
    }

    public function migrate() {

        $this->importBiblePlan();
        $this->migrateCampuses();
        $this->migrateEvents();
        $this->migrateSeries();
        $this->migrateStaff();
        $this->migrateMissions();
        $this->migrateVolunteer();

        return 'migrated all data';
    }

    public function migrateCampuses() {
        $this->importCampuses();
        return 'migrated campuses';
    }

    public function migrateEvents() {
        $this->importEvents();
        return 'migrated events';
    }

    public function migrateSeries() {
        $this->importSeries();
        $this->importVideos();
        return 'migrated series and videos';
    }

    public function migrateStaff() {
        $this->importStaff();
        $this->importMinistries();
        $this->importTeams();
        $this->importStaffMinistries();
        $this->importStaffTeams();
        return 'migrated staff, ministries, and teams';
    }

    public function migrateMissions() {
        $this->importMissionLocations();
        $this->importMissionTrips();
        $this->importMissionaries();
        $this->importOrganizations();
        return 'migrated mission locations, trips, missionaries, and organizations';
    }

    public function migrateVolunteer() {
        $this->importVolunteerSkills();
        $this->importVolunteerPositions();
        return 'migrated volunteer positions';
    }

    private function importBiblePlan() {

        $table = 'bible_plan';
        $items = $this->getBiblePlan();
        BiblePlan::unguard();

        DB::table($table)->truncate();

        foreach ($items as $item) {
            $model = new BiblePlan(get_object_vars($item));
            $model->save();
        }
    }

    private function importOrganizations() {

        $table = 'organizations';
        $items = $this->getOrganizations();
        Organization::unguard();

        DB::table($table)->truncate();

        foreach ($items as $item) {
            $model = new Organization(get_object_vars($item));
            $model->save();
        }
    }

    private function importCampuses() {

        $table = 'campuses';
        $items = $this->getCampuses();
        Campus::unguard();

        DB::table($table)->truncate();

        foreach ($items as $item) {
            $model = new Campus(get_object_vars($item));
            $model->save();
        }
    }

    private function importEvents() {

        $table = 'events';
        $items = $this->getEvents();
        Event::unguard();

        DB::table($table)->truncate();

        foreach ($items as $item) {

            $data = get_object_vars($item);
            $ministry_slug = $data['ministry_slug'];
            unset($data['ministry_slug']);

            $ministry = Ministry::findBySlug($ministry_slug);
            if (!is_null($ministry)) {
                $data['ministry_id'] = $ministry->id;
            }

            $model = new Event($data);

            $model->save();

        }
    }

    private function importSeries() {

        $table = 'series';
        $items = $this->getSeries();
        Series::unguard();

        DB::table($table)->truncate();

        foreach ($items as $item) {
            $model = new Series(get_object_vars($item));
            $model->save();
        }
    }

    private function importVideos() {

        $table = 'videos';
        $items = $this->getVideos();
        Video::unguard();

        DB::table($table)->truncate();

        foreach ($items as $item) {

            $series = Series::findBySlug($item->series_slug);
            $speaker = Staff::findBySlug($item->speaker_slug);

            $data = get_object_vars($item);
            unset($data['series_slug']);
            unset($data['speaker_slug']);

            $model = new Video($data);
            $model->series_id = $series->id;
            $model->speaker_id = is_null($speaker) ? null : $speaker->id;
            $model->save();

        }
    }

    private function importStaff() {

        $table = 'staff';
        $items = $this->getStaff();
        Staff::unguard();

        DB::table($table)->truncate();

        foreach ($items as $item) {

            $campus = Campus::findBySlug($item->campus_slug);

            $data = get_object_vars($item);
            unset($data['campus_slug']);

            $model = new Staff($data);
            $model->campus_id = is_null($campus) ? null : $campus->id;
            $model->save();
        }
    }

    private function importMinistries() {

        $table = 'ministries';
        $items = $this->getMinistries();
        Ministry::unguard();

        DB::table($table)->truncate();

        foreach ($items as $item) {
            $model = new Ministry(get_object_vars($item));
            $model->save();
        }
    }

    private function importTeams() {

        $table = 'teams';
        $items = $this->getTeams();
        Team::unguard();

        DB::table($table)->truncate();

        foreach ($items as $item) {
            $model = new Team(get_object_vars($item));
            $model->save();
        }
    }

    private function importStaffMinistries() {

        $table = 'staff_ministry';
        $items = $this->getStaffMinistries();

        DB::table($table)->truncate();

        foreach ($items as $item) {

            if (is_null($item->ministry_slug)) {
                continue;
            }

            $staff = Staff::withTrashed()->where('slug', '=', $item->staff_slug)->first();
            $ministry = Ministry::findBySlug($item->ministry_slug);
            $staff->ministries()->attach($ministry->id);
        }
    }

    private function importStaffTeams() {

        $table = 'staff_team';
        $items = $this->getStaffTeams();

        DB::table($table)->truncate();

        foreach ($items as $item) {

            if (is_null($item->team_slug)) {
                continue;
            }

            $staff = Staff::withTrashed()->where('slug', '=', $item->staff_slug)->first();
            $team = Team::findBySlug($item->team_slug);
            $staff->teams()->attach($team->id);
        }
    }

    private function importMissionLocations() {

        $table = 'mission_locations';
        $items = $this->getMissionLocations();
        MissionLocation::unguard();

        DB::table($table)->truncate();

        foreach ($items as $item) {
            $model = new MissionLocation(get_object_vars($item));
            $model->save();
        }
    }

    private function importMissionTrips() {

        $table = 'mission_trips';
        $items = $this->getMissionTrips();
        MissionTrip::unguard();

        DB::table($table)->truncate();

        foreach ($items as $item) {

            $location = MissionLocation::findBySlug($item->location_slug);

            $data = get_object_vars($item);
            unset($data['location_slug']);

            $model = new MissionTrip($data);
            $model->mission_location_id = is_null($location) ? null : $location->id;
            $model->save();
        }
    }

    private function importMissionaries() {

        $table = 'missionaries';

        Missionary::unguard();

        DB::table($table)->truncate();

        $missionary = new Missionary([
            'slug'                => 'beukemas',
            'name'                => 'The Beukemas',
            'mission_location_id' => MissionLocation::where('slug', '=', 'jamaica')->first()->id,
            'url'                 => 'http://bkbeukema.org'
        ]);
        $missionary->save();

        $missionary = new Missionary([
            'slug'                => 'coplands',
            'name'                => 'The Coplands',
            'mission_location_id' => MissionLocation::where('slug', '=', 'italy')->first()->id,
            'url'                 => 'http://nickandshannan.org'
        ]);
        $missionary->save();

        $missionary = new Missionary([
            'slug'                => 'chris-ladd',
            'name'                => 'Chris Ladd',
            'mission_location_id' => MissionLocation::where('slug', '=', 'south-africa')->first()->id,
            'url'                 => 'http://chrisleeladd.com'
        ]);
        $missionary->save();

        $missionary = new Missionary([
            'slug'                => 'julie-rumph',
            'name'                => 'Julie Rumph',
            'mission_location_id' => MissionLocation::where('slug', '=', 'south-africa')->first()->id,
            'url'                 => 'http://julierumph.com'
        ]);
        $missionary->save();
    }

    private function importVolunteerSkills() {

        $table = 'volunteer_skills';

        VolunteerSkill::unguard();

        DB::table($table)->truncate();

        $skills = [
            [
                'title' => 'Technical',
                'description' => ''
            ],
            [
                'title' => 'Administrative',
                'description' => ''
            ],
            [
                'title' => 'Crafty',
                'description' => ''
            ],
            [
                'title' => 'Musical',
                'description' => ''
            ],
            [
                'title' => 'Muscles',
                'description' => ''
            ],
            [
                'title' => 'Hospitality',
                'description' => ''
            ],
            [
                'title' => 'Discipleship',
                'description' => ''
            ],
            [
                'title' => 'Prayer',
                'description' => ''
            ],
            [
                'title' => 'Food',
                'description' => ''
            ]
        ];

        foreach($skills as $skill) {
            VolunteerSkill::create($skill);
        }

    }

    private function importVolunteerPositions() {

        $table = 'volunteer_positions';

        VolunteerPosition::unguard();

        DB::table($table)->truncate();

        $positions = [
            [
                'ministry_id' => Ministry::findBySlug('administration')->id,
                'skill_id' => VolunteerSkill::where('title', 'Administration')->first()->id,
                'title' => 'Events Team',
                'description' => 'From setting up and tearing down tables and chairs to researching and creating innovative table decorations, we need a variety of people on our Events team.',
                'availability' => '',
                'commitment' => 'From once a month to seasonal'
            ],
            [
                'ministry_id' => Ministry::findBySlug('administration')->id,
                'skill_id' => VolunteerSkill::where('title', 'Administration')->first()->id,
                'title' => 'Reception Team',
                'description' => 'If you\'re a people person, we have just the job for you! We need willing volunteers to greet guests at our Pellissippi Campus reception desk throughout the week.',
                'availability' => 'Mon-Thu 12-1pm, the 4th Tue of each month from 12-2pm, random fill-in for receptionist',
                'commitment' => 'Time commitments are up to you!'
            ],
            [
                'ministry_id' => Ministry::findBySlug('administration')->id,
                'skill_id' => VolunteerSkill::where('title', 'Administration')->first()->id,
                'title' => 'Organizing/Shopping Team',
                'description' => 'Love to be around town? We need volunteer shoppers to pick up various ministry orders and deliver them to the church. If you love to organize, we could use an expert organizer to keep our kitchen and copy rooms stocked and orderly on a monthly basis. Could be a great project for a group!',
                'availability' => '',
                'commitment' => 'Flexible'
            ],
            [
                'ministry_id' => Ministry::findBySlug('administration')->id,
                'skill_id' => VolunteerSkill::where('title', '')->first()->id,
                'title' => '',
                'description' => '',
                'availability' => '',
                'commitment' => ''
            ],
            [
                'ministry_id' => Ministry::findBySlug('celebrate')->id,
                'skill_id' => VolunteerSkill::where('title', 'Prayer')->first()->id,
                'title' => 'Prayer Volunteer',
                'description' => 'These teams meet at 6:30 on Monday nights in Satellite-1 at our Pellissippi Campus. Teams are needed to pray individually and corporately for people as needs arise. These teams will also participate in group prayer for overall protection and guidance during the service and prayer time.',
                'availability' => 'Mondays at 6:30 PM',
                'commitment' => '2-3 hours per week'
            ],
            [
                'ministry_id' => Ministry::findBySlug('celebrate')->id,
                'skill_id' => VolunteerSkill::where('title', '')->first()->id,
                'title' => 'Celebrate Recovery Group Leader',
                'description' => 'These leaders provide people with a safe environment to navigate their road to recovery and grow in their walk with God.',
                'availability' => '',
                'commitment' => ''
            ],
            [
                'ministry_id' => Ministry::findBySlug('facilities')->id,
                'skill_id' => VolunteerSkill::where('title', '')->first()->id,
                'title' => 'Baptistry Prep',
                'description' => 'This rotating team is responsible for filling and draining the baptistry as needed.',
                'availability' => '',
                'commitment' => ''
            ],
            [
                'ministry_id' => Ministry::findBySlug('facilities')->id,
                'skill_id' => VolunteerSkill::where('title', '')->first()->id,
                'title' => 'Coffee Kiosk',
                'description' => 'This team of people serve one service per month and are responsible to keep the coffee kiosk area stocked so that our guests have an optimal coffee experience when they visit.',
                'availability' => 'During weekend service',
                'commitment' => ''
            ],
            [
                'ministry_id' => Ministry::findBySlug('facilities')->id,
                'skill_id' => VolunteerSkill::where('title', '')->first()->id,
                'title' => 'Maintenance',
                'description' => 'We need volunteers who are able to commit to weekly or monthly service in each of the following areas: room setup and tear down, cleaning, light bulb replacement (using the Faith Promise lift), moving our Pellissippi Campus street sign to the bottom of the hill (truck required), emptying our office recycle bins on Mondays and Wednesdays, and painting.',
                'availability' => '',
                'commitment' => ''
            ],
            [
                'ministry_id' => Ministry::findBySlug('first-impressions')->id,
                'skill_id' => VolunteerSkill::where('title', '')->first()->id,
                'title' => 'Greeter',
                'description' => 'Help us provide a friendly first impression for all weekend attendees. Responsibilities include handing out worship guides, directing families to the Family Registration area, answering questions, shaking hands, and smiling..',
                'availability' => '',
                'commitment' => '1 hour per week'
            ],
            [
                'ministry_id' => Ministry::findBySlug('first-impressions')->id,
                'skill_id' => VolunteerSkill::where('title', '')->first()->id,
                'title' => 'Information (IFP)',
                'description' => 'Provide information and guest services to visitors and members.  This is a team of people who are friendly, approachable, and welcoming. Serve at the Information Kiosk and answer general and ministry-specific questions about FPC.',
                'availability' => '1 service per week or biweekly',
                'commitment' => '30 min before and 20 min after service'
            ],
            [
                'ministry_id' => Ministry::findBySlug('first-impressions')->id,
                'skill_id' => VolunteerSkill::where('title', '')->first()->id,
                'title' => 'Parking Lot Ministry',
                'description' => 'This team provides a friendly first-touch for all weekend attendees. Responsibilities include directing traffic and helping people get from their cars to the building.  If you have a friendly smile and a helpful attitude, we\'d love to talk with you about joining our team.',
                'availability' => '',
                'commitment' => '1 hour each weekend'
            ],
            [
                'ministry_id' => Ministry::findBySlug('first-impressions')->id,
                'skill_id' => VolunteerSkill::where('title', '')->first()->id,
                'title' => 'Usher',
                'description' => 'Are you an outgoing, friendly, and helpful person?  We need you to help attendees find seats during the weekend services.',
                'availability' => '',
                'commitment' => ' 1 hour each weekend'
            ],
            [
                'ministry_id' => Ministry::findBySlug('fpkids')->id,
                'skill_id' => VolunteerSkill::where('title', '')->first()->id,
                'title' => 'Birth-Preschool Small Group Leader',
                'description' => 'Our fpKids Small Group Leaders connect with preschool children and their parents to provide a fun and safe atmosphere and teach prepared Bible-based lessons.  If you love small kids and want to make a difference in their lives, consider joining our team of volunteers.',
                'availability' => '',
                'commitment' => '1.5 hours either weekly or every other week'
            ],
            [
                'ministry_id' => Ministry::findBySlug('fpkids')->id,
                'skill_id' => VolunteerSkill::where('title', '')->first()->id,
                'title' => 'K-5th Large Group Greeter',
                'description' => 'Give a big smile and say hello to the kids as they enter and help them find a seat.',
                'availability' => '',
                'commitment' => ''
            ],
            [
                'ministry_id' => Ministry::findBySlug('fpkids')->id,
                'skill_id' => VolunteerSkill::where('title', '')->first()->id,
                'title' => 'K-5th Large Group Greeter',
                'description' => 'Give a big smile and say hello to the kids as they enter and help them find a seat.',
                'availability' => '',
                'commitment' => ''
            ],
            [
                'ministry_id' => Ministry::findBySlug('fpkids')->id,
                'skill_id' => VolunteerSkill::where('title', '')->first()->id,
                'title' => 'K-5th Large Group Host',
                'description' => 'Larger-than-life onstage personality who isn\'t afraid to get a pie in the face.',
                'availability' => '',
                'commitment' => ''
            ],
            [
                'ministry_id' => Ministry::findBySlug('fpkids')->id,
                'skill_id' => VolunteerSkill::where('title', '')->first()->id,
                'title' => 'Storyteller',
                'description' => 'Engaging Bible Teacher.',
                'availability' => '',
                'commitment' => ''
            ],
            [
                'ministry_id' => Ministry::findBySlug('fpkids')->id,
                'skill_id' => VolunteerSkill::where('title', '')->first()->id,
                'title' => 'K-5th Small Group Leader',
                'description' => 'This position is the heart of our grade-school ministry. Small Group Leaders connect relationally with kids in the small group setting through age-specific activities. Small Group Leaders thrive in making a difference in a child\'s life and in the life of their families as they see kids grow in the Lord.',
                'availability' => '',
                'commitment' => '1.5 hours either weekly or every other week'
            ],
            [
                'ministry_id' => Ministry::findBySlug('fpkids')->id,
                'skill_id' => VolunteerSkill::where('title', '')->first()->id,
                'title' => 'Technical Team',
                'description' => 'This team assists with audio and video equipment during our large group time. Work with our storytellers and worship leaders to enhance the large group experience.',
                'availability' => '',
                'commitment' => '30 minutes either weekly or every other week'
            ],
            [
                'ministry_id' => Ministry::findBySlug('fpkids')->id,
                'skill_id' => VolunteerSkill::where('title', '')->first()->id,
                'title' => 'Service Coordinators',
                'description' => 'These volunteers are organized and are "take charge" kind of people. The fpKiDS staff needs help during each service with coordinating volunteers, helping parents, restocking resources and other types of trouble-shooting.',
                'availability' => '',
                'commitment' => '1.5 hours weekly'
            ],
            [
                'ministry_id' => Ministry::findBySlug('fpkids')->id,
                'skill_id' => VolunteerSkill::where('title', '')->first()->id,
                'title' => 'Security',
                'description' => 'ou can help us make sure that fpKiDS is a safe environment for the children and that no one is in the kids area who isn\'t supposed to be there.',
                'availability' => '',
                'commitment' => '1.5 hours weekly or every other week'
            ],
            [
                'ministry_id' => Ministry::findBySlug('fpkids')->id,
                'skill_id' => VolunteerSkill::where('title', '')->first()->id,
                'title' => 'Behind the Scenes',
                'description' => 'It takes a lot of work to get ready for the weekend in fpKiDS. We need volunteers to help us gather materials, get everything ready and the rooms set.',
                'availability' => 'Weekdays',
                'commitment' => 'Flexible'
            ],
            [
                'ministry_id' => Ministry::findBySlug('fpkids')->id,
                'skill_id' => VolunteerSkill::where('title', '')->first()->id,
                'title' => 'Family Registration',
                'description' => 'We want families to feel comfortable right away. We need warm, smiling faces to check in new families on the weekend and get them acquainted with our church. You can either work behind a computer or walk the family to their child\'s room. Both roles are important to a smooth check-in.',
                'availability' => '',
                'commitment' => '1 hour weekly or every other week'
            ],
            [
                'ministry_id' => Ministry::findBySlug('groups')->id,
                'skill_id' => VolunteerSkill::where('title', '')->first()->id,
                'title' => 'Group Leader',
                'description' => 'Someone who is good with people, who enjoys teaching, and loves watching people grow in their walk with God. This area of serving is very rewarding as well as fun!',
                'availability' => '',
                'commitment' => ''
            ],
            [
                'ministry_id' => Ministry::findBySlug('groups')->id,
                'skill_id' => VolunteerSkill::where('title', '')->first()->id,
                'title' => 'Host Home',
                'description' => 'Someone who serves in Groups Ministry as a host home offers their home as a meeting place for a small group to meet.',
                'availability' => '',
                'commitment' => ''
            ],
            [
                'ministry_id' => Ministry::findBySlug('groups')->id,
                'skill_id' => VolunteerSkill::where('title', '')->first()->id,
                'title' => 'Writers',
                'description' => 'Help with curriculum for small groups. A person who is creative in their writing and is able to come up with different sets of questions would be perfect for this position.',
                'availability' => '',
                'commitment' => ''
            ],
            [
                'ministry_id' => Ministry::findBySlug('groups')->id,
                'skill_id' => VolunteerSkill::where('title', '')->first()->id,
                'title' => 'Event Setup',
                'description' => 'Assist staff with setting up tables and chairs and placing decorations and materials on tables on designated weekends.',
                'availability' => '',
                'commitment' => ''
            ],
            [
                'ministry_id' => Ministry::findBySlug('groups')->id,
                'skill_id' => VolunteerSkill::where('title', '')->first()->id,
                'title' => 'Event Cleanup',
                'description' => 'Assist staff with tearing down tables and chairs and cleaning up any decorations and materials that may have been used.',
                'availability' => '',
                'commitment' => ''
            ],
            [
                'ministry_id' => Ministry::findBySlug('groups')->id,
                'skill_id' => VolunteerSkill::where('title', '')->first()->id,
                'title' => 'Event Registration',
                'description' => 'Assist staff with checking people in on designated weekends for specific events.',
                'availability' => '',
                'commitment' => ''
            ],
            [
                'ministry_id' => Ministry::findBySlug('groups')->id,
                'skill_id' => VolunteerSkill::where('title', '')->first()->id,
                'title' => 'Administration and Phone Contacts',
                'description' => 'Assist staff with making follow up phone calls with people who have attended different classes and or connection events. These calls will help others feel included and answer their questions.',
                'availability' => '',
                'commitment' => ''
            ],
            [
                'ministry_id' => Ministry::findBySlug('')->id,
                'skill_id' => VolunteerSkill::where('title', '')->first()->id,
                'title' => '',
                'description' => '',
                'availability' => '',
                'commitment' => ''
            ]
        ];

        foreach($positions as $position) {
            VolunteerPosition::create($position);
        }
    }

    private function getBiblePlan() {
        $sql = <<<EOT
            SELECT day, passage, sort
            FROM bibleplan;
EOT;

        return $this->runSql($sql);
    }

    private function getCampuses() {
        $sql = <<<EOT
            SELECT
                IF(c.CampusIdent = 'pel','pellissippi', c.CampusIdent) AS slug
                ,REPLACE(c.CampusName, ' Campus', '') AS `name`
                ,REPLACE(c.CampusLocation, ', TN', '') AS location
                ,c.CampusStreet AS address
                ,c.CampusCity AS city
                ,c.CampusState AS state
                ,c.CampusZip As zip
                ,c.CampusLatitude AS lat
                ,c.CampusLongitude AS lng
                ,c.times
                ,c.map_url
                ,c.directions_url
                ,c.CampusDisplayOrder AS sort
            FROM campus c;
EOT;

        return $this->runSql($sql);
    }

    private function getEvents() {
        $sql = <<<EOT
            SELECT
                COALESCE(NewsIdent, LOWER(REPLACE(REPLACE(REPLACE(REPLACE(NewsTitle, ' ', '-'), '"', ''), '''', '') , ':', ''))) as slug
                ,NewsTitle as title
                ,NewsDates as dates_text
                ,CONCAT(NewsIdent, '.jpg') as image
                ,NewsShortDescription as excerpt
                ,NewsDescription as description
                ,NewsPublishDate as publish_at
                ,NewsExpireDate as expire_at
                ,NewsPlaceOnHomePage as is_featured
                ,NewsSort as sort
                ,NewsDateCreated as created_at
                ,NewsDateModified as updated_at
                ,ministry as ministry_slug
                ,IF(NewsLinkURL = '/events', NULL, NewsLinkURL) AS url
            FROM newsupdate;
EOT;

        return $this->runSql($sql);
    }

    private function getSeries() {
        $sql = <<<EOT
            SELECT
                s.SeriesIdent AS slug
                ,s.SeriesTitle as title
                ,s.SeriesDescription as description
                ,s.is_official_series as is_official
                ,s.begin_date as starts_at
                ,s.SeriesDateCreated AS publish_at
                ,s.SeriesDateCreated as created_at
                ,s.SeriesDateModified as updated_at
            FROM series s
                LEFT JOIN seriesMedia m ON s.SeriesID = m.SeriesID
            WHERE s.SeriesDateCreated IS NOT NULL
	            AND (
	                (m.MediaVimeoID IS NOT NULL OR m.MediaAudioURL IS NOT NULL)
	                OR begin_date >= '2015-08-22 00:00:00'
                )
            GROUP BY s.SeriesID;
EOT;

        return $this->runSql($sql);
    }

    private function getVideos() {
        $sql = <<<EOT
            SELECT
                sr.SeriesIdent AS series_slug
                ,TRIM(s.StaffIdent) as speaker_slug
                ,IF(m.MediaIdent = 'trailer', 'promo', m.MediaIdent) AS slug
                ,m.MediaType AS type
                ,IF(m.MediaTitle = 'Trailer', 'Series Promo', m.MediaTitle) AS title
                ,m.MediaDescription AS description
                ,m.MediaVimeoID AS vimeo_id
                ,m.MediaVimeoASL AS vimeo_id_asl
                ,m.MediaAudioURL AS audio_file
                ,DATE_FORMAT(m.MediaDateTime, '%Y-%m-%d') AS sermon_date
                ,p.PersonDisplayName AS speaker_name
                ,m.MediaDateTime AS publish_at
                ,coalesce(m.MediaDateCreated, m.MediaDateTime) as created_at
                ,coalesce(m.MediaDateModified, m.MediaDateTime) as updated_at
            FROM seriesmedia m
                JOIN series sr ON m.SeriesID = sr.SeriesID
                LEFT JOIN person p ON m.MediaAuthorID = p.PersonID
                LEFT JOIN staff s ON p.PersonID = s.StaffID
            WHERE m.SeriesID IN (select seriesid from series where SeriesDateCreated IS NOT NULL)
        	    AND (m.MediaVimeoID IS NOT NULL OR m.MediaAudioURL IS NOT NULL)
            ORDER BY m.MediaDateTime ASC;
EOT;

        return $this->runSql($sql);
    }

    private function getStaff() {
        $sql = <<<EOT
            SELECT
                IF(s.campuses = 'pel','pellissippi', s.campuses) AS campus_slug
                ,TRIM(s.StaffIdent) AS slug
                ,p.PersonFirstName AS first_name
                ,p.PersonLastName AS last_name
                ,p.PersonDisplayName AS display_name
                ,p.PersonTwitter AS twitter
                ,p.PersonFacebook AS facebook
                ,p.PersonInstagram AS instagram
                ,s.StaffTitle AS title
                ,p.PersonEmail AS email
                ,s.StaffOfficeExt AS phone_ext
                ,s.StaffBio AS bio
                ,s.new_sort AS sort
                ,s.StaffDateCreated as created_at
                ,s.StaffDateModified as updated_at
                ,(IF(ISNULL(s.StaffDateDeleted) AND s.StaffActive = 1, null, coalesce(s.StaffDateDeleted, NOW()))) AS deleted_at
            FROM staff s
                JOIN person p ON s.PersonID = p.PersonID;
EOT;

        return $this->runSql($sql);
    }

    private function getStaffMinistries() {
        $sql = <<<EOT
            SELECT
                staff_ident AS staff_slug
                ,ministry_ident AS ministry_slug
            FROM staff_ministries;
EOT;

        return $this->runSql($sql);
    }

    private function getStaffTeams() {
        $sql = <<<EOT
            SELECT
                staff_ident AS staff_slug
                ,team_ident AS team_slug
            FROM staff_teams;
EOT;

        return $this->runSql($sql);
    }

    private function getMissionLocations() {
        $sql = <<<EOT
            SELECT
                ident as slug
                ,title as name
                ,is_continual
            FROM mission_locations
            WHERE export = 1;
EOT;

        return $this->runSql($sql);
    }

    private function getMissionTrips() {
        $sql = <<<EOT
            SELECT
                l.ident as location_slug
                ,MissionTitle as title
                ,MissionDate as dates_text
                ,MissionCost as cost
                ,MissionSize as seats
                ,REPLACE(REPLACE(MissionDescription, '\n', ' '), '\r', '') as description
                ,MissionLeader as contact
                ,MissionContact as contact_email
                ,MissionFull as is_full
                ,MissionSort as sort
                ,m.starts_at
                ,COALESCE(m.ends_at, IF(MissionArchive = 1, NOW(), null)) AS ends_at
            FROM missions m
                LEFT JOIN mission_locations l on m.MissionTitle = l.title and l.export = 1;
EOT;

        return $this->runSql($sql);
    }

    private function getMinistries() {
        $sql = <<<EOT
            SELECT
                ident as slug
                ,title
            FROM ministries;
EOT;

        return $this->runSql($sql);
    }

    private function getTeams() {
        $sql = <<<EOT
            SELECT
                ident as slug
                ,title
                ,sort
            FROM teams;
EOT;

        return $this->runSql($sql);
    }

    private function getOrganizations() {
        $sql = 'SELECT * FROM organizations';

        return $this->runSql($sql);
    }

    private function runSql($sql) {
        return DB::connection('old_db')->select($sql);
    }

}