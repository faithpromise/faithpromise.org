<?php

namespace App\Http\Controllers;

use App\BiblePlan;
use App\Campus;
use App\Event;
use App\Ministry;
use App\Missionary;
use App\MissionLocation;
use App\MissionTrip;
use App\Organization;
use App\Series;
use App\Staff;
use App\Video;
use App\Team;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\DB;

class MigrateController extends BaseController {

    public function index() {
        return '<a href="' . route('migrate') . '">migrate</a>';
    }

    public function migrate() {

        $this->importBiblePlan();
        $this->importCampuses();
        $this->importEvents();
        $this->importSeries();
        $this->importVideos();
        $this->importStaff();
        $this->importMinistries();
        $this->importTeams();
        $this->importStaffMinistries();
        $this->importStaffTeams();
        $this->importMissionLocations();
        $this->importMissionTrips();
        $this->importMissionaries();
        $this->importOrganizations();

        return 'done';

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
            $model = new Event(get_object_vars($item));
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
            'url'                 => 'http://julierumph.org'
        ]);
        $missionary->save();
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
                JOIN seriesMedia m ON s.SeriesID = m.SeriesID
            WHERE s.SeriesDateCreated IS NOT NULL
	            AND (m.MediaVimeoID IS NOT NULL OR m.MediaAudioURL IS NOT NULL)
            GROUP BY s.SeriesID;
EOT;

        return $this->runSql($sql);
    }

    private function getVideos() {
        $sql = <<<EOT
            SELECT
                sr.SeriesIdent AS series_slug
                ,TRIM(s.StaffIdent) as speaker_slug
                ,m.MediaIdent AS slug
                ,m.MediaType AS type
                ,m.MediaTitle AS title
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
                ,NULL as starts_at
                ,NULL as ends_at
                ,IF(MissionArchive = 1, NOW(), null) as ends_at
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