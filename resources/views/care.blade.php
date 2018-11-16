@extends('layouts.page', ['title' => 'Care Ministries'])

@section('page')

    @introsection(['title' => 'Care Ministries'])
    <p>At Faith Promise, the majority of care and ministry happens through
        <a id="to_groups_from_care" href="{{ route('groups') }}">small groups</a>. However, we do have several ministries that exist outside of groups to help facilitate care to our congregation and community.
    </p>
    @endintrosection

    @textsection(['title' => 'Christian Counseling', 'class' => 'Section--lightGrey'])
    <p>The Counseling Ministry is designed to offer short-term Christian counseling to members and regular attenders of Faith Promise Church. Our ministry team includes Ann O'Connor Slimp, Ph.D. and Candis Cochran, M.A. Also, graduate student interns may also provide some counseling services.</p>
    <p>Because of limited resources, counseling for people who do not attend Faith Promise will be limited to one consultation appointment.</p>
    <p>The counselors at Faith Promise encourage people to identify specific goals for counseling, and counseling sessions are focused on these goals. We provide individual counseling to adults, adolescents, and children, as well as premarital and couple's counseling. We also work closely with the Celebrate and Stephen Ministries at Faith Promise Church.</p>
    <p>Sessions are available on an appointment basis and are offered Monday-Friday from 9 am-2 pm, as well as Mondays from 4-8 pm. Evening hours are the most requested appointments and can book very quickly. We do not have appointment times available on the weekends. To make an appointment, please call the church office at 251-2590, ext. 0, and request an appointment. Everyone is asked to complete an Intake Questionnaire before their first appointment. These are available at the office when you arrive but can also be printed at home before the first session by
        <a href="{{ doc_url('counseling_form2.pdf') }}" target="_blank">clicking here</a>.</p>
    <p>*** Please realize that our counseling ministry is not staffed to serve as a crisis center after regular appointment hours. Emergencies should be directed to 911, Mobile Crisis Unit at 539-2409 or go to the hospital emergency room of your choice. ***</p>
    @endtextsection

    @profilessection(['title' => 'Staff Counselors', 'profiles' => $ministry->Staff])
    @endprofilessection

    @textsection(['title' => 'Stephen Ministry'])
    <p>Stephen Ministry is a nationally recognized Christian care ministry which began in 1975 and is helping more than a million people in over 11,000 churches. The Faith Promise Stephen Ministry equips lay people to provide confidential, one-on-one, Christ-centered care and support to people experiencing difficult times in their lives such as loss of a loved one, job loss, terminal illness, and divorce. The ministry pairs individuals with a Stephen Minister who will come alongside them to provide emotional and spiritual care for as long as the need persists.
        <a id="to_stephen_from_care" href="{{ route('stephen') }}">More information</a></p>
    @endtextsection

    @textsection(['title' => 'fpCelebrate', 'class' => 'Section--lightGrey'])
    <p>fp Celebrate meets on Monday nights at the FPC Pellissippi Campus starting at 6:00 pm and is a time of helping people connect, heal, and grow.
        <a id="to_celebrate_from_care" href="{{ route('celebrate') }}">More information</a></p>
    @endtextsection

    @textsection(['title' => 'Premarital Counseling'])
    <p>Premarital counseling is available through our staff counselor and pastors. The counseling typically requires an online inventory, four or five hour-long sessions, and homework. Requests for counseling must be received four months prior to your wedding date in order for our staff to accommodate your schedule.</p>
    <p>To schedule premarital counseling with a staff pastor, please
        <a id="to_staff_from_care" href="{{ route('staff') }}">contact them directly</a>. If you prefer to schedule premarital counseling with our staff counselor, please contact the church office at 865-251-2590.
    </p>
    @endtextsection

    @textsection(['title' => 'Unemployed or Underemployed?', 'class' => 'Section--lightGrey'])
    <p>Are you having difficulty getting companies to respond to your resume? Are you getting interviews but no offer?</p>
    <p>There are nearly 10.5 million people unemployed in our country and nearly 35,000 just in this surrounding area - potentially competing for the job you want. National surveys report that only 30% are in a rewarding job. That means that up to 70% are looking elsewhere as they continue to receive a paycheck.</p>
    <p>If you want to learn what most employers are looking for in a resume and why they ask the questions they do, sign up for Knoxville Leadership Foundation's
        <a href="http://knoxworx.klf.org/set-for-success/" target="_blank">SET for Success Program</a>. 86.4 % of the people who have learned these principles find work in less than 140 days.
    </p>
    <p>If you have further questions, call Don Truza, at 865-693-3193.</p>
    <p>If you're an employer and want to post a job listing,
        <a href="http://knoxworx.klf.org/jobs-2/add/" target="_blank">go here</a>.</p>
    @endtextsection

@endsection