@extends('layouts.page', ['title' => 'Stephen Ministry'])

@section('page')

    {{--
        ========================================
        Intro
        ========================================
    --}}
    @introsection(['title' => 'Christ Caring for People through People'])
    <p>Stephen Ministry is a nationally recognized Christian care ministry which began in 1975 and is helping more than a million people in over 11,000 churches.</p>
    <p>The Faith Promise Stephen Ministry equips lay people to provide confidential, one-on-one, Christ-centered care and support to people experiencing difficult times in their lives such as loss of a loved one, job loss, terminal illness, and divorce. The ministry pairs individuals with a Stephen Minister who will come alongside them to provide emotional and spiritual care for as long as the need persists.</p>
    <p>Stephen Ministers are selected, trained, and supervised to provide effective Christian care. After an initial fifty hours of training, Stephen Ministers are assigned a person with whom they meet once a week for about an hour. Stephen Ministers also meet twice per month for supervision, support, and continuing education.</p>

    <p><strong>Hurting?</strong> Please call 865-251-2590 ext. 3004 to talk to a Stephen Ministry Leader.</p>

    <p><strong>Gifted to help others?</strong> Please call 865-251-2590 ext. 3004 to talk to us about becoming a Stephen Minister.</p>

    <h5>Additional Resources</h5>
    <ul>
        <li><a href="http://blog.faithpromise.org/category/groups-ministry/stephen-ministry/">Blog &amp; Updates</a></li>
        <li><a href="https://docs.google.com/document/d/1wzwsULTF0c650-IMuGxMoKAoZA1NJdHMgGluxtwzLYM/edit?usp=sharing">Testimonials &amp; Articles</a></li>
    </ul>
    @endintrosection

    @if ($ministers->count())
        <div class="ProfilesSection Section--lightGrey">
            <div class="ProfilesSection-container">
                <h2 class="ProfilesSection-title">Stephen Ministry Leaders</h2>
                <ul class="ProfilesSection-grid">
                    <?php foreach ($ministers as $profile): ?>
                    <li class="ProfilesSection-item">
                <span class="ProfilesSection-card">
                    <img
                            class="ProfilesSection-photo lazyload"
                            src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw=="
                            data-srcset="
                            <?= resized_image_url($profile->image, 1280, 'square') ?> 1280w,
                            <?= resized_image_url($profile->image, 800, 'square') ?> 800w,
                            <?= resized_image_url($profile->image, 480, 'square') ?> 480w
                        "
                            sizes="25vw">
                    <span class="ProfilesSection-name"><?= $profile->title ?></span>
                    <span class="ProfilesSection-profileTitle"><?= $profile->subtitle ?></span>
                </span>
                    </li>
                    <?php endforeach; ?>
                </ul>
            </div>
        </div>
    @endif

    {{--
        ========================================
        Contact
        ========================================
    --}}
    @include('partials.have_questions', ['class' => '', 'title' => 'Need more info?', 'email' => 'stephenministry@faithpromise.org', 'text' => 'If you have questions about Stephen Ministry, please contact #email# or call us at 865-251-2590 ext. 3004'])

@endsection
