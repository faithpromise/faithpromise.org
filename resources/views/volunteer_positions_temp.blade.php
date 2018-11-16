@extends('layouts.page', ['title' => 'Serving', 'hero_image' => 'images/pages/opportunities-wide.jpg'])

@section('page')

    @introsection(['title' => 'Opportunities to Serve at Faith Promise'])
    <p>Ready to take the next step and begin serving at Faith Promise? Contact us using the form below.</p>
    @endintrosection

    <div class="Section">
        <div class="Section-container">
            <iframe height="613" allowTransparency="true" frameborder="0" scrolling="no" style="width:100%;border:none" src="http://www.faithpromiseweb.com/forms/embed.php?id=11" title="I'm Ready to Volunteer"><a href="http://www.faithpromiseweb.com/forms/view.php?id=11" title="I'm Ready to Volunteer">I'm Ready to Volunteer</a></iframe>
        </div>
    </div>

@endsection