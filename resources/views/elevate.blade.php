@extends('layouts.page', ['title' => 'Elevate'])

@section('page')

    @introsection([
        'title' => 'Elevate 1'
    ])
    <p>A description of Elevate here. Bacon ipsum dolor amet turducken shoulder leberkas spare ribs filet mignon porchetta ribeye swine beef ribs kevin. Andouille cow frankfurter pig pancetta. Ball tip biltong tenderloin pork loin.</p>
    @endintrosection

    @foreach($elevate_lessons as $lesson)

        <?php $use_grey_bg = isset($use_grey_bg) ? !$use_grey_bg : true ; ?>

    @photosection(['title' => $lesson->title, 'class' => $use_grey_bg ? 'Section--lightGrey' : '', 'image' => $lesson->image])
        <p>{{ $lesson->description }}</p>
        <p><a class="Button" href="{{ $lesson->url }}">View Lesson</a></p>
    @endphotosection

    @endforeach

@endsection