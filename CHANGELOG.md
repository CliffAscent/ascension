# Change Log

+ 22 March 2014
	+ Default theme options callback fixed.
	+ Compass files modified.
	+ Misc. changes.

+ 15 February 2014
	+ Attachment page links now returned from asc_get_next_image_link() and asc_get_prev_image_link()
	+ Various functions changed to use locate_template()

+ 15 February 2014
	+ Header, navigation and widget templates moved into their own folders.
	+ Header types made extendible. Use filter 'asc_header_layout_options' and add templates/headers/header-{option_value}.php
	+ asc_get_nav_template() changed to return false if the main nav is disabled.
	+ Template tags spit into multiple files in inc/templates-tags/{category}.php
	+ Widgets spit into multiple files in inc/widgets/{type}.php
	+ Added an option to the post slider meta box to remove the post from archives (slider only).

+ 15 February 2014
	+ Footer credits open in a new window.
	+ Theme options reorganized into an object.
		+ Settings options array changed to be associative.
		+ Custom options move into it's own function.
		+ Tooltip descriptions moved into their own function.
		+ Filters added to header layout, sidebar layout and environment options.

+ 13 February 2014
	+ Added 'page-' to all page templates.

+ 12 February 2014
	+ Ensure user can upload files before displaying the slider mat box.
	+ Changed the orderby for the 'activated' slider query.
	+ Removed some extra 'after image' hooks.
	+ Added an option to remove a slider image in the post edit screen.
	+ Vertical or horizontal menu classes have changed.
	+ Reduced CSS specificity where possible.
	+ Misc CSS changes.
	+ Custom walker nav removed.

+ 10 February 2014
	+ Header defaults hook added
	+ Hooks starting with ascension_ changed to asc_
	+ Misc hook changes
	+ .drop changed to only be relative inside of entry-content or if .relative is added
	+ grunt setup renamed to grunt dl-scripts
	+ Various bug fixes

+ 08 February 2014
	+ Misc. cleanup
	+ Margin changes for headings and post content
	+ Form field wrapper setup
	+ Extra files removed
	+ Bower added to manage vendor scripts
	+ Script initializations moved into 'init' methods
	+ Fixed spacing issue with navigation-dropped

+ 31 January 2014
	+ Added an "activated" button type
	+ Misc. button class name changes
	+ Added a post meta box for custom slider content
	+ Added a slider option to use posts with a defined slider image
	+ Added a widget area and shortcode to allow widgets to be displayed inside of posts
	+ Rearranged functions.php and moved some code into it's own file

+ 30 January 2014
	+ General cleanup
	+ Entry image moved into the header
	+ Filters added to template tags
	+ Reworked search form and template
	+ Updated editor styles

+ 26 January 2014
	+ Commit of beta files