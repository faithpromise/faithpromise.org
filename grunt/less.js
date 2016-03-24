module.exports = function (grunt) {

    var website = grunt.option('website');

    grunt.config('less', {

        website: {
            src:     website.less.src,
            dest:    website.less.dest,
            options: { compress: grunt.option('production') || false }
        }

    });

};
