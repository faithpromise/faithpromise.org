module.exports = function (grunt) {

    var website = grunt.option('website');

    grunt.config('less', {

        website: {
            src:     website.less.src,
            dest:    website.less.dest,
            options: { compress: grunt.option('production') || false }
        },

        job_page: {
            src:     'app-website/less/job.less',
            dest:    'public/build/website/css/job.css',
            options: { compress: grunt.option('production') || false }
        }

    });

};
