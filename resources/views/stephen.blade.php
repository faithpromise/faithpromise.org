<?php

$faq = [
        (object)[
                'q' => 'I\'m new. What do I do?',
                'a' => '<p>First, we\'re so glad to have you join us. There\'s a special place at Faith Promise for your child to worship and grow in Christ. Please see our <a href="/fpkids/welcome/">welcome page</a> for an overview of what to expect when you visit.</p>'
        ],
        (object)[
                'q' => 'Where can I get more information about child dedications?',
                'a' => '<p>Please visit out our <a href="/dedications/">child dedications</a> page for more information.</p>'
        ],
        (object)[
                'q' => 'When will my child move from one room to the next?',
                'a' => '<p><strong>Nursery / Crawlers / Walkers</strong> - Generally these room transitions are based upon whether or not your baby is proficiently crawling/walking. For example, a toddler will remain in the Crawler room until he/she is walking the majority of the time without assistance.</p><p><strong>2 Years to PreK</strong> - Once your child turns 2 years old, their room transitions are based upon age. For example, the day your child turns 3 years old he/she will move to the 3 year old room.</p><p><strong>Kindergarten to 5th grade</strong> - Transitions change in elementary and follow the Knox County School calendar. When the new school year begins for Knox County, then we transition all our elementary students from one grade to the next.</p>'
        ],
        (object)[
                'q' => 'I want to serve in Kid\'s Ministry! What do I do?',
                'a' => '<p>We\'d love to explore the best fit for you within in fpKIDS. To apply to serve in fpKIDS, contact the <a href="mailto:fpKids@faithpromise.org">fpKids office</a>.</p>'
        ]
];

?>

@extends('layouts.page', ['title' => 'Stephen Ministry'])

@section('page')

    {{--
        ========================================
        Intro
        ========================================
    --}}
    @introsection(['title' => 'Christ Caring for People through People'])
    <p>Stephen Ministry is a nationally recognized Christian care ministry which began in 1975 and is helping more than a million people in over 11,000 churches.</p>
    <p>The Faith Promise Stephen Ministry equips lay people to provide confidential, one-on-one, Christ-centered care and support to people experiencing difficult times in their lives such as loss of a loved one, job loss, terminal illness, and divorce. The ministry pairs individuals with a Stephen Minister who will come alongside them to provide emotional and spiritual care for as long as the need persists.</p>
    <p>Stephen Ministers are selected, trained, and supervised to provide effective Christian care. After an initial fifty hours of training, Stephen Ministers are assigned a person with whom they meet once a week for about an hour. Stephen Ministers also meet twice per month for supervision, support, and continuing education.</p>

    <p><strong>Hurting?</strong> <a href="https://docs.google.com/document/d/1ag_OAK7EdGplssIikEhePgqzDcTzzizlmOSvnbntFV4/edit?pli=1">Request a Stephen Minister</a></p>

    <p><strong>Gifted to help others?</strong> <a href="https://docs.google.com/document/d/1h8cMdTQknSA1i66rX8YZt4Q9ISNxhfdJbYLb8XzI4aY/edit?pli=1">Become a Stephen Minister</a></p>

    <h5>Additional Resources</h5>
    <ul>
        <li><a href="http://blog.faithpromise.org/category/groups-ministry/stephen-ministry/">Blog &amp; Updates</a></li>
        <li><a href="https://docs.google.com/document/d/1mjO5Vegv8R5C1ZJUA7UNSF_8SBy3dGs8IJSyqMxLsEo/edit?pli=1">Testimonials &amp; Articles</a></li>
        <li><a href="https://docs.google.com/document/d/1SDV_kcKghGyzAld5Y28rVbl1wgaNy6iKj6SQkk6TF98/edit?pli=1">Stephen Ministry Resources</a></li>
    </ul>
    @endintrosection

    {{--
        ========================================
        Contact
        ========================================
    --}}
    @include('partials.have_questions', ['class' => 'Section--lightGrey', 'title' => 'Need more info?', 'email' => 'stephenministry@faithpromise.org', 'text' => 'If you still have questions about Stephen Ministry, please contact #email#'])

@endsection