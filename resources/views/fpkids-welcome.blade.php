@extends('layouts.page', ['title' => 'Welcome to fpKids', 'hero_image' => 'images/fpkids/coloring-wide.jpg'])

@section('page')

    <!-- LATER: Add welcome video -->
    @introsection(['title' => 'Welcome to fpKids'])
    <p>If you're new to Faith Promise or want to learn more about fpKids, this page was created with you in mind.</p>
    @endintrosection


    @bgsection(['title' => 'Preschool', 'image' => 'images/fpkids/prek-wide.jpg'])
    <p>Before Kindergarten, your kids will learn how God made them, loves them, and wants to be their friend through fun and engaging activities such as crafts, storytelling, and worship.</p>
    @endbgsection

    @bgsection(['title' => 'K-3rd Grade', 'class' => 'BackgroundSection--right', 'image' => 'images/fpkids/k-3rd-wide.jpg'])
    <p>The best leaders on the planet will engage your kids to connect the Bible to their personal lives through dramas, interactive games, and dynamic worship. They'll learn how to trust God, make wise choices, and treat others the way they want to be treated.</p>
    @endbgsection

    @bgsection(['title' => '4th & 5th Grade', 'class' => '', 'image' => 'images/fpkids/club-45-wide.jpg'])
    <p>Club 45 is an innovative environment for your preteen. They'll focus on their relationship with Christ as well as their relationship with their peers, parents, and adult leaders through creative teaching, interactive games, and engaging worship.</p>
    @endbgsection

    <div class="TextSection Text-Section--center">
        <div class="TextSection-container">
            <div class="TextSection-text">
                <h2 class="TextSection-title">Special Needs</h2>
                <p>We have many families at Faith Promise who's children require special care. It's our desire to provide a church home for your family and we understand the integration process for your child will be unique. Before your first visit it's important for us to get to know you and your child, so that we can best serve you. Please contact us at
                    <a href="mailto:fpkids@faithpromise.org">fpkids@faithpromise.org</a></p>
            </div>
        </div>
    </div>

    @bgsection(['title' => 'Secure Environment', 'class' => 'BackgroundSection--right', 'image' => 'images/fpkids/security-wide.jpg'])
    <p>When you register your child, you'll receive matching identification tags that are exclusive to your family and visit. You'll present this tag when picking up your child. We'll also notify you during the service if your child needs you.</p>
    @endbgsection

    @include('partials.visit')

    @include('partials.have_questions', ['email' => 'fpkids@faithpromise.org', 'text' => 'If you have questions about fpKids, please contact #email#', 'class' => 'Section--lightGrey'])

@endsection