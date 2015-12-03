@extends('layouts.page', ['title' => 'The Stable Boy'])

@section('page')

    @videosection([
        'title' => 'The Stable Boy',
        'video' => '147482977'
    ])
    <p>
        Come celebrate Christmas with Faith Promise the weekend of <strong>Dec 12th &amp; 13th</strong> during normal <a class="no-wrap" href="{{ route('locations') }}">service times</a> as we present our new short film, <span class="no-wrap">&quot;The Stable Boy.&quot;</span>
    </p>
    <p>
        During each of our services, your kids (birth-5th grade) will experience <a href="{{ route('fpKids') }}">fpKids</a>, our weekend ministry to children. This will be an exciting time that you won't want to miss!
    </p>
    @endvideosection

    @cardsection(['title' => 'Find a Location', 'cards' => $campuses, 'class' => 'GridSection--center Section--lightGrey'])
    <p class="text-constrain-compact"><span class="no-wrap">&quot;The Stable Boy.&quot;</span> will be presented at each of our campuses at normal service times on Dec 12th &amp; 13th.</p>
    @endcardsection

@endsection