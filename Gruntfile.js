module.exports = function(grunt) {

	/**
	 * For regenerate critical CSS - comment out `add_action( 'wp_head', 'rovadex_load_custom_fonts' );`
	 * in hooks.php. After uncomment backward, please.
	 */
	grunt.initConfig({
		criticalcss: {
			// on command line - grunt criticalcss:home
			home: {
				options: {
					url: "http://localhost:8888/rovadex",
					width: 1200,
					height: 900,
					outputfile: "./critical-home.css",
					filename: "./style.css",
					buffer: 800*1024,
					ignoreConsole: true
				}
			},
			// on command line - grunt criticalcss:subpages
			subpages: {
				options: {
					url: "http://localhost:8888/rovadex/contacts/",
					width: 1200,
					height: 900,
					outputfile: "./critical-subpages.css",
					filename: "./style.css",
					buffer: 800*1024,
					forceInclude: [
						'.main-navigation',
						'.mobile-menu-toggle-button',
						'.main-navigation.mobile-menu',
						'.site-content_wrap',
						'.main-entry-header',
						'.entry-title',
						'.breadcrumbs',
						'.cherry-section',
						'.container',
						'.row',
						'.col-xs-12',
						'.col-md-3',
						'.col-md-6',
						'.col-md-offset-3',
						'.btn-primary',

						// Contacts
						'.contact-form',
						'input[type="text"]',
						'input[type="email"]',
						'textarea',
						'button',
						'input[type="submit"]',
						'input[type="reset"]',
						'.rovadex-social-link',
					],
					ignoreConsole: true
				}
			}
		},
	});

	grunt.loadNpmTasks('grunt-criticalcss');
};