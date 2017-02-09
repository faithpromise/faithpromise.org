@extends('layouts.page', ['title' => 'Elevate'])

@section('page')

    @introsection([
        'title' => 'Elevate 1'
    ])
    <p>Welcome to Elevate! Thank you for your investment and commitment to growing as a leader. Elevate is a web-based leadership development tool designed to help all of us who lead, or would like to lead at Faith Promise increase our leadership capacity. As my friend Bill Hybels says, &quot;everyone wins when a leader gets better&quot;. I can't wait to see your kingdom impact as you take your leadership to the next level.</p>
    <p>Pastor Chris</p>
    @endintrosection

    @foreach($elevate_lessons as $lesson)

        <?php $use_grey_bg = isset($use_grey_bg) ? !$use_grey_bg : true ; ?>

    @photosection(['title' => $lesson->title, 'subtitle' => $lesson->subtitle, 'class' => $use_grey_bg ? 'Section--lightGrey' : '', 'image' => $lesson->image, 'image_url' => $lesson->url])
        <p>{{ $lesson->description }}</p>
        <p><a class="Button" href="{{ $lesson->url }}" title="Elevate-{{ $lesson->slug }}">View Lesson</a></p>
    @endphotosection

    @endforeach

    @include('partials.have_questions', ['email' => 'ChuckC@faithpromise.org', 'text' => 'If you have questions about Elevate, please contact #email#'])

@endsection