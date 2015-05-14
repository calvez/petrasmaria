# PetrasMaria.hu wordpress téma 
github.com:olefredrik/FoundationPress alapján
## Requirements


## Quickstart

```bash
$ cd my-wordpress-folder/wp-content/themes/
$ git clone git@github.com:olefredrik/FoundationPress.git
$ mv FoundationPress your-theme-name
$ cd your-theme-name

# will call:
# bower install && grunt build
# afterwards
# check `package.json` `scripts`
# for further information
$ npm install
```

## IMPORTANT
Ubuntu error:
npm WARN This failure might be due to the use of legacy binary "node"
npm WARN For further explanations, please read
/usr/share/doc/nodejs/README.Debian

## Solution
In short, try sudo apt-get install nodejs-legacy.
https://github.com/google/web-starter-kit/issues/323

**Tip:**
If you get an error saying Permission denied (publickey) when cloning the repository, use the https protocol instead:
```git clone https://github.com/olefredrik/FoundationPress.git```

While you're working on your project, run:

```bash
# will call:
# grunt watch
#
# predefined in `package.json`
$ npm run watch
```

For building all the assets, run:

```bash
# will call:
# grunt build
#
# predefined in `package.json`
$ npm run build
```

And you're set!

Check for Foundation Updates? Run:
`$ foundation update`
(this requires the foundation gem to be installed in order to work. Please see the [docs](http://foundation.zurb.com/docs/sass.html) for details.)

Wanna run a custom grunt task? Run:
```bash
# will call:
# grunt sass
$ npm run grunt -- sass

# will call:
# grunt copy
$ npm run grunt -- copy
```

### Stylesheet Folder Structure

  * `style.css`: Do not worry about this file. (For some reason) it's required by WordPress. All styling are handled in the Sass files described below

  * `scss/foundation.scss`: Imports for Foundation components and your custom styles.
  * `scss/config/_settings.scss`: Original Foundation 5 base settings
  * `scss/config/_custom-settings.scss`: Copy the settings you will modify to this file. Make it your own
  * `scss/site/*.scss`: Unleash your creativity and make it look perfect. Create the files you need (and remember to make import statements for all your files in scss/foundation.scss)

  * `css/foundation.css`: All Sass files are minified and compiled to this file
  * `css/foundation.css.map`: CSS source maps

### Script Folder Strucutre

  * `bower_components/`: This is the source folder where all Foundation components are located. `foundation update` will check and update scripts in this folder.

  * `js/custom`: This is where you put all your custom scripts. Every .js file you put in this directory will be minified and concatinated to [foundation.js](https://github.com/olefredrik/FoundationPress/blob/master/js/foundation.js)

  * `js/vendor`: Vendor scripts are copied from `bower_components/` to this directory. We use this path for enqueing the vendor scripts in WordPress.

  * Please note that you must run `npm run build` in your terminal for the script to be copied and concatinated. See [Gruntfile.js](https://github.com/olefredrik/FoundationPress/blob/master/Gruntfile.js) for details

## Demo

* [Clean FoundationPress install](http://foundationpress.olefredrik.com/)
* [FoundationPress Kitchen Sink - see every single element in action](http://foundationpress.olefredrik.com/kitchen-sink/)