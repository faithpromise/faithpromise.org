@extends('layouts.page', ['title' => 'Welcome to fpKids', 'hero_image' => '/build/images/kids/coloring-wide.jpg'])

@section('page')

<div class="StorySection StorySection--right">
  <div class="StorySection-container">
    <div class="StorySection-wrap">
      <div class="StorySection-text">
        <h1 class="StorySection-title">Welcome to fpKids</h1>
        <p>If you're new to Faith Promise or want to learn more about fpKids, this page was created with you in mind.</p>
      </div>
      <div class="StorySection-image">
        <vimeo id="127442991"></vimeo>
      </div>
    </div>
  </div>
</div>

<!--TODO: Need photo for preK-->
<style type="text/css" scoped>
  .prek {
    background-image: url(/build/images/kids/prek-wide.jpg);
  }
</style>
<div class="BackgroundSection prek">
  <div class="BackgroundSection-container">
    <div class="BackgroundSection-text">
      <h2 class="BackgroundSection-title">Under 2 years</h2>
      <p>Before Kindergarten, your kids will learn how God made them, loves them, and wants to be their friend through fun and engaging activities such as dramas, storytelling, puppetry and worship. Check out what we're learning right now.</p>
    </div>
  </div>
</div>

<!--TODO: Need photo for K-3rd -->
<style type="text/css" scoped>
  .k-3 {
    background-image: url(/build/images/kids/k-3rd-wide.jpg);
  }
</style>

<div class="BackgroundSection BackgroundSection--right k-3">
  <div class="BackgroundSection-container">
    <div class="BackgroundSection-text">
      <h2 class="BackgroundSection-title">K-3rd Grade</h2>
      <p>The best leaders on the planet will engage your kids to connect the Bible to their personal lives through dramas, interactive games, and dynamic worship. They'll learn how to trust God, make wise choices, and treat others the way they want to be treated.</p>
    </div>
  </div>
</div>

<!--TODO: Need photo for club45 -->
<style type="text/css" scoped>
  .club45 {
    background-image: url(/build/images/kids/prek-wide.jpg);
  }
</style>
<div class="BackgroundSection club45">
  <div class="BackgroundSection-container">
    <div class="BackgroundSection-text">
      <h2 class="BackgroundSection-title">4th & 5th Grade</h2>
      <p>Club 45 is an innovative environment for your preteen. They'll focus on their relationship with Christ as well as their relationship with their peers, parents, and adult leaders through creative teaching, interactive games, and engaging worship.</p>
    </div>
  </div>
</div>

<div class="TextSection Text-Section--center">
  <div class="TextSection-container">
    <div class="TextSection-text">
      <h2 class="TextSection-title">Special Needs</h2>
      <p>We have many families at Faith Promise who's children require special care. It's our desire to provide a church home for your family and we understand the integration process for your child will be unique. Before your first visit it's important for us to get to know you and your child, so that we can best serve you. Please contact us at <a href="mailto:fpkids@faithpromise.org">fpkids@faithpromise.org</a></p>
    </div>
  </div>
</div>


<!--TODO: Need photo for fpKids security -->
<style type="text/css" scoped>
  .secure {
    background-image: url(/build/images/kids/prek-wide.jpg);
  }
</style>
<div class="BackgroundSection secure">
  <div class="BackgroundSection-container">
    <div class="BackgroundSection-text">
      <h2 class="BackgroundSection-title">Secure Environment</h2>
      <p>When you register your child, you'll receive matching identification tags that are exclusive to your family and visit. You'll present this tag when picking up your child. We'll also notify you during the service if your child needs you.</p>
    </div>
  </div>
</div>

@include('partials.visit')
@include('partials.have_questions', ['email' => 'fpkids@faithpromise.org', 'text' => 'If you still have questions about fpKids, please contact', 'class' => 'Section--lightGrey'])

@endsection