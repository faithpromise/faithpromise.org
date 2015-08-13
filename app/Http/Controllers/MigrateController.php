<?php

namespace App\Http\Controllers;

use App\Campus;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\DB;

class MigrateController extends BaseController {

    public function index() {
        return '<a href="' . route('migrate') . '">migrate</a>';
    }

    public function migrate() {

        $this->importCampuses();

        return 'done';

    }

    private function importCampuses() {

        $table = 'campuses';
        $items = $this->getCampuses();
        Campus::unguard();

        DB::table($table)->truncate();

        foreach($items as $item) {
            $model = new Campus(get_object_vars($item));
            $model->save();
        }
    }

    private function getCampuses() {
        $sql = <<<EOT
            SELECT
                c.CampusID as id
                ,IF(c.CampusIdent = 'pel'
                ,'pellissippi', c.CampusIdent) AS slug
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
                REPLACE(REPLACE(REPLACE(REPLACE(NewsTitle, ' ', '-'), '"', ''), '''', '') , ':', '') as slug
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
                s.SeriesID as id
                ,s.SeriesIdent AS slug
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
                m.MediaID as id
                ,m.SeriesID as series_id
                ,s.StaffID as speaker_id
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
                s.StaffID as id
                ,c.campuses as campus_slug
                ,TRIM(s.StaffIdent) AS slug
                ,p.PersonFirstName AS first_name
                ,p.PersonLastName AS last_name
                ,p.PersonDisplayName AS display_name
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
                id
                ,ident as slug
                ,title
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
                ,MissionDate as dates
                ,MissionCost as cost
                ,MissionSize as seats
                ,REPLACE(REPLACE(MissionDescription, '\n', ' '), '\r', '') as description
                ,MissionLeader as contact
                ,MissionContact as contact_email
                ,MissionFull as is_full
                ,MissionSort as sort
                ,NULL as starts_at
                ,NULL as ends_at
                ,IF(MissionArchive = 1, NOW(), null) as expire_at
            FROM missions m
                LEFT JOIN mission_locations l on m.MissionTitle = l.title and l.export = 1;
EOT;
        return $this->runSql($sql);
    }

    private function getMinistries() {
        $sql = <<<EOT
            SELECT
                id
                ,ident as slug
                ,title
            FROM ministries;
EOT;
        return $this->runSql($sql);
    }

    private function getTeams() {
        $sql = <<<EOT
            SELECT
                id
                ,ident as slug
                ,title
                ,sort
            FROM teams;
EOT;
        return $this->runSql($sql);
    }

    private function runSql($sql) {
        return DB::connection('old_db')->select($sql);
    }

}