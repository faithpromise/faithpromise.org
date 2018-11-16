@extends('layouts.page', ['title' => 'Men\'s Groups'])

@section('page')

    <div class="TextSection">
        <div class="TextSection-container">
            <h2 class="TextSection-title">Men's Groups</h2>

            <div class="TextSection-text">
                <p>Men, are you experiencing the growth, significance, adventure, purpose, and blessings God has for you? fpMen helps us in the journey to be a man of God in today's world as we connect, serve our community, grow spiritually, and win the battle for our character, families, and legacy.</p>
                <p>For every ten men in the United States, nine will have kids who leave the church, eight will have dissatisfying jobs, seven will look at pornography, six will pay only the monthly minimum on their credit card, four will get divorced, and only one will have a biblical worldview. Our men's groups exist to change these statistics. By connecting, growing, and serving, you can become the husband, father, and spiritual leader God designed you to be.</p>
                <p class="Footnote">*stats from No Man Left Behind by Pat Morley</p>
                <p class="text-center"><a class="Button" href="https://fpctystn.infellowship.com/GroupSearch/Show?zipcode=&category=7078&weekday=&start_time=">Find a Men's Group</a></p>
            </div>
        </div>
    </div>

    @cardsection(['title' => 'Short Term Groups', 'class' => 'Section--lightGrey', 'cards' => $events])
    @endcardsection

    <div class="TextSection TextSection--center {{ count($events) === 0 ? 'Section--lightGrey' : '' }}">
        <div class="TextSection-container">
            <h2 class="TextSection-title">Need Help?</h2>
            <div class="TextSection-text">
                <p>We'd love to help you find a group. Please email Kelly Carringer at <a href="mailto:KellyC@faithpromise.org?subject=Young adult group">KellyC@faithpromise.org</a>.
                </p>
            </div>
        </div>
    </div>

@endsection