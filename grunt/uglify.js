module.exports = function (grunt) {

    var website = grunt.option('website');

    grunt.config('uglify', {

        website: {
            src:     website.js.src,
            dest:    website.js.dest,
            options: {
                compress: grunt.option('production') || false,
                mangle:   grunt.option('production') || false,
                beautify: !grunt.option('production') || false,
                screwIE8: true
            }
        }

    });

};
