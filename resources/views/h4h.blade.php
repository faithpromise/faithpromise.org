@extends('layouts.page', ['title' => 'Heart for the Harvest'])

@section('page')

    @introsection(['title' => 'Heart for the Harvest', 'buttons' => [
        [
            'title' => 'Give',
            'url' => route("give")
        ]
    ]])

    <p>Heart for the Harvest is a special time each year when we prepare to give sacrificially to further the ministry of Faith Promise and ask God to use our church to make an eternal difference in the world. This offering is key in our effort to launch new campuses to see exponential growth and changed lives.</p>
    <p>We ask that you prayerfully considering giving above and beyond your regular tithes to the Harvest Offering weekend, Nov. 15-16, 2014. Contributions can be made online at any time.</p>

    @endintrosection

    @textsection(['title' => '2014 Areas of Focus', 'class' => 'Section--lightGrey'])
    <p>The following areas will be impacted through this year's offering:</p>

    <ol>
        <li>
            <strong>Relocating North Knoxville Campus to a Permanent Facility</strong>
            <p>Donations from Heart for the Harvest will also fund the renovation expenses & current lease buyout. We will begin a 3-year lease on the property with plans to purchase in January 2018 for $1.74M.</p>
        </li>
        <li>
            <strong>Improving an Existing Campus or Launching a New One</strong>
            <p>A portion of our Heart for the Harvest Fund will be used to either renovate an existing campus location or launch our next campus. The leadership of our church is praying for wisdom as we make this decision.</p>
        </li>
        <li>
            <strong>Children in Salubindza, South Africa, will be fed.</strong>
            <p>Following Jesus' command, we continue to expand our ministry to needy children worldwide. Part of the Heart for the Harvest funding will be used to build a feeding center in Salubindza, South Africa, where Faith Promise missionary Chris Ladd is serving. This community center will be built in partnership with Children's Cup Ministry to help with feeding over 300 kids every day.</p>
        </li>
        <li>
            <strong>Eradicating Debt to Improve our Foundation for Future Ministry</strong>
            <p>In order to position our church for future growth, part of this year's offering will be used to reduce our current debt. Our plan is to eradicate all debt by 2031.</p>
        </li>
        <li>
            <strong>The Gospel is Preached to the Deaf in Jamaica</strong>
            <p>Part of this year's offering will be used to help complete a portion of the conference and retreat center that is being constructed at the Jamaica Deaf Village where Faith Promise missionaries Ben & Krista Beukema are serving. This facility will be used to provide jobs and training for the Deaf of Jamaica and create revenue for ongoing ministry there. We believe this facility will help strengthen this generation of Deaf adults as well as equip future generations to come.</p>
        </li>
    </ol>

    @endtextsection

@endsection
