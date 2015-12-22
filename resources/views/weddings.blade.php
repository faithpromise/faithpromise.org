@extends('layouts.page', ['title' => 'Weddings'])

@section('page')

    @introsection(['title' => 'Weddings at Faith Promise'])
    <p>Use the form below to submit a wedding application. View our <a href="http://blog.faithpromise.org/wp-content/uploads/2014/05/The-Engagement-Covenant.pdf" target="_blank">Engagement Covenant</a>.</p>
    <p>Premarital counseling is available through our staff counselors and pastors. The counseling typically requires an online inventory, four or five hour-long sessions, and homework. Requests for counseling must be received four months prior to your wedding date in order for our staff to accommodate your schedule.</p>
    <p>To schedule premarital counseling with a staff pastor, please <a id="to_staff_from_weddings" href="{{ route('staff') }}">contact them directly</a>. If you prefer to schedule premarital counseling with our staff counselor, please contact the church office at 865-251-2590.</p>
    @endintrosection

    @textsection(['title' => 'Wedding Application', 'class' => '', 'image' => ''])
        <p><iframe height="686" allowTransparency="true" frameborder="0" scrolling="no" style="width:100%;border:none" src="http://faithpromiseweb.com/forms/embed.php?id=6" title="Wedding Application"><a href="http://faithpromiseweb.com/forms/view.php?id=6" title="Wedding Application">Wedding Application</a></iframe></p>
    @endtextsection

@endsection