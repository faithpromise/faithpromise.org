<?php

$faq = [
        (object)[
                'q' => '',
                'a' => ''
        ],
        (object)[
                'q' => '',
                'a' => ''
        ]
];

?>

@extends('layouts.page', ['title' => 'Global Leadership Summit'])

@section('page')

    @videosection(['title' => 'Global Leadership Summit 2017', 'youtube' => 'Dh-AfqZPQp8'])
    <p>
        <strong>We all lead people and projects every day.</strong> Whether at church, school, work, or home, you are leading people and projects every day in a culture that is constantly changing and redefining itself. Leadership takes perseverance, dedication, and a commitment to stretch your mind, expand your heart, and use your God-given gifts to impact our world in real and powerful ways.
    </p>

    <p>August 10-11, 2017, you're invited to gather with thousands of leaders across North America for The Global Leadership Summit. This annual event is designed to stretch, challenge, and inspire you with world-class speakers, interactive dialogue, and practical training. Faith Promise is hosting this live satellite event at our Pellissippi, Blount, and North Knox Campuses.</p>

    <p>
        <a class="Button" href="http://www.willowcreek.com/events/leadership/index.html##faculty" target="_blank">View the 2017 Speakers</a>
    </p>
    @endvideosection

    @textsection(['title' => 'Online Registration', 'class' => 'Section--lightGrey TextSection--center'])

    <div ng-show="answer == null">
        <h5>Are you a regular attender at Faith Promise Church?</h5>
        <span class="Button" ng-click="answer = 'attender'">Yes</span>
        <span class="Button" ng-click="answer = 'non-attender'">No</span>
    </div>

    <div ng-show="answer == 'non-attender'">
        <h5>At which campus do you wish to attend?</h5>
        <span class="Button" ng-click="answer = 'non-attender-pel'">West Knoxville</span>
        <span class="Button" ng-click="answer = 'non-attender-north'">North Knoxville</span>
        <span class="Button" ng-click="answer = 'non-attender-blount'">Maryville</span>
        <p><span class="link" ng-click="answer = null">Back</span></p>
    </div>

    <div ng-show="answer == 'attender'">
        <h5>At which campus do you wish to attend?</h5>
        <span class="Button" ng-click="answer = 'attender-pel'">West Knoxville</span>
        <span class="Button" ng-click="answer = 'attender-north'">North Knoxville</span>
        <span class="Button" ng-click="answer = 'attender-blount'">Maryville</span>
        <p><span class="link" ng-click="answer = null">Back</span></p>
    </div>

    <div ng-show="answer == 'attender-pel' || answer == 'attender-blount' || answer == 'attender-north'">
        <h5>Let's get you registered for the <span ng-show="answer == 'attender-pel'">Pellissippi</span><span ng-show="answer == 'attender-blount'">Blount</span> <span ng-show="answer == 'attender-north'">North Knox</span> Campus</h5>
        <iframe ng-if="answer == 'attender-pel'" src="http://www.willowcreek.com/events/leadership/central/regi/htmlhost.asp?siteid=145618" width="350" height="100" style="border:0px;"></iframe>
        <iframe ng-if="answer == 'attender-blount'" src="http://www.willowcreek.com/events/leadership/central/regi/htmlhost.asp?siteid=1432207" width="350" height="100" style="border:0px;"></iframe>
        <iframe ng-if="answer == 'attender-north'" src="http://www.willowcreek.com/events/leadership/central/regi/htmlhost.asp?siteid=1600046" width="350" height="100" style="border:0px;"></iframe>
        <p>If you're a regular attender or part of the Core team at Faith Promise Church, and you don't have the church discount code, please contact Brenda Moore at <a href="mailto:brendam@faithpromise.org">brendam@faithpromise.org</a>.</p>
        <p><span class="link" ng-click="answer = null">Start Over</span></p>
    </div>

    <!-- REVIEW: I don't think these links are working. Does not take you to location specific page on GLS website -->
    <div ng-show="answer == 'non-attender-pel' || answer == 'non-attender-blount' || answer == 'non-attender-north'">
        <h5>Let's get you registered for the <span ng-show="answer == 'non-attender-pel'">Pellissippi</span><span ng-show="answer == 'non-attender-blount'">Blount</span> <span ng-show="answer == 'non-attender-north'">North Knox</span> Campus</h5>
        <p class="text-constrain-compact">
            If you're not a regular attender or part of the Core team at Faith Promise Church, please
            <a ng-show="answer == 'non-attender-pel'" href="https://www.willowcreek.com/rega/#/reg/trans/one?invtID=EV-LSS1708-MAIN-269" target="_blank">register here</a>
            <a ng-show="answer == 'non-attender-blount'" href="https://www.willowcreek.com/rega/#/reg/trans/one?invtID=EV-LSS1708-MAIN-343" target="_blank">register here</a>
            <a ng-show="answer == 'non-attender-north'" href="https://www.willowcreek.com/rega/#/reg/trans/one?invtID=EV-LSS1708-MAIN-453" target="_blank">register here</a>.
        </p>
        <p><span class="link" ng-click="answer = null">Start Over</span></p>
    </div>

    @endtextsection

@endsection

