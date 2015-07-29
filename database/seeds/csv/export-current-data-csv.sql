
/* campuses */
SELECT c.CampusID as id, IF(c.CampusIdent = 'pel', 'pellissippi', c.CampusIdent) AS ident, REPLACE(c.CampusName, ' Campus', '') AS `name`,REPLACE(c.CampusLocation, ', TN', '') AS location,c.CampusStreet AS address,c.CampusCity AS city,c.CampusState AS state,c.CampusZip As zip,c.CampusLatitude AS lat,c.CampusLongitude AS lng,c.times,c.map_url,c.directions_url,c.CampusDisplayOrder AS sort, NOW() as created_at, NOW() as updated_at
FROM campus c;

/* events */
select
REPLACE(REPLACE(REPLACE(REPLACE(NewsTitle, ' ', '-'), '"', ''), '''', '') , ':', '') as ident,
NewsTitle as title,
concat(NewsIdent, '.jpg') as image, NewsShortDescription as excerpt, NewsDescription as description, NewsPublishDate as publish_at, NewsExpireDate as expire_at, NewsPlaceOnHomePage as is_featured, NewsSort as sort, NewsDateCreated as created_at, NewsDateModified as updated_at
from newsupdate;

/* series */
SELECT  s.SeriesID as id,s.SeriesIdent AS ident,s.SeriesTitle as title,s.SeriesDescription as description,s.is_official_series as is_official,s.begin_date as starts_at,s.begin_date AS publish_at,s.SeriesDateCreated as created_at,s.SeriesDateModified as updated_at
FROM series s JOIN seriesMedia m ON s.SeriesID = m.SeriesID
WHERE s.SeriesDateCreated IS NOT NULL
	AND (m.MediaVimeoID IS NOT NULL OR m.MediaAudioURL IS NOT NULL)
GROUP BY s.SeriesID;

/* videos */
        SELECT  m.SeriesID as series_id,s.StaffID as speaker_id,m.MediaIdent AS ident,m.MediaType AS type,m.MediaTitle AS title,m.MediaDescription AS description,m.MediaVimeoID AS vimeo_id,m.MediaVimeoASL AS vimeo_id_asl,m.MediaAudioURL AS audio_file,DATE_FORMAT(m.MediaDateTime, '%Y-%m-%d') AS sermon_date,p.PersonDisplayName AS speaker_name,m.MediaDateTime AS publish_at,coalesce(m.MediaDateCreated, m.MediaDateTime) as created_at, coalesce(m.MediaDateModified, m.MediaDateTime) as updated_at
        FROM seriesmedia m
        LEFT JOIN person p ON m.MediaAuthorID = p.PersonID
        LEFT JOIN staff s ON p.PersonID = s.StaffID
        WHERE m.SeriesID IN (select seriesid from series where SeriesDateCreated IS NOT NULL)
        	AND (m.MediaVimeoID IS NOT NULL OR m.MediaAudioURL IS NOT NULL)
        ORDER BY m.MediaDateTime ASC;


/* staff */
SELECT
s.StaffID as id,c.campusid as campus_id,TRIM(s.StaffIdent) AS ident,p.PersonFirstName AS first_name,p.PersonLastName AS last_name,p.PersonDisplayName AS display_name,s.StaffTitle AS title,p.PersonEmail AS email,s.StaffOfficeExt AS phone_ext,
s.StaffBio AS bio,s.new_sort AS sort,s.StaffDateCreated as created_at,s.StaffDateModified as updated_at,(IF(ISNULL(s.StaffDateDeleted) AND s.StaffActive = 1, null, coalesce(s.StaffDateDeleted, NOW()))) AS deleted_at
FROM staff s JOIN person p ON s.PersonID = p.PersonID LEFT JOIN campus c on s.campuses = c.CampusIdent;


/* staff_ministries */
select s.StaffID as staff_id, m.id as ministry_id
from staff_ministries sm JOIN ministries m on sm.ministry_ident = m.ident
JOIN staff s ON sm.staff_ident = s.StaffIdent;

/* staff_teams */
select st.staff_id, t.id as team_id
from staff_teams st
 JOIN teams t ON st.team_ident = t.ident;
 
/* mission_locations */
select id, ident, title, NOW() as created_at, NOW() as updated_at
from mission_locations
where export = 1;

/* mission_trips */
select MissionID as `id`,
l.id as missionlocation_id,
MissionTitle as title, MissionDate as dates, MissionCost as cost, MissionSize as seats, REPLACE(REPLACE(MissionDescription, '\n', ' '), '\r', '') as description, MissionLeader as contact, MissionContact as contact_email, MissionFull as is_full, MissionSort as sort, NULL as starts_at, NULL as ends_at, IF(MissionArchive = 1, NOW(), null) as expire_at, NOW() as created_at, NOW() as updated_at
from missions m left join mission_locations l on m.MissionTitle = l.title and l.export = 1;

/* ministries */
select id, ident, title, NOW() as created_at, NOW() as updated_at from ministries;

/* teams */
select id, ident, title, sort, NOW() as created_at, NOW() as updated_at from teams;

