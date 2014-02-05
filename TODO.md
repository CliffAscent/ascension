# Todo
The to do list is constantly evolving, chances are more than what is listed will be done, and some of the items listed may get scrapped. The list items are not necessarily in order of when they will be completed.

+ Create an Ascension Theme Generator plugin to customize and download a starter child theme.
	+ Check for the ascension and ascension starter theme on activation so files can be pulled form there
	+ Add a theme option to assign the form to a page
	+ Store in uploads/ascension-starter/themes/[timestamp]/[theme].zip
	+ Have a cron run twice an hour to clean out themes older than half an hour
	+ Delete all theme on uninstall and remove crons
	+ Output the form to the end of the pages content
		+ Use GET so it can be bookmarked
		+ Ask for values to replace the following;

			style.css
			
			Ascension Demo
			http://cliffascent.com/ascension
			Patrick Clifford
			http://cliffascent.com


			package.json
			
			Ascension_Demo
			Patrick Clifford


			Gruntfile.js
			
			Ascension Demo
			ascension-demo


			functions.php
			
			Ascension Demo
			ASC_DEMO_
			ascension-demo
			asc_demo_


			ascension-demo.scss
			
			Ascension Demo
			ascension-demo


			files
			
			css/ascension-demo.css
			css/ascension-demo.min.css
			js/ascension-demo.css
			js/ascension-demo.min.css
			scss/ascension-demo.scss


			folders
			
			scss/ascension-demo

+ Write the homepage, ascension page, starter page, support page and blog posts.

+ Test all features and write the documentation.
	+ Write out the docs in detail
	+ Build hook reference maps
	+ Build DOM reference maps
	+ Icon reference/helper
	+ Installation methods

+ Browser, feature, and plugin testing.

+ Helper Rules and Widgets
	+ Modals
	+ Popovers
	+ Tabs system
	+ Accordion system

+ Feedback
+ Testing
+ Release

+ Explore homepage options.
+ Explore new slider options.
+ Explore responsive image solutions with retina and large display support.

+ Probably Will Do
	+ Add a customizable recent posts widget that uses the frameworks custom walker.
	+ Add archive layout options with a default and grid layout as default options.
	+ Explore options to utilize the environment variable.
	+ Add a registration form the the login template and widget.
	+ Classes to show an hide content on certain device, device orientation, etc.

+ Might Do
	+ Integrate bootstrap into a starter theme
	+ FITVIDS to resize embedded videos
	+ Lazy load to load endless posts
	+ Button to update minified script with the dev script.
	+ Integrate LESS.
	+ Theme option profiles (save settings globally, per child theme, etc.).
	+ Add a search icon in the header.
	+ Move the theme options into the theme customizer?
	+ Public theme options.