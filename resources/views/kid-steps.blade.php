<?php

// LATER: We need to use the calendar_events to show a list of classes and links to register
$baptism_registration = [
        'pellissippi' => 'https://integration.fellowshipone.com/integration/FormBuilder/FormBuilder.aspx?fCode=CuW8qCXcQkRC4RD1J4j2Ng==&cCode=RtKBDolfiPuZJp8o1+0ARA==',
        'blount'      => 'https://integration.fellowshipone.com/integration/FormBuilder/FormBuilder.aspx?fCode=ateeORVo3265UHNI0demnQ==&cCode=RtKBDolfiPuZJp8o1+0ARA==',
        'north'       => 'https://integration.fellowshipone.com/integration/FormBuilder/FormBuilder.aspx?fCode=s80+rBCHQNgN+tQs82SjwA==&cCode=RtKBDolfiPuZJp8o1+0ARA==',
        'anderson'    => 'https://fpctystn.infellowship.com/Forms/191911',
        'campbell'    => 'https://fpctystn.infellowship.com/Forms/191912',
        'farragut'    => 'https://fpctystn.infellowship.com/Forms/371526',
];

?>

<!-- IMAGE: Need new header image -->
@extends('layouts.page', ['title' => 'Kid Steps'])

@section('page')

    @introsection(['title' => 'Kid Steps', 'class' => '', 'image' => ''])
    <p>We want to partner with you to help determine when your child is ready for salvation and baptism.</p>
    @endintrosection

    @bgsection([
        'title' => 'Salvation',
        'image' => 'images/fpkids/salvation-tall.jpg',
        'buttons' => [
            [
                'title' => 'Salvation Conversation Guide',
                'url' => doc_url('salvation.pdf')
            ]
        ]
    ])
    <p>Talking with your child about salvation is a tremendous blessing, but can oftentimes be challenging. How do you explain the significance of what Jesus has done in a kid-friendly way? The Salvation Conversation Guide is a series of questions you can ask to explore whether your child is ready for a decision of salvation.</p>
    @endbgsection

    @bgsection([
        'title' => 'Baptism',
        'class' => 'BackgroundSection--right',
        'image' => 'images/fpkids/baptism-tall.jpg',
        'buttons' => [
            [
                'title' => 'Baptism Class',
                'url' => doc_url('salvation.pdf')
            ]
        ]
    ])
    <p>If your child has expressed a readiness to be baptized, we'll take some steps to ensure that your child understands both salvation and the purpose of baptism. You can participate in the online baptism workshop, or a baptism workshop at your campus.</p>
    @endbgsection

    @videosection([
        'title' => 'Online Baptism Workshop',
        'class' => '',
        'video' => '207319387',
        'buttons' => [
            [
                'title' => 'Worksheet',
                'url' => doc_url('fpkids/baptism-workshop.pdf')
            ]
        ]
    ])
    <p>This online workshop is a guided video you can use at home to help ensure your child understands salvation and the purpose of baptism. After completing the workshop, please @dropdown([
        'text' => 'email',
        'links' => [
            [
                'title' => 'Email the Anderson Campus',
                'url' => 'mailto:fpKidsAnderson@faithpromise.org'
            ],
            [
                'title' => 'Email the Blount Campus',
                'url' => 'mailto:fpKidsBlount@faithpromise.org'
            ],
            [
                'title' => 'Email the Farragut Campus',
                'url' => 'mailto:fpKidsFarragut@faithpromise.org'
            ],
            [
                'title' => 'Email the Campbell Campus',
                'url' => 'mailto:fpKidsCampbell@faithpromise.org'
            ],
            [
                'title' => 'Email the North Knox Campus',
                'url' => 'mailto:fpKidsNorthKnox@faithpromise.org'
            ],
            [
                'title' => 'Email the Pellissippi Campus',
                'url' => 'mailto:fpKidsPellissippi@faithpromise.org'
            ],
        ]
    ]) your campus kids director to schedule a brief counseling session with an fpKids Baptism Counselor:</p>

    @endvideosection

    @textsection(['title' => 'Register for the Baptism Class', 'class' => 'Section--lightGrey', 'id' => 'baptism'])
    <p>Does your child still have questions about Salvation? Are they telling you they're ready to be baptized? All kids Kindergarten to 5th grade participate in our Salvation/Baptism Class prior to baptism. We cover basics such as the Plan of Salvation, the Purpose of Baptism and other details.</p>
    <p>This class includes a Parent Connection where we connect with parents/guardians. We want to help you look ahead at what you can do to help your child establish an active faith in Christ. Use the following links to register at the
        <a class="no-wrap" href="{{ $baptism_registration['anderson'] }}" target="_blank">Anderson Campus</a>,
        <a class="no-wrap" href="{{ $baptism_registration['campbell'] }}" target="_blank">Campbell Campus</a>,
        <a class="no-wrap" href="{{ $baptism_registration['blount'] }}" target="_blank">Blount Campus</a>,
        <a class="no-wrap" href="{{ $baptism_registration['farragut'] }}" target="_blank">Farragut Campus</a>,
        <a class="no-wrap" href="{{ $baptism_registration['north'] }}" target="_blank">North Knox Campus</a>, or
        <a class="no-wrap" href="{{ $baptism_registration['pellissippi'] }}" target="_blank">Pellissippi Campus</a>.
    </p>
    @endtextsection

    {{--
        ========================================
        Contact
        ========================================
    --}}
    @include('partials.have_questions', ['email' => 'fpkids@faithpromise.org', 'text' => 'If you have questions about fpKids, salvation, or baptism, please contact #email#'])

@endsection