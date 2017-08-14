module.exports = function(grunt) {

	/**
	 * For regenerate critical CSS - comment out `add_action( 'wp_head', 'rovadex_load_custom_fonts' );`
	 * in hooks.php. After uncomment backward, please.
	 */
	grunt.initConfig({
		criticalcss: {
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
			subpages: {
				options: {
					url: "http://localhost:8888/rovadex/contacts/",
					width: 1200,
					height: 900,
					outputfile: "./critical-subpages.css",
					filename: "./style.css",
					buffer: 800*1024,
					forceInclude: [
						'.mobile-menu-toggle-button',
						'.main-navigation.mobile-menu',
						'.main-entry-header',
						'.breadcrumbs',
						'.cherry-section'
					],
					ignoreConsole: true
				}
			}
		},
	});

	grunt.loadNpmTasks('grunt-criticalcss');
};