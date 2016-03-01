@extends('layouts.page', ['title' => 'Groups'])

@section('page')

    {{--
    ================================================================================
        Intro
    ================================================================================ --}}

    @videosection(['title' => 'Groups Ministry', 'class' => 'VideoSection--right', 'video' => '137534183'])
    <p>We believe that faith comes alive when people connect with God and others. Sustained life change occurs as we are growing in a relationship with Christ and we prioritize intentional relationships with others. Groups provide people with the opportunity to encounter God, embrace others, engage the world around us, and expand God's Kingdom through their group.</p>
    @endvideosection


    {{--
    ================================================================================
        Community Groups
    ================================================================================ --}}

    @bgsection(['title' => 'Community Groups', 'class' => '', 'image' => 'images/general/groups-wide.jpg'])
    <p>A group at Faith Promise is an environment where three or more people can connect to develop and grow in their relationship with Christ. We want to help you find a group that meets near your home or work.</p>
    <p>
        <a class="Button" href="https://fpctystn.infellowship.com/GroupSearch/Show?zipcode=&category=7079&weekday=&start_time=">Find a Group</a>
    </p>
    @endbgsection


    {{--
    ================================================================================
        Specialized Groups
    ================================================================================ --}}

    @cardsection(['title' => 'Specialized Groups', 'class' => 'Section--lightGrey', 'cards' => $group_types])
    <p>You know how they say that no two snowflakes are alike? Groups are the same way. But to help you find a good match we've classified them into several categories</p>
    @endcardsection


    {{--
    ================================================================================
        Contact
    ================================================================================ --}}

    {{--TODO: Change this to have_questions partial--}}
    @textsection(['title' => 'Need Help?'])
    <p>If none of the other options have been helpful to you, we'd be glad to help you find a group. Email Jennifer Patrick at
        <a href="mailto:jenniferp@faithpromise.org">jenniferp@faithpromise.org</a> . Please include the nights that work best for you and a little about yourself (where you live, children, marital status, etc.).
    </p>
    @endtextsection


    {{--
    ================================================================================
        Leaders
    ================================================================================ --}}

    @bgsection([
        'title' => 'Group Leaders',
        'class' => 'BackgroundSection--right',
        'image' => 'images/general/group-leaders-wide.jpg',
        'buttons' => [
            [
                'title' => 'Lead a group',
                'url' => route('newGroupLeader')
            ],
            [
                'title' => 'Resources',
                'url' => route('groupLeaders')
            ]
        ]
    ])
    <p>Interesting in leading a group? We want to help you as you help others grow in their relationship with Christ.</p>
    @endbgsection


    {{--
    ================================================================================
        Events
    ================================================================================ --}}

    @cardsection(['title' => 'Upcoming Events', 'class' => 'Section--lightGrey', 'cards' => $ministry->Events])
    @endcardsection


    {{--
    ================================================================================
        Staff
    ================================================================================ --}}

    @profilessection(['title' => 'Groups Staff', 'profiles' => $ministry->Staff])
    @endprofilessection

@endsection