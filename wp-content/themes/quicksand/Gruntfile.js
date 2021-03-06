var timer = require("grunt-timer");

module.exports = function (grunt) {
    timer.init(grunt);
    grunt.initConfig({
        pkg: grunt.file.readJSON('package.json'),
        clean: {
            dev: ['dev/css/*'],
            dist: ['css/*', 'js/*', 'fonts/*'],
        },
        copy: {
            dev: {
                files: [{
                        expand: true,
                        cwd: 'dev/js',
                        src: ['*'],
                        dest: 'js/'
                    }, {
                        expand: true,
                        cwd: 'dev/css/',
                        src: ['*.css'],
                        dest: 'css/',
                    }],
            },
            dist: {
                files: [{
                        // Fonts - Google
                        expand: true,
                        cwd: 'dev/fonts',
                        src: ['./**'],
                        dest: 'fonts/'
                    }, {
                        // Fonts - Font-Awesome
                        expand: true,
                        cwd: 'node_modules/font-awesome/fonts',
                        src: ['*'],
                        dest: 'fonts/'
                    }, {
                        // CSS - Font-Awesome
                        src: 'node_modules/font-awesome/css/font-awesome.css',
                        dest: 'css/font-awesome.css',
                    }, {
                        // CSS - Font-Awesome minified
                        src: 'node_modules/font-awesome/css/font-awesome.min.css',
                        dest: 'css/font-awesome.min.css',
                    }, {
                        // JS- Tether
                        src: 'node_modules/tether/dist/js/tether.js',
                        dest: 'js/tether.js',
                    }, {
                        // JS- Tether minified
                        src: 'node_modules/tether/dist/js/tether.min.js',
                        dest: 'js/tether.min.js',
                    }, {
                        // JS - Bootstrap
                        src: 'node_modules/bootstrap/dist/js/bootstrap.js',
                        dest: 'js/bootstrap.js',
                    }, {
                        // JS - Bootstrap minified
                        src: 'node_modules/bootstrap/dist/js/bootstrap.min.js',
                        dest: 'js/bootstrap.min.js',
                    }, {
                        // JS - fitVids
                        src: 'node_modules/fitvids/dist/fitvids.js',
                        dest: 'js/fitvids.js',
                    }, {
                        // JS - fitVids minified
                        src: 'node_modules/fitvids/dist/fitvids.min.js',
                        dest: 'js/fitvids.min.js',
                    }, {
                        //
                        // ==== Lightgallery ====
                        //  
                        expand: true,
                        cwd: 'node_modules/lightgallery/dist/',
                        src: ['**'],
                        dest: 'js/lightgallery/'
                    }, {
                        //
                        // ==== Lightgallery: lg-thumbnail ====
                        //   
                        src: 'node_modules/lg-thumbnail/dist/lg-thumbnail.js ',
                        dest: 'js/lg-thumbnail.js',
                    }, {
                        src: 'node_modules/lg-thumbnail/dist/lg-thumbnail.min.js ',
                        dest: 'js/lg-thumbnail.min.js',
                    }, {
                        // CSS - all custom css
                        expand: true,
                        cwd: 'dev/css',
                        src: ['*'],
                        dest: 'css/'
                    }, {
                        //
                        // ==== Flexslider ====
                        //
                        // Flexslider - IMG   
                        expand: true,
                        src: ['*'],
                        cwd: 'node_modules/flexslider/images/',
                        dest: 'js/flexslider/images/',
                        filter: 'isFile'
                    }, {
                        // Flexslider - FONTS  
                        expand: true,
                        src: ['*'],
                        cwd: 'node_modules/flexslider/fonts/',
                        dest: 'js/flexslider/fonts/',
                        filter: 'isFile'
                    }, {
                        // Flexslider - CSS  
                        src: 'node_modules/flexslider/flexslider.css',
                        dest: 'js/flexslider/flexslider.css',
                    }, {
                        // Flexslider - JS 
                        expand: true,
                        cwd: 'node_modules/flexslider',
                        src: ['jquery.flexslider*.js'],
                        filter: 'isFile',
                        dest: 'js/flexslider'
                    }, {
                        //
                        // ==== JS - all custom js ====
                        //  
                        expand: true,
                        filter: 'isFile',
                        cwd: 'dev/js',
                        src: ['*'],
                        dest: 'js/'
                    }
                ]


            }
        },
        sass: {
            // custom css
            dist: {
                files: {
                    // use @import in main file
                    'dev/css/<%= pkg.name %>.css': 'dev/scss/app.scss',
                    // add also color-schemes
                    'dev/css/<%= pkg.name %>-jupiter-jazz.css': 'dev/scss/app-jupiter-jazz.scss',
                    'dev/css/<%= pkg.name %>-ganymede-elegy.css': 'dev/scss/app-ganymede-elegy.scss',
                    // custom-editor-style
                    'css/custom-editor-style.css': 'dev/scss/custom-editor-style.scss'
                }
            }
        },
        postcss: {
            options: {
                processors: [
                    require('pixrem')(), // add fallbacks for rem units
                    require('autoprefixer')({browsers: 'last 2 versions'}), // add vendor prefixes 
                ]
            },
            dist: {
                src: 'dev/css/*.css'
            }
        },
        cssmin: {
            options: {
//                sourceMap: true,
                banner: '/*! Quicksand | Andreas Stephan| GPL3 Licensed */'
            },
            minify: {
                files: [{
                        expand: true,
                        cwd: 'dev/css/',
                        src: ['*.css'],
                        dest: 'css/',
                        ext: '.min.css'
                    }]
            }
        },
        jshint: {
            files: ['Gruntfile.js', 'dev/js/*.js'],
            options: {
                globals: {
                    jQuery: true,
                    console: true,
                    module: true
                }
            }
        },
        watch: {
            js: {
                files: [
                    'dev/js/*.js'
                ],
                tasks: ['copy:dev'],
                options: {
                    livereload: true,
                }
            },
            css: {
                files: [
                    'dev/scss/*.scss',
                    'dev/scss/jupiter-jazz/*.scss',
                    'dev/scss/ganymede-elegy/*.scss'
                ],
                tasks: ['clean:dev', 'sass', 'postcss', 'cssmin', 'copy:dev'],
                options: {
                    livereload: true,
                }
            }
        }
    });
    grunt.loadNpmTasks('grunt-sass');
    grunt.loadNpmTasks('grunt-postcss');
    grunt.loadNpmTasks('grunt-contrib-copy');
    grunt.loadNpmTasks('grunt-contrib-concat');
    grunt.loadNpmTasks('grunt-contrib-cssmin');
    grunt.loadNpmTasks('grunt-contrib-uglify');
    grunt.loadNpmTasks('grunt-contrib-jshint');
    grunt.loadNpmTasks('grunt-contrib-watch');
    grunt.loadNpmTasks('grunt-contrib-clean');
    grunt.registerTask('build', ['clean', 'sass', 'postcss', 'cssmin', 'copy:dist']);
    grunt.registerTask("default", ['clean:dev', 'sass', 'postcss', 'cssmin', 'copy:dev', 'watch']);
};
