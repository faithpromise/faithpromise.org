@extends('layouts.page', [
    'title' => 'What to Expect',
    'hero_image' => 'images/fpstudents/worship-tall.jpg'
])

@section('page')

    {{--
    ================================================================================
        Intro
    ================================================================================ --}}

    @introsection(['title' => 'What To Expect'])
    <p>If you are new to the area or to Faith Promise and are considering a visit to fpStudents, we are pumped about having you here! We want to do everything we can to make your first visit to fpStudents a great one. When you get here, check in at the VIP table at your campus where we have awesome volunteers waiting to greet you with a smile, a gift, and help get you connected to fps. We can't wait to meet you! See you Wednesday.</p>
    @endintrosection

    {{--
        ========================================
        Contact
        ========================================
    --}}
    @include('partials.have_questions', ['class' => 'Section--lightGrey', 'email' => 'fpsglobal@faithpromise.org', 'text' => 'If you have questions we\'d love to hear from you. Please contact us at #email#'])

@endsection