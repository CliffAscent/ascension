module.exports = function( grunt ) {
    grunt.initConfig( {
        pkg : grunt.file.readJSON( 'package.json' ),
		
		// Watch files and execute tasks when they change.
		watch : {
			grunt: {
				files: ['Gruntfile.js']
			},
			
			css: {
				files: ['scss/**/*.scss'],
				tasks: ['styles']
			},
			
			js : {
				files : [
					'js/ascension.js',
					'js/ascension-starter.js',
					'js/editor.js'
				],
				tasks : ['scripts']
			}
		},
	
		// Compress JavaScript files.
		uglify : {
			framework : {
				files : {
					'js/ascension.min.js'         : ['js/ascension.js'],
					'js/ascension-starter.min.js' : ['js/ascension-starter.js'],
					'js/editor.min.js'            : ['js/editor.js']
				}
			},
			
			vendors : {
				files : {
					'js/vendor/enquire/enquire.min.js'     : ['js/vendor/enquire/enquire.js'],
					'js/vendor/jquery/jquery.min.js'       : ['js/vendor/jquery/jquery.js'],
					'js/vendor/modernizr/modernizr.min.js' : ['js/vendor/modernizr/modernizr.js']
				}
			}
		},

		// Compile SASS into CSS.
		sass : {
			build : {
				files : {
					'css/ascension.css'         : 'scss/ascension.scss',
					'css/ascension-starter.css' : 'scss/ascension-starter.scss',
					'css/editor.css'            : 'scss/editor.scss',
					'css/theme-options.css'     : 'scss/theme-options.scss',
					'css/icons.css'             : 'scss/icons.scss'
				}
			}
		},
		
		// Reduce CSS repetition.
		cssc : {
			build : {
				options : {
					sortSelectors              : true,
					lineBreaks                 : true,
					sortDeclarations           : true,
					consolidateViaDeclarations : true,
					consolidateViaSelectors    : true,
					consolidateMediaQueries    : true,
					compress                   : true,
					sort                       : false,
					safe                       : true
				},
				files : {
					'css/ascension.min.css'         : 'css/ascension.css',
					'css/ascension-starter.min.css' : 'css/ascension-starter.css',
					'css/editor.min.css'            : 'css/editor.css',
					'css/theme-options.min.css'     : 'css/theme-options.css',
					'css/icons.min.css'             : 'css/icons.css'
				}
			}
		},

		// Compress CSS files.
		cssmin : {
			style : {
				src  : 'css/ascension.min.css',
				dest : 'css/ascension.min.css'
			},
			starter : {
				src  : 'css/ascension-starter.min.css',
				dest : 'css/ascension-starter.min.css'
			},
			editor : {
				src  : 'css/editor.min.css',
				dest : 'css/editor.min.css'
			},
			options : {
				src  : 'css/theme-options.min.css',
				dest : 'css/theme-options.min.css'
			},
			icons : {
				src  : 'css/icons.min.css',
				dest : 'css/icons.min.css'
			}
		},
		
		// Install the script dependencies.
		bower: {
			install: {
				options: {
					targetDir: './js/vendor',
					cleanBowerDir: true
				}
			}
		}
    } );
	
	// Load the grunt dependencies.
	grunt.loadNpmTasks( 'grunt-sass' );
	grunt.loadNpmTasks( 'grunt-contrib-watch' );
	grunt.loadNpmTasks( 'grunt-contrib-uglify' );
	grunt.loadNpmTasks( 'grunt-cssc' );
	grunt.loadNpmTasks( 'grunt-contrib-cssmin' );

	// Register the grunt tasks.
    grunt.registerTask( 'default',    ['sass', 'watch'] );
	grunt.registerTask( 'scripts',    ['uglify:framework'] );
	grunt.registerTask( 'styles',     ['sass'] );
	grunt.registerTask( 'dl-scripts', [], function() {
		grunt.loadNpmTasks( 'grunt-bower' );
		grunt.loadNpmTasks( 'grunt-bower-task' );
		grunt.task.run( 'bower' );
		grunt.task.run( 'uglify:vendors' );
	} );
};