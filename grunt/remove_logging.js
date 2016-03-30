module.exports = function (grunt) {

    var website = grunt.option('website');

    grunt.config('removelogging', {

        website: {
            src: website.output_dir + '/**/*.js'
        }

    });

};
