@extends('layouts.page', ['title' => 'Group Leader Training', 'hero_image' => 'images/pages/group-leader-training-wide.jpg'])

@section('page')

    @cardsection(['title' => 'Group Leader Training', 'class' => '', 'cards' => $videos])
    <p>We've compiled videos from past Group Leader Gatherings that will help you cultivate relationships and challenge one another to grow in Christ.</p>
    @endcardsection

    @cardsection(['title' => 'New Leader Training', 'class' => 'Section--lightGrey', 'cards' => $new_leader_videos])
    <p>If you're starting, or have recently started a new group, these videos will help you navigate some foundational principles for a successful group.</p>
    @endcardsection

    @cardsection(['title' => 'Additional Resources', 'cards' => $resources])
    @endcardsection

@endsection