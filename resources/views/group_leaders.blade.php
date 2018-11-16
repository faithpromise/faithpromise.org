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

@extends('layouts.page', ['title' => 'Group Leader Resources', 'hero_image' => 'images/pages/group-leaders-wide.jpg'])

@section('page')

    @introsection(['title' => 'Group Leaders',
        'buttons' => [
            [
                'title' => 'Become a Group Leader',
                'url' => route('newGroupLeader')
            ]
    ]])
    <p>Group Leaders, the work you do to connect people, care for people, and challenge them to grow in Christ is the heart of the ministry of Faith Promise. Without you, our church would be ineffective, and we want you to know that we appreciate you.</p>
    <p>On this page you can find several resources for posting attendance, updating your group information online, and planning your group discussions.</p>
    @endintrosection

    @cardsection(['title' => 'Group Leader Resources', 'class' => 'Section--lightGrey', 'cards' => $resources])

    @endcardsection

    @faqsection(['title' => 'Additional Info', 'faq' => $faq, 'class' => 'Section--lightGrey'])
    @endfaqsection

@endsection