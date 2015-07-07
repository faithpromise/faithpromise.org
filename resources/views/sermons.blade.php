---
layout: default
title: Sermons
permalink: /sermons/
nav_style: solid
---

<!-- Series -->
{% assign series = site.series | where:'is_official_series', true | sort: 'publish_on' | reverse %}

<!-- Latest sermon -->
{% assign latest_sermon = site.videos | where:'type', 'sermon' | sort: 'publish_on' | reverse | first %}

<!-- Series the latest sermon belongs to -->
{% assign latest_sermon_series = site.series | where:'ident', latest_sermon.series | first %}

<!-- Output hero -->
{% include hero-video.html video=latest_sermon series=latest_sermon_series heading='Latest Sermon:' %}

<div class="Content">

  <div class="Container">

    {% include sermons-filter.html active='series' %}

    <h2 class="Section-title" ng-hide="false">Sermon Series</h2>

  </div>

  <div class="SeriesGallery">
    <ul class="SeriesGallery-list">
      {% assign next_series_starts = null %}
      {% for item in series %}
      <li class="SeriesGallery-item"{% if item.publish_on > site.time %} foo="bar" publish-on="{{ item.publish_on }}{% endif %}">
        <a class="SeriesGallery-link" href="/series/{{ item.ident }}/">
          <img class="SeriesGallery-thumb" src="{{ site.paths.series_images}}{{ item.ident }}-square.jpg">

          <div class="SeriesGallery-titles">
            <h3 class="SeriesGallery-title">{{ item.title }}</h3>
            <h4 class="SeriesGallery-subtitle">

              {% if item.starts_on > site.time or latest_sermon_series.ident == item.ident %}
                <series-date starts="{{ item.starts_on }}" next-series-starts="{{ next_series_starts }}"></series-date>
              {% else %}
                {{ item.starts_on | date: "%b, %Y" }}
              {% endif %}

              {% assign videos = site.videos | where:"series", item.ident | where:"type", "sermon" | sort:"publish_on" %}
              {% if videos.size > 0 %}
              &nbsp;&middot;&nbsp; {{ videos.size }} message{% if videos.size <> 1 %}s{% endif %}
              {% endif %}
            </h4>
          </div>
        </a>
      </li>
      {% assign next_series_starts = item.starts_on %}
      {% endfor %}
    </ul>

  </div>

</div>