<?php

$faq = collect([
        (object)[
                'q' => 'Can I schedule recurring donations?',
                'a' => '<p>Yes, you can specify whether you want your contribution made one time, monthly, or twice per month.</p>'
        ],
        (object)[
                'q' => 'What if I change credit cards or want to adjust the date or amount of a contribution?',
                'a' => '<p>You can edit or delete a scheduled contribution at any time, including the credit card, date, frequency, and amount.</p>'
        ],
        (object)[
                'q' => 'Is there a limit to how much I can give?',
                'a' => '<p>For giving via a credit card or debit card, there is not a limit to how much you can give. However, if you give by eCheck you are limited to $25,000 per transaction and $50,000 in one day.</p>'
        ],
        (object)[
                'q' => 'Is online giving secure?',
                'a' => '<p>We\'ve taken steps to ensure that the giving process is safe and secure from beginning to end. It is the same technology used by banks and e-commerce companies to keep your information safe and secure during transactions.</p>'
        ],
        (object)[
                'q' => 'Who do I talk to if I have more questions?',
                'a' => '<p>Contact the Finance Department at 865-251-2590 x 1600, and we\'ll be glad to answer any other questions you may have.</p>'
        ]
]);

$ways_to_give = collect([
        (object)[
                'q' => 'Boxes in the Worship Center',
                'a' => '<p>As you enter or leave the Worship Center, there are black offering boxes where you can leave cash or checks. If you\'d like, you can use one of the envelopes located on the side of the box to enclose your financial gift.</p>'
        ],
        (object)[
                'q' => 'Kiosk in the Lobby',
                'a' => '<p>Don\'t carry cash? In each of our campus lobbies we have one or more ATM-like giving stations where you can give.</p>'
        ],
        (object)[
                'q' => 'Text Message',
                'a' => '<p>You can give through your phone by doing the following:</p><p>Text GIVEFP (general offering) or H4H (Heart for the Harvest) followed by the dollar amount to <a href="sms:28950&body=GIVEFP">28950</a> .</p><p>If it is your first time to give via text, you\'ll receive a reply with a registration link. <a href="https://vimeo.com/53339698">See how it works</a>.</p>'
        ],
        (object)[
                'q' => 'Mail',
                'a' => '<p>You can mail your offering check to the following address:</p><p>Faith Promise Church<br>10740 Faith Promise Lane<br>Knoxville, TN 37931</p>'
        ],
        (object)[
                'q' => '',
                'a' => ''
        ],
        (object)[
                'q' => '',
                'a' => ''
        ],
        (object)[
                'q' => '',
                'a' => ''
        ]
]);

?>

@extends('layouts.page', ['title' => 'Giving'])

@section('page')

    @videosection([
        'title' => 'Giving',
        'video' => '65561406',
        'buttons' => [
            [
                'title' => 'Give Online',
                'url' => 'https://fpctystn.infellowship.com/onlinegiving/history'
            ],
            [
                'title' => 'Noncash Donations',
                'url' => 'https://give.idonate.com/nonprofit-donate/faith-promise-church/'
            ]
        ]
    ])
    <p>Through your financial contributions, you're partnering with Faith Promise Church in to the work of changing lives locally and worldwide.</p>
    @endvideosection

    @textsection(['title' => 'Developing Heaven\'s Heart', 'class' => 'TextSection--lightGrey'])
        <p>Faith Promise is committed to helping our congregation grow in all areas of spiritual growth, including generosity.  Generosity begins with the biblical understanding that God owns everything.  Once we understand that nothing really belongs to us and that we are only managers or stewards, we can begin the generosity journey, allowing God to give us a heart that loves to give.</p>
        <p>Like many other areas of spiritual growth, generosity isn't something that comes naturally to most people. We must exercise our generosity to grow in the habit of giving.</p>

        <p>There are several biblical reasons why we should cultivate generosity in our lives:</p>

        <ul>
            <li>Generosity is the antidote to greed.</li>
            <li>Through generosity, we join with Jesus in furthering His work in the world, funding the life-changing ministry of the church.</li>
            <li>Our generosity reminds us that this world is not our home.</li>
            <li>Generosity helps us to live with meaning and purpose.</li>
        </ul>

        <p>We realize that everybody is at a different place on their generosity journey, but our hope is that together we will move forward in giving:</p>

        <ul>
            <li><em>Beginners</em> are first-time givers or individuals who aren't yet committed to consistent giving. </li>
            <li><em>Learners</em> have made the commitment to give, but they aren't yet tithing ten percent of their income. </li>
            <li><em>Core Givers</em> are people who support the work of the church through ten percent of their income. </li>
            <li><em>Lavish Givers</em> are those who give above and beyond the tithe.</li>
        </ul>

        <p>Since we hold generosity as one of our seven key values, we reinforce this value through weekend teaching, financial classes, and small groups. For further teaching on this subject, check out our <a href="/series/tapped-out">Tapped Out</a> sermon series.</p>

        <p>Thank you for entrusting your resources to Faith Promise and assisting us in the ministry of reaching people for Jesus and growing them as His disciples.</p>
    @endtextsection

    @faqsection(['title' => 'Common Questions About Online Giving', 'faq' => $faq])
    @endfaqsection

    @faqsection(['title' => 'Other Ways to Give', 'class' => 'Section--lightGrey', 'faq' => $ways_to_give])
    @endfaqsection


@endsection