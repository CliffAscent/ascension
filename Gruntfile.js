module.exports = function( grunt ) {
	// Load all of the dependencies in package.json
	require( 'matchdep' ).filterDev( 'grunt-*' ).forEach( grunt.loadNpmTasks );

	// Configure and initiate grunt.
    grunt.initConfig( {
        pkg : grunt.file.readJSON( 'package.json' ),
		
		// Watch files and execute tasks when they change.
		watch : {
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
			build : {
				files : {
					'js/ascension.min.js'         : ['js/ascension.js'],
					'js/ascension-starter.min.js' : ['js/ascension-starter.js'],
					'js/editor.min.js'            : ['js/editor.js']
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
		}
    } );

	// Register the grunt tasks.
    grunt.registerTask( 'default', [] );
	grunt.registerTask( 'scripts', ['uglify'] );
	grunt.registerTask( 'styles',  ['sass', 'cssc', 'cssmin'] );
};