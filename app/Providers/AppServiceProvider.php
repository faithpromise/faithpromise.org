<?php

namespace App\Providers;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider {
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot() {

        view()->share('site', config('site'));
        view()->share('nav', config('nav'));

        // BackgroundSection
        Blade::directive('bgsection', function ($expression) {
            return '
                <?php
                  $directive_args = array_merge(["title" => "", "class" => "", "image" => "", "buttons" => []], ' . ($expression ?: '[]') . ');
                  $directive_args["image_class"] = "' . uniqid('bg_') . '";
                ?>
                <style type="text/css" scoped>.<?= $directive_args["image_class"]; ?> { background-image: url(<?= $directive_args["image"]; ?>); }</style>
                <div class="BackgroundSection <?= $directive_args["image_class"] . " " . $directive_args["class"]; ?>">
                    <div class="BackgroundSection-container">
                        <div class="BackgroundSection-text">
                            <h2 class="BackgroundSection-title"><?= $directive_args["title"]; ?></h2>
            ';
        });
        Blade::directive('endbgsection', function () {

            return '
                </div><!-- // END .BackgroundSection-text -->
                <?php if(count($directive_args["buttons"])): ?>
                    <p>
                        <?php foreach($directive_args["buttons"] as $button): ?>
                            <a class="Button" href="<?= $button["url"]; ?>"><?= $button["title"]; ?></a>
                        <?php endforeach; ?>
                    </p>
                <?php endif; ?>
                </div><!-- // END .BackgroundSection-container -->
                </div><!-- // END .BackgroundSection -->
            ';
        });

        // IntroSection
        Blade::directive('introsection', function ($expression) {
            return '
                <?php
                  $directive_args = array_merge(["title" => "", "class" => ""], ' . ($expression ?: '[]') . ');
                ?>
                <div class="IntroSection <?= $directive_args["class"]; ?>">
                  <div class="IntroSection-container">
                    <h2 class="IntroSection-title"><?= $directive_args["title"]; ?></h2>
                    <div class="IntroSection-text">
            ';
        });
        Blade::directive('endintrosection', function () {
            return "
                </div><!-- // END .IntroSection-text -->
                </div><!-- // END .IntroSection-container -->
                </div><!-- // END .IntroSection -->
            ";
        });

        // VideoSection
        Blade::directive('videosection', function ($expression) {
            return '
                <?php
                  $directive_args = array_merge(["title" => "", "class" => "", "video" => ""], ' . ($expression ?: '[]') . ');
                ?>
                <div class="VideoSection <?= $directive_args["class"]; ?>">
                    <div class="VideoSection-container">
                        <div class="VideoSection-wrap">
                            <div class="VideoSection-text">
                                <h2 class="VideoSection-title"><?= $directive_args["title"]; ?></h2>
            ';
        });
        Blade::directive('endvideosection', function () {
            return '
                </div><!-- // END .VideoSection-text -->
                </div><!-- // END .VideoSection-wrap -->
                <div class="VideoSection-video">
                    <vimeo id="<?= $directive_args["video"]; ?>"></vimeo>
                </div><!-- // END .VideoSection-video -->
                </div><!-- // END .VideoSection-container -->
                </div><!-- // END .VideoSection -->';
        });

        // TextSection
        Blade::directive('textsection', function ($expression) {
            return '
                <?php
                  $directive_args = array_merge(["title" => "", "class" => "", "buttons" => []], ' . ($expression ?: '[]') . ');
                ?>
                <div class="TextSection <?= $directive_args["class"]; ?>">
                    <div class="TextSection-container">
                        <div class="TextSection-text">
                            <h2 class="TextSection-title"><?= $directive_args["title"]; ?></h2>
            ';
        });
        Blade::directive('endtextsection', function () {
            return '
                </div><!-- // END .TextSection-text -->
                </div><!-- // END .TextSection-container -->
                </div><!-- // END .TextSection -->
            ';
        });

        // CardSection
        Blade::directive('cardsection', function ($expression) {
            return '
                <?php
                  $directive_args = array_merge(["title" => "", "class" => "", "cards" => []], ' . ($expression ?: '[]') . ');
                ?>
                <div class="GridSection <?= $directive_args["class"]; ?>">
                    <div class="GridSection-container">
                        <h2 class="GridSection-title"><?= $directive_args["title"]; ?></h2>
                        <?php if (! isset($directive_args["no_text"])): ?>
                        <div class="GridSection-text">
                        <?php endif; ?>
                ';
        });
        Blade::directive('endcardsection', function () {
            return '
                <?php if (! isset($directive_args["no_text"])): ?>
                </div><!-- // END .GridSection-text -->
                <?php endif; ?>
                <?php $cards = $directive_args["cards"]; ?>
                <?php include(base_path("resources/views/partials/card_grid.php")); ?>
                </div><!-- // END .GridSection-container -->
                </div><!-- // END .GridSection -->';
        });

    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register() {
        //
    }
}
