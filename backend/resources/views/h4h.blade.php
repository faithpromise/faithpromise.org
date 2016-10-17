@extends('layouts.page', ['title' => 'Heart for the Harvest'])

@section('page')

    @videosection(['title' => 'Heart for the Harvest', 'video' => '145143741', 'buttons' => [
        [
            'title' => 'Give Online',
            'url' => route("give")
        ],
        [
            'title' => 'Noncash Donations',
            'url' => 'https://give.idonate.com/faith-promise-church/donate'
        ]
    ]])

    <p>Heart for the Harvest is a special time each year when we prepare to give sacrificially to further the ministry of Faith Promise and ask God to use our church to make an eternal difference in the world. This offering is key in our effort to launch new campuses to see exponential growth and changed lives.</p>
    <p>We ask that you prayerfully consider giving above and beyond your regular tithes to the Harvest Offering weekend, Nov. 14-15, 2015. Contributions can be made online at any time.</p>
    @endvideosection

    @textsection(['title' => '2015 Areas of Focus', 'class' => 'Section--lightGrey'])
    <p>The following areas will be impacted through this year's offering:</p>

    <ol>
        <li>
            <strong>Loudon County Campus Launch</strong>
            <p>In Fall of 2016, we will launch our new Loudon County Campus. Our Heart for the Harvest Offering will be key in securing resources needed to prepare for this future location.</p>
        </li>
        <li>
            <strong>Debt Reduction</strong>
            <p>In a continued effort to reduce debt and position our church for a strong future, we will refinance our current loan in September of 2016. Our plan is to apply at least one million dollars towards principal at closing and eliminate our current debt in 15 years.</p>
        </li>
        <li>
            <strong>Prison Campus Launch</strong>
            <p>Faith Promise is founded on a driving desire to see people saved through the life-giving message of Jesus. Our 2015 Heart for the Harvest mission focus is a partnership with God Behind Bars ministry for the establishment of a Faith Promise prison campus at the Bledsoe County Correctional Complex. This campus will consist of a broadcast of our entire weekend service—worship and preaching—along with weekly small groups.</p>
        </li>
    </ol>

    @endtextsection

@endsection
