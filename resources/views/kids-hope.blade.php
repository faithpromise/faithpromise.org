@extends('layouts.page', ['title' => 'Kids Hope USA'])

@section('page')

    @introsection(
        [
            'title' => 'Kids Hope USA',
            'buttons' => [
                [
                    'title' => 'Ministry Overview (pdf)',
                    'url' => 'http://blog.faithpromise.org/wp-content/uploads/2013/09/Information-welcome-letter.pdf'
                ]
            ]
        ]
    )
    <p>One child, one hour is the heart of KIDS HOPE USA. One caring adult mentoring an at-risk child one hour every week. Because when kids feel loved and valued, they are better able to learn, grow, and succeed.  Faith Promise has adopted Beaumont Elementary School in the Western Heights area of Knoxville. The opportunity is vast. The need is great. The idea is simple. One Child, One Hour, One Church, One School. You could be the one.</p>
    @endintrosection

    {{--
        ========================================
        Contact
        ========================================
    --}}
    @include('partials.have_questions', ['class' => 'Section--lightGrey', 'title' => 'Need more info?', 'email' => 'colelisa@charter.net', 'text' => 'For more information, contact Lisa Cole at #email#'])

@endsection