---
layout: page
title: Meet Our Staff
permalink: /staff/
hero_image: /build/images/temp/hero-placeholder.png
---

<div class="Container Container--wide">

  <div class="PageFilters">
    <span class="PageFilters-label">Sort by:</span>
    <span class="PageFilters-option" ng-class="{ 'is-active': !staff_sort_method }" ng-click="staff_sort_method = null">Ministry Area</span>
    <span class="PageFilters-option" ng-class="{ 'is-active': staff_sort_method === 'campus' }" ng-click="staff_sort_method = 'campus'">Campus</span>
    <span class="PageFilters-option" ng-class="{ 'is-active': staff_sort_method === 'name' }" ng-click="staff_sort_method = 'name'">Name</span>
  </div>

</div>

  <div ng-show="!staff_sort_method">
    {% include staff-by-team.html %}
  </div>
  <div ng-show="staff_sort_method === 'campus'">
    <ng-include src="'/partials/staff-by-campus.html'"></ng-include>
  </div>
  <div ng-show="staff_sort_method === 'name'">
    <ng-include src="'/partials/staff-by-name.html'"></ng-include>
  </div>
