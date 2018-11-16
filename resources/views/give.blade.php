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
                'url' => config('site.give_url')
            ],
            [
                'title' => 'Item Donations',
                'url' => config('site.give_items_url')
            ]
        ]
    ])
    <p>Through your financial contributions, you're partnering with Faith Promise Church in to the work of changing lives locally and worldwide.</p>
    <p>To access your Contribution Statement, please <a class="no-wrap" href="https://fpctystn.infellowship.com/onlinegiving/history">log-in to Fellowship One</a>.</p>
    @endvideosection

    <div class="FinAccountability">
        <div class="FinAccountability-container">
            <div class="FinAccountability-seal">
                <img class="FinAccountability-image" src="{{ cdn_image_raw('images/general/ecfa.png') }}">
            </div>
            <div class="FinAccountability-title">
                Financial Accountability
            </div>
            <div class="FinAccountability-text">
                <p class="FinAccountability-info">Faith Promise Church is accredited by the Evangelical Council for Financial Accountability. Founded in 1979, ECFA provides accreditation to leading Christian nonprofit organizations that faithfully demonstrate compliance with established standards for financial accountability, transparency, fundraising, and board governance.</p>
                <a class="FinAccountability-link" href="https://www.dropbox.com/sh/pfdg2k1evnwog27/AABafL6ntVlejTnSaLZcUqoFa?dl=0&lst=">Yearly Audited &amp; Financial Statements</a>
            </div>
        </div>
    </div>

    @bgsection([
        'title' => 'International care and relief',
        'image' => 'images/general/give-international.jpg'
    ])
    <p>Building orphanages and caring for children. Funding world missions to spread the gospel to the far reaches of the earth.</p>
    @endbgsection

    @bgsection([
        'title' => 'Local compassion efforts',
        'image' => 'images/general/give-local.jpg',
        'class' => 'BackgroundSection--right'
    ])
    <p>Providing for those who are in need and partnerships with area ministries – clothing the poor and providing shelter to the homeless.</p>
    @endbgsection

    @bgsection([
        'title' => 'Funding the church',
        'image' => 'images/general/give-church.jpg'
    ])
    <p>The ministry impact of our church is completely funded through the generous gifts of our congregation.</p>
    @endbgsection

    @bgsection([
        'title' => 'Campus Expansion',
        'image' => 'images/general/give-h4h.jpg',
        'class' => 'BackgroundSection--right'
    ])
    <p>Your financial gifts to our yearly Heart for the Harvest Offering each are key in our effort to launch new campuses to see exponential growth and changed lives.</p>
    @endbgsection

    

    @faqsection(['title' => 'Common Questions About Online Giving', 'faq' => $faq])
    @endfaqsection

    @faqsection(['title' => 'Other Ways to Give', 'class' => 'Section--lightGrey', 'faq' => $ways_to_give])
    @endfaqsection


@endsection