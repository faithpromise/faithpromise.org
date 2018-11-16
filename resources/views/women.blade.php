@extends('layouts.page', ['title' => 'Women\'s Groups'])

@section('page')

    <div class="TextSection">
        <div class="TextSection-container">
            <h2 class="TextSection-title">Women's Groups</h2>

            <div class="TextSection-text">
                <p>fp Women's Groups exist to help women become who God created them to be in order that they can fulfill their destiny. We will equip and encourage women to connect with other women, grow into a deeper relationship with Jesus Christ, and serve one another, our community, and the world.</p>

                <blockquote class="BlockQuote">
                    "Therefore, as you received Christ Jesus the Lord, so walk in Him, rooted and built up in Him and established in the faith, just as you were taught, abounding in thanksgiving." - Colossians 2:6-7
                </blockquote>
                <p class="text-center"><a class="Button" href="https://fpctystn.infellowship.com/GroupSearch/Show?zipcode=&category=7077&btn=Search">Find a Women's Group</a></p>
            </div>
        </div>
    </div>

    @cardsection(['title' => 'Upcoming Events', 'class' => 'Section--lightGrey', 'cards' => $events])
    @endcardsection

    @cardsection(['title' => 'Short Term Groups', 'cards' => $studies])
    @endcardsection

    <div class="TextSection TextSection--center Section--lightGrey">
        <div class="TextSection-container">
            <h2 class="TextSection-title">Need Help?</h2>
            <div class="TextSection-text">
                <p>We'd love to help you find a group. Please email Kelly Carringer at <a href="mailto:KellyC@faithpromise.org?subject=Young adult group">KellyC@faithpromise.org</a>.
                </p>
            </div>
        </div>
    </div>

@endsection