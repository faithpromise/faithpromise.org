
@extends('layouts.page', ['title' => 'Group Alignments', 'hero_image' => 'images/pages/group-alignments-wide.jpg'])

@section('page')

    <div class="IntroSection">
        <div class="IntroSection-container">
            <h2 class="IntroSection-title">Group Alignments</h2>
            <div class="IntroSection-text">
                <p>During an alignment, groups focus on studying and discussing the same topic. This allows our entire church to come together and grow in our relationship with Christ and with one another. Alignment materials are posted on this page as well as previous alignments in case your group didn't have a chance to participate or you'd like to study the subject again.</p>
            </div>

            <div class="Alignment-wrap">
                @foreach($alignments as $alignment)
                    <div class="Alignment">
                        <div class="Alignment-book">
                            <img class="Alignment-image" src="{{ cdn_image('lg', 'quarter', $alignment->image) }}">
                        </div>
                        <div class="Alignment-info">
                            <h2 class="Alignment-title">{{ $alignment->title }}</h2>
                            <ul class="Alignment-resources">
                                @if ($alignment->series)
                                    <li class="Alignment-resource">
                                        <a href="{{ $alignment->series->url }}">Sermon Series</a>
                                    </li>
                                @endif
                                @foreach($alignment->resources as $resource)
                                    <li class="Alignment-resource">
                                        <a href="{{ $resource->url }}">{{ $resource->title }}</a>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                @endforeach
            </div>

        </div>
    </div>

    {{--@cardsection(['title' => 'Group Alignments', 'class' => '', 'cards' => $series])--}}
    {{--@endcardsection--}}

    @cardsection(['title' => 'Additional Resources', 'class' => 'Section--lightGrey', 'cards' => $resources])
    @endcardsection

@endsection