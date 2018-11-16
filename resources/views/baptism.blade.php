<?php

        $faq = collect([
            (object)[
                'q' => 'Why should I be baptized?',
                'a' => 'To follow the example set by Jesus in '
                    . bible_verses('Mark 1:9')
                    . ', because Christ commanded it in '
                    . bible_verses('Matthew 28:19-20')
                    . ', and because it demonstrates that I really am a Christian (see '
                    . bible_verses('Acts 18:8;1 John 2:3')
                    . ').'
            ],
            (object)[
                    'q' => 'What is the meaning of baptism?',
                    'a' => 'It illustrates Christ\'s death and resurrection ('
                        . bible_verses('1 Corinthians 15:3-4;Colossians 2:12')
                        . '), as well as my new life as a Christian ('
                        . bible_verses('2 Corinthians 5:17;Romans 6:4')
                        . '). Baptism doesn\'t make you a believer; it shows that you already believe. Baptism does not "save" you, only your faith in Christ does that. Baptism is like a wedding ring - it\'s the outward symbol of the commitment you made in your heart. '
                        . 'See ' . bible_verses('Ephesians 2:8-9')
            ],
            (object)[
                    'q' => 'Why be baptized by immersion? What if I\'ve been sprinkled in another church?',
                    'a' => 'Every baptism in the New Testament, including Christ\'s was by immersion. See '
                        . bible_verses('Matthew 3:16;Acts 8:38-39')
                        . '. The Greek word baptizo means "to immerse or dip under water." It best symbolizes a burial and resurrection!'
            ],
            (object)[
                    'q' => 'What if I\'ve been baptized in another church?',
                    'a' => 'If you have been baptized by immersion in another church once you were saved, there is no need to get baptized here again.'
            ],
            (object)[
                    'q' => 'Who should be baptized?',
                    'a' => 'Every person who has believed in Christ should be baptized. See '
                        . bible_verses('Acts 2:41;Acts 8:13;Acts 8:12') . '.'
                        . '<p>At Faith Promise, we wait until our children are old enough to believe and understand the true meaning of baptism before we baptize them.</p>'
                        . '<p>Some churches practice a "baptism of confirmation" for children. This ceremony is intended to be a covenant between the parents and God on behalf of the child. The parents promise to raise their child in the faith until the child is old enough to make his/her own personal confession of Christ. This custom began about 300 years after the Bible was completed.</p>'
                        . '<p>This is different from the baptism talked about in the Bible, which was only for those old enough to believe. The purpose is to publicly confess your personal commitment to Christ.</p>'
                        . '<p>At Faith Promise, it is a requirement that every member must have been baptized the way Jesus demonstrated, even though many of us were "confirmed" as children.</p>'
            ],
            (object)[
                    'q' => 'When should I be baptized?',
                    'a' => 'As soon as you have believed! See '
                        . bible_verses('Acts 2:41;Acts 8:35-38') . '.'
                        . '<p>There is no reason to delay. As soon as you have decided to receive Christ into your life, you can and should be baptized. If you wait until you are "perfect," you\'ll never feel "good enough"!</p>'
            ],
            (object)[
                    'q' => 'Where can I find a video of Pastor Chris teaching on baptism?',
                    'a' => 'Pastor Chris has spoken on the subject of baptism many times, but one of our favorites is entitled <a href="' . route('seriesVideo', ['series' => 'hereafter', 'series_video' => 'not-ashamed']) . '">"Not Ashamed"</a>.'
            ],
            (object)[
                    'q' => 'After my baptism has been scheduled through the office, what other information do I need to know?',
                    'a' => '<p>All those being baptized, will need to meet in the baptism room 20 minutes prior to the service in which you\'re being baptized. The Baptism Room is located on the left hand side of the worship center. As you enter the main lobby, follow the preschool hallway around the back of the worship center and it will lead you straight into the baptism room.</p>'
                            . '<p>You will need to bring a dark colored t-shirt and dark colored shorts to change into prior to the service. We will have a baptism assistant in the Baptism Room to make sure all your needs are taken care of and to provide towels and a plastic bag for your wet clothes.</p>'
            ],
            (object)[
                    'q' => 'My child wants to be baptized. What should I do?',
                    'a' => 'We\'ve provided some helpful resources to help you talk to your kids about <a id="to_kidSteps_from_faq" href="' . route('kidSteps') . '">baptism and salvation</a>.'
            ]
        ]);

?>

@extends('layouts.page', ['title' => 'Baptism'])

@section('page')

    {{--
    ================================================================================
        Intro
    ================================================================================ --}}

    @introsection(['title' => 'Baptism'])
    <p>The Bible teaches that once a person is <a id="to_salvation_from_baptism" href="{{ route('salvation') }}">saved</a>, his or her next step is to make that commitment to Jesus public through baptism.  When you're ready to take this important next step, please <a href="https://integration.fellowshipone.com/integration/FormBuilder/FormBuilder.aspx?fCode=qFJ6O2MqmTrVoPevphdkew==&cCode=RtKBDolfiPuZJp8o1+0ARA==" target="_blank">register here</a>.</p>
    <p>If you're interested in baptism for your child, please check out our <a id="to_kidSteps_from_intro" href="{{ route('kidSteps') }}">Kid Steps page</a> for more information and registration.</p>
    <p><em>All baptisms must be scheduled by the Tuesday prior to the weekend you want to be baptized.</em></p>
    @endintrosection

    @faqsection(['class' => 'Section--lightGrey', 'faq' => $faq])

    @endfaqsection

@endsection