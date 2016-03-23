@extends('layouts.page', ['title' => 'Get Updates'])

@section('page')

    @introsection([
        'title' => 'Email Newsletter',
        'buttons' => [
            [
                'title' => 'Get Email Updates',
                'url' => 'http://eepurl.com/bfeEt1'
            ],
            [
                'title' => 'Visit Our Blog',
                'url' => 'http://blog.faithpromise.org/'
            ]
        ]
    ])
    <p>Our newsletter subscription lets you decide the types of updates you want to receive.</p>
    @endintrosection

    @textsection(['title' => 'Social Media', 'class' => 'Section--lightGrey TextSection--center'])

        <p>We'd love to connect with you on social media. We frequently post events, updates, and other exciting things happening at Faith Promise.</p>

        <ul class="SocialList">
            <li class="SocialList-item">
                <a class="SocialList-link facebook" href="https://www.facebook.com/faithpromise"><i class="SocialList-icon icon-facebook-circled"></i></a>
            </li>
            <li class="SocialList-item">
                <a class="SocialList-link twitter" href="https://twitter.com/faithpromise"><i class="SocialList-icon icon-twitter-circled"></i></a>
            </li>
            <li class="SocialList-item">
                <a class="SocialList-link instagram" href="https://instagram.com/faithpromise"><i class="SocialList-icon icon-instagram"></i></a>
            </li>
            <li class="SocialList-item">
                <a class="SocialList-link vimeo" href="https://vimeo.com/faithpromise"><i class="SocialList-icon icon-vimeo-circled"></i></a>
            </li>
            <li class="SocialList-item">
                <a class="SocialList-link pinterest" href="https://www.pinterest.com/faithpromise/"><i class="SocialList-icon icon-pinterest-circled"></i></a>
            </li>
        </ul>

    @endtextsection

    @include('partials.have_questions', [
        'title' => 'Have a Question?',
        'text' => 'If you need help finding information about a specific event, please contact #email#'
    ])

@endsection