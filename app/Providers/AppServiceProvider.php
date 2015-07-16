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
                  $bg_section = array_merge(["title" => "", "class" => "", "image" => ""], ' . $expression . ');
                  $bg_section["image_class"] = "' . uniqid('bg_') . '";
                ?>
                <style type="text/css" scoped>.<?= $bg_section["image_class"]; ?> { background-image: url(<?= $bg_section["image"]; ?>); }</style>
                <div class="BackgroundSection <?= $bg_section["image_class"] . " " . $bg_section["class"]; ?>">
                    <div class="BackgroundSection-container">
                        <h2 class="BackgroundSection-title"><?= $bg_section["title"]; ?></h2>
                        <div class="BackgroundSection-text">
            ';
        });

        Blade::directive('endbgsection', function () {
            return '</div></div></div>';
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
