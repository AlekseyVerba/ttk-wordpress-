<?php namespace ResponsiveTable\Admin;

use Premmerce\SDK\V2\FileManager\FileManager;
use ResponsiveTable\ResponsiveTablePlugin;
/**
 * Class Admin
 *
 * @package ResponsiveTable\Admin
 */
class Admin {

	/**
	 * @var FileManager
	 */
	private $fileManager;

	/**
	 * Admin constructor.
	 *
	 * Register menu items and handlers
	 *
	 * @param FileManager $fileManager
	 */
	public function __construct( FileManager $fileManager ) {
		$this->fileManager = $fileManager;
        $this->registerActions();
	}

	public function registerActions(){
        add_action('admin_enqueue_scripts', array($this, 'enqueueScripts'));
        add_filter('plugin_action_links_wp-responsive-table/wp-responsive-table.php', array($this, 'PluginActionLinks'));
    }

    public function enqueueScripts()
    {

        wp_enqueue_style(
            'wprt-admin-styles',
            $this->fileManager->locateAsset('admin/css/wprt-admin.css'),
            array(),
            ResponsiveTablePlugin::VERSION
        );

    }

    public function PluginActionLinks($links)
    {
        $action_links = array(
            'settings' => '<a href="' .
                wp_kses(esc_url(add_query_arg(array(
                    'autofocus' => array(
                        'section' => 'wprt_settings',
                    ),
                    'url' => home_url(),
                ), admin_url('customize.php'))), array(
                    'a' => array(
                        'href' => array(),
                        'title' => array(),
                    ),
                ))

                . '" aria-label="' . esc_attr__('View Wp Responsive Table settings', 'wp-responsive-table') . '">' . esc_html__('Settings', 'wp-responsive-table') . '</a>',
        );

        return array_merge($action_links, $links);
    }



}