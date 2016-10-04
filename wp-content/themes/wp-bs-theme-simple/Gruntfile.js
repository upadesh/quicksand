
var timer = require("grunt-timer");

module.exports = function (grunt) {
    timer.init(grunt);
    grunt.initConfig({
        pkg: grunt.file.readJSON('package.json'),
        clean: {
            dist: ['css/*', 'js/*', 'fonts'],
            dev: ['dev/css/<%= pkg.name %>.css', 'fonts'],
        },
        sass: {
            // custom css
            dist: {
                files: {
                    // use @import in main file
                    'dev/css/<%= pkg.name %>.css': 'dev/scss/app.scss'
                }
            }
        },
        copy: {
            dev: {
                files: [
                    {
                        // Fonts: Font-Awesome
                        expand: true,
                        cwd: 'node_modules/font-awesome/fonts',
                        src: ['*'],
                        dest: 'fonts/'
                    }, {
                        // CSS- Font-Awesome
                        src: 'node_modules/font-awesome/css/font-awesome.css',
                        dest: 'dev/css/font-awesome.css',
                    }, {
                        // JS- Tether
                        src: 'node_modules/tether/dist/js/tether.js',
                        dest: 'dev/js/tether.js',
                    }, {
                        // JS - Bootstrap
                        src: 'node_modules/bootstrap/dist/js/bootstrap.js',
                        dest: 'dev/js/bootstrap.js',
                    }
                ]


            },
            dist: {
                files: [
                    {
                        // CSS -all
                        expand: true,
                        cwd: 'dev/css',
                        src: ['*'],
                        dest: 'css/'
                    }, {
                        // JS - all
                        expand: true,
                        cwd: 'dev/js',
                        src: ['*'],
                        dest: 'js/'
                    },
                ]


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
                src: 'dev/css/<%= pkg.name %>.css',
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
                    'Gruntfile.js',
//                    'node_modules/bootstrap/dist/js/*.js',
                    'dev/js/*.js'
                ],
//                tasks: ['concat:js', 'jshint'],
                tasks: ['clean', 'sass', 'postcss', 'copy'],
                options: {
                    livereload: true,
                }
            },
            css: {
                files: [
                    'dev/scss/*.scss',
                    'node_modules/bootstrap/dist/css/*.css'
                ],
//                tasks: ['sass', 'concat:css'],
                tasks: ['clean', 'sass', 'postcss', 'copy'],
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
//    grunt.registerTask('test', ['jshint']);
//    grunt.registerTask("default", ['clean', 'sass', 'postcss', 'copy', 'concat', 'watch']);
//    grunt.registerTask('build', ['clean', 'sass', 'postcss', 'copy', 'concat', 'cssmin', 'uglify']);

    grunt.registerTask("default", ['clean', 'sass', 'postcss', 'copy', 'watch']);
};
