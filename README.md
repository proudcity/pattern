ProudCity Pattern Library
=========================

#### This is the official ProudCity pattern library.

It is based on [Twitter Bootstrap 3](http://getbootstrap.com/), and incorporates some elements from Bootstrap 4 like [cards](http://v4-alpha.getbootstrap.com/components/card/). It is available on [Bower](http://bower.io).

At [ProudCity](http://www.getproudcity.com) we use it to define common design patterns and mockup complete pages for getproudcity.com, our Drupal frontend [Proud theme](https://github.com/proudcity/proud/tree/master/themes/custom/proud_base), and our Drupal administration theme [Minimalist Admin](https://www.drupal.com/project/minimalist_admin).

[View on Github](https://github.com/proudcity/proudcity-patternlibrary)


### Installation and usage

#### I. Use our boilerplate

Install [node](https://nodejs.org), [grunt](http://gruntjs.com/), and [bower](http://bower.io/) globally. 
```
git clone https://github.com/proudcity/proudcity-patternlibrary-boilerplate.git  
cd proudcity-patternlibrary-boilerplate  
npm install && bower install  
grunt  
```

#### II. Manual installation with Bower

1.  Install with (Bower)[http://bower.io]: `bower install proudcity-patterns`
2.  Add `'<%= app %>/bower_components/proudcity-patterns/app/scss'` to `sass.options.includePaths` in `Gruntfile.js`.
3.  Copy `_local-settings.scss` into your local scss directory.
4.  Copy the `@include` statements in [./app/scss/_proudcity-patterns.scss](https://github.com/proudcity/proudcity-patterns/blob/master/app/scss/_proudcity-patterns.scss) into your own `app.scss` file.


### Credits

This is based on [Kemie](https://github.com/kemie)'s [Style-Guide-Boilerplate-Bootstrap-Edition](https://github.com/kemie/Style-Guide-Boilerplate-Bootstrap-Edition), which is in turn based on Based on Brett Jankord's [Style Guide Boilerplate](http://brettjankord.com/projects/style-guide-boilerplate/).

See [CREDITS.md]() for a full list of credits.


### @todo
* mixins
* .full-container, .full