module.exports = function (grunt) {

    var website = grunt.option('website');

    grunt.config('uglify', {

        website: {
            src:     website.js.src,
            dest:    website.js.dest,
            options: {
                compress: false,
                mangle:   false,
                beautify: !grunt.option('production') || false,
                screwIE8: true
            }
        }

    });

};
