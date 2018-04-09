@extends('layouts.page', ['title' => 'God Behind Bars'])

@section('page')

    @textsection(['title' => 'Volunteer', 'class' => 'Section--lightGrey'])
    <p>In January 2017, Faith Promise began collaborating with God Behind Bars to launch church campuses inside prisons. To date, we’re serving in two facilities in Bledsoe and Morgan counties. If you are interested in serving at God Behind Bars, we'd love to help. Here's how to sign up.</p>
    <p>1. Please let us know by completing <a href="https://docs.google.com/forms/d/e/1FAIpQLSd9ZmjdjqjKWL7_Fte_xOC5I4uhSznfLqjDHfTF7ABSQDCslg/viewform" target="_blank">this form</a>.</p>
    <p>2. Complete the <a href="http://volunteer.godbehindbars.com/" target="_blank">God Behind Bars Application</a>. (Even if you already completed the GBB Application, please complete it again.)</p>
    <p>3. Complete the Tennessee Department of Corrections <a href="https://apps.tn.gov/vserv/" target="_blank">Volunteer Services Application</a></p>
    <p>4. Plan on attending a volunteer training session. Training sessions are typically held on a monthly basis; we’ll contact you directly to communicate the next training.</p>
    @endtextsection

    @include('partials.have_questions', ['email' => 'vikkih@faithpromise.org', 'contact' => 'Vikki Huisman', 'text' => 'We will be in contact with all interested volunteers with additional information. If you have questions, please email #email#.'])

@endsection