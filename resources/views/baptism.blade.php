<!--TODO: Add page content-->

<?php

        $faq = collect([
            (object)[
                'q' => 'Why should I be baptized?',
                'a' => 'To follow the example set by Jesus.'
            ]
        ]);

?>

@extends('layouts.page', ['title' => 'Baptism', 'hero_image' => 'images/general/baptism-4-wide.jpg'])

@section('page')

    {{--
    ================================================================================
        Intro
    ================================================================================ --}}

    @introsection(['title' => 'Baptism', 'class' => 'IntroSection--compact'])
    <p>The Bible teaches that once a person is <a href="/salvation">saved</a>, his or her next step is to make that commitment to Jesus public through baptism.  When you're ready to take this important next step, please <a href="https://integration.fellowshipone.com/integration/FormBuilder/FormBuilder.aspx?fCode=qFJ6O2MqmTrVoPevphdkew==&cCode=RtKBDolfiPuZJp8o1+0ARA==" target="_blank">register here</a>.</p>
    <p><em>All baptisms must be scheduled by the Tuesday prior to the weekend you want to be baptized.</em></p>
    @endintrosection

    @faqsection(['class' => 'Section--lightGrey', 'faq' => $faq])

    @endfaqsection

@endsection