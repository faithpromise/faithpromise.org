@extends('layouts.page', ['title' => 'Infuse'])

@section('page')

    @videosection([
        'title' => 'Infuse',
        'youtube' => '9AsGr5p4_bk',
        'buttons' => [
            [
                'title' => 'I\'m Interested!',
                'url' => 'http://goo.gl/forms/ydF4oal9q5'
            ]
        ]
    ])
    <p>Infuse is designed to develop and train individuals through coaches and mentors from the time you show interest, to the moment you begin to actively serve in a Worship Experience. We want you to understand the culture of heart, excellence, and relationships behind fpWorship which enables us to equip and build effective team members.</p>
    @endvideosection

@endsection