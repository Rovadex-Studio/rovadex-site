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

			$( '.fullPageSection' ).fullpage({
				sectionsColor: ['#1bbc9b', '#4BBFC3', '#7BAABE', 'whitesmoke', '#ccddff'],
				anchors: ['firstPage', 'secondPage', '3rdPage'],
				menu: '#one_page_navi-menu',
			});

		}
	}

	CherryJsCore.theme_script.init();
}( jQuery ) );
