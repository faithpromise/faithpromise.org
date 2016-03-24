module.exports = function (grunt) {

    var website = grunt.option('website');

    grunt.config('git_deploy', {

        options: {
            url: 'git@github.faithpromise.org:faithpromise/faithpromise.org.git',
            branch: 'release'
        },

        src: '_release'

    });

};
