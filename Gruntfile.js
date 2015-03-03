
module.exports = function (grunt) {
	grunt.loadNpmTasks('grunt-wiredep');
	grunt.loadNpmTasks('grunt-notify');
	grunt.loadNpmTasks('grunt-contrib-concat');
	grunt.loadNpmTasks('grunt-contrib-watch');
	grunt.loadNpmTasks('grunt-contrib-less');
	grunt.loadNpmTasks('grunt-contrib-uglify');
    grunt.loadNpmTasks('grunt-contrib-copy');
    grunt.loadNpmTasks('grunt-contrib-jshint');
    grunt.loadNpmTasks('grunt-contrib-sass');
    grunt.loadNpmTasks('grunt-curl');
    grunt.loadNpmTasks('grunt-wp-i18n');

	grunt.initConfig({
		copy: {
			dist: {
				src: 'readme.txt',
				dest: 'README.md'
			}
		},
        curl: {
            'google-fonts-source': {
                src: 'https://www.googleapis.com/webfonts/v1/webfonts?key=*******',
                dest: 'assets/vendor/google-fonts-source.json'
            }
        },
		wiredep: {
			app: {
				src: 'index.html'
			}
		}
		makepot: {
			target: {
				options: {
					include: [
						'path/to/some/file.php'
					],
                    type: 'wp-plugin' // or `wp-theme`
                }
            }
        },
        jshint: {
        	files: [
        		'assets/js/filename.js',
        		'assets/dynamic/paths/**/*.js'
        	],
        	options: {
        		expr: true,
        		globals: {
        			jQuery: true,
        			console: true,
        			module: true,
        			document: true
        		}
        	}
        },
        sass: {
        	dist: {
        		options: {
        			banner: '/*! <%= pkg.name %> <%= pkg.version %> filename.min.css <%= grunt.template.today("yyyy-mm-dd h:MM:ss TT") %> */\n',
        			style: 'compressed'
        		},
        		files: [{
        			expand: true,
        			cwd: 'assets/scss',
        			src: [
        				'*.scss'
        			],
        			dest: 'assets/css',
        			ext: '.min.css'
        		}]
        	},
        	dev: {
        		options: {
        			banner: '/*! <%= pkg.name %> <%= pkg.version %> filename.css <%= grunt.template.today("yyyy-mm-dd h:MM:ss TT") %> */\n',
        			style: 'expanded'
        		},
        		files: [{
        			expand: true,
        			cwd: 'assets/scss',
        			src: [
        				'*.scss'
        			],
        			dest: 'assets/css',
        			ext: '.css'
        		}]
        	}
        },
        uglify: {
        	dist: {
        		options: {
        			banner: '/*! <%= pkg.name %> <%= pkg.version %> filename.min.js <%= grunt.template.today("yyyy-mm-dd h:MM:ss TT") %> */\n',
        			report: 'gzip'
        		},
        		files: {
        			'assets/js/filename.min.js' : [
        				'assets/path/to/file.js',
        				'assets/path/to/another/file.js',
        				'assets/dynamic/paths/**/*.js'
        			]
        		}
        	},
        	dev: {
        		options: {
        			banner: '/*! <%= pkg.name %> <%= pkg.version %> filename.js <%= grunt.template.today("yyyy-mm-dd h:MM:ss TT") %> */\n',
        			beautify: true,
        			compress: false,
        			mangle: false
        		},
        		files: {
        			'assets/js/filename.js' : [
        				'assets/path/to/file.js',
        				'assets/path/to/another/file.js',
        				'assets/dynamic/paths/**/*.js'
        			]
        		}
        	}
        }
    });

	grunt.registerTask('default', [
        'jshint',
        'uglify:dev',
        'uglify:dist',
        'sass:dev',
        'sass:dist',
        'makepot',
        'copy'
    ]);
    grunt.registerTask('googlefonts', [
        'curl:google-fonts-source'
    ]);
};
