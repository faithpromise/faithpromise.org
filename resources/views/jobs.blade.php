<?php

$childcare = new stdClass();
$childcare->card_title = 'Childcare Team Member';
$childcare->card_subtitle = 'Part-time';
$childcare->card_text = 'The Childcare Team Member provides support to other ministries of Faith Promise Church by providing...';
$childcare->card_url = doc_url('jobs/childcare-team-member.pdf');
$childcare->card_url_text = 'Download PDF';

$openings = collect([$childcare]);

?>

@extends('layouts.page', ['title' => 'Join Our Team'])

@section('page')

    @introsection([
        'title' => 'Join Our Team'
    ])
    <p>Interested in joining the staff team of the fastest-growing church in East Tennessee? See an opportunity below where you could put your expertise to work to help move our church to the next level? If so, we'd love to hear from you.</p>
    @endintrosection

    @cardsection(['title' => 'Current Opportunities', 'class' => 'Section--lightGrey', 'cards' => $openings])
    @endcardsection

    @include('partials.have_questions', ['email' => 'mallorye@faithpromise.org', 'contact' => 'Mallory Ellis', 'text' => 'If you have questions about employment opportunities at Faith Promise, please contact #email#'])

@endsection