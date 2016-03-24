module.exports = function (grunt) {

    var website = grunt.option('website');

    grunt.config('removelogging', {

        website: {
            src: website.src_dir + '/**/*.js'
        }

    });

};
