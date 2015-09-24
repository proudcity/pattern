'use strict';

// Deal with local HTML5 Mode
var modRewrite = require('connect-modrewrite');
var mountFolder = function (connect, dir) {
  return connect.static(require('path').resolve(dir));
};
var filesRedirect = '!\\.html|\\.js|\\.svg|\\.woff|\\.ttf|\\.eot|\\.otf|\\.css|\\.png|\\.jpg$ /index.html [L]';

module.exports = function(grunt) {

  require('load-grunt-tasks')(grunt);

  var globalConfig = {
    theme_css: 'css',
    theme_scss: 'scss',
    theme_compass: false,
    theme_dist: 'nested'
  };

  // Set up our sass files
  var sassFiles = {},
      fileNames = [
        'custom',
        'proud-toolbar',
        'patternlibrary'
      ];

  // compile sass file paths
  for(var i = 0; i < fileNames.length; i++) {
    sassFiles['<%= globalConfig.theme_css %>/' + fileNames[i] + '.css'] = 'scss/' + fileNames[i] + '.<%= globalConfig.theme_scss %>';
  }

  grunt.initConfig({
    globalConfig: globalConfig,
    pkg: grunt.file.readJSON('package.json'),

    'node-inspector': {
      dev: {}
    },

    // Lib-sass
    sass: {
    	options: {
				includePaths: [
				  'bower_components/bootstrap-sass-official/assets/stylesheets',
				  'bower_components/bourbon/dist',
          'bower_components/proudcity-patterns/app'
				]
			},
      dev: {
        options: {
          outputStyle: 'nested', // expanded or nested or compact or compressed
          imagePath: '../images'
        },
        files: sassFiles
      }
    },

    watch: {
      grunt: { files: ['Gruntfile.js'] },

      sass: {
        files: ['scss/{,**/}*.s*ss'],
        tasks: ['sass:dev']
      },
			livereload: {
				files: ['**/*.html', '!node_modules/**', '!bower_components/**', 'js/**/*.js', 'css/**/*.css', 'images/**/*.{jpg,gif,svg,jpeg,png}'],
				options: {
					livereload: true
				}
			}
    }
  });

  
  grunt.registerTask('warn', "Notice", function() {
    grunt.log.writeln("If you change any bootstrap javascript, please make sure to run \"grunt build\" to see changes.");
  });

  // Run watch at default settings
  grunt.registerTask('default', ['warn', 'sass:dev', 'watch']);
}
