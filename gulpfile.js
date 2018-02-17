var gulp = require('gulp');
var sass = require('gulp-sass');
var watch = require('gulp-watch');

// TASK PARA O SASS converte os arquivo .sass em .css e envia p/ a pasta /css
gulp.task('sass', function () { 
	return gulp.src('sass/**/*.sass')
	.pipe(sass({outputStyle: 'compressed'}).on('error', sass.logError)) 
	.pipe(gulp.dest('css')); 
});
// TASK para WATCH
gulp.task('watch', function () { 
	gulp.watch('sass/**/*.sass', ['sass']); 
}); 


// TASK DEFAULT gulp / assim da todos os comandos só usando o gulp
gulp.task('default', ['sass','watch']);