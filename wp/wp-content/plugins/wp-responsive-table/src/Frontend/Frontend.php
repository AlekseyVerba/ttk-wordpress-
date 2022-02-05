<?php namespace ResponsiveTable\Frontend;

use Premmerce\SDK\V2\FileManager\FileManager;
use ResponsiveTable\ResponsiveTablePlugin;
/**
 * Class Frontend
 *
 * @package ResponsiveTable\Frontend
 */
class Frontend {


	/**
	 * @var FileManager
	 */
	private $fileManager;

	public function __construct( FileManager $fileManager ) {
		$this->fileManager = $fileManager;

        add_action('wp', array($this, 'registerActions'));

	}

    public function registerActions(){

	    if(!$this->checkUrlExceptions()){
            add_action('wp_enqueue_scripts', array($this, 'enqueueScripts'));
            add_filter('the_content', array($this, 'addContentWrapper'));
            add_filter('acf_the_content', array($this, 'addContentWrapper'));
            add_filter('wp_head', array($this, 'addSettingsStyles'), 200);
        }

    }

    private function checkUrlExceptions(){


        $exclude_url = get_theme_mod('wprt_page_exclude','');

        if(!empty($exclude_url)){
            $uri = 'http';
            if ($_SERVER["HTTPS"] == "on") {$uri .= "s";}
            $uri .= "://";
            $uri .= $_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"];
            $uris_exclude = explode( "\n",$exclude_url );

            $uris_exclude = array_map( 'trim', $uris_exclude );

            foreach ( $uris_exclude as $expr ) {

                if ( '' !== $expr && stristr($uri, $expr)) {
                    return true;
                }
            }
        }
        return false;
    }

    public function enqueueScripts()
    {

        $column_sort = get_theme_mod('table_column_sort',0);


        if($column_sort){
            wp_enqueue_script(
                'wprt-script',
                $this->fileManager->locateAsset('frontend/js/wprt-sort-script.js'),
                array('jquery'),
                ResponsiveTablePlugin::VERSION,
                true
            );
        }else{
            wp_enqueue_script(
                'wprt-script',
                $this->fileManager->locateAsset('frontend/js/wprt-script.js'),
                array('jquery'),
                ResponsiveTablePlugin::VERSION,
                true
            );
        }


    }

    public function addContentWrapper($content)
    {


        $content = '<div class="wprt-container">' . $content . '</div>';

        return $content;

    }

