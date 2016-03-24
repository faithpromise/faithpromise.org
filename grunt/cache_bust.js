module.exports = function (grunt) {

    var website = grunt.option('website');

    grunt.config('cacheBust', {

        options: {
            baseDir: 'public',
            rename:  false
        },

        src: '_release/resources/views/layouts/**/*.php'

    });

};
