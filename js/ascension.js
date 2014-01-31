/**
 * Ascension Scripts
 *
 * The Ascension JavaScript object containing functions to enhance the Ascension WordPress theme framework.
 */


/*
Navigation Menu

config :
removeNoJS :
isTouchScreen :
scrollToTopBox :
scrollToTop :
query :
open :
close :
toggleRespond :
toggleToolTip :
toggleSubMenu :
createSlider :
*/


( function ( $, enquire ) {
	"use strict";
    $.Ascension = function ( config ) {
        var Asc = {
			// Allow properties to be customized.
			config : $.extend( {
				mediumStartsAt    : '400px',
				largeStartsAt     : '800px',
				fullStartsAt      : '1200px',
				controlbarMargin  : $( '#control-bar' ).height() + 10,
				openStyle         : 'Slide',
				closeStyle        : 'Slide',
				openSpeed         : 100,
				closeSpeed        : 100,
				subMenuDisplay    : 'block',
				subSubMenuDisplay : 'inline-block'
            }, config ),

			// Remove .no-js from <body> to disable unnecessary CSS.
			removeNoJS : $( function () {
				$( 'body' ).removeClass( 'no-js' );
			} ),
			
			// Test for touch screen support and return true or false.
			isTouchScreen : function () {
				if ( ( 'ontouchstart' in window ) || window.DocumentTouch && document instanceof DocumentTouch ) {
					return true;
				}
				else {
					return false;
				}
			},

			// Toggle the scroll to top box display when scrolling.
			scrollToTopBox : $( function () {
				$( window ).on( 'load scroll', function () {
					var $scrollToTop = $( '#scroll-to-top' );
					
					if ( $( window ).scrollTop() > $( window ).height() ) {
						$scrollToTop.fadeIn();
					}
					else {
						$scrollToTop.fadeOut();
					}
				} );
			} ),

			// Scroll to the top of the page on click.
			scrollToTop :  $( function () {
				var $scrollToTop = $( '#scroll-to-top' );
					
				$scrollToTop.click( function () {
					$( 'html, body' ).animate( { scrollTop : 0 }, 'slow' );
					return false;
				} );
			} ),

			// Use enquire.js to register the media queries,
			// and create variables that are usable in other functions.
			query : {
				// Media queries used for responsive dropdowns.
				// Not currently used, but may be later for easier customization.
				included : '.at-small, .at-medium, .at-large, .at-full',

				// Data updated by enquire.register to manage media queries.
				// Values are either false or valid jQuery class selectors.
				lower    : false,
				current  : false,
				higher   : false,

				// Register the small media query.
				'at-small' : $( function () {
					enquire.register( '( max-width: ' + Asc.config.mediumStartsAt + ' )', {
						// Triggered when this query is matched.
						match : function () {
							Asc.query.current = '.at-small';
							Asc.query.lower   = false;
							Asc.query.higher  = '.at-medium, .at-large, .at-full';
							Asc.query.toggle();
						}
					} );
				} ),

				// Register the medium media query.
				'at-medium' : $( function () {
					enquire.register( '( min-width: ' + Asc.config.mediumStartsAt + ' ) and ( max-width: ' + Asc.config.largeStartsAt + ' )', {
						// Triggered when this query is matched.
						match : function () {
							Asc.query.current = '.at-medium';
							Asc.query.lower   = '.at-small';
							Asc.query.higher  = '.at-large, .at-full';
							Asc.query.toggle();
						}
					} );
				} ),

				// Register the large media query.
				'at-large' : $( function () {
					enquire.register( '( min-width: ' + Asc.config.largeStartsAt + ' ) and ( max-width: ' + Asc.config.fullStartsAt + ' )', {
						// Triggered when this query is matched.
						match : function () {
							Asc.query.current = '.at-large';
							Asc.query.lower   = '.at-small, .at-medium';
							Asc.query.higher  = '.at-full';
							Asc.query.toggle();
						}
					} );
				} ),

				// Register the full media query.
				'at-full' : $( function () {
					enquire.register( '( min-width: ' + Asc.config.fullStartsAt + ' )', {
						// Triggered when this query is matched.
						match : function () {
							Asc.query.current = '.at-full';
							Asc.query.lower   = '.at-small, .at-medium, .at-large';
							Asc.query.higher  = false;
							Asc.query.toggle();
						}
					} );
				} ),
				
				// Accepts an element and returns true or false.
				active  : function ( $elm ) {
					// Get the media query data.
					var inQuery = false;
					
					// Determine if the .sub-menu is in the current active query.
					if ( Asc.query.current != false ) {
						// Remove the preceding .
						var current = Asc.query.current.replace( /\./g, '' );
						if ( $elm.hasClass( current ) ) {
							inQuery = true;
						}
					}

					// Determine if the .sub-menu is in a higher active query.
					if ( Asc.query.higher != false ) {
						// Split the high queries into an array with no preceding .
						var higher = Asc.query.higher.replace( /\./g, '' );
						higher     = higher.split( ', ' );
						
						higher.forEach( function ( element ) {
							if ( $elm.hasClass( element ) ) {
								inQuery = true;
							}
						} );
					}

					return inQuery;
				},

				// Called to toggle responsive dropdowns when the media queries switch.
				toggle : function () {
					var $subMenus = $( '.sub-menu' );
					
					// Reset all sub-menus.
					$subMenus.css( { 'display' : 'none' } );
					$subMenus.parent( '.menu-item' ).removeClass( 'opened' );
					
					// Toggle responsive dropdowns.
					$( Asc.query.lower ).children( '.drop-control' ).hide();
					$( Asc.query.lower ).children( '.drop-content' ).show();
					
					$( Asc.query.current ).children( '.drop-control' ).show();
					$( Asc.query.current ).children( '.drop-content' ).hide();
					
					$( Asc.query.higher ).children( '.drop-control' ).show();
					$( Asc.query.higher ).children( '.drop-content' ).hide();
				}
			},

			// Open a sub-menu, responsive dropdown, etc.
			open : function ( $elm, display ) {
				if ( typeof $elm == 'string' ) {
					$elm = $( $elm );
				}
				if ( display == undefined || display == '' ) {
					display = 'block';
				}

				if ( Asc.config.openStyle == 'Fade' ) {
					$elm.fadeIn( parseInt( Asc.config.openSpeed ) ).css( { 'display' : display } );
				}
				else {
					$elm.slideDown( parseInt( Asc.config.openSpeed ) ).css( { 'display' : display } );
				}
			},

			// Close a sub-menu, responsive dropdown, etc.
			close : function ( $elm ) {
				if ( Asc.config.closeStyle == 'Fade' ) {
					$elm.fadeOut( parseInt( Asc.config.closeSpeed ) );
				}
				else {
					$elm.slideUp( parseInt( Asc.config.closeSpeed ) );
				}
			},

			// Open respond-content when respond-control is clicked.
			toggleRespond :  $( function () {
				$( '.drop-control' ).on( 'click', function ( e ) {
					// Store the first respond-content.
					var $respondContent = $( this ).siblings( '.drop-content' ).eq( 0 );

					// If it's shown, hide it.
					if ( $respondContent.is( ':visible' ) ) {
						Asc.close( $respondContent );
					}
					// Else it's hidden, so show it.
					else {
						Asc.open( $respondContent );
					}
				} );
			} ),

			// Open tip-content when tip is clicked.
			toggleToolTip :  $( function () {
				var touch  = Asc.isTouchScreen();
				
				if ( touch === true ) {
					var events = 'click';
				}
				else {
					var events = 'mouseenter mouseleave';
				}
				
				$( '.tip-control' ).on( events, function ( e ) {
					// Store the first tip-content.
					var $tipContent = $( this ).siblings( '.tip-content' ).eq( 0 );

					// If it's shown, hide it.
					if ( $tipContent.is( ':visible' ) ) {
						Asc.close( $tipContent );
					}
					// Else it's hidden, so show it.
					else {
						Asc.open( $tipContent );
					}
				} );
			} ),

			// Open sub-menu when a menu-item is clicked.
			toggleSubMenu :  $( function () {
				var touch  = Asc.isTouchScreen();
				
				if ( touch === true ) {
					var events = 'click';
				}
				else {
					var events = 'mouseenter mouseleave';
				}
				
				$( '.menu-item' ).on( events, function ( e ) {
					// Stop click events from bubbling, but allow hover events.
					if ( touch === true ) {
						e.stopPropagation();
					}
					
					var $this      = $( this );
					// Store the sub-menu if the menu-item has one.
					var $subMenu   = $this.children( '.sub-menu' );
					// Is it a sub-menu inside of another sub-menu?
					var $subSub    = $( $subMenu ).hasClass( 'sub-sub-menu' );
					// Get all other sub-menus in this menu.
					var $otherSubs = $subMenu.parents( '.menu' ).find( '.sub-menu' ).not( $subMenu );

					// Make sure there is a sub-menu, if not do nothing and allow the click event.
					if ( $subMenu.length > 0 ) {
						// If it's shown, hide it.
						if ( $subMenu.is( ':visible' ) ) {
							e.preventDefault();
							Asc.close( $subMenu );
							$subMenu.parent( '.menu-item' ).removeClass( 'opened' );
						}
						// Else it's hidden, so show it.
						else {
							var $respondContainer = $this.parents( '.drop' );

							// If the element has a responsive container
							// make sure you're not in an active query
							// before allowing a .sub-menu to display.
							if ( $respondContainer.length > 0 ) {
								var inQuery = Asc.query.active( $respondContainer );
								
								if ( ! inQuery ) {
									e.preventDefault();
									
									// Set a custom display type for the .sub-sub-menu display.
									if ( $subSub ) {
										Asc.open( $subMenu, Asc.config.subSubMenuDisplay );
										$subMenu.parent( '.menu-item' ).addClass( 'opened' );
									}
									else {
										Asc.open( $subMenu, Asc.config.subMenuDisplay );
										$subMenu.parent( '.menu-item' ).addClass( 'opened' );
										
										// Close all other .sub-menus.
										Asc.close( $otherSubs );
										$otherSubs.parent( '.menu-item' ).removeClass( 'opened' );
									}
								}
							}
							else {
								if ( $subMenu.is( ':visible' ) ) {
									e.preventDefault();
									Asc.close( $subMenu );
									$subMenu.parent( '.menu-item' ).removeClass( 'opened' );
								}
								else {
									e.preventDefault();
									Asc.open( $subMenu );
									$subMenu.parent( '.menu-item' ).addClass( 'opened' );
								}
							}
						}
					}
				} );
			} ),

			// Create a slider in the selected element.
			createSlider : function ( selector, prev, next ) {
				if ( typeof prev == 'undefined' ) {
					prev = 'Prev';
				}
				if ( typeof next == 'undefined' ) {
					next = 'Next';
				}
				$( selector ).flexslider( {
					animation: 'slide',
					prevText:  prev,
					nextText:  next, 
				} );
			}
        };

		// Return the public methods.
        return {
			isTouchScreen : Asc.isTouch,
			query         : Asc.query,
			open          : Asc.open,
			close         : Asc.close,
			slider        : Asc.createSlider
        };
    };
} )( jQuery, enquire );