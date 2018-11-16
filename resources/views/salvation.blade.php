<?php

        $faq = collect([
                (object)[
                        'q' => 'Isn\'t Jesus just another good prophet, like many others throughout history?',
                        'a' => '<p>While some people hold this perspective, this is an option that Jesus clearly never intended for people to think.  Consider His words:</p><p>&quot;I am the way and the truth and the life. No one comes to the Father except through me.&quot; - John 14:6</p><p>The words of the British author, C.S. Lewis provide great insight here:</p><p>&quot;I am trying here to prevent anyone saying the really foolish thing that people often say about Him: \'I\'m ready to accept Jesus as a great moral teacher, but I don\'t accept His claim to be God.\' That is the one thing we must not say. A man who was merely a man and said the sort of things Jesus said would not be a great moral teacher. He would either be a lunatic - on the level with the man who says he is a poached egg - or else he would be the Devil of Hell. You must make your choice. Either this man was, and is, the Son of God: or else a madman or something worse.&quot; (C.S. Lewis, Mere Christianity, pp. 40-41.)</p>'
                ],
                (object)[
                        'q' => 'Once I commit my life to Jesus, what\'s the next step?',
                        'a' => '<p>When you make this commitment in your life, we want to <a id="to_contact_from_salvation" href="/contact">hear about it</a>, and we want to help you take the next steps spiritually.  You\'ll find several opportunities here on this website, but the most important next step is baptism.  You can read more about <a id="to_baptism_from_salvation" href="' . route('baptism') . '">baptism here</a>.</p>'
                ],
                (object)[
                        'q' => 'What is the Trinity?',
                        'a' => '<p>Put simply, the word "Trinity" is used to describe the nature of God existing as one God in three Persons - Father, Son, and Holy Spirit.  All three are equally eternal.  Even though God is made up of three Persons, there is only one God.</p>'
                ],
                (object)[
                        'q' => 'What about my kids?',
                        'a' => '<p>Our Director of Children\'s Ministries has put together some information to help you share the gospel with your kids.  <a href="/kid-steps">Click here</a>.</p>'
                ]
        ]);

?>

@extends('layouts.page', ['title' => 'Salvation'])

@section('page')

    {{--
    ================================================================================
        Intro
    ================================================================================ --}}

    @textsection(['title' => 'What is Salvation?', 'class' => 'IntroSection--compact'])
    <p>The most important spiritual step a person can take is to turn from their sins and commit their life to Jesus Christ.  It's sometimes called being "saved" or "born again", and it's often mistaken as just a prayer that a person prays.</p>
    <p>From Scripture, we see that being saved is much more than a prayer.  Though it begins with a prayer of commitment, salvation involves the entire direction of your life.  It's a lifelong commitment to follow Jesus and to put His priorities above your own.  Salvation happens when a person turns away from their sins and steps out in faith trusting that Jesus is the Son of God and that He alone can pay the penalty for his or her sins.</p>
    <p>The life of Jesus is recorded in the Bible.  It tells us that Jesus loves humanity so much that He chose to leave heaven to come to this world two thousand years ago to offer Himself as a sacrifice for all people.  When He claimed to be God, people thought He was lying and evil, and they had Him beaten and killed by hanging Him on a wooden cross.  But death could not contain Jesus.  After three days, God raised Him from the dead to demonstrate that what Jesus said was true.</p>
    <p>The Bible is clear that until a person commits his or her life to Jesus, they are cut off from God because of their sins.  However, if a person gives their life to Jesus, they spiritually become a new creation and are no longer under the penalty of sin.</p>
    <p>Being saved is different from being "good enough" or better than other people you know.  Instead, salvation is about realizing that without God, we are enslaved by our sins.  We each need Jesus to save us.</p>
    <p>Jesus Himself taught that a person must make a thoughtful and deliberate decision about whether or not to follow Him.  He told people to count the cost.  If you give your life to God, it will cost you everything you are... and in return, He will give you joy, peace, and love.</p>
    <p>When a person is saved, a spiritual transaction takes place.  God takes your old and broken life and replaces it with the righteousness of Jesus.  When that happens, a person becomes a child of God.</p>
    <p>If you're ready to commit your life to Jesus, you can do that in a couple of ways:</p>
    <ol>
        <li>You can pray where you are.  Tell God that you're sorry for the things you've done and for turning your back on Him.  Tell Him that you believe that He died and rose again because of your sins, and ask Him to save you.  Tell Him that you're turning away from your sins.  Tell Him that you need His presence to guide you through life.  Tell God that you're giving Him your whole life.  Thank Him for loving you and offering you salvation.</li>
        <li>If you'd prefer to pray with someone about this, one of our staff would be glad to do that with you.  While we may not be able to respond immediately, we will do our best to contact you within one business day of receiving your request.  Please email <a href="mailto:nextsteps@faithpromise.org" class="nowrap">nextsteps@faithpromise.org</a>, and we will have someone get in touch with you.</li>
    </ol>
    @endtextsection

    @faqsection(['class' => 'Section--lightGrey', 'faq' => $faq])

    @endfaqsection

@endsection