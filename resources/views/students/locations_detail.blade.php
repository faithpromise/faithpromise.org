@extends('layouts.page', ['title' => $campus->name . ' Campus', 'hero_image' => $campus->image])

@section('page')

    @introsection([
        'title' => $campus->name . ' Campus',
        'class' => 'IntroSection--center',
        'buttons' => [
            [
                'title' => 'Get Directions',
                'url' => $campus->directions_url,
                'target' => '_blank'
            ]
        ]
    ])
    <!-- TODO: Change this text -->
    <p>We'd love to see you at our {{ $campus->name }} Campus. You'll experience...</p>
    <p>Located at {{ $campus->address }}, {{ $campus->city }}, {{ $campus->state }} {{ $campus->zip }}</p>
    <p>Contact us: (865) 251-2590</p>
    <p><strong>Student services:</strong> {!! $campus->times !!}.</p>
    @endintrosection

    @if($studentPastor)
    <div class="BioSection">
        <div class="BioSection-imageWrap">
            <img class="BioSection-image" src="{{ resized_image_url('images/staff/jeff-cochran-square.jpg', 1080) }}">
        </div>
        <div class="BioSection-info">
            <h3 class="BioSection-name">{{ $studentPastor->name }}</h3>
            <h4 class="BioSection-title">{{ $studentPastor->title }}</h4>
            <p>{!! str_limit(strip_tags($studentPastor->bio), 200) !!}</p>
            <p>
                <a class="Button Button--light" href="{{ route('fpStudents_staffDetail', $studentPastor->slug) }}">Meet {{ $studentPastor->first_name }}</a>
            </p>
        </div>
    </div>
    @endif


    {{--
        ========================================
        Contact
        ========================================
    --}}
    @include('partials.have_questions', ['email' => 'fpsglobal@faithpromise.org', 'text' => 'If you have questions we\'d love to hear from you. Please contact us at #email#'])

@endsection