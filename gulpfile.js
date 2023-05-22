try {

    //
    // Required plugins
    //
    var gulp        = require('gulp');

    // CSS
    var autoprefix  = require('gulp-autoprefixer');
    var compass     = require('gulp-compass');
    var pixrem      = require('gulp-pixrem');

    // JS
    var uglify      = require('gulp-uglify');
    var stripDebug  = require('gulp-strip-debug');

    // Image
    var spritesmith = require('gulp.spritesmith');

    // Handlebars
    var handlebars = require('gulp-handlebars');
    var wrap = require('gulp-wrap');
    var declare = require('gulp-declare');
    var concat = require('gulp-concat');

    // Other
    var del         = require('del');
    var fs          = require('fs');
    var merge       = require('merge-stream');
    var path        = require('path');
    var changed     = require('gulp-changed');
    try {
        var guploader  = require('gulp-uploader');
    } catch (e) {
        var guploader = false;
    }
    var gutil      = require('gulp-util');
    var notify     = require('gulp-notify');
    var sftp       = require('gulp-sftp');
    var util       = require('util');

} catch (e) {
    console.log('Missing module. Please rerun npm install.');
    console.log(e);
    return;
}

//
// Environment
//
var
environment,
upload = false,
uploader,
uploader,
uploader;

//
// Assets
//
var paths = {
    input: {
        imagesDir   : 'src/img',
        spritesDir  : 'src/img/sprites',
        imagesFiles : [
            'src/img/**/*',
            '!src/img/sprites/**/*',
        ],
        javascriptsDir   : 'src/js',
        javascriptsFiles : [
            'src/js/**/*.js',

            // Add any JS files to ignore after the first
            '!src/js/**/*.min.js'
        ],
        stylesDir     : 'src/sass',
        stylesFiles   : 'src/sass/**/*.scss',
        cssFiles      : 'src/sass/**/*.css',
        fontFiles     : 'src/fonts/**/*',
        templateFiles : 'src/templates/*.hbs',
    },
    output: {
        fonts       : 'assets/fonts',
        images      : 'assets/img',
        javascripts : 'assets/js',
        styles      : 'assets/css',
    },
    clean: {
        images      : 'assets/img',
        javascripts : 'assets/js',
        styles      : 'assets/css',
        sprites      : 'src/sass/_sprite-*.scss',
    }
}

//
// Functions
//
function getFilesToProcess(input, allFiles) {
    if (allFiles != false)
        allFiles = true;

    if (util.isArray(input)) {
        if (allFiles) {
            return input[0];
        } else {
            var filesToProcess = []
            for (var i = 1, n = input.length; i < n; i++) {
                filesToProcess.push(input[i].substr(1));
            }
            return filesToProcess;
        }
    } else {
        return input;
    }
}

function getFolders(dir) {
    try {
      return fs.readdirSync(dir)
        .filter(function(file) {
          return fs.statSync(path.join(dir, file)).isDirectory();
        });
    } catch (e) {
        return [];
    }
}

//
// Directory cleaner Task
//
var cleanDirectories = [];
for (var key in paths.clean) {
    cleanDirectories.push(paths.clean[key] + '/**');
}
gulp.task('clean', function(cb) {
    del(cleanDirectories, cb);
});

//
// CSS Task
//
gulp.task('css', function() {
    return gulp.src(getFilesToProcess(paths.input.stylesFiles))
        .pipe(compass({
            config_file : 'config.rb',
            css         : paths.output.styles,
            font        : paths.output.fonts,
            environment : (environment == 'production'?environment:'development'),
            image       : paths.output.images,
            javascript  : paths.output.javascripts,
            relative    : true,
            sass        : paths.input.stylesDir,
            style       : (environment == 'production'?'compressed':'expanded'),
            sourcemap   : true
        }))
        .on('error', notify.onError("SASS error: <%= error.message %>"))
        .pipe(autoprefix({
            browsers: ['last 10 versions']
        }))
        .pipe(pixrem())
        .pipe(upload != true ? notify('SASS compiled.') : gutil.noop())
        .pipe(gulp.dest(paths.output.styles))
        .pipe(upload == true ? uploader.upload({
            remote_path: paths.output.styles
        }) : gutil.noop())
        .pipe(upload == true ? notify('CSS uploaded.') : gutil.noop());
});

gulp.task('css-move', function(cb) {
    var filesToProcess = getFilesToProcess(paths.input.cssFiles, false);
    return gulp.src(filesToProcess)
        .pipe(environment != 'production' ? changed(paths.output.styles, {
            hasChanged: changed.compareSha1Digest
        }) : gutil.noop())
        .pipe(gulp.dest(paths.output.styles))
        .pipe(upload == true ? uploader.upload({
            remote_path: paths.output.styles
        }) : gutil.noop());
});

