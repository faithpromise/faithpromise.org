module.exports = function (grunt) {

    var website = grunt.option('website');

    grunt.config('svgstore', {

        options: {
            svg: {
                xmlns: 'http://www.w3.org/2000/svg'
            }
        },

        website: {
            files: [
                {
                    src: website.src_dir + '/sprites/general/*.svg',
                    dest: website.output_dir + '/svg/general.svg'
                },
                {
                    src: website.src_dir + '/sprites/video/*.svg',
                    dest: website.output_dir + '/svg/video.svg'
                }
            ]
        }

    });

};
