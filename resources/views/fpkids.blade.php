---
permalink: /fpkids/
layout: page
title: fpKids
hero_image: /build/images/kids/fpkids-wide.jpg
body_class: fpkids

faq:
  - q: 'I''m new. What do I do?'
    a: '<p>First, we''re so glad to have you join us. There''s a special place at Faith Promise for your child to worship and grow in Christ. Please see our <a href="/fpkids/welcome/">welcome page</a> for an overview of what to expect when you visit.</p>'

  - q: 'Where can I get more information about child dedications?'
    a: '<p>Please visit out our <a href="/dedications/">child dedications</a> page for more information.</p>'

  - q: 'When will my child move from one room to the next?'
    a: '<p><strong>Nursery / Crawlers / Walkers</strong> - Generally these room transitions are based upon whether or not your baby is proficiently crawling/walking. For example, a toddler will remain in the Crawler room until he/she is walking the majority of the time without assistance.</p><p><strong>2 Years to PreK</strong> - Once your child turns 2 years old, their room transitions are based upon age. For example, the day your child turns 3 years old he/she will move to the 3 year old room.</p><p><strong>Kindergarten to 5th grade</strong> - Transitions change in elementary and follow the Knox County School calendar. When the new school year begins for Knox County, then we transition all our elementary students from one grade to the next.</p>'

  - q: 'I want to serve in Kid''s Ministry! What do I do?'
    a: '<p>We''d love to explore the best fit for you within in fpKIDS. To apply to serve in fpKIDS, contact the <a href="mailto:fpKids@faithpromise.org">fpKids office</a>.</p>'
---

{% assign events = site.events | where_contains: 'ministries', 'kids' | where_greater: 'expire_on', site.time | sort: 'starts_on' %}
{% assign staff = site.staff | where_contains: 'ministries', 'kids' | sort: 'sort' %}

<div class="IntroSection">
  <div class="IntroSection-container">

    <h1 class="IntroSection-title IntroSection-title--push">What is fpKids?</h1>

    <div class="IntroSection-text">

      <p>Each weekend at Faith Promise hundreds of children (birth through 5th grade) are having a blast learning about Christ in safe, age-appropriate environments. Through creative biblical teaching, we work together to teach kids how to do the greatest thing they can possibly do with their lives... love Jesus with all their heart, mind, and strength. <a class="BibleRef" href="https://www.bible.com/bible/100/Mark.12.30" target="_blank">Mark 12:30</a></p>
      <p>We'd love to see you and your family this weekend as we discover all God has for us in an exciting new way.</p>

      <hr class="Section-hr">

      <p class="text-constrain-compact text-center">See what your kids are learning and stay current on fpKids events by following us on social media.</p>

      {% include social-buttons.html
        facebook='//www.facebook.com/fpkids'
        twitter='//twitter.com/fp_kids'
      %}

    </div>
  </div>
</div>

<!--TODO: Resize / optimize image for this section-->
<style type="text/css" scoped>
  .im_new_bg {
    background-image: url(/build/images/kids/rocket-wide.jpg);
  }
</style>

<div class="BackgroundSection im_new_bg">
  <div class="BackgroundSection-container">
    <div class="BackgroundSection-text">
      <h2 class="BackgroundSection-title">I'm New</h2>
      <p>We're so glad to have you as our guest at Faith Promise. We want your experience in fpKIDS to be one worth talking about. Please visit our welcome page designed just for you.</p>
      <p><a class="Button" href="/fpkids/welcome/">Learn more</a></p>
    </div>
  </div>
</div>

{% include event-grid.html events=events title='Upcoming Events' %}

<style type="text/css" scoped>
  .kids_faq {
    background-image: url(/build/images/kids/pattern.png);
  }

  .kids_faq a:hover {
    background-color: #fff;
    color: #4e2b57;
  }
</style>

{% include faq.html faq=page.faq class='has-background kids_faq' %}

{%
include have-questions.html
email='fpkids@faithpromise.org'
text='If you still have questions about fpKids, please contact'
%}

{% include staff-gallery.html staff=staff title='Meet the fpKids Staff' class='Section--lightGrey' %}

