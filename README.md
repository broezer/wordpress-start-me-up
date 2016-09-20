# Wordpress Start Me Up

Simple Wordpress Starter Theme using NPM.
Includes Bower, Gulp & BrowserSync

This starter theme is to give my theme development a kickstart. 
But also keeping the requirements fairly low. 

Use this theme when you are solely develop a theme. So wether you are in control of the whole Wordpress installation or just the theme, this starter theme can help you out.  

With this theme you can manage you Bower dependencies, concatenate theme, minify them as vendor javascript or css. During development you can keep track which dependencies you use. 
This theme allows for custom scripts to be written and again bundle them together and serve theme as a minified file. 

All this is done with Gulp. 

I also added TGM Plugin Activation to help out with plugin dependency of you theme. This theme also has Advanced Custom Fields integration which uses JSON. 

More features coming in the future

## Important Prerequisites

1. Have [node and npm](https://nodejs.org/) installed on your system *(node@5.0.0)*
2. Have [gulp](https://github.com/gulpjs/gulp/blob/master/docs/getting-started.md) globally installed *(gulp@^3.9.0)*

## Up and Running
1. Run `npm install` and `bower install`
2. Replace localhost  `start-me-up:8888` in `header.php` `footer.php` `gulpfile.js`
3. Run your server MAMP or whatever you use
4. Run `gulp` for default functions

## ToDo
- [ ] Write a better README
- [ ] Make a blog post about this
- [x] Tweet about it 
