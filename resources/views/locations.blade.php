---
layout: page
permalink: /locations/
title: Locations
hero_image: /build/images/locations/pellissippi-wide.jpg
---

{% assign locations = site.campuses | sort: 'location' %}

<!--TODO: add hero image-->
<!--TODO: add location photos-->
<!--TODO: add page content-->

<div class="GridSection GridSection--center">
  <div class="GridSection-container">
    <h2 class="GridSection-title">Find a Location</h2>
    <div class="GridSection-text">
      <p>Join us this weekend at a location near you.</p>
    </div>
    <ul class="Card-grid" card-grid>
      {% for location in locations %}
      {% capture image %}/build/images/locations/{{ location.ident }}-wide.jpg{% endcapture %}
      {% capture text %}
        {% if location.ident == 'online' %}
        <p>Join us from wherever you are</p>
        {% else %}
        <p>
          {{ location.address }}<br>
          {{ location.city }}, {{ location.state }} {{ location.zip }}
        </p>
        {% endif %}
      {% endcapture %}
      <li class="Card-item">
        {% include card.html
        title=location.location
        subtitle=location.title
        image=image
        text=text
        image=image
        url=location.url
        url_text='More Details'
        %}
      </li>
      {% endfor %}
    </ul>
  </div>
</div>

<!--{//% include locations.map.html %}-->