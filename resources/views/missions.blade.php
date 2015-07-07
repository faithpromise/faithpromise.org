---
layout: page
permalink: /missions/
title: Missions
hero_image: /build/images/general/pellissippi-wide.jpg
missionaries:
  - name: The Beukemas
    area: Jamaica
    url: http://bkbeukema.org/
    image: beukemas.jpg

  - name: The Coplands
    area: Italy
    url: http://nickandshannan.org/
    image: coplands.jpg

  - name: Chris Ladd
    area: South Africa
    url: http://chrisleeladd.com/
    image: chris-ladd.jpg

  - name: Julie Rumph
    area: South Africa
    url: http://julierumph.com/
    image: julie-rumph.jpg
---

<!--TODO: Confirm missionary areas-->

<!--TODO: Input events-->
{% assign events = site.events | where_contains: 'ministries', 'kids' | where_greater: 'expire_on', site.time | sort: 'starts_on' %}

<!--TODO: Hero image - missions -->
<!--TODO: Add page content-->

<div class="IntroSection">
  <div class="IntroSection-container">
    <h1 class="IntroSection-title">Faith Promise Missions</h1>
    <div class="IntroSection-text">
      <p>Each year our church plans multiple international mission trips. You can find contact information and details by selecting a trip below. All donations made to Faith Promise Church to support mission trips are fully tax deductible.</p>
      <p>We also engage the world around us, sharing the hope of Christ in tangible ways. Below you will find several opportunities to serve our community.</p>
    </div>
  </div>
</div>

{% capture upcoming_text %}
<p>We're in the process of finalizing dates for 2015 and will be posting them here as soon as they're ready. In the meantime, feel free to contact us at <a href="mailto:missions@faithpromise.org">missions@faithpromise.org</a> if you have any questions.</p>
{% endcapture %}

{% include event-grid.html events=events title='Upcoming Trips' text=upcoming_text class='Section--lightGrey' %}

<div class="StaffSection">
  <div class="StaffSection-container">
    <h2 class="StaffSection-title">Missionaries</h2>
    <ul class="StaffSection-grid">
      {% for member in page.missionaries %}

      <li class="StaffSection-item">
        <a class="StaffSection-card" href="{{ member.url }}">
          <span class="StaffSection-photo" style="background-image:url('/build/images/missionaries/{{ member.image }}');"></span>
          <span class="StaffSection-name">{{ member.name }}</span>
          <span class="StaffSection-staffTitle">{{ member.area }}</span>
        </a>
      </li>

      {% endfor %}
    </ul>
  </div>
</div>

<div class="GridSection">
  <div class="GridSection-container">
    <div class="GridSection-title">Serving our Community</div>
    Community logos here
  </div>
</div>

<div class="GridSection">
  <div class="GridSection-container">
    <div class="GridSection-title">Serving our Community</div>
    KidsHope, Clothing ministry, Angel Tree
  </div>
</div>

<div class="TextSection">
  <div class="TextSection-container">
    <div class="TextSection-title">Get Updates</div>
    <div class="TextSection-text">
      <p>Sign up for email notifications and we'll let you know when new trips are planned.</p>
      <a class="Button">Sign Up</a>
      <!--TODO: Get url for missions updates-->
    </div>
  </div>
</div>