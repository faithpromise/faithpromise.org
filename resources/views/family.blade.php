<?php

$faq = [
        (object)[
                'q' => 'Marriage &amp; Parenting Summit',
                'a' => '<p>The Marriage and Parenting Summit is a two-day event held each February at Faith Promise Church. You will find breakout sessions ranging from communication to parenting teenagers, marriage expectations to merging blended families. Come get the tools you need to help your family thrive and grow in God. Childcare, food, and all the materials you will need for the weekend are provided.</p>'
        ],
        (object)[
                'q' => 'Pre-Marital Counseling',
                'a' => '<p>Pre-Marital counseling is a service provided by the church to couples who are currently engaged. The four one-hour sessions allow couples to meet with a pastor/counselor to prepare them for what to expect during marriage. Couples are asked to take an online assessment to give the counselor information about you. Please call the church office at 865-251-2590 to request pre-marital counseling.</p>'
        ],
        (object)[
                'q' => 'Professional Counseling',
                'a' => '<p>Counseling is available to regular attenders of Faith Promise who are experiencing marital or family discord, adjustment issues, personal development, and a variety of mental health issues. The service is confidential and short-term in nature and is provided by qualified professionals who integrate sound Christian principles and psychological strategies.  The counseling ministry is provided as part of the ministry of the church.</p><p>Before your first appointment, everyone is asked to complete an <a href="' . doc_url('counseling_form2.pdf') . '" target="_blank">intake questionnaire</a>. You are welcome to complete it at the church office at the time of your appointment or print a hard copy and bring it with you to your first appointment.</p>'
        ],
        (object)[
                'q' => 'Suggested Resources',
                'a' => '<p>Check out our list of <a href="http://blog.faithpromise.org/resources/" target="_blank">recommended resources</a> for marriage, parenting, and families.</p>'
        ],
        (object)[
                'q' => 'Family Ministry Milestones',
                'a' => '<p>Our plan for impacting families at Faith Promise. <a href="' . doc_url('milestones.pdf') . '" target="_blank">View it here</a>.</p>'
        ]
];

?>

@extends('layouts.page', ['title' => 'Family Ministry'])

@section('page')

    @introsection(['title' => 'Family Ministry'])
    <p>Family Ministry is focused on partnering with families to build great marriages and help parents disciple their children. From birth through high school, we create age-appropriate environments for children and students featuring relevant biblical teaching in a fun setting. In addition, we provide numerous marriage and parenting growth opportunities. Because families are our foundation, we are committed to providing the building blocks for a spiritually strong family.</p>
    <p>At the core of our ministry are five family values:</p>
    <ul>
        <li>
            <strong>Widen the Circle</strong> - Inviting others to invest in our children so they have other key influencers helping to shape their life.
        </li>
        <li>
            <strong>Imagine the End</strong> - Focusing our priorities on what matters most. Many things matter but only one thing matters the most - our relationship with Jesus.
        </li>
        <li>
            <strong>Fight for the Heart</strong> - Creating a culture of unconditional love within the home to fuel the emotional &amp; moral health of our children.
        </li>
        <li>
            <strong>Create a Rhythm</strong> - A sense of purpose around our everyday experiences. Increasing the quantity of quality time you spend together.
        </li>
        <li>
            <strong>Make it Personal</strong> - Parents modeling spiritual growth. As we grow in our faith we are better able to lead our children.
        </li>
    </ul>
    @endintrosection

    @cardsection(['title' => 'For Kids and Students', 'class' => 'Section--lightGrey', 'cards' => $what_to_expect_cards])
    @endcardsection

    @faqsection(['title' => 'Resources', 'faq' => $faq])
    @endfaqsection


@endsection