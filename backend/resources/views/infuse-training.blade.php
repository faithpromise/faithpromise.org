@extends('layouts.page', ['title' => 'Infuse Training', 'hero_image' => 'images/pages/infuse-training.jpg'])

@section('page')

    @introsection([
        'title' => 'Infuse Training'
    ])
    <p>Infuse is designed to develop and train individuals through coaches and mentors from the time you pass an audition, to the moment you begin actively serving in a Worship Experience. We want you to understand the values and culture of heart, relationships, and excellence behind fpWorship which enables us to equip and build effective team members. We can’t wait for you to see these videos and learn what fpWorship and the Infuse Process is all about! We’re so excited you’ve joined our team as we continue to Create an Atmosphere to Connect people to God for life Change!</p>
    @endintrosection

    @foreach($lessons as $lesson)

        <?php $use_grey_bg = isset($use_grey_bg) ? !$use_grey_bg : true; ?>

        @photosection(['title' => $lesson->title, 'subtitle' => $lesson->subtitle, 'class' => $use_grey_bg ? 'Section--lightGrey' : '', 'image' => $lesson->image, 'image_url' => $lesson->url ])
        <p>{{ $lesson->description }}</p>
        <p><a class="Button" href="{{ $lesson->url }}" title="Infuse-{{ $lesson->slug }}">View Lesson</a></p>
        @endphotosection

    @endforeach

    @include('partials.have_questions', ['email' => 'JessicaE@faithpromise.org', 'text' => 'If you have questions about Infuse, please contact #email#'])

@endsection