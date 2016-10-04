@extends('layouts.page', ['title' => 'Group Leader Training', 'hero_image' => 'images/pages/group-leader-training-wide.jpg'])

@section('page')

    @cardsection(['title' => 'Group Leader Training', 'class' => '', 'cards' => $videos])
    <p>We've compiled videos from past Group Leader Gatherings that will help you cultivate relationships and challenge one another to grow in Christ.</p>
    @endcardsection

    @cardsection(['title' => 'Additional Resources', 'class' => 'Section--lightGrey', 'cards' => $resources])
    @endcardsection

@endsection