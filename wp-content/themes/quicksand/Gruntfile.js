var timer = require("grunt-timer");

module.exports = function (grunt) {
    timer.init(grunt);
    grunt.initConfig({
        pkg: grunt.file.readJSON('package.json'),
        clean: {
            dev: ['dev/css/*.css'],
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
                        src: ['*'],
                        dest: 'css/',
                        rename: function (dest, src) {
                            return dest + src.replace(/\.css$/, ".min.css");
                        }
                    }],
            },
            dist: {
                files: [{
                        // Fonts: Font-Awesome
                        expand: true,
                        cwd: 'node_modules/font-awesome/fonts',
                        src: ['*'],
                        dest: 'fonts/'
                    }, {
                        // CSS- Font-Awesome
                        src: 'node_modules/font-awesome/css/font-awesome.min.css',
                        dest: 'css/font-awesome.min.css',
                    }, {
                        // JS- Tether
                        src: 'node_modules/tether/dist/js/tether.min.js',
                        dest: 'js/tether.min.js',
                    }, {
                        // JS - Bootstrap
                        src: 'node_modules/bootstrap/dist/js/bootstrap.js',
                        dest: 'js/bootstrap.min.js',
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
                    'dev/css/<%= pkg.name %>-dune.css': 'dev/scss/app-dune.scss'
                }
            }
        },
        postcss: {
            options: {
                map: {
                    inline: false, // save all sourcemaps as separate files...
                    annotation: 'css/maps/' // ...to the specified directory
                },
                processors: [
                    require('pixrem')(), // add fallbacks for rem units
                    require('autoprefixer')({browsers: 'last 2 versions'}), // add vendor prefixes
                    require('cssnano')() // minify the result
                ]
            },
            dist: {
                src: 'dev/css/*.css'
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
                    'dev/scss/*.scss'
                ],
                tasks: ['clean:dev', 'sass', 'postcss', 'copy:dev'],
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
    grunt.registerTask('build', ['clean', 'sass', 'postcss', 'copy']);
    grunt.registerTask("default", ['clean:dev', 'copy:dev', 'sass', 'postcss', 'copy:dev', 'watch']);
};
