@extends('layouts.page', ['title' => 'Heart for the Harvest'])

@section('page')

    @videosection([
        'title' => 'Heart for the Harvest',
        'video' => '187984774',
        'buttons' => [
            [
                'title' => 'Give Online',
                'url' => config('site.give_url')
            ],
            [
                'title' => 'Item Donations',
                'url' => config('site.give_items_url')
            ]
        ]
    ])

    <p>Heart for the Harvest is a special time each year when we prepare to give sacrificially to further the ministry of Faith Promise and ask God to use our church to make an eternal difference in the world. This offering is key in our effort to launch new campuses to see exponential growth and changed lives.</p>
    <p>We ask that you prayerfully consider giving above and beyond your regular tithes to the Harvest Offering weekend, Nov. 12-13, 2016. Contributions can be made online at any time.</p>
    @endvideosection

    @bgsection(['title' => 'New Prison Locations', 'class' => 'BackgroundSection--right', 'image' => 'images/general/h4h-prison.jpg'])
        <p>A portion of our 2016 Heart for the Harvest offering will go towards the establishment of prison campuses in two new locations: Morgan County Correctional Complex as well as the women’s side of Bledsoe County Correctional Complex.</p>
    @endbgsection

    <div style="padding: 60px 40px; text-align: center; font-size: 18px; text-transform: uppercase;">
        Heart for the Harvest Offering Weekend, <span class="no-wrap">NOV. 12-13, 2016 | #fpH4H</span>
    </div>

    @bgsection(['title' => 'New Campus Locations', 'class' => '', 'image' => 'images/general/h4h-campus.jpg'])
        <p>With over twenty years of doing ministry, we’ve not found a better tool for reaching people for Jesus than through multisite. One of our key initiatives for our 2016 Heart for the Harvest offering is to fund the launch of at least one new multisite location in 2017.</p>
    @endbgsection

@endsection
