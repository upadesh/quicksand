
var timer = require("grunt-timer");

module.exports = function (grunt) {
    timer.init(grunt);
    grunt.initConfig({
        pkg: grunt.file.readJSON('package.json'),
          copy: {
            main: {
                // font-awesome
                files: [
                    {
                        expand: true,
                        cwd: 'node_modules/font-awesome/fonts',
                        src: ['*'],
                        dest: 'fonts/'
                    }
                ]
            }
        },
        sass: {
            // custom css
            dist: {
                files: {
                    // use @import in main file
                    'dev/css/app.css': 'dev/scss/app.scss'
                }
            }
        },
        concat: {
            css: {
                src: [ 
                    'node_modules/font-awesome/css/font-awesome.css',
//                    'node_modules/tether/dist/css/tether.css',
//                    'node_modules/bootstrap/dist/css/bootstrap.css',
                    'dev/css/app.css',
                ],
                dest: 'css/<%= pkg.name %>.css'
            },
            js: {
                src: [
                    'node_modules/jquery/dist/jquery.js',
                    'node_modules/tether/dist/js/tether.js',
                    'node_modules/bootstrap/dist/js/bootstrap.js',
                    'dev/js/*.js',
                ],
                dest: 'js/<%= pkg.name %>.js'
            }
        },
        cssmin: {
            css: {
                src: '<%= concat.css.dest %>',
                dest: 'css/<%= pkg.name %>.min.css',
            }
        },
        uglify: {
            options: {
                banner: '/*! <%= pkg.name %> <%= grunt.template.today("dd-mm-yyyy") %> */\n'
            },
            dist: {
                files: {
                    'js/<%= pkg.name %>.min.js': '<%= concat.js.dest %>'
                }
            }
        },
        clean: {
          dist:  ['css/*', 'js/*', 'fonts'],
          dev:  ['dev/css/app.css', 'fonts'],
          
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
                    'node_modules/bootstrap/dist/js/*.js',
                    'dev/js/*.js'
                ],
                tasks: ['concat:js', 'jshint'],
                options: {
                    livereload: true,
                }
            },
            css: {
                files: [
                    'dev/scss/*.scss',
                    'node_modules/bootstrap/dist/css/*.css'
                ],
                tasks: ['sass', 'concat:css'],
                options: {
                    livereload: true,
                }
            }
        }
    });
    grunt.loadNpmTasks('grunt-sass');
    grunt.loadNpmTasks('grunt-contrib-copy');
    grunt.loadNpmTasks('grunt-contrib-concat');
    grunt.loadNpmTasks('grunt-contrib-cssmin');
    grunt.loadNpmTasks('grunt-contrib-uglify');
    grunt.loadNpmTasks('grunt-contrib-jshint');
    grunt.loadNpmTasks('grunt-contrib-watch');
    grunt.loadNpmTasks('grunt-contrib-clean');
    grunt.registerTask('test', ['jshint']);
    grunt.registerTask("default", ['clean', 'sass', 'copy', 'concat', 'watch']);
    grunt.registerTask('build', ['clean', 'sass', 'copy', 'concat', 'cssmin', 'uglify']);
};
