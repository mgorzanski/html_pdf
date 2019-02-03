var gulp = require('gulp');
var sass = require('gulp-sass');

var input = 'resources/sass/**/*.scss';
var output = 'public/css';

gulp.task('sass', function() {
	return gulp
		.src(input)
		.pipe(sass({ outputStyle: 'compressed' }))
		.pipe(gulp.dest(output));
});

gulp.task('watch', function() {
	return gulp
		.watch(input, ['sass'])
		.on('change', function(event) {
			console.log('File ' + event.path + ' was ' + event.type + ', running tasks...');
		});
});

gulp.task('default', ['sass', 'watch']);