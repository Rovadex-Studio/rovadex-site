( function( $ ) {
	'use strict';

	CherryJsCore.utilites.namespace( 'theme_script' );
	CherryJsCore.theme_script = {
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
			this.fullPageInit( this );
		},

		window_load_render: function () {

		},

		fullPageInit: function ( self ) {
			var $fullPageSection = $( '.fullPageSection' ),
				$sectionList = $( '> .cherry-section', $fullPageSection);

			$fullPageSection.fullpage( {
				//sectionsColor: ['#25272d', '#ffffff', '#ffffff', '#ffffff', '#25272d', '#ffffff', '#25272d'],
				anchors: ['home', 'about', 'services', 'projects', 'team', 'blog', 'contacts'],
				menu: '#one_page_navi-menu',
				navigation: true,
				navigationPosition: 'left',
				verticalCentered: false,
				afterLoad: function( anchorLink, index ) {
					var loadedSection = $( this );

					if ( loadedSection.hasClass( 'dark-section' ) ) {
						$( '.site-header' ).addClass( 'invert' );
						$( '#fp-nav' ).addClass( 'invert' );
					} else {
						$( '.site-header' ).removeClass( 'invert' );
						$( '#fp-nav' ).removeClass( 'invert' );
					}

				},
				onLeave: function( index, nextIndex, direction ) {
					var leavingSection = $( this ),
						currentSection = $sectionList.eq( nextIndex - 1 );

					if ( currentSection.hasClass( 'dark-section' ) ) {
						$( '.site-header' ).addClass( 'invert' );
						$( '#fp-nav' ).addClass( 'invert' );
					} else {
						$( '.site-header' ).removeClass( 'invert' );
						$( '#fp-nav' ).removeClass( 'invert' );
					}
				}
			} );
		}
	}

	CherryJsCore.theme_script.init();
}( jQuery ) );
