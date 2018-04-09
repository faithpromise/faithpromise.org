<?php

$faq = [
        (object)[
                'q' => 'What can I expect from the celebration?',
                'a' => '<p>The celebration part of Child Dedications (Step 3) occurs within the first 15 minutes of our weekend worship service.  Participating families will stand before the church audience.  As a group they will publicly commit to create an environment in their home that teaches their children the most important thing they can do with their lives is to follow Christ.  The Campus Pastor will lead the church audience in prayer for the families.  The experience lasts approximately 10 minutes.</p>'
        ],
        (object)[
                'q' => 'Is this different from infant baptism?',
                'a' => '<p>This event is not infant baptism.  We believe that when a child is old enough to understand what it means to place their faith in Jesus Christ as their personal Savior, the decision to be baptized should be initiated by them.  Most kids under the age of 5 years old do not understand concepts such as sin, forgiveness, and the sacrifice Christ made for us on the cross.  Child Dedication is all about your commitment as a parent to grow in your own relationship with Christ and to teach your child to do the same.</p>'
        ],
        (object)[
                'q' => 'What if I can\'t participate in the Parent Meeting?',
                'a' => '<p>The Child Dedication Parent Meeting is an integral part of partnering and equipping you for the journey of leading your child into a loving relationship with Jesus Christ.  We offer Child Dedications multiple times per year in an effort to provide options for your busy schedules.</p>'
        ],
        (object)[
                'q' => 'Do both parents need to attend the Parent Meeting?',
                'a' => '<p>Given that both parents will participate in raising your child, it\'s best when both parents participate in the Parent Meeting.  The Parent Meeting is more than an information download.  It\'s an equipping opportunity where we will lead you through a process of defining what\'s most important to you as a parent.  To make the most of the experience, participation from both parents is best.  Childcare for this event is offered upon request.</p>'
        ],
        (object)[
                'q' => 'I\'m a Small Group Leader. What can we do to make this event special?',
                'a' => '<p>As a Small Group, you are a faith community fully invested in the milestones that occur in each other\'s lives. Child Dedications is a great milestone to celebrate. As the parent(s) in your Small Group participates in Child Dedications, they are learning more about steps they can take today to influence their child\'s faith tomorrow.</p>'
                        . '<p>Here are a few things you can do to deepen the impact of Child Dedications for your entire Small Group:</p>'
                        . '<ol>'
                        . '<li>Throw a party. Bake a cake and put up some simple decorations. Do something to let the parent(s) know this is a big deal.</li>'
                        . '<li>Pray over the family. Gather the family together and pray God\'s blessing and protection over them. Invite God to lead the members of your group to be the faith community this family needs as they lead their child to love Jesus. </li>'
                        . '<li>Write a letter to the child. What do you want them to know at 16 years old? Imagine the End by picking an age or stage in life and consider what words you could invest in them in that season?</li>'
                        . '<li>Create a box of Family Adventures, Ideas & Encouragements: Grab a recipe box and some index cards. Have group members share different things:</li>'
                        . '<ul>'
                            . '<li>An adventure that impacted you most</li>'
                            . '<li>A relationship you will never forget</li>'
                            . '<li>A Bible story/verse that means the most to you, and why</li>'
                            . '<li>An encouragement that lifts your spirits</li>'
                        . '</ul>'
                    . '</ol>'
        ]
];

?>

@extends('layouts.page', ['title' => 'Child Dedications'])

@section('page')

    @introsection(['title' => 'Child Dedications at Faith Promise'])
    <p>Child Dedication is a unique experience designed to help parents in their journey to raise their child to love God with all their heart, mind, and strength.</p>
    <p>Raising kids today is filled with challenges.  And it's easy to get lost in the daily ritual of parenting, only to look up and realize you've focused on a lot of things... yet none of them were the most important things.  The Child Dedication experience helps parents focus on the most important things in a child's life...  their relationship with Christ. </p>
    <p>Child Dedication is more than an event.  It is an opportunity for you to take some time to consider what matters most in the life of your child; to decide what you value and what you can do today that will have the greatest impact on your child's future. </p>
    @endintrosection

    @textsection(['title' => 'Child Dedication Process', 'class' => 'Section--lightGrey'])
    <p>At Faith Promise, child dedication is a three-step process.</p>
    <h5>Step 1:  Complete your online application</h5>
    <p>All parents interested in participating in Child Dedications begin by completing the @dropdown([
            'text' => 'online application',
            'links' => [
                [
                    'title' => 'Anderson Campus',
                    'url' => 'https://fpctystn.infellowship.com/Forms/335380'
                ],
                [
                    'title' => 'Blount Campus',
                    'url' => 'https://fpctystn.infellowship.com/Forms/364807'
                ],
                [
                    'title' => 'Campbell Campus',
                    'url' => 'https://fpctystn.infellowship.com/Forms/364808'
                ],
                [
                    'title' => 'Farragut Campus',
                    'url' => 'https://fpctystn.infellowship.com/Forms/365446'
                ],
                [
                    'title' => 'North Knox Campus',
                    'url' => 'https://fpctystn.infellowship.com/Forms/364812'
                ],
                [
                    'title' => 'Pellissippi Campus',
                    'url' => 'https://fpctystn.infellowship.com/Forms/369692'
                ]
            ]
        ]).</p>
    <h5>Step 2:  Parent Meeting</h5>
    <p>Once you have completed Step 1, you will participate in a Parent Meeting the week prior to our Child Dedication ceremony.  An fpKIDS team member will contact you upon receipt of your online application with times and locations for the Parent Meeting.</p>
    <h5>Step 3:  Child Dedication Celebration</h5>
    <p>The best part!  Once Steps 1 &amp; 2 are complete we can't wait to celebrate with you as you participate in our Child Dedication Celebration during the weekend worship services (select dates available throughout the year).  This is our opportunity for your church family to pray with you as you set out to lead your child toward the most important relationship of their lives.</p>
    @endtextsection

    @faqsection(['faq' => $faq])
    @endfaqsection

@endsection