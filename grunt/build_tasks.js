module.exports = function (grunt) {

    grunt.registerTask('build_website', ['uglify:website', 'copy:website_templates', 'copy:website_fontello', 'less:website', 'autoprefixer:website']);

    grunt.registerTask('build_release', ['clean:build', 'clean:release', 'build_website', 'copy:release_backend', 'copy:release_frontend']);

    grunt.registerTask('deploy', ['build_release']); // TODO: Add git_deploy

};