    public function addSettingsStyles() {
        $width = get_theme_mod('wprt_width_on_large',100);
        $border = get_theme_mod('wprt_border',1);
        $vertical_padding = get_theme_mod('wprt_padding_vert',8);
        $horizontal_padding = get_theme_mod('wprt_padding_hor',8);
        $border_color = get_theme_mod('wprt_color_border','#dddddd');
        $vertical_align = get_theme_mod('wprt_vert_align','middle');
        $horizontal_align = get_theme_mod('wprt_hor_align','center');
        $display_style = get_theme_mod('wprt_style_display','show');
        $is_head_row_color = get_theme_mod('wprt_is_head_row_color',0);
        $heas_row_bg_color = get_theme_mod('wprt_head_row_color','#fff');
        $heas_row_text_color = get_theme_mod('wprt_head_row_text_color','#fff');
        $first_row_color = get_theme_mod('wprt_first_row_color','#fff');
        $second_row_color = get_theme_mod('wprt_row_color_customize','#f9f9f9');
        $column_sort = get_theme_mod('table_column_sort',0);
        ?>


<style>
    .table-responsive table{
        border-collapse: collapse;
        border-spacing: 0;
        table-layout: auto;
        padding: 0;
        width: 100%;
        max-width: 100%;
        margin: 0 auto 20px auto;
    }

    .table-responsive {
        overflow-x: auto;
        min-height: 0.01%;
        margin-bottom: 20px;
    }

    .table-responsive::-webkit-scrollbar {
        width: 10px;
        height: 10px;
    }
    .table-responsive::-webkit-scrollbar-thumb {
        background: #dddddd;
        border-radius: 2px;
    }
    .table-responsive::-webkit-scrollbar-track-piece {
        background: #fff;
    }

    @media (max-width: 992px) {
        .table-responsive table{
            width: auto!important;
            margin:0 auto 15px auto!important;
        }
    }

    @media screen and (max-width: 767px) {
        .table-responsive {
            width: 100%;
            margin-bottom: 15px;
            overflow-y: hidden;
            -ms-overflow-style: -ms-autohiding-scrollbar;
        }
        .table-responsive::-webkit-scrollbar {
            width: 5px;
            height: 5px;
        }

    }

<?php if ($display_style == 'show') { ?>

    @media screen and (min-width: 1200px) {
        .table-responsive .table {
            max-width: <?php echo $width; ?>%!important;
        }
    }
    .wprt-container .table > thead > tr > th,
    .wprt-container .table > tbody > tr > th,
    .wprt-container .table > tfoot > tr > th,
    .wprt-container .table > thead > tr > td,
    .wprt-container .table > tbody > tr > td,
    .wprt-container .table > tfoot > tr > td,
    .wprt-container .table > tr > td{
        border: <?php echo $border; ?>px solid <?php echo $border_color; ?>!important;
    }

    .wprt-container .table > thead > tr > th,
    .wprt-container .table > tbody > tr > th,
    .wprt-container .table > tfoot > tr > th,
    .wprt-container .table > thead > tr > td,
    .wprt-container .table > tbody > tr > td,
    .wprt-container .table > tfoot > tr > td,
    .wprt-container .table > tr > td{
        padding-top: <?php echo $vertical_padding; ?>px!important;
        padding-right: <?php echo $horizontal_padding; ?>px!important;
        padding-bottom: <?php echo $vertical_padding; ?>px!important;
        padding-left: <?php echo $horizontal_padding; ?>px!important;
        vertical-align: middle;
        text-align: <?php echo $horizontal_align; ?>;
    }

    .wprt-container .table-responsive .table tr:nth-child(odd) {
        background-color: <?php echo  $first_row_color; ?>!important;
    }

    .wprt-container .table-responsive .table tr:nth-child(even){
        background-color: <?php echo  $second_row_color; ?>!important;
    }

    .wprt-container .table-responsive .table thead+tbody tr:nth-child(even) {
        background-color: <?php echo  $first_row_color; ?>!important;
    }

    .wprt-container .table-responsive .table thead+tbody tr:nth-child(odd){
        background-color: <?php echo  $second_row_color; ?>!important;
    }
    <?php if($is_head_row_color): ?>
    .wprt-container .table-responsive .table:not(.not-head-style) > *:first-child > tr:first-child,
    .wprt-container .table-responsive .table:not(.not-head-style) > *:first-child > tr:first-child td,
    .wprt-container .table-responsive .table:not(.not-head-style) > *:first-child > tr:first-child th{
        background-color: <?php echo  $heas_row_bg_color; ?>!important;
        color: <?php echo  $heas_row_text_color; ?>!important;
    }
    <?php endif; ?>

    <?php if($column_sort): ?>
    .wprt-container .table tr:first-child th.is-sort:hover,
    .wprt-container .table tr:first-child td.is-sort:hover{
       cursor: pointer;
    }
    .wprt-container .table tr:first-child th.is-sort p,
    .wprt-container .table tr:first-child td.is-sort p{
        display: inline;
    }
    .wprt-container .table tr:first-child th.is-sort .sort-icon,
    .wprt-container .table tr:first-child td.is-sort .sort-icon{
        position: relative;
    }
    .wprt-container .table tr:first-child th.is-sort .sort-icon:after,
    .wprt-container .table tr:first-child td.is-sort .sort-icon:after{
        position: absolute;
        content: '';
        top: 5px;
        width: 10px;
        height: 7px;
    }
    .sort-asc.active .sort-icon:after{
        background: url(<?= $this->fileManager->locateAsset('frontend/img/sort-asc.png') ?>) no-repeat center;
        background-size: cover;

    }
    .sort-desc.active .sort-icon:after{
        background: url(<?= $this->fileManager->locateAsset('frontend/img/sort-desc.png') ?>) no-repeat center;
        background-size: cover;

    }
    .wprt-container .table tr:first-child th.is-sort:hover .sort-icon:after,
    .wprt-container .table tr:first-child td.is-sort:hover .sort-icon:after{
        background: url(<?= $this->fileManager->locateAsset('frontend/img/sort-asc.png') ?>) no-repeat center;
        background-size: cover;
    }
    .wprt-container .table tr:first-child th.sort-asc:hover .sort-icon:after,
    .wprt-container .table tr:first-child td.sort-asc:hover .sort-icon:after{
        background: url(<?= $this->fileManager->locateAsset('frontend/img/sort-asc.png') ?>) no-repeat center;
        background-size: cover;
    }
    .wprt-container .table tr:first-child th.sort-desc:hover .sort-icon:after,
    .wprt-container .table tr:first-child td.sort-desc:hover .sort-icon:after{
        background: url(<?= $this->fileManager->locateAsset('frontend/img/sort-desc.png') ?>) no-repeat center;
        background-size: cover;
    }
    .wprt-container .table tr:first-child th.sort-asc:not(.active):hover .sort-icon:after,
    .wprt-container .table tr:first-child td.sort-asc:not(.active):hover .sort-icon:after{
        background: url(<?= $this->fileManager->locateAsset('frontend/img/sort-desc.png') ?>) no-repeat center;
        background-size: cover;
    }
    .wprt-container .table tr:first-child th.sort-desc:not(.active):hover .sort-icon:after,
    .wprt-container .table tr:first-child td.sort-desc:not(.active):hover .sort-icon:after{
        background: url(<?= $this->fileManager->locateAsset('frontend/img/sort-asc.png') ?>) no-repeat center;
        background-size: cover;
    }

    <?php endif; ?>

    .table-responsive table p {
        margin: 0!important;
        padding: 0!important;
    }

    .table-responsive table tbody tr td, .table-responsive table tbody tr th{
        background-color: inherit!important;
    }

<?php } ?>
</style>

    <?php  }

}