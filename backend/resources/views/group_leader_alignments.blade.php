<?php

$faq = collect([
        (object)[
                'q' => 'Post Attendance &amp; Manage Groups',
                'a' => '<p>Login here to post your attendance, manage contacts, and send updates to your group. <a href="https://fpctystn.infellowship.com/UserLogin/Index?ReturnUrl=/" target="_blank">Click here</a>.</p>'
        ],
        (object)[
                'q' => 'Discussion Questions',
                'a' => '<p>Weekly discussion questions to take the sermon message to the group setting. <a href="http://blog.faithpromise.org/category/groups-ministry/discussion-questions/" target="_blank" target="_blank">Discussion Questions</a>.</p>'
        ],
        (object)[
                'q' => 'Group Studies from RightNow',
                'a' => '<p><a href="http://training.rightnow.org/Training/SignUp/Login.aspx" target="_blank">Login to online video curriculum</a></p><p><a href ="http://support.rightnow.org/forums/20207511-frequently-asked-questions" target="_blank">Frequently asked questions about the video curriculum</a></p>'
        ]
]);

?>

@extends('layouts.page', ['title' => 'Group Alignments', 'hero_image' => 'images/pages/group-alignments-wide.jpg'])

@section('page')

    @cardsection(['title' => 'Group Alignments', 'class' => '', 'cards' => $series])
    <p>During an alignment, groups focus on studying and discussing the same topics presented in the weekend services. This allows our entire church to come together and grow in our relationship with Christ and with one another. We've made past alignments available here in case your group didn't have a chance to participate or you'd like to study the subject again.</p>
    @endcardsection

    @cardsection(['title' => 'Additional Resources', 'class' => 'Section--lightGrey', 'cards' => $resources])
    @endcardsection

@endsection