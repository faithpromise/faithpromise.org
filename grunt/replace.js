module.exports = function (grunt) {

    var website = grunt.option('website');

    grunt.config('replace', {

        angular_uib: {
            options: {
                patterns: [
                    {
                        match:       'uib/template',
                        replacement: '/build/uib/template'
                    }
                ],
                usePrefix: false
            },
            files:   [
                {
                    expand:  false,
                    src:     'public/build/website/js/website.js',
                    dest:    './'
                }
            ]
        }

    });

};
