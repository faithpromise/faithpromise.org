<!DOCTYPE html>
<html>

    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Faith Promise Jobs: {{ $job->title }}</title>
        <meta name="description" content="{{ $job->excerpt }}">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="apple-touch-icon" href="apple-touch-icon.png">
        <link rel="stylesheet" href="/build/website/css/job.css">
    </head>

    <body>

        @include('includes.google_analytics')

        <div class="Job">
            <div class="Job-header">
                <div class="Job-logoWrap">
                    <svg class="Job-logo" role="img" title="Faith Promise Church Logo">
                        <use xlink:href="/build/website/svg/general.svg#logo-fp"></use>
                    </svg>
                </div>
                <div class="Job-titleWrap">
                    <h1 class="Job-title">{{ $job->title }}</h1>
                    <p class="Job-meta">Posted on {{ $job->publish_at->format('F j, Y') }}</p>
                </div>
            </div>
            <div class="Job-description">
                {!! $job->description !!}
                <hr>
                <h1>Interested?</h1>
                <p>If you're interested in this opportunity we'd love to hear from you. Please take a moment and send us your resume and contact information along with anything else you'd like us to know.</p>
                <a class="Job-button Button" href="mailto:{{ $job->contact->email }}?subject={{ 'Job Opportunity: ' . urlencode($job->title) }}">Contact {{ $job->contact->name }}</a>
                @if (!$other_jobs_available)
                &nbsp; <a class="Job-button Button" href="{{ route('jobs') }}">See Other Opportunities</a>
                @endif
            </div>
        </div>

    </body>

</html>