module.exports = function (grunt) {

    grunt.initConfig({

        pkg: grunt.file.readJSON('package.json'),
        
        concat: {
            dist: {
                src: [
                    'js/vendor/jquery-1.11.1.min.js',
                    'js/plugins.js',
                    'js/main.js'
                ],

                dest: 'build/js/production.js'
            }
        },
        
        uglify: {
            build: {
                src  : 'build/js/production.js',
                dest : 'build/js/production.min.js'
            }
        },
        
        sass: {
            dev: {
                options: {
                    style: 'expanded'
                },
                files: {
                    'css/main.css' : 'sass/main.scss'
                }
            },
            dist: {
                options: {
                    style: 'compressed'
                },
                files: {
                    'css/main.css' : 'sass/main.scss'
                }
            }
        },

        autoprefixer: {
            options: {
                browsers: ['last 2 versions', 'ie 8', 'ie 9']
            },
            single_file: {
                src: 'css/main.css',
                dest: 'css/main.css'
            }
        },

        watch: {
            scripts: {
                files: ['js/*.js'],
                tasks: ['concat', 'uglify'],
                options: {
                    spawn: false
                }
            },
            css: {
                files: 'sass/**/*.scss',
                tasks: ['sass:dev', 'autoprefixer'],
            }
        }
    });

    grunt.loadNpmTasks('grunt-contrib-concat');
    grunt.loadNpmTasks('grunt-contrib-uglify');
    grunt.loadNpmTasks('grunt-contrib-watch');
    grunt.loadNpmTasks('grunt-contrib-sass');
    grunt.loadNpmTasks('grunt-autoprefixer');

    grunt.registerTask('default', [
        'sass:dev',
        'autoprefixer'
    ]);

    grunt.registerTask('build', [
        'concat',
        'uglify',
        'sass:production',
        'autoprefixer'
    ]);
}
