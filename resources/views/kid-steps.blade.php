<?php

// LATER: We need to use the calendar_events to show a list of classes and links to register
$baptism_registration = [
    'pellissippi' => 'https://integration.fellowshipone.com/integration/FormBuilder/FormBuilder.aspx?fCode=CuW8qCXcQkRC4RD1J4j2Ng==&cCode=RtKBDolfiPuZJp8o1+0ARA==',
    'blount'      => 'https://integration.fellowshipone.com/integration/FormBuilder/FormBuilder.aspx?fCode=ateeORVo3265UHNI0demnQ==&cCode=RtKBDolfiPuZJp8o1+0ARA==',
    'north'       => 'https://integration.fellowshipone.com/integration/FormBuilder/FormBuilder.aspx?fCode=s80+rBCHQNgN+tQs82SjwA==&cCode=RtKBDolfiPuZJp8o1+0ARA=='
];

$faq = [
        (object)[
                'q' => 'Talking to Your Child About Salvation',
                'a' => '<p><a href="' . doc_url('salvation.pdf') . '" target="_blank">Click here</a> for a series of questions you can ask to explore whether a child is ready for a decision of Salvation.</p>'
        ],
        (object)[
                'q' => 'Talking to Your Child About Baptism',
                'a' => '<p><a href="' . doc_url('Baptism.pdf') . '" target="_blank">Click here</a> for a series of questions you can ask to explore whether a child is ready for the step of Baptism</p>'
        ],
        (object)[
                'q' => 'Register for the Baptism Class',
                'a' => '<p>Does your child still have questions about Salvation?  Are they telling you they\'re ready to be baptized?  All kids Kindergarten to 5th grade participate in our Salvation/Baptism Class prior to baptism.  We cover basics such as The Plan of Salvation, the Purpose of Baptism and other details.</p>'
                        . '<p>This class includes a Parent Connection where we connect with parents/guardians.  We want to help you look ahead at what you can do to help your child establish an active faith in Christ.'
                        . ' Use the following links to register at the '
                        . '<a class="no-wrap" href="' . $baptism_registration['pellissippi'] . '" target="_blank">Pellissippi Campus</a>, '
                        . '<a class="no-wrap" href="' . $baptism_registration['blount'] . '" target="_blank">Blount Campus</a>, or '
                        . '<a class="no-wrap" href="' . $baptism_registration['north'] . '" target="_blank">North Knox Campus</a>'
                        . '.</p>'
        ]
];

?>

<!-- IMAGE: Need new header image -->
@extends('layouts.page', ['title' => 'Kid Steps', 'hero_image' => 'images/fpkids/coloring-wide.jpg'])

@section('page')

    @introsection(['title' => 'Kid Steps'])
    <p>Our desire is to partner with parents in helping them to soundly determine when their child is ready for baptism. The Baptism Class is the tool we use to provide this filter for parents.</p>
    <p>In our Baptism Class, we will discuss the plan of salvation &amp; the purpose of baptism in an age-appropriate, relevant way. As we interact with your child through conversation, we want them to articulate the following:</p>
    <ul>
        <li>Profession of Faith - The ability to state when and how they crossed the line of faith</li>
        <li>Why Baptism - The ability to state why baptism is important to them</li>
    </ul>
    <p>When a child can accomplish these two things, parents can move toward scheduling their Baptism.</p>
    <p>When a child is unable to articulate these things, parents are provided a resource to help them as they take more time to explore the topic with their child.</p>
    <p>To participate in the Baptism Class, please have a look at the section below titled, "Register for the Baptism Class," and use the appropriate link to register.</p>
    <p>If you're interested in learning more about baptism's role in the life of believers, please visit our <a href="/baptism">baptism page</a>.</p>
    @endintrosection

    @faqsection(['title' => 'Resources', 'faq' => $faq, 'class' => 'Section--lightGrey'])
    @endfaqsection

@endsection