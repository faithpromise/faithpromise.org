module.exports = function (grunt) {

    require('time-grunt')(grunt);

    var config = {};

    grunt.option('cdn_url', 'd16gqslxckkrrx.cloudfront.net');

    grunt.option('website', {
        src_dir:    'app-website',
        output_dir: 'public/build/website',
        js:         {
            src:  [
                'bower_components/angular-ui-bootstrap/src/position/position.js',
                'bower_components/angular-ui-bootstrap/src/stackedMap/stackedMap.js',
                'bower_components/angular-ui-bootstrap/src/dropdown/dropdown.js',
                'bower_components/angular-local-storage/dist/angular-local-storage.js',
                'bower_components/angular-ui-bootstrap/src/modal/modal.js',
                'app-website/js/app.module.js',
                'app-website/js/**/*.js'
            ],
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
