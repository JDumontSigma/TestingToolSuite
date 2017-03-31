var gulp 		          = require('gulp'),
    sass 		          = require('gulp-ruby-sass'),
    autoprefixer      = require('gulp-autoprefixer'),
    swig              = require('gulp-swig'),
    del  		          = require('del'),
    concat            = require('gulp-concat'),
    jshint            = require('gulp-jshint'),
    uglify            = require('gulp-uglify'),
    webserver         = require('gulp-webserver');

var config = {
    bowerDir: './bower_components' ,
    npmDir: './node_modules' ,
    displayDir: './assets/' 
}

gulp.task('default', ['clean'], function() {
    gulp.start('styles','jshint', 'scripts', 'watch', 'webserver');
});

gulp.task('clean', function(cb) {
    del([
      'dist/'
    ], {force: true}, cb)
    return del([
      config.displayDir + 'dev/**/*',
      '!' + config.displayDir + 'assets/css/',
      '!' + config.displayDir + 'assets/css/**'
    ], {force: true}, cb)
});

gulp.task('styles', function() {
  return sass('dev/css/styles.scss', {
    style: 'expanded',
    loadPath:[
      config.bowerDir + '/font-awesome/scss',
      config.npmDir + '/bootstrap-sass/assets/stylesheets',
    ]
    })
    .pipe(autoprefixer())
    .pipe(gulp.dest('./assets/css'));
  });



gulp.task('jshint', function() {
  return gulp.src([
      'dev/js/*.js',
  ]).pipe(jshint()
  ).pipe(jshint.reporter('jshint-stylish'));
});

gulp.task('scripts', function() { 
  return gulp.src([
      config.npmDir + '/jquery/dist/jquery.min.js',
      config.npmDir + '/jquery-validation/dist/jquery.validate.min.js',
      config.npmDir + '/jquery-validation/dist/additional-methods.js',
      'dev/js/vendor/*.js',
      'dev/js/*.js'
  ])
      .pipe(concat('scripts.js'))
      //.pipe(uglify())
      .pipe(gulp.dest('./assets/js'));
    });



gulp.task('webserver', ['styles' ], function() {
  return gulp.src('dist')
    .pipe(webserver({
      livereload: true,

      //Change this value to "True" to be taken to a directory listing upon running gulp
      directoryListing: {
          enable: true,
          path: 'dist'
      },
      open: true
    }));
});

gulp.task('watch', function() {
  gulp.watch('dev/css/**/*.scss', ['styles']);
  gulp.watch('dev/js/**/*.js', ['jshint', 'scripts']);
});
