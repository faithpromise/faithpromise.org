module.exports = function (grunt) {

    var cdn_url = grunt.option('cdn_url');
    var website = grunt.option('website');

    grunt.config('cdnify', {

        website_css: {

            options: {
                base: '//' + cdn_url + '/'
            },

            files: [{
                expand: true,
                cwd:    '_release/public/build/website/css',
                src:    'website.css',
                dest:   '_release/public/build/website/css'
            }]
        }

    });

};
