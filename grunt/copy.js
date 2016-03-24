module.exports = function (grunt) {

    var website = grunt.option('website');

    grunt.config('copy', {

        website_templates: {
            expand: true,
            cwd:    website.src_dir + '/js',
            src:    '**/*.html',
            dest:   website.output_dir + '/js'
        },

        website_fontello: {
            expand:  true,
            flatten: false,
            cwd:     website.src_dir,
            src:     'fontello/**/*',
            dest:    website.output_dir
        },

        release_backend: {
            expand: true,
            dest:   '_release',
            cwd:    'backend',
            src:    [
                '**/*',
                '!database/seeds/**/*',
                '!vendor/**/*',
                '!storage/**/*',
                'storage/.gitkeep'
            ]
        },

        release_frontend: {
            expand: true,
            dest:   '_release/public/build',
            cwd:    'public/build',
            src:    '**/*'
        }

    });

};
