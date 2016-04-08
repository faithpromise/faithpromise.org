module.exports = function (grunt) {

    grunt.registerTask('copy_files', ['copy:website_templates', 'copy:website_fontello', 'copy:angular_ui_templates', 'copy:svg4everybody']);

    grunt.registerTask('build_job_page', ['less:job_page', 'autoprefixer:job_page']);

    grunt.registerTask('build_website', ['uglify:website', 'replace:angular_uib', 'copy_files', 'svgstore:website', 'less:website', 'autoprefixer:website', 'build_job_page']);

    grunt.registerTask('build_release', ['clean:build', 'clean:release', 'build_website', 'copy:release_backend', 'copy:release_frontend', 'removelogging:website', 'cacheBust']);

    grunt.registerTask('deploy', ['build_release', 'git_deploy']);

};
