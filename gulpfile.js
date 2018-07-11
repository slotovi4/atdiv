var   gulp           = require('gulp'),                    //модуль gulp
      sass           = require('gulp-sass'),               //sass пакет
      browserSync    = require('browser-sync'),            //browserSync
      concat         = require('gulp-concat'),             //concat (конкатанация файлов)
      uglify         = require('gulp-uglifyjs'),           //uglifyjs (сжатие js файлов)
      cssnano        = require('gulp-cssnano'),            //cssnano (сжимает css)
      rename         = require('gulp-rename'),             //rename (ренеймит .min)
      del            = require('del'),                     //del (удаление)
      imagemin       = require('gulp-imagemin'),           //imagemin (минимизация изображений)
      pngquant       = require('imagemin-pngquant'),       //pngquant (минимизация png)
      cache          = require('gulp-cache'),              //cache (кэш)
      autoprefixer   = require('gulp-autoprefixer');       //autoprefixer (автоматическое добавление вендорных префиксов)

var   source         = './app/',                               //app
      dist           = './www/wp-content/themes/atdivtheme/',  //wp
      reload         = browserSync.reload,
      path = {
			src: {                                            //source
				root:     source,
				js:       source + 'js/**/*.js',
            settjs:   source + 'js/settings/**/*.js',
				css:      source + 'css/',
				sass:     source + 'sass/**/*.sass',
				scss:     source + 'sass/**/*.scss',
				img:      source + 'img/**/*',
				libs:     source + 'libs/',
				fonts:    source + 'fonts/',
            jquery:   source + 'libs/jquery/dist/jquery.min.js',
            magnif:   source + 'libs/magnific-popup/dist/jquery.magnific-popup.min.js',
            jqui:     source + 'libs/jquery-ui-1.12.1/jquery-ui.min.js',
            owl:      source + 'libs/owl-carousel/dist/owl.carousel.min.js',
            slick:    source + 'libs/slick-1.8.0/slick/slick.min.js',
            bootstrap:source + 'libs/bootstrap/dist/bootstrap.min.js',
            libssass: source + 'sass/libs.sass',
            mainscss: source + 'sass/main.scss'
			},
         dev: {                                            //development
				root:    dist + '',
            js:      dist + 'js',
				css:     dist + 'css/',
            php:     dist + '*.php',
            img:     dist + 'img',
				vendors: dist + 'vendors/',
            fonts:   dist + 'fonts/',
            libscss: dist + 'css/libs.css',
            maincss: dist + 'css/main.css',
			},
         prod: {                                           //production
				root:    dist + '',
            js:      dist + 'js',
				css:     dist + 'css',
            php:     dist + '*.php',
            img:     dist + 'img',
				vendors: dist + 'vendors/',
            fonts:   dist + 'fonts/**/*'
			},
			watch: {                                          //watch
            mainjs: source + 'js/main.js',
            js:     source + 'js/**/*.js',
				sass:   source + 'sass/**/*.scss',
				scss:   source + 'sass/**/*.sass',
				html:   source + 'html/**/*.html',
				jsWp:   dist   + '**/*.js',
            php:    dist   + '**/*.php',
            css:    dist   + 'css/*.css'
			}
	   };

/*CSS*/

//препроцессинг sass
gulp.task('sass', function() {                             //создаю таски (инструкции)
   return gulp.src([                                       //* выберет все файлы с разрешением .scss
      path.src.libssass,
      path.src.mainscss,
   ])
   .pipe(sass().on('error', sass.logError))                //преобразование sass в css
   .pipe(autoprefixer([                                    //автоматическое добавление вендорных префиксов
      'last 15 versions'                                   //используем префиксы для поддержки последних 15 версий всех браузеров
   ], {                                                    //доп настройка
      cascade: true                                        //каскадирование для читабельности префиксов
   }))
   .pipe(gulp.dest(path.dev.css));                         //вывожу в ПАПКУ результат !!!поменял местами посл и перд посл стороки так как я делал релоад до того как слили успели поменяться в wp
});

//препроцессинг css
gulp.task('css', ['sass'], function() {
   return gulp.src([
      path.dev.libscss,
      path.dev.maincss,
   ])
   .pipe(cssnano())                                        //сжатие css
   .pipe(rename({suffix: '.min'}))                         //ренейм
   .pipe(gulp.dest(path.dev.css));                         //выгружаю результат
});

/*JS*/

//препроцессинг js
gulp.task('js', function() {
   return gulp.src(path.src.js)
   .pipe(uglify())
   .pipe(gulp.dest(path.dev.js))
   .pipe(reload({stream: true}));
});

//таск сборки и сжатия всех скриптов настроек
gulp.task('settings', function () {
   return gulp.src([
      path.src.settjs,
   ])
   .pipe(concat('settings.min.js'))                         //конкатанация всех файлов в один
   .pipe(uglify())                                          //сжатие файла
   .pipe(gulp.dest(path.dev.js))                            //выгружаю результат
   .pipe(reload({stream: true}));
});

//таск сборки и сжатия библиотек
gulp.task('scripts', function () {
   return gulp.src([
      path.src.jquery,
      path.src.magnif,
      path.src.slick,
      path.src.jqui,
   ])
   .pipe(concat('libs.min.js'))
   .pipe(uglify())
   .pipe(gulp.dest(path.dev.js));
});

/*OPTIONS*/

//таск обработки(минимизации) изображений
gulp.task('img', function() {
   return gulp.src(path.src.img)
   .pipe(cache(imagemin({                                  //кеширование изображения
      interlaced: true,
      progressive: true,
      svgoPlugins: [{removeViewBox: false}],
      use: [pngquant()]
   })))
   .pipe(gulp.dest(path.dev.img));
});

//таск font-awesome (загрузка webfont)
gulp.task('font-awesome', function() {
   return gulp.src(path.src.libs + 'font-awesome/fonts/*')
   .pipe(gulp.dest(path.dev.fonts + 'font-awesome/'));
});

//таск сервера
gulp.task('browserSync', function() {
   browserSync({
      proxy:'atdiv',
      notify: false
   });
});

//таск для очистки кеша Gulp
gulp.task('clear', function () {
    return cache.clearAll();
});

//таск следащий за изменениями при сохранении
gulp.task('watch', ['css', 'js', 'scripts', 'settings', 'img', 'font-awesome', 'browserSync'], function() {
   gulp.watch([path.watch.sass, path.watch.scss], ['sass', reload]);
   gulp.watch(path.watch.js, ['js', 'settings']);
   gulp.watch(path.watch.php, reload);
});
