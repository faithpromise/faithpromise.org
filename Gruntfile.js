module.exports = function (grunt) {

    // Load all tasks
    require('load-grunt-tasks')(grunt);

    // Show elapsed time
    require('time-grunt')(grunt);

    // Temp paths
    var temp_dir = 'temp';

    // Roots
    var srcroot = '.';
    var webroot = 'public';
    var buildroot = 'public/build';

    // JS Paths
    var js_src_dir = srcroot + '/js';
    var js_output_dir = buildroot + '/js';
    var js_output_file_dev = js_output_dir + '/main.dev.js';
    var js_output_file_production = js_output_dir + '/main.min.js';
    var js_output_file_temp = temp_dir + '/main.tmp.js';
    var js_input = [
        'bower_components/angular-ui-bootstrap/src/position/position.js',
        'bower_components/angular-ui-bootstrap/src/dropdown/dropdown.js',
        'bower_components/angular-local-storage/dist/angular-local-storage.js',
        'bower_components/angular-ui-bootstrap/src/modal/modal.js',
        temp_dir + '/template-cache.tmp',
        temp_dir + '/angular-ui-template-cache.tmp',
        js_src_dir + '/app.module.js',
        js_src_dir + '/**/*.js'
    ];

    // LESS Paths
    var less_src_dir = srcroot + '/less';
    var less_output_dir = buildroot + '/css';
    var less_output_file_dev = less_output_dir + '/main.dev.css';
    var less_output_file_production = less_output_dir + '/main.min.css';
    var lessInput = [
        less_src_dir + '/main.less'
    ];

    // Image paths
    var image_src_dir = srcroot + '/images';
    var image_output_dir = buildroot + '/images';

    // Font paths
    var font_src_dir = srcroot + '/assets';
    var font_output_dir = buildroot + '/fonts';

    // Project configuration.
    grunt.initConfig(
        {
            clean: {
                build: [
                    js_output_dir + '/**/*.*',
                    less_output_dir + '/**/*.*',
                    temp_dir + '/**/*.*',
                    '!' + temp_dir + '/.gitkeep',
                    '!public/**/*.{png,jpg,gif}'
                ]
            },
            concat: {
                options: {
                    separator: '\n;'
                },
                js_dev: {
                    src: js_input,
                    dest: js_output_file_dev
                },
                js_production: {
                    src: js_input,
                    dest: js_output_file_temp
                }
            },
            uglify: {
                production: {
                    options: {
                        mangle: false // TODO - remove once it works - mangling breaks the JS
                    },
                    files: [{
                        src: js_output_file_temp,
                        dest: js_output_file_production
                    }]
                }
            },
            removelogging: {
                production: {
                    src: [js_output_file_temp]
                }
            },
            less: {
                dev: {
                    files: [{
                        src: lessInput,
                        dest: less_output_file_dev
                    }],
                    options: {
                        compress: false
                    }
                },
                production: {
                    files: [{
                        src: lessInput,
                        dest: less_output_file_production
                    }],
                    options: {
                        compress: true
                    }
                }
            },
            // TODO: Can't get this to work. It crashes
            //uncss: {
            //    options: {
            //        htmlroot: 'public'
            //    },
            //    production: {
            //        files: {
            //            'public/build/main.tidy.css': ['public/**/*.html', '!public/assets/**/*.html']
            //        }
            //    }
            //},
            replace: {
                fontello: {
                    options: {
                        patterns: [
                            {
                                match: '../font/',
                                replacement: '/build/fonts/fontello/font/'
                            },
                            {
                                match: '[class^="icon-"]',
                                replacement: '.icon:before, [class^="icon-"]'
                            }
                        ],
                        usePrefix: false
                    },
                    files: [
                        {
                            expand: false,
                            flatten: true,
                            src: [font_src_dir + '/fontello/css/fontello.css'],
                            dest: temp_dir + '/fontello.css.tmp'
                        }
                    ]
                }
            },
            htmlbuild: {
                production: {
                    src: webroot + '/**/*.html',
                    dest: webroot + '/',
                    options: {
                        replace: true,
                        prefix: '/',
                        scripts: {
                            main: [
                                js_output_dir + '/main.min.js'
                            ]
                        },
                        styles: {
                            main: [
                                less_output_dir + '/main.min.css'
                            ]
                        }
                    }
                }
            },
            cacheBust: {
                options: {
                    baseDir: webroot,
                    rename: false
                },
                production: {
                    files: [
                        {
                            src: [webroot + '/**/*.php']
                        }
                    ]
                }
            },
            autoprefixer: {
                options: {
                    browsers: ['last 2 versions', 'ie 8', 'ie 9', 'android 2.3', 'android 4', 'opera 12']
                },
                dev: {
                    src: less_output_file_dev
                },
                production: {
                    src: less_output_file_production
                }
            },
            watch: {
                css: {
                    files: [less_src_dir + '/**/*.less', 'assets/fontello/**/*.*'],
                    tasks: ['css_dev']
                },
                js: {
                    files: js_src_dir + '/**/*.js',
                    tasks: ['concat:js_dev']
                },
                svg: {
                    files: [srcroot + '/**/*.svg'],
                    tasks: ['svgstore:default']
                },
                templates: {
                    files: js_src_dir + '/**/*.html',
                    tasks: ['html2js:templates', 'concat:js_dev']
                }
            },
            copy: {
                fontello: {
                    expand: true,
                    cwd: font_src_dir + '/',
                    src: ['fontello/font/*.*'],
                    dest: font_output_dir + '/'
                },
                svg4everybody: {
                    src: 'bower_components/svg4everybody/svg4everybody.min.js',
                    dest: js_output_dir + '/svg4everybody.min.js'
                },
                appTemplates: {
                    expand: true,
                    cwd: js_src_dir,
                    src: 'directives/**/*.html',
                    dest: js_output_dir
                }
            },
            html2js: {
                templates: {
                    options: {
                        base: js_src_dir
                    },
                    src: [js_src_dir + '/**/*.html'],
                    dest: temp_dir + '/template-cache.tmp',
                    module: 'template-cache'
                },
                angularUi: {
                    options: {
                        base: 'bower_components/angular-ui-bootstrap'
                    },
                    src: ['bower_components/angular-ui-bootstrap/template/modal/*.html'],
                    dest: temp_dir + '/angular-ui-template-cache.tmp',
                    module: 'angular-ui-template-cache'
                }
            },
            svgstore: {
                options: {
                    svg: {
                        //viewBox: '0 0 100 100',
                        xmlns: 'http://www.w3.org/2000/svg'
                    }
                },
                default: {
                    files: [
                        {
                            src: image_src_dir + '/sprites/general/*.svg',
                            dest: image_output_dir + '/general.svg'
                        },
                        {
                            src: image_src_dir + '/sprites/video/*.svg',
                            dest: image_output_dir + '/video.svg'
                        }
                    ]
                }
            }
        }
    );

    // Register tasks
    grunt.registerTask('default', ['build_dev']);

    grunt.registerTask('build_common', [
        'copy',
        'html2js',
        'svgstore:default',
    ]);

    grunt.registerTask('build_dev', [
        'build_common',
        'css_dev',
        'concat:js_dev'
    ]);

    grunt.registerTask('build_production', [
        'build_common',
        'js_production',
        'css_production',
        'replace:facebook_id',
        'htmlbuild:production',
        'cacheBust:production'
    ]);

    grunt.registerTask('build_staging', [
        'build_common',
        'js_production',
        'css_production',
        'htmlbuild:production',
        'cacheBust:production'
    ]);

    grunt.registerTask('js_production', [
        'concat:js_production',
        'removelogging',
        'uglify:production'
    ]);

    grunt.registerTask('css_production', [
        'replace:fontello',
        'less:production',
        'autoprefixer:production'
    ]);

    grunt.registerTask('css_dev', [
        'replace:fontello',
        'less:dev',
        'autoprefixer:dev'
    ]);
};