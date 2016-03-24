module.exports = function (grunt) {

    grunt.config('htmlbuild', {

        production: {

            options: {
                relative: false,
                replace:  true,
                prefix:   '/',
                scripts:  {
                    cwd:     'public',
                    website: 'build/js/main/main.min.js'
                },
                styles:   {
                    cwd:     'public',
                    website: 'build/css/main.min.css'
                }
            },

            src: '_release/resources/views/layouts/default.blade.php'

        }

    });

};