//
// JS Task
//
gulp.task('js-process', function() {
    return gulp.src(paths.input.javascriptsFiles)
        .pipe(environment != 'production' ? changed(paths.output.javascripts, {
            hasChanged: changed.compareSha1Digest
        }) : gutil.noop())
        .pipe(environment == 'production' ? stripDebug() : gutil.noop())
        .pipe(environment == 'production' ? uglify() : gutil.noop())
        .pipe(gulp.dest(paths.output.javascripts))
        .pipe(upload == true ? uploader.upload({
            remote_path: paths.output.javascripts
        }) : gutil.noop());
});

//
// JS Task
//
gulp.task('js-move', function(cb) {
    var filesToProcess = getFilesToProcess(paths.input.javascriptsFiles, false);
    return gulp.src(filesToProcess)
        .pipe(environment != 'production' ? changed(paths.output.javascripts, {
            hasChanged: changed.compareSha1Digest
        }) : gutil.noop())
        .pipe(gulp.dest(paths.output.javascripts))
        .pipe(upload == true ? uploader.upload({
            remote_path: paths.output.javascripts
        }) : gutil.noop());
});

//
// Image Task
//
gulp.task('img', function() {
    var filesToProcess = getFilesToProcess(paths.input.imagesFiles);
    return gulp.src(filesToProcess)
        .pipe(environment != 'production' ? changed(paths.output.images, {
            hasChanged: changed.compareSha1Digest
        }) : gutil.noop())
        .pipe(gulp.dest(paths.output.images))
        .pipe(upload == true ? uploader.upload({
            remote_path: paths.output.images
        }) : gutil.noop());
});

//
// Sprites Task
//
gulp.task('sprite', function () {

    var folders = getFolders(paths.input.spritesDir);

    var tasks = folders.map(function(folder) {

        var algorithm = 'binary-tree';
        if (folder.indexOf('horz') > -1) {
          algorithm = 'left-right';
        } else if (folder.indexOf('vert') > -1) {
          algorithm = 'top-down';
        }

        var folderFiles = path.join(paths.input.spritesDir, folder + '/*.png');
        var spriteData = gulp.src(folderFiles)
          .pipe(spritesmith({
            imgName: 'sprite-' + folder + '.png',
            cssName: '_sprite-' + folder + '.scss',
            cssVarMap: function (sprite) {
              sprite.name = 'sprite_' + folder + '_' + sprite.name;
            },
            algorithm: algorithm
          }));

        var imgPipe = spriteData.img.pipe(gulp.dest(paths.input.imagesDir));
        var cssPipe = spriteData.css.pipe(gulp.dest(paths.input.stylesDir));

        return merge(imgPipe, cssPipe);

    });

    return merge(tasks);

});

//
// Templates Task
//
gulp.task('templates', function(){
    gulp.src(paths.input.templateFiles)
        .pipe(handlebars({
          handlebars: require('handlebars')
        }))
        .pipe(wrap('Handlebars.template(<%= contents %>)'))
        .pipe(declare({
            namespace: 'app.templates',
            noRedeclare: true, // Avoid duplicate declarations
        }))
        .pipe(concat('templates.js'))
        .pipe(gulp.dest(paths.output.javascripts));
});

//
// Fonts Task
//
gulp.task('fonts-move', function(cb) {
    var filesToProcess = getFilesToProcess(paths.input.fontFiles, false);
    return gulp.src(filesToProcess)
        .pipe(gulp.dest(paths.output.fonts))
        .pipe(upload == true ? uploader.upload({
            remote_path: paths.output.fonts
        }) : gutil.noop());
});

//
// File Watcher Task
//
gulp.task('watch', function() {
    gulp.watch(getFilesToProcess(paths.input.stylesFiles), ['sprite']);
    gulp.watch(getFilesToProcess(paths.input.fontFiles), ['fonts-move']);
    gulp.watch(getFilesToProcess(paths.input.stylesFiles), ['css']);
    gulp.watch(getFilesToProcess(paths.input.cssFiles), ['css-move']);
    gulp.watch(getFilesToProcess(paths.input.imagesFiles), ['img']);
    gulp.watch(getFilesToProcess(paths.input.javascriptsFiles), ['js-process']);
    gulp.watch(getFilesToProcess(paths.input.javascriptsFiles, false), ['js-move']);
    gulp.watch(paths.input.templateFiles, ['templates']);
});

//
// Default Task
//
gulp.task('default', ['clean'], function() {
    return gulp.start(['sprite', 'img', 'fonts-move', 'css', 'css-move', 'js-process', 'js-move', 'templates', 'watch']);
});

//
// Upload Task
//
gulp.task('upload', ['clean'], function() {
    if (!guploader) {
        console.log('Upload could not be started. gulp-upload is missing.');
        return;
    }
    try {
        require('json-comments');
        var sftpConfig = require('./sftp-config.json');
        sftpConfig.verbose = true;
        uploader = guploader(sftpConfig);
        upload = true;
    } catch (e) {
        console.log(e);
        console.log('Upload could not be started. No valid SFTP credentials found.');
        return;
    }
    return gulp.start(['img', 'css', 'css-move', 'js-process', 'js-move', 'watch']);
});

gulp.task('build', ['clean'], function() {
    environment = 'production';
    return gulp.start(['sprite', 'img', 'css', 'css-move', 'js-process', 'js-move']);
});
