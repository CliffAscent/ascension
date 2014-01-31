Ascension
=========

WordPress theme framework that's fully responsive, highly customizable, easily skinned, and light weight. Ascension is created using the most recent WordPress coding standards, and is 100% extendable by child themes.

This theme is currently in beta testing, do not use on mission critical sites.




Changelog
=========

05 June 2013
	Commit of beta files



	
Documentation
=========

<h2>Overview</h2>
Ascension is a WordPress theme framework that's fully responsive, highly customizable, easily skinned, and light weight. Ascension is created using the most recent WordPress coding standards, and is 100% extendable by child themes.


<h2>Supported Features</h2>
Ascension supports most of the WordPress built-in features and most plugin features, in addition to it's custom features. Automatic feed links, post formats, custom backgrounds, custom headers, menus, post thumbnails, internationalization, right to left language, multisite, and more are all supported by Ascension. Additional supports are planned for future versions, to include editor styles, the theme customization API, and much more.


<h2>Slider</h2>
Nivo slider integrated.


<h2>Custom Header</h2>
Ascension comes with three built-in header types. There is the default, which is custom to the currently active child theme, or the frameworks custom header layout. The second option is a banner header, which is a large banner image across the top of the page, which has an optional title and tagline. The third header type is a custom widget area, allowing the user to assign any custom widget to the header area. The Ascension theme options also provide areas to use a title and tagline different than what's set in your general settings.


<h2>Responsive Design</h2>
Ascension and all approved child themes are 100% responsive and will work flawlessly across all devices and screen sizes. Ascension by default is limited to a maximum width of 1200px, but a theme option is provided to allow the page to scale to the entire windows width. Allowing a fullscreen layout is not ideal, unless special consideration is taken for the oversized screens that exists today. Since 1024px is still the most common width of monitors, the standard layout is optimized for a 960px viewport, but again, it properly scales for all devices and screen sizes.


<h2>Theme Options</h2>
Ascension provides a wealth of standard theme options to allow the user to customize the look and feel of their chosen child theme. The most notable of these options are the sidebar layout options, which provides the user multiple layouts that can be set per page type (archive, home, page, etc.) Additional options includes social icons, controlbar contents, custom header code, navigation display, toggle for post elements, and much more.


<h2>Controlbar</h2>
The controlbar is a small bar anchored to the top of the page and provides basic user controls, navigation, and information. The most notable of the controlbar features are the login and register sections, search form, and social icons. The controlbar can also include a custom menu and widget area, and also has various display options.


<h2>Sidebars</h2>
Ascension comes packaged with 6 different sidebar layouts that can be chosen for 7 different sections of the site. All of the sidebars are designed to be responsive and properly scale to the various devices and screen sizes.

<h3>Sidebar layout options</h3>
<ul>
	<li>Right Sidebar</li>
	<li>Left Sidebar</li>
	<li>Left and Right Sidebars</li>
	<li>Double Right Sidebars</li>
	<li>Double Left Sidebars</li>
	<li>No Sidebars</li>
</ul>

<h3>Sidebar layout sections</h3>
<ul>
	<li>Default</li>
	<li>Home</li>
	<li>Archive</li>
	<li>Singular</li>
	<li>Page</li>
	<li>Search</li>
	<li>404</li>
	<li>Attachment</li>
</ul>


