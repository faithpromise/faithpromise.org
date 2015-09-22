<?php

$facilities = new stdClass();
$facilities->card_title = 'Facilities Associate (Pellissippi Campus)';
$facilities->card_subtitle = 'Full Time';
$facilities->card_text = 'The Facilities Associate is responsible for the support functions of the Facilities Department at the Pellissippi Campus...';
$facilities->card_url = doc_url('jobs/facilities-associate-pellissippi.pdf');
$facilities->card_url_text = 'Download PDF';

$finance = new stdClass();
$finance->card_title = 'Finance Assistant';
$finance->card_subtitle = 'Full Time';
$finance->card_text = 'The Finance Assistant is responsible for the administrative functions of the Finance and Human Resources departments...';
$finance->card_url = doc_url('jobs/finance-assistant.pdf');
$finance->card_url_text = 'Download PDF';

$resources = new stdClass();
$resources->card_title = 'fpResources Coordinator';
$resources->card_subtitle = 'Part Time (10 hours per week)';
$resources->card_text = 'The fpResources Coordinator is responsible for coordinating volunteers and maintaining adequate inventory...';
$resources->card_url = doc_url('jobs/fpresources-coordinator.pdf');
$resources->card_url_text = 'Download PDF';

$fpkids = new stdClass();
$fpkids->card_title = 'fpKids Global Adminstrative Assistant';
$fpkids->card_subtitle = 'Part-time (25 hours per week)';
$fpkids->card_text = 'The Global Administrative Assistant is responsible for supporting the global ministries of fpKIDS....';
$fpkids->card_url = doc_url('jobs/fpkids-admin-assistant.pdf');
$fpkids->card_url_text = 'Download PDF';

$childcare = new stdClass();
$childcare->card_title = 'Childcare Team Member';
$childcare->card_subtitle = 'Part-time';
$childcare->card_text = 'The Childcare Team Member provides support to other ministries of Faith Promise Church by providing...';
$childcare->card_url = doc_url('jobs/childcare-team-member.pdf');
$childcare->card_url_text = 'Download PDF';

$openings = collect([$facilities, $finance, $resources, $fpkids, $childcare]);

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