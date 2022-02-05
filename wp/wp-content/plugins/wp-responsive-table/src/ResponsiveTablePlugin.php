<?php namespace ResponsiveTable;

use Premmerce\SDK\V2\FileManager\FileManager;
use ResponsiveTable\Admin\Admin;
use ResponsiveTable\Admin\Customizer;
use ResponsiveTable\Frontend\Frontend;

/**
 * Class ResponsiveTablePlugin
 *
 * @package ResponsiveTable
 */
class ResponsiveTablePlugin {


    const VERSION = '1.2.6';

	/**
	 * @var FileManager
	 */
	private $fileManager;

	/**
	 * ResponsiveTablePlugin constructor.
	 *
     * @param string $mainFile
	 */
    public function __construct($mainFile) {
        $this->fileManager = new FileManager($mainFile);

        add_action('plugins_loaded', [ $this, 'loadTextDomain' ]);

	}

	/**
	 * Run plugin part
	 */
	public function run() {
		if ( is_admin() ) {
			new Admin( $this->fileManager );
		} else {
			new Frontend( $this->fileManager );
		}
        new Customizer();
	}

    /**
     * Load plugin translations
     */
    public function loadTextDomain()
    {
        $name = $this->fileManager->getPluginName();
        load_plugin_textdomain('wp-responsive-table', false, $name . '/languages/');
    }

	/**
	 * Fired when the plugin is activated
	 */
	public function activate() {
		// TODO: Implement activate() method.
	}

	/**
	 * Fired when the plugin is deactivated
	 */
	public function deactivate() {
		// TODO: Implement deactivate() method.
	}

	/**
	 * Fired during plugin uninstall
	 */
	public static function uninstall() {
		// TODO: Implement uninstall() method.
	}
}