# Ascension
Ascension is a WordPress theme framework that's fully responsive, highly customizable, easily skinned, and light weight. Ascension is created using the most recent WordPress coding standards, and is 100% extendible by child themes.

**This theme is currently in beta testing and should not be used on mission critical sites.**


## Documentation
Ascension is a parent theme that supports the rapid development of unique and robust child themes. It's best to only use child themes to modify Ascension so the framework can be updated across all of your themes while preserving your changes. The Ascension code structure follows the WordPress coding standards and maintains a similar flow and consistency so it's as easy as possible to adapt too. A wide range of third party development tools and a starter child theme are integrated into Ascension to streamline the theme creation process.


### Supported Features
Most of the WordPress built-in features are supported in addition to the custom framework features. Automatic feed links, post formats, custom backgrounds, custom headers, menus, post thumbnails, internationalization, right to left language, multisite, editor styles, and more is supported by Ascension. Additional supports are planned for future releases.


### Hooks and Filters
A wide range of elements in the framework can be modified utilizing action and filter hooks so you don't have to modify the HTML in multiple templates. Actions hooks and filters are declared logically throughout the entire theme, including over 350 action and 115 filter hook declarations. Though hooks are convenient for many changes, Ascension does not use hooks to build the default template contents, but does provide enough hooks to prevent the need to overwrite templates for most child themes. This is to allow for a more traditional template layout that a front-end developer or designer is likely be familiar with.


### Grunt Tasks
The JavaScript task runner Grunt is integrated into Ascension to handle the heavy lifting during the theme creation process. Grunt is a node.js plugin that can perform the repetitive tasks on your project, such as SASS compiling, file minification, image processing, or a wide range of other tasks. Ascension comes with a package.json file to managed the necessary node.js dependencies, and a GruntFile.js with a set of standard tasks. A file watch task is setup on the SASS and JavaScript files to automatically run them through a series of compile and compression tasks whenever they are saved.


### CSS and SASS
The Ascension CSS is generated using the SASS CSS preprocessor, the Compass framework mixins, and a series of Grunt tasks to compile and compress the CSS files.The SASS files are located in the scss folder and when one is saved the root .scss files will generate a .css file in the css folder. The framework and starter theme styles are located in the scss/ascension ans scss/ascension-starter folders and are logically broken down into multiple files. A set of variables and customizable mixins are provided by Ascension, in addition to the Compass framework mixins, to help streamline the theme creation process. The framework styling is minimal to prevent child themes having to overwrite CSS, and the starter .scss files include empty rules to cover all of the elements in a basic WordPress/Ascension installation. These empty rules will not output the the final CSS, but are provided as a reference when creating your child theme.


### Responsive Design
Ascension is created using a responsive design that will allow the layout to scale and fit any screen size on any modern device. A custom responsive grid system along with powerful mixins and variable customizations are included to be optionally used when creating child themes. The grid system is setup with 12 columns and 4 breakpoints (small 1 - 400px, medium 401 - 800px, large 801 - 1200px, full 1200+px) that follow a mobile first approach. Along with the traditional grid system, an "easy grid" system is included to simplify the creation of common grid usages. A responsive dropdown module is also included so any content can easily be moved from a dropdown into a full content position at designated breakpoints, as seen in the starter theme main navigation setup.


### Web Fonts
The WebFontLoader JavaScript library is integrated into Ascension to simplify the process of including custom web fonts in your child theme. Web fonts can be loaded from Google Fonts, Typekit, Fonts.com, Fontdeck, and from within your own theme. The fonts are loaded by calling the 'asc_webfonts' function and passing in your font vendor, either the font family string or account ID (depending on the vendor selected) and optional arguments. Additionally, WebFontLoader can be initialized manually to allow full control over the API by following the directions provided at https://github.com/typekit/webfontloader


### Icon Font Packs
The Dashicons font pack from the WordPress 3.8 dashboard and the Genericons font pack from the Twentyfourteen theme are integrated into Ascension and ready for use. Each font pack is setup with the default vendor class names and content codes, but the main icon class is setup to allow the icons to easily fall inline with text or other inline elements. Also included are two powerful mixins 'gen-dashicon' and 'gen-genericon' which allow you to easily add an icon to any CSS element.


### Theme Options
A standard set of theme options are built into the framework to allow users to control the layout and feel of their chosen child theme. The most notable of these options is the ability to change the sidebar layout, but also covered are areas such customizing the header, adding social icon links, custom header code, and much more. Child themes are encouraged to account for all theme options and are provided an API to customize or disable the default options in addition to adding their own custom options.


### Custom Header
Ascension comes with three built-in header types and the default type is custom to the currently active child theme. The banner header type includes a banner image that fits 100% width and has an optional title and tagline. The widget header type will allow the user to assign a widget that contains the header content of their choosing. The Ascension theme options also provide areas to use a title and tagline different than what's set in your general settings, or to disable them all together.


### Sidebars
Ascension comes packaged with 6 different sidebar layouts that can be chosen for 8 different sections of the site. All of the sidebars are designed to be responsive and properly scale to the various screen sizes.

#### Sidebar Layouts
+ Right Sidebar
+ Left Sidebar
+ Left and Right Sidebars
+ Double Right Sidebars
+ Double Left Sidebars
+ No Sidebars

#### Sidebar Sections
+ Default
+ Home
+ Archive
+ Singular
+ Page
+ Search
+ Not Found
+ Attachment


### Widget Areas
In addition to the sidebars, Ascension comes with 5 widget sections; below the header, above the content, below the content, above the footer, and in the footer. Each widget section has 4 standard widget areas; full width widgets, half width widgets, third width widgets, and quarter width widgets. The widget section below the header also comes with an additional widget area at the top labelled 'Main Slider', which functions the same as the full width widgets. All of the widget areas are responsive and will properly scale to the various screen sizes.


### Slider Widget
A custom image and content slider widget is included that can load it's content from defined posts, sticky posts, a specified category, or a specified post type. By default, the widget will pull the posts featured image for the slide image and the post title and excerpt for the slide content. The image, title and content can be customized per post by using the Slider Content meta box on the post edit screen. The image and content slider widget was created using the Flex Slider jQuery slider toolkit from http://www.woothemes.com/flexslider/


### Login Widget
A simple login widget is included with an option to customize where the user is redirected after logging in. The login form has a username and password field and an option to remember the login details. Once logged in, the widget displays a list of links to visit either the users profile or the admin dashboard and another link to log out of the site.


### Shortcodes
A set of shortcodes are included with the framework to allow end users to easily add rich formatting or special content to their posts and pages. The shortcodes related to content formatting have an associated visual editor button so they can be easily added and viewed in the post visual editor.


### Posts Widgets
There is a special widget area called "Posts Widgets" whose assigned widgets can be displayed inside of a post or page by using the shortcode [asc-widget title="Widget Title"]


### Updates and Contribution
Ascension is constantly updated to adhere to new WordPress updates and standards, add new features, maintain tight security, and optimize for performance. Updates that may break child themes are avoided where possible and when necessary saved for major releases. If you wish to contribute to the development of Ascension, feel free to submit pull requests to the GitHub repository at https://github.com/CliffAscent/ascension


### Support
The full documentation and support resources can be found at http://themeascent.com/support