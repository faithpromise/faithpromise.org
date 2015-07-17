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
                    $directive = ["execution_mode" => "start"];
                    $directive["args"] = array_merge(["title" => "", "class" => "", "image" => "", "buttons" => []], ' . ($expression ?: '[]') . ');
                    include(base_path("resources/views/directives/background_section.php")); ?>';
        });
        Blade::directive('endbgsection', function () {
            return '<?php $directive["execution_mode"] = "end"; include(base_path("resources/views/directives/background_section.php")); ?>';
        });

        // IntroSection
        Blade::directive('introsection', function ($expression) {
            return '
                <?php
                    $directive = ["execution_mode" => "start"];
                    $directive["args"] = array_merge(["title" => "", "class" => "", "buttons" => []], ' . ($expression ?: '[]') . ');
                    include(base_path("resources/views/directives/intro_section.php")); ?>';
        });
        Blade::directive('endintrosection', function () {
            return '<?php $directive["execution_mode"] = "end"; include(base_path("resources/views/directives/intro_section.php")); ?>';
        });

        // VideoSection
        Blade::directive('videosection', function ($expression) {
            return '
                <?php
                    $directive = ["execution_mode" => "start"];
                    $directive["args"] = array_merge(["title" => "", "class" => "", "video" => ""], ' . ($expression ?: '[]') . ');
                    include(base_path("resources/views/directives/video_section.php")); ?>';
        });
        Blade::directive('endvideosection', function () {
            return '<?php $directive["execution_mode"] = "end"; include(base_path("resources/views/directives/video_section.php")); ?>';
        });

        // TextSection
        Blade::directive('textsection', function ($expression) {
            return '
                <?php
                    $directive = ["execution_mode" => "start"];
                    $directive["args"] = array_merge(["title" => "", "class" => "", "buttons" => []], ' . ($expression ?: '[]') . ');
                    include(base_path("resources/views/directives/text_section.php")); ?>';
        });
        Blade::directive('endtextsection', function () {
            return '<?php $directive["execution_mode"] = "end"; include(base_path("resources/views/directives/text_section.php")); ?>';
        });

        // CardSection
        Blade::directive('cardsection', function ($expression) {
            return '
                <?php
                    $directive = ["execution_mode" => "start"];
                    $directive["args"] = array_merge(["title" => "", "class" => "", "cards" => []], ' . ($expression ?: '[]') . ');
                    include(base_path("resources/views/directives/cards_section.php")); ?>';
        });
        Blade::directive('endcardsection', function () {
            return '<?php $directive["execution_mode"] = "end"; include(base_path("resources/views/directives/cards_section.php")); ?>';
        });

        // ProfilesSection
        Blade::directive('profilessection', function ($expression) {
            return '
                <?php
                    $directive = ["execution_mode" => "start"];
                    $directive["args"] = array_merge(["title" => "", "class" => "", "profiles" => []], ' . ($expression ?: '[]') . ');
                    include(base_path("resources/views/directives/profiles_section.php")); ?>';
        });
        Blade::directive('endprofilessection', function () {
            return '<?php $directive["execution_mode"] = "end"; include(base_path("resources/views/directives/profiles_section.php")); ?>';
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
