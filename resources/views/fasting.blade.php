<?php

$faq = [
        (object)[
                'q' => 'What Do We Mean by Fasting?',
                'a' => '<p>In the life of the Christian, fasting is giving up something as an act of devotion to Jesus. Generally, fasting involves giving up all food and only drinking water or juice for the duration of the fast, but some people will choose a variation of this - eating no solid foods, eating only fruits and vegetables, or giving up a particular kind of food for the duration of the fast.</p><p>Fasting is a spiritual discipline that every believer should have in their lives. Jesus did not say "if you fast." He said "when you fast." (' . bible_verses('Matthew 6:16') . ')</p>'
        ],
        (object)[
                'q' => 'How can I keep from thinking about food all the time?',
                'a' => '
                    <p>During the first few days of the fast, it\'s natural to think about food more often than normal. Your body will tell you that you\'re starving to death, but you\'re not. Instead, you\'re breaking the patterns of eating that your body is accustomed to. Try to use these hunger pains as an opportunity to focus your mind and attention back toward God.</p>
                    <p>Each time you find yourself absentmindedly thinking of food, make the conscious decision to remember God and pray to Him.</p>
                '
        ],
        (object)[
                'q' => 'Isn\'t it wrong to let people know that you\'re fasting?',
                'a' => '
                    <p>Jesus clearly warned people against drawing attention to themselves when fasting (Matthew 6:1-18), so we must be careful as individuals not to try to impress people through our actions; we\'re doing this for God, not for people. Even still, there are many times throughout Scripture when God called groups of people to fast collectively - together demonstrating their dependence on God.</p>
                '
        ],
        (object)[
                'q' => 'Where can I find more information?',
                'a' => '
                    <p>Want to learn more about fasting? Check out these excellent resources: <a href="http://www.amazon.com/Celebration-Discipline-Path-Spiritual-Growth/dp/0060628391">Celebration of Discipline by Richard J. Foster</a> and <a href="http://www.jentezenfranklin.org/fasting/fasting-basics/">Jentezen Franklin\'s website</a></p>
                '
        ]
];

?>

@extends('layouts.page', ['title' => 'Fasting', 'hero_image' => 'images/general/fasting.jpg'])

@section('page')

    @introsection(['title' => 'Thoughts on Fasting'])
    <p>From time to time, Pastor Chris will call our church to a time of fasting. The specific reason may vary slightly for each instance, but in general our fasting always centers around Faith Promise doing our part in expanding God's kingdom, seeing people saved, and asking God to do works of restoration and healing in people's lives.</p>
    @endintrosection

    @faqsection(['title' => 'Common Questions', 'faq' => $faq, 'class' => 'Section--lightGrey'])
    @endfaqsection


@endsection