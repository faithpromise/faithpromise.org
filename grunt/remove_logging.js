module.exports = function (grunt) {

    var website = grunt.option('website');

    grunt.config('removelogging', {

        src: website.src_dir + '/**/*.js'

    });

};
