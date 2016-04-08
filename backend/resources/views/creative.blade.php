@extends('layouts.page', ['title' => 'fpCreative', 'hero_image' => 'images/pages/creative-collective-tall.jpg'])

@section('page')

    @videosection([
        'title' => 'fpCreative',
        'video' => '161720274'
    ])
    <p>
        fpCreative is responsible for producing all video content for Faith Promise Church. We create art to cause life change in the broken and spread the fame of Jesus.
    </p>
    @endvideosection

    @cardsection(['title' => 'Job Opportunities', 'class' => 'Section--lightGrey', 'cards' => $jobs])

    @endcardsection


@endsection