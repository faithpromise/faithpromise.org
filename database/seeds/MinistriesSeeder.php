<?php

use App\Ministry;
use Illuminate\Database\Seeder;

class MinistriesSeeder extends Seeder
{

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('ministries')->truncate();

        $this->makeRecord('care', 'Care Ministries');
        $this->makeRecord('celebrate', 'Celebrate');
        $this->makeRecord('family', 'Family Ministry');
        $this->makeRecord('fpkids', 'fpKids');
        $this->makeRecord('fpstudents', 'fpStudents');
        $this->makeRecord('groups', 'Groups');
        $this->makeRecord('men', 'Men\'s Groups');
        $this->makeRecord('missions', 'Missions');
        $this->makeRecord('prayer', 'Prayer Ministry');
        $this->makeRecord('women', 'Women\'s Groups');
        $this->makeRecord('worship', 'Worship Ministry');
        $this->makeRecord('youngadults', 'Young Adults');
    }

    private function makeRecord($ident, $title)
    {
        (new Ministry([
            'ident'          => $ident,
            'title'           => $title
        ]))->save();
    }
}