<h2>Widget Areas</h2>
In addition to the sidebars, controlbar and header, Ascension comes with 12 other widget areas. There are three widget sections, above the content, below the content, and the footer. Each of the sections have four different widget types, full width, half width, third width, and evenly spaced (doesn't work with IE7 and earlier). All of the widget areas are responsive and will properly scale to the various devices and screen sizes.

<h2>Shortcodes</h2>
Ascension has multiple shortcodes ready for use. There is [controlbar-login] which is used to add a small in-line login/logout link, [controlbar-register] which adds a small in-line register/profile link, [controlbar-search] which adds a small in-line search form, and [controlbar-social-icons] which displays the activated social icons in-line. All of the controlbar shortcodes use the custom controlbar settings from the theme options page. More shortcodes are planned, and you're welcome to provide your suggestions at http://cliffascent.com/forums/ascension/


<h2>Creating Child Themes</h2>
All functions in Ascension are 100% extendable by child themes, and child themes are intended to be used to customize Ascension for your site. Ascension supports the creation of child themes as described in the WordPress Codex at http://codex.wordpress.org/Child_Themes


<h2>Updates and Contribution</h2>
Ascension is constantly updated to adhere to new WordPress updates and standards, add new features, maintain tight security, and optimize for performance. If you wish to contribute to the development of Ascension, feel free to submit pull requests to the GitHub repository at https://github.com/CliffAscent/ascension


<h2>Support</h2>
Support is provided at http://cliffascent.com/forums/ascension/



Todo
=========

The todo list is constantly evolving, chances are more than what is listed will be done, and some of the items listed may get scrapped. The list items are not necessarily in order of when they will be completed.


<h2>Before Beta</h2>
<ul>
	<li>Documentation
		<ul>
			<li>Information popups in theme options page explaining everything</li>
			<li>Refit all code commenting and add small doc sections</li>
			<li>Explain add_settings_field/display/validation in theme options</li>
			<li>Create a how to make a child theme guide</li>
			<li>Add the docs to the theme options page</li>
		</ul>
	</li>
	<li>Slider
		<ul>
			<li>Widgetized</li>
			<li>Fully responsive</li>
			<li>Can pull slides from category, sticky posts, or specific ID's</li>
			<li>Can choose the max number of slides to display</li>
			<li>Can swap slide changers (images, titles, arrows, buttons, etc)</li>
			<li>Can customize slide delay time</li>
		</ul>
	</li>
	<li>Add a way to customize social icons.<li>
	<li>Split up css, make the framework sheet minified.<li>
	<li>Use more custom fields!<li>
	<li>Custom field for different thumbnails.<li>
	<li>Add a blank stylesheet with all common rules and another with the framework rules non-minified.<li>
	<li>Add helper styles, usch as hide at this width, add bottom padding, etc.<li>
	<li>Add useful functions, such as trimming characters.<li>
	<li>Check all functions for features needed, like maincontent needing optional additional classes.<li>
	<li>Add action hooks all over.<li>
	<li>JavaScript to toggle small drop menus.<li>
	<li>Option and filter for various text areas, such as login/profile link in the controlbar.<li>
	<li>Add woocommerce support.</li>
	<li>Theme woocommerce in the child theme.</li>
	<li>Add bbPress support.</li>
	<li>Theme bbPress in the child theme.</li>
	<li>TEST TEST TEST!!!</li>
	<li>Create a new test unit and submit it to the codex</li>
	<li>Options to hide pingbacks and trackbacks.</li>
	<li>Change % calculations to be based on 960.</li>
	<li>Check for compatibility
		<ul>
			<li>Custom post types</li>
			<li>Multisite</li>
			<li>bbPress</li>
			<li>BuddyPress</li>
			<li>Woocommerce</li>
		</ul>
	</li>
	<li>Test the shortcodes in various places</li>
	<li>RTL language support</li>
</ul>


<h2>After Beta</h2>
<ul>
	<li>Add LESS support.</li>
	<li>More integrated sliders.</li>
	<li>Post layout options (number of columns inside the posts section)</li>
	<li>Enhance nav menus using jQuery</li>
	<li>Combine images into sprites</li>
	<li>Split the theme option sections into tabs</li>
	<li>Enhanced 404 and search template functionality</li>
	<li>Login form for the control bar</li>
	<li>Resize images warning and/or script when activating the theme</li>
	<li>Add a favicon manager</li>
	<li>Responsive content shortcodes (hide and show elements for certain screen sizes)</li>
	<li>Sidebar and widget visibility options (only show x widget on x page, etc)</li>
	<li>Content box and/or widget area shortcodes (1/2, 1/3, 1/4, 2/3 and 1/3, etc)</li>
	<li>FITVIDS to resize embedded videos</li>
	<li>Lazy load to load endless posts</li>
	<li>Scroll to top shortcode (add to control bar)</li>
	<li>Popout shortcodes: scroll to top, message, social icons, information</li>
	<li>Scrolling message shortcode (marquee like)</li>
	<li>Page section navigation menu (shortcode to create element ID's and a menu to navigate them)</li>
	<li>Customization API support</li>
	<li>Text widget visual editor</li>
	<li>Style selection options (fonts, color schemes, etc)</li>
	<li>Public theme options (demo mode)</li>
</ul>