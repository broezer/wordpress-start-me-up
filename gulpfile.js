
var localHost= 'start-me-up.test';

var gulp = require('gulp');
var browserSync = require('browser-sync').create();
var sass = require('gulp-sass');
var cleanCSS = require('gulp-clean-css');
var sourcemaps = require('gulp-sourcemaps');
var prefix = require('gulp-autoprefixer');
var rename = require('gulp-rename');
var wiredep = require('wiredep');
var replace = require('gulp-replace');
var inject = require('gulp-inject');
var concat = require('gulp-concat');
var uglify = require('gulp-uglify');

gulp.task('default', function() {
  // place code for your default task here
});

gulp.task('serve', function() {
    browserSync.init({
        proxy: localHost //Specify your localhost here
    });
    gulp.watch('./src/scss/**/*.scss', ['sass']);
    gulp.watch('./dist/main.css', ['css']);
    gulp.watch('./**/*.php').on('change', browserSync.reload);
    gulp.watch('./dist/**/*.css').on('change', browserSync.reload);
    gulp.watch('./src/js/**/*.js', {cwd: './'},  ['inject-js']);
});

gulp.task('sass', function () {

    gulp.src('src/scss/main.scss')
        .pipe(sourcemaps.init())
        .pipe(sass({outputStyle: 'expanded'}).on('error', sass.logError))
        .pipe(prefix('last 1 version', '> 1%', 'ie 8', 'ie 7'))
        .pipe(sourcemaps.write())
        .pipe(rename('dev.css'))
        .pipe(gulp.dest('dist'));

    gulp.src('src/scss/main.scss')
        .pipe(sass({outputStyle: 'compressed'}).on('error', sass.logError))
        .pipe(prefix('last 1 version', '> 1%', 'ie 8', 'ie 7'))
        .pipe(rename('main.css'))
        .pipe(gulp.dest('dist'));
});

gulp.task('css', function(){
    gulp.src('./dist/main.css')
        .pipe(cleanCSS({processImport: false}))
        .pipe(rename('main.min.css'))
        .pipe(gulp.dest('./dist'));
});


gulp.task('inject-js', function(){
    var wiredepJs = wiredep().js;
    if(wiredepJs){
      var js = gulp.src(wiredep().js);
    }else{
      var js = gulp.src([]);
    }

    gulp.src('./footer.php')
    //Custom JS
      .pipe(inject(gulp.src('./src/js/*.js'),
              {starttag: '<!-- custom:js -->', endtag: '<!-- endcustom -->'}
            ))
      .pipe(replace(/(\/src\/js)/g, '<?php echo get_template_directory_uri(); ?>$1'))
    //Custom JS - Uglify
      .pipe(inject(gulp.src('./src/js/*.js')
        .pipe(concat('script.js'))
        .pipe(uglify())
        .pipe(gulp.dest('./scripts')),
        {starttag: '<!-- custom-min:js -->', endtag: '<!-- endcustom-min -->'}
      ))
      .pipe(replace(/(\/scripts\/script)/g, '<?php echo get_template_directory_uri(); ?>$1'))
      .pipe(gulp.dest('./'));
});

gulp.task('default', ['sass', 'css', 'inject-js', 'serve']);
