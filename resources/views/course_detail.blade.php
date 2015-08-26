@extends('layouts.page', ['title' => $course->title, 'hero_image' => $course->image])

@section('page')

    @introsection(['title' => $course->title])
        {{ $course->description }}
    @endintrosection

    @textsection(['title' => 'Times &amp; Registration', 'class' => 'Section--lightGrey'])

        <table class="CourseTable">
            <thead>
                <tr>
                    <td>Campus</td>
                    <td>Time</td>
                    <td>Starts on</td>
                    <td>Register</td>
                </tr>
            </thead>
            <tbody>
                @foreach($times as $time)
                    <tr>
                        <td>{{ $time->campus->name }}</td>
                        <td>{{ $time->starts_at->format('l') }}s at {{ $time->starts_at->format('g:i A') }}</td>
                        <td>{{ $time->starts_at->format('F j') }}</td>
                        <td><a href="{{ $time->registration_url }}">Register here</a></td>
                    </tr>
                @endforeach
            </tbody>
        </table>

    @endtextsection

    @include('partials.have_questions', ['email' => 'jenniferp@faithpromise.org', 'text' => 'If you have questions about a group or ways to get involved, please contact #email#'])

@endsection