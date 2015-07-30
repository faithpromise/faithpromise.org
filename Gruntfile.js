module.exports = function (grunt) {

    // Load all tasks
    require('load-grunt-tasks')(grunt);

    // Show elapsed time
    require('time-grunt')(grunt);

    // Temp paths
    var temp_dir = 'temp';

    // Roots
    var src_root = '.';
    var web_root = 'public';
    var views_root = 'resources/views';
    var build_root = 'public/build';
    var release_root = '_release';

    // JS Paths
    var js_src_dir = src_root + '/js';
    var js_output_dir = build_root + '/js';
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
    var less_src_dir = src_root + '/less';
    var less_output_dir = build_root + '/css';
    var less_output_file_dev = less_output_dir + '/main.dev.css';
    var less_output_file_production = less_output_dir + '/main.min.css';
    var lessInput = [
        less_src_dir + '/main.less'
    ];
    var series_less = {
        src: less_src_dir + '/series/*.less',
        dest: less_output_dir + '/',
        expand: true,
        flatten: true,
        ext: '.css'
    };

    // Assets paths
    var assets_src_dir = src_root + '/assets';
    var assets_output_dir = build_root;

    // Project configuration.
    grunt.initConfig(
        {
            clean: {
                build: [build_root + '/*', '!' + build_root + '/.gitkeep'],
                release: [release_root + '/*', '!' + release_root + '/.gitkeep']
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
                options: {
                    mangle: false // getting Angular errors when mangled
                },
                production: {
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
                    files: [
                        {
                            src: [lessInput],
                            dest: less_output_file_dev
                        },
                        series_less
                    ],
                    options: {
                        compress: false
                    }
                },
                production: {
                    files: [
                        {
                            src: [lessInput],
                            dest: less_output_file_production
                        },
                        series_less
                    ],
                    options: {
                        compress: true
                    }
                }
            },
            // LATER: Can't get this to work. It crashes
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
                                replacement: '/build/fonts/'
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
                            src: [assets_src_dir + '/fontello/css/fontello.css'],
                            dest: temp_dir + '/fontello.css.tmp'
                        }
                    ]
                },
                cdn_url: {
                    options: {
                        patterns: [
                            {
                                match: 'assets.faithpromise.192.168.10.10.xip.io',
                                replacement: 'd3m6gouty6q7nm.cloudfront.net'
                            }
                        ],
                        usePrefix: false
                    },
                    files: [
                        {
                            expand: false,
                            src: [release_root + '/' + build_root + '/**/*.css'],
                            dest: './'
                        }
                    ]
                },
                remove_public: {
                    options: {
                        patterns: [
                            {
                                match: 'public/build',
                                replacement: '/build'
                            }
                        ],
                        usePrefix: false
                    },
                    files: [
                        {
                            expand: false,
                            src: [release_root + '/' + views_root + '/layouts/**/*.php'],
                            dest: './'
                        }
                    ]
                }
            },
            htmlbuild: {
                production: {
                    src: release_root + '/' + views_root + '/layouts/**/*.php',
                    options: {
                        replace: true,
                        scripts: {
                            main: 'public/build/js/main.min.js'
                        },
                        styles: {
                            main: 'public/build/css/main.min.css'
                        }
                    }
                }
            },
            cacheBust: {
                options: {
                    baseDir: web_root,
                    rename: false
                },
                production: {
                    files: [
                        {
                            src: [release_root + '/' + views_root + '/layouts/**/*.php']
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
                    tasks: ['_css_dev']
                },
                js: {
                    files: js_src_dir + '/**/*.js',
                    tasks: ['concat:js_dev']
                },
                svg: {
                    files: [src_root + '/**/*.svg'],
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
                    flatten: true,
                    cwd: assets_src_dir + '/',
                    src: ['fontello/font/*.*'],
                    dest: assets_output_dir + '/fonts'
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
                },
                release_files: {
                    expand: true,
                    src: [
                        // Include
                        './**/*.*',
                        './artisan',
                        './storage/.gitkeep', // Note: keep storage dir or Envoyer will not create symlink
                        // Exclude
                        '!./**/*.log',
                        '!./assets/**/*',
                        '!./bower_components/**/*',
                        '!./js/**/*',
                        '!./less/**/*',
                        '!./node_modules/**/*',
                        '!./storage/debugbar/**/*',
                        '!./temp/**/*',
                        '!./vendor/**/*',
                        '!./bower.json',
                        '!./Gruntfile.js',
                        '!./package.json',
                        '!./TODO.txt'
                    ],
                    //src: [
                    //    './**/*',
                    //    './artisan',
                    //    '!./_release/**/*',
                    //    '!./bower_components/**/*',
                    //    '!./images/**/*',
                    //    '!./js/**/*',
                    //    '!./less/**/*',
                    //    '!./node_modules/**/*',
                    //    '!./storage/{app,debugbar,framework,logs}/**/*', // keep storage dir or Envoyer will not create symlink
                    //    '!./temp/**/*',
                    //    '!./vendor/**/*',
                    //    '!./.env',
                    //    '!./.gitattributes',
                    //    '!./.gitignore',
                    //    '!./bower.json',
                    //    '!./Gruntfile.js',
                    //    '!./Homestead.yaml.example',
                    //    '!./package.json',
                    //    '!./readme.md',
                    //    '!./TODO.txt'
                    //],
                    dest: release_root
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
                            src: assets_src_dir + '/sprites/general/*.svg',
                            dest: assets_output_dir + '/svg/general.svg'
                        },
                        {
                            src: assets_src_dir + '/sprites/video/*.svg',
                            dest: assets_output_dir + '/svg/video.svg'
                        }
                    ]
                }
            },
            git_deploy: {
                production: {
                    options: {
                        url: 'git@github.faithpromise.org:faithpromise/faithpromise.org.git',
                        branch: 'release'
                    },
                    src: release_root
                }
            }
        }
    );

    // Register tasks
    grunt.registerTask('default', ['build_dev']);

    grunt.registerTask('deploy_production', [
        '_build_release',
        'git_deploy:production',
        'clean:release' // Clean release so we don't mistakenly work on release files
    ]);

    grunt.registerTask('_build_release', [
        'clean:build',
        '_build_production',
        'clean:release',
        'copy:release_files',
        'htmlbuild:production',
        'replace:cdn_url',
        'replace:remove_public',
        'cacheBust:production',
        'build_dev' // Restore dev files
    ]);

    grunt.registerTask('_build_common', [
        'copy:fontello',
        'copy:svg4everybody',
        'copy:appTemplates',
        'html2js',
        'svgstore:default'
    ]);

    grunt.registerTask('build_dev', [
        '_build_common',
        '_css_dev',
        'concat:js_dev'
    ]);

    grunt.registerTask('_build_production', [
        '_build_common',
        '_js_production',
        '_css_production'
    ]);

    grunt.registerTask('_js_production', [
        'concat:js_production',
        'removelogging',
        'uglify:production'
    ]);

    grunt.registerTask('_css_production', [
        'replace:fontello',
        'less:production',
        'autoprefixer:production'
    ]);

    grunt.registerTask('_css_dev', [
        'replace:fontello',
        'less:dev',
        'autoprefixer:dev'
    ]);
};