( function( $ ) {
	'use strict';

	var rovadexThemeScript = null;

	rovadexThemeScript = {
		init: function () {
			// Document ready event check
			if( CherryJsCore.status.is_ready ){
				this.document_ready_render();
			}else{
				CherryJsCore.variable.$document.on( 'ready', this.document_ready_render.bind( this ) );
			}

			// Windows load event check
			if( CherryJsCore.status.on_load ){
				this.window_load_render();
			}else{
				CherryJsCore.variable.$window.on( 'load', this.window_load_render.bind( this ) );
			}
		},

		document_ready_render: function () {
			this.onePageMenuInit( this );
			this.responsiveMenuInit( this );
			this.fullPageInit( this );
			this.wpcf7Form();
			this.subscribe_init( this );
			this.homePageCarousel();
		},

		window_load_render: function () {

		},

		onePageMenuInit: function ( self ) {
			var $navigation    = $( '.onepage-navigation' ),
				$toogleButton  = $( '.navi-toggle-button', $navigation ),
				$menuContainer = $( '.menu-main-menu-container', $navigation ),
				$menu          = $( '.one_page_navi-menu', $navigation ),
				$menuItems     = $( '> .menu-item', $menu );

				$toogleButton.on( 'click', function() {
					$navigation.toggleClass( 'active' );
					$toogleButton.toggleClass( 'active' );

					if ( $navigation.hasClass( 'active' ) ) {
						showMenu();
					} else {
						hideMenu();
					}
				} );

				function showMenu() {
					var timeline = new TimelineMax;

					timeline.to( $menuContainer, 0.4, { right:0, ease: Expo.easeOut } );
					timeline.staggerFrom( $menuItems, 0.45, { opacity: 0, rotationX:90, transformOrigin:"0% 50% 50", ease:Back.easeOut }, 0.08, '-=0.3' );

					timeline.play();

				}

				function hideMenu() {
					TweenMax.to( $menuContainer, 0.5, { right:'-100%', ease: Circ.easeIn } );
				}
		},

		fullPageInit: function ( self ) {
			if( $.fn.fullpage ){
				var $fullPageSection = $( '.fullPageSection' ),
					$sectionList     = $( '> .cherry-section', $fullPageSection),
					$footer          = $( '.site-footer' );

				rovadexThemeScript.textSplit( $( 'h2:not(.splitted)', $fullPageSection ) );

				$fullPageSection.fullpage( {
					anchors: ['home', 'about', 'services', 'projects', 'team', 'testimonials', 'contacts'],
					navigationTooltips: ['Home', 'About', 'Services', 'Projects', 'Team', 'Testimonials', 'Contacts'],
					menu: '#one_page_navi-menu',
					navigation: true,
					navigation: true,
					navigationPosition: 'left',
					verticalCentered: false,
					scrollingSpeed: 700,
					responsiveWidth: 1024,
					afterLoad: function( anchorLink, index ) {
						var loadedSection = $( this );

						if ( loadedSection.hasClass( 'invert' ) ) {
							$( '.site-header' ).addClass( 'invert' );
							$( '#fp-nav' ).addClass( 'invert' );
						} else {
							$( '.site-header' ).removeClass( 'invert' );
							$( '#fp-nav' ).removeClass( 'invert' );
						}

					},
					onLeave: function( index, nextIndex, direction ) {
						var leavingSection = $( this ),
							currentSection = $sectionList.eq( nextIndex - 1 ),
							$coverCurrentImage = $( '.fullpage-image', currentSection ),
							$boxCurrentImage = $( '.box-image', currentSection );

						if ( currentSection.hasClass( 'invert' ) ) {
							$( '.site-header' ).addClass( 'invert' );
							$( '#fp-nav' ).addClass( 'invert' );
						} else {
							$( '.site-header' ).removeClass( 'invert' );
							$( '#fp-nav' ).removeClass( 'invert' );
						}

						if ( currentSection.hasClass( 'home-section' ) ) {
							self.homeAnimationShow( currentSection );
						}

						if ( currentSection.hasClass( 'show-footer' ) ) {
							TweenMax.to( $footer, 0.8, { bottom: 0, ease: Cubic.easeOut } );
						} else {
							TweenMax.to( $footer, 0.5, { bottom: '-200%', ease: Cubic.easeIn } );
						}

						TweenMax.from( $coverCurrentImage, 0.7, { scaleX: 1.7, scaleY: 1.7, ease: Circ.easeOut } );

						//TweenMax.set( currentSection, { perspective:800 } );
						//TweenMax.from( $boxCurrentImage, 1.5, { opacity:0, z:-500, rotationY:-90, delay:0.5, force3D: true, ease: Expo.easeOut } );

						rovadexThemeScript.titleShow( $( 'h2.splitted', currentSection ) );
					}
				} );
			}
		},

		homeAnimationShow: function ( $homeSection ) {
			var $homeSection     = $homeSection,
				timeline         = new TimelineMax( { delay: 0.4, onComplete: function() {
					$homeSection.addClass( 'animated' );
				} } ),
				$svgLogo         = $( '#rovadex-logo-svg' ),
				$shape1          = $( '.shape-1', $svgLogo ),
				$shape2          = $( '.shape-2', $svgLogo ),
				$symbol          = $( '.main-symbol', $svgLogo ),
				$drops           = $( '.drop', $svgLogo ),
				$symbols         = $( '.symbol', $svgLogo ),
				$contentSection  = $( '.content-section', $homeSection );

			if ( $homeSection.hasClass( 'animated' ) ) {
				return false;
			}

			$svgLogo.attr( {width: 840});

			timeline.fromTo( $shape1, 0.8, { scale:0, rotation:-180, transformOrigin: '50% 50%'}, { scale:1, rotation:0, ease: Expo.easeOut } );
			timeline.staggerFromTo( $drops, 0.5, { scale:0, transformOrigin: '50% 50%' }, { scale:1, ease: Expo.easeOut }, 0.1, '-=0.5' );
			timeline.fromTo( $shape2, 0.8, { scale:0, rotation: 180, transformOrigin: '50% 50%' }, { scale:1, rotation: 0, ease: Expo.easeOut }, '-=1' );
			timeline.fromTo( $symbol, 0.8, { opacity:0, scale:1.1, rotation:180, transformOrigin: '50% 50%' }, { opacity:1, scale:1, rotation:0, ease: Expo.easeOut }, '-=0.9' );
			timeline.staggerFromTo( $symbols, 0.9, { scale:0, transformOrigin: '50% 50%' }, { scale:1, ease: Elastic.easeOut }, 0.1, '-=0.6' );
			timeline.fromTo( $contentSection, 0.9, { opacity:0, left: -50 }, { opacity:1, left: 0, ease: Circ.easeOut }, '-=0.9' );

			timeline.play();
		},

		titleShow: function( $selector ) {
			var $title = $selector;

			$title.each( function() {
				var $this = $( this ),
					$symbols = $( 'span', $this ),
					randTop = rovadexThemeScript.getRandomInt(-20, 20);

				if ( $this.hasClass( 'animated' ) ) {
					return false;
				}

				var timeline = new TimelineMax( { delay: 0.5, onComplete: function(){
					$this.addClass( 'animated' );
				} } );

				timeline.set( $symbols, { clearProps: 'opacity, left' } );
				timeline.staggerFrom( $symbols, 0.6, { opacity:0, left: 40, ease: Expo.easeOut }, 0.05 );

				timeline.play();

			} );

		},

		responsiveMenuInit: function( self ) {

			$( '.main-navigation' ).cherryResponsiveMenu( {
				moreMenuContent: '&middot;&middot;&middot;',
				clotting: true
			} );

		},

		textSplit: function( $selector ) {
			var $textSelector = $selector;

			$textSelector.each( function() {
				var $this = $( this ),
					symbolArray = $this.html().split(''),
					spanedSympols;

					$this.addClass( 'splitted' );

					spanedSympols = symbolArray.map( function( symbol ) {
						return '<span>' + symbol + '</span>';
					});

					$this.html( spanedSympols.join( '' ) );

			} );
		},

		getRandomInt: function( min, max ) {
			return Math.floor( Math.random() * ( max - min + 1 ) ) + min;
		},

		wpcf7Form: function() {
			$( 'body' ).on( 'focus', '.wpcf7-form.invalid .wpcf7-not-valid', function(){
				$( '+.wpcf7-not-valid-tip', this ).remove();
			})
		},

		homePageCarousel: function() {
			if ( $.fn.owlCarousel ) {
				$('.team-container').owlCarousel({
					nestedItemSelector: 'team-item',
					stageOuterClass: 'team-wrap cherry-team team-wrap template-grid-boxes',
					stageClass: 'team-listing',
					items: 2,
					margin: 17,
					dots: true,
					responsive: {
						0: {
							items: 1,
						},
						500: {
							items: 2,
						}
					}
				});
			}
		},

		subscribe_init: function( self ) {

			CherryJsCore.variable.$document.on( 'click', '.subscribe-block__submit', function( event ){

				event.preventDefault();

				var $this       = $(this),
					form       = $this.parents( 'form' ),
					nonce      = form.find( 'input[name="nonce"]' ).val(),
					mail_input = form.find( 'input[name="subscribe-mail"]' ),
					mail       = mail_input.val(),
					error      = form.find( '.subscribe-block__error' ),
					success    = form.find( '.subscribe-block__success' ),
					hidden     = 'hidden';

				if ( '' === mail ) {
					mail_input.addClass( 'error' );
					return !1;
				}

				if ( $this.hasClass( 'processing' ) ) {
					return !1;
				}

				$this.addClass( 'processing' );
				error.empty();

				if ( ! error.hasClass( hidden ) ) {
					error.addClass( hidden );
				}

				if ( ! success.hasClass( hidden ) ) {
					success.addClass( hidden );
				}

				$.ajax({
					url: rovadex.ajaxurl,
					type: 'post',
					dataType: 'json',
					data: {
						action: 'rovadex_subscribe',
						mail: mail,
						nonce: nonce
					},
					error: function() {
						$this.removeClass( 'processing' );
					}
				}).done( function( response ) {
					$this.removeClass( 'processing' );

					if ( true === response.success ) {
						success.removeClass( hidden );
						mail_input.val('');
						return 1;
					}

					error.removeClass( hidden ).html( response.data.message );
					return !1;

				});

			});

		}
	}

	rovadexThemeScript.init();
}( jQuery ) );
