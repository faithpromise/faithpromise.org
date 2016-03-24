module.exports = function (grunt) {

    var website = grunt.option('website');

    grunt.config('clean', {

        build:   ['public/build/*', '!public/build/.gitkeep'],
        release: ['_release/*', '!_release/.gitkeep']

    });

};
