/**
 * Navigation Menu
 *
 * Notifications
 * Content Boxes
 * Posts Widgets
 * Callout Boxes
 * Responsive Dropdowns
 * Tooltips
 * Blockquote Left
 * Blockquote Right
 * Highlight Text
 * Subheading
 * New Line
 * Controls
 */


( function() {
	"use strict";
	if ( typeof tinymce != 'undefined' ) {
		tinymce.create( 'tinymce.plugins.Ascension', {
			// Register the buttons and their commands.
			init : function( editor, url ) {
				/**
				 * Notifications
				 */
				editor.addButton( 'notify', {
					title : 'Notifications',
					cmd   : 'notify',
					image : url + '/../images/editor/info.png'
				} );
				editor.addCommand( 'notify', function( type ) {
					var selectedText = editor.selection.getContent();
					var returnText   = '';
					
					if ( selectedText == '' ) {
						selectedText = type + ' dialog';
					}
					
					returnText       = '<div class="notify ' + type + '"><p>' + selectedText + '</p></div><br /><br />';
					editor.execCommand( 'mceInsertContent', 0, returnText );
				} );
				
				
				/**
				 * Content Boxes
				 */
				editor.addButton( 'contentBoxes', {
					title : 'Content Box',
					cmd   : 'contentBoxes',
					image : url + '/../images/editor/info.png'
				} );
				editor.addCommand( 'contentBoxes', function( grid ) {
					var selectedText = editor.selection.getContent();
					var returnText   = '';
					var grid_columns  = '';
					
					// Get the proper column content.
					if ( grid == 'full' ) {
						grid_columns = '<div><div class="container"><p>Content Box</p></div></div>';
					}
					if ( grid == 'halfs' ) {
						grid_columns = '<div><div class="container"><p>Left Half</p></div></div><div><div class="container"><p>Right Half</p></div></div>';
					}
					if ( grid == 'thirds' ) {
						grid_columns = '<div><div class="container"><p>First Third</p></div></div><div><div class="container"><p>Second Third</p></div></div><div><div class="container"><p>Third Third</p></div></div>';
					}
					if ( grid == 'thirds-2-1' || grid == 'thirds-1-2' ) {
						grid_columns = '<div><div class="container"><p>First Box</p></div></div><div><div class="container"><p>Second Box</p></div></div>';
					}
					if ( grid == 'quarters' ) {
						grid_columns = '<div><div class="container"><p>First Quarter</p></div></div><div><div class="container"><p>Second Quarter</p></div></div><div><div class="container"><p>Third Quarter</p></div></div><div><div class="container"><p>Fourth Quarter</p></div></div>';
					}
					if ( grid == 'quarters-3-1' || grid == 'quarters-1-3' ) {
						grid_columns = '<div><div class="container"><p>First Box</p></div></div><div><div class="container"><p>Second Box</p></div></div>';
					}
					
					returnText = selectedText + '<div class="row no-outter ' + grid + ' at-medium">' + grid_columns + '</div><br /><br />';
					editor.execCommand( 'mceInsertContent', 0, returnText );
				} );
				
				
				/**
				 * Posts Widgets
				 */
				editor.addButton( 'postWidget', {
					title : 'Post Widget',
					cmd   : 'postWidget',
					image : url + '/../images/editor/widget.png'
				} );
				editor.addCommand( 'postWidget', function() {
					var selectedText = editor.selection.getContent();
					var returnText   = '';
					returnText       = '[asc-widget title="' + selectedText + '"]';
					editor.execCommand( 'mceInsertContent', 0, returnText );
				} );
				
				
				/**
				 * Callout Boxes
				 */
				editor.addButton( 'callout', {
					title : 'Callout Box',
					cmd   : 'callout',
					image : url + '/../images/editor/callout.png'
				} );
				editor.addCommand( 'callout', function() {
					var selectedText = editor.selection.getContent();
					var returnText   = '';
					
					if ( selectedText == '' ) {
						selectedText = 'Callout Box';
					}
					
					returnText = '<div class="callout-box"><h2 class="callout-title">Title</h2><p>' + selectedText + '</p></div><br /><br />';
					editor.execCommand( 'mceInsertContent', 0, returnText );
				} );
				
				
				/**
				 * Responsive Dropdowns
				 */
				editor.addButton( 'respondDrop', {
					title : 'Responsive Dropdown',
					cmd   : 'respondDrop',
					image : url + '/../images/editor/drop.png'
				} );
				editor.addCommand( 'respondDrop', function() {
					var selectedText = editor.selection.getContent();
					var returnText   = '';
					returnText       = '[asc-drop title="Menu" drop_at="at-full" icon_class="dashicon-menu"]' + selectedText + '[/asc-drop]';
					editor.execCommand( 'mceInsertContent', 0, returnText );
				} );
				
				
				/**
				 * Tooltips
				 */
				editor.addButton( 'tooltip', {
					title : 'Tooltip',
					cmd   : 'tooltip',
					image : url + '/../images/editor/info.png'
				} );
				editor.addCommand( 'tooltip', function() {
					var selectedText = editor.selection.getContent();
					var returnText   = '';
					
					if ( selectedText != '' ) {
						returnText = '<span class="tip"><span class="tip-control dashicon-info">&nbsp;</span><span class="tip-content">' + selectedText + '</span></span>';
					}
					
					editor.execCommand( 'mceInsertContent', 0, returnText );
				} );
				
				
				/**
				 * Blockquote Left
				 */
				editor.addButton( 'blockquoteLeft', {
					title : 'Blockquote Left',
					cmd   : 'blockquoteLeft',
					image : url + '/../images/editor/quote-left.png'
				} );
				editor.addCommand( 'blockquoteLeft', function() {
					var selectedText = editor.selection.getContent();
					var returnText   = '';
					returnText       = '<blockquote class="text-left">' + selectedText + '</blockquote>';
					editor.execCommand( 'mceInsertContent', 0, returnText );
				} );
				
				
				/**
				 * Blockquote Right
				 */
				editor.addButton( 'blockquoteRight', {
					title : 'Blockquote Right',
					cmd   : 'blockquoteRight',
					image : url + '/../images/editor/quote-right.png'
				} );
				editor.addCommand( 'blockquoteRight', function() {
					var selectedText = editor.selection.getContent();
					var returnText   = '';
					returnText       = '<blockquote class="text-right">' + selectedText + '</blockquote>';
					editor.execCommand( 'mceInsertContent', 0, returnText );
				} );
				
				
				/**
				 * Highlight Text
				 */
				editor.addButton( 'highlight', {
					title : 'Highlight Text',
					cmd   : 'highlight',
					image : url + '/../images/editor/highlight.png'
				} );
				editor.addCommand( 'highlight', function() {
					var selectedText = editor.selection.getContent();
					var returnText   = '';
					returnText       = '<span class="highlight">' + selectedText + '</span>';
					editor.execCommand( 'mceInsertContent', 0, returnText );
				} );
				
				
				/**
				 * Subheading
				 */
				editor.addButton( 'subheading', {
					title : 'Subheading',
					cmd   : 'subheading',
					image : url + '/../images/editor/subheading.png'
				} );
				editor.addCommand( 'subheading', function() {
					var selectedText = editor.selection.getContent();
					var returnText   = '';
					returnText       = '<h2 class="subheading">' + selectedText + '</h2>';
					editor.execCommand( 'mceInsertContent', 0, returnText );
				} );
				
				
				/**
				 * New Line
				 */
				editor.addButton( 'newline', {
					title : 'New Line',
					cmd   : 'newline',
					image : url + '/../images/editor/newline.png'
				} );
				editor.addCommand( 'newline', function() {
					editor.dom.add( editor.getBody(), 'p', {}, 'New Line' );
				} );
			},
	 
	 
			/**
			 * Controls
			 *
			 * Register control cases for advanced functionality.
			 */
			createControl : function( n, cm ) {
				switch ( n ) {
					case 'notify':
						var list = cm.createListBox( 'notifyList', {
							 title : 'Notifications',
							 onselect : function( v ) {
								 tinyMCE.execCommand( 'notify', v );
							 }
						} );

						// Add some values to the list box.
						list.add( 'Alert', 'alert' );
						list.add( 'Warn', 'warn' );
						list.add( 'Info', 'info' );
						list.add( 'Success', 'success' );

						// Return the new list box instance.
						return list;
						
					case 'contentBoxes':
						var list = cm.createListBox( 'contentBoxesList', {
							 title : 'Content Box',
							 onselect : function( v ) {
								 tinyMCE.execCommand( 'contentBoxes', v );
							 }
						} );

						// Add some values to the list box.
						list.add( 'Full', 'full' );
						list.add( 'Halfs', 'halfs' );
						list.add( 'Thirds', 'thirds' );
						list.add( 'Two Thirds and One Third', 'thirds-2-1' );
						list.add( 'One Third and Two Third', 'thirds-1-2' );
						list.add( 'Quarters', 'quarters' );
						list.add( 'Three Quarters and One Quarter', 'quarters-3-1' );
						list.add( 'One Quarter and Three Quarters', 'quarters-1-3' );

						// Return the new list box instance.
						return list;
				}

				return null;
			},
	 
	 
			/**
			 * Information
			 *
			 * Return the plugin information.
			 */
			getInfo : function() {
				return {
					longname  : 'Ascension',
					author    : 'CliffAscent',
					authorurl : 'http://cliffascent.com',
					infourl   : 'http://cliffascent.com/ascension',
					version   : '0.8'
				};
			}
		} );
	 
		// Register the plugin.
		tinymce.PluginManager.add( 'ascension', tinymce.plugins.Ascension );
	}
} )()