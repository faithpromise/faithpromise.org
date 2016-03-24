module.exports = function (grunt) {

    require('time-grunt')(grunt);

    var config = {};

    grunt.option('website', {
        src_dir:    'app-website',
        output_dir: 'public/build/website',
        js:         {
            src:  ['app-website/js/app.module.js', 'app-website/js/app.config.js', 'app-website/js/app.routes.js', 'app-website/js/**/*.js'],
            dest: 'public/build/website/js/website.js'
        },
        less:       {
            src:  'app-website/less/website.less',
            dest: 'public/build/website/css/website.css'
        }
    });

    // Load NPM tasks
    require('load-grunt-tasks')(grunt);

    // Init
    grunt.initConfig(config);

    // Load tasks
    grunt.loadTasks('grunt');

};
