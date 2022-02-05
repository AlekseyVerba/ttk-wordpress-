<?php
namespace ResponsiveTable\Admin;

use  ResponsiveTable\Admin\Customizer\CustomizeRange;
use  ResponsiveTable\Admin\Customizer\CustomizeDonate;
/**
 * Class Customizer
 *
 * @package ResponsiveTable\Admin
 */



class Customizer
{


    public function __construct()
    {

        $this->registerHooks();
    }

    public function registerHooks(){
        add_action('customize_register', array($this, 'addSection'));
        add_action('customize_register', array($this, 'addSettings'));
    }

    public function addSection($wp_customize){


        $wp_customize->add_section( 'wprt_settings' , array(
            'title'      => __('Tables Settings', 'wp-responsive-table'),
            'priority'   => 200,
        ) );

    }


    public function addSettings($wp_customize){


        $radioOptions = array('choices' => array(
            'show' => __('Use plugin styles', 'wp-responsive-table'),
            'hide' => __('Use theme styles', 'wp-responsive-table'),
        ),
            'default' => 'hide',
            'label' => __('Table Display Settings', 'wp-responsive-table')
        );

        $this->addSetting('wprt_style_display', 'radio', $wp_customize, $radioOptions);


        $RangeOptions = array(
            'min' => 50,
            'max' => 100,
            'step' => 1,
            'default' => 100,
            'label' => __('Width on large screen', 'wp-responsive-table')
        );

        $this->addSetting('wprt_width_on_large', 'range', $wp_customize, $RangeOptions);


        $RangeOptions = array(
            'min' => 0,
            'max' => 10,
            'step' => 1,
            'default' => 1,
            'label' => __('Borders', 'wp-responsive-table')
        );

        $this->addSetting('wprt_border', 'range', $wp_customize, $RangeOptions);


        $colortOptions = array(
            'default' => '#dddddd',
            'label' => __('Border color', 'wp-responsive-table')
        );

        $this->addSetting('wprt_color_border', 'color', $wp_customize, $colortOptions);

        $RangeOptions = array(
            'min' => 0,
            'max' => 100,
            'step' => 1,
            'default' => 8,
            'label' => __('Horizontal padding', 'wp-responsive-table')
        );

        $this->addSetting('wprt_padding_hor', 'range', $wp_customize, $RangeOptions);


        $RangeOptions = array(
            'min' => 0,
            'max' => 100,
            'step' => 1,
            'default' => 8,
            'label' => __('Vertical padding', 'wp-responsive-table')
        );

        $this->addSetting('wprt_padding_vert', 'range', $wp_customize, $RangeOptions);


        $selectOptions = array('choices' => array(
            'left' => __('Align left', 'wp-responsive-table'),
            'center' => __('Align center', 'wp-responsive-table'),
            'right' => __('Align right', 'wp-responsive-table'),
        ),
            'default' => 'center',
            'label' => __('Horizontal align', 'wp-responsive-table')
        );

        $this->addSetting('wprt_hor_align', 'select', $wp_customize, $selectOptions);

//        $selectOptions = array('choices' => array(
//            'top' => __('Align top', 'wp-responsive-table'),
//            'middle' => __('Align center', 'wp-responsive-table'),
//            'bottom' => __('Align bottom', 'wp-responsive-table'),
//        ),
//            'default' => 'middle',
//        );
//
//        $this->addSetting('wprt_vert_align', 'select', 'Vertical align', $wp_customize, $selectOptions);


        $checkboxOptions = array(
            'default' => 0,
            'label' => __('Add head row color', 'wp-responsive-table')
        );

        $this->addSetting('wprt_is_head_row_color', 'checkbox', $wp_customize, $checkboxOptions);

        $colortOptions = array(
            'default' => '#f9f9f9',
            'label' => __('Head row background color', 'wp-responsive-table'),
            'active_callback' =>  array( $this, 'isHeadRow' ),
        );

        $this->addSetting('wprt_head_row_color', 'color', $wp_customize, $colortOptions);

        $colortOptions = array(
            'default' => '#f9f9f9',
            'label' => __('Head row text color', 'wp-responsive-table'),
            'active_callback' =>  array( $this, 'isHeadRow' ),
        );

        $this->addSetting('wprt_head_row_text_color', 'color', $wp_customize, $colortOptions);


        $colortOptions = array(
            'default' => '#fff',
            'label' => __('First row color', 'wp-responsive-table')
        );

        $this->addSetting('wprt_first_row_color', 'color', $wp_customize, $colortOptions);


        $colortOptions = array(
            'default' => '#f9f9f9',
            'label' => __('Second row color', 'wp-responsive-table')
        );

        $this->addSetting('wprt_row_color_customize', 'color', $wp_customize, $colortOptions);


        $checkboxOptions = array(
            'default' => 0,
            'label' => __('Table column sort', 'wp-responsive-table')
        );

        $this->addSetting('table_column_sort', 'checkbox', $wp_customize, $checkboxOptions);

        $textareaOptions = array(
            'default' =>'',
            'label' => __('Exclude pages by URI', 'wp-responsive-table'),
            'description' => __('Add parts of URLs (e.g. category), 1 per line, that are to be excluded', 'wp-responsive-table'),
        );

        $this->addSetting('wprt_page_exclude', 'textarea', $wp_customize, $textareaOptions);


        $wp_customize->add_setting('wprt_donate', array());
        $wp_customize->add_control(new CustomizeDonate($wp_customize, 'wprt_donate', array(
            'label' => __('Donate to this plugin to speed up its development', 'wp-responsive-table'),
            'section' => 'wprt_settings',
            'settings' => 'wprt_donate',
        )));

    }


    private function addSetting($name, $type, $wp_customize, $args = array())
    {

        $default = array(
            'default' => '',
            'description' => '',
            'label' => '',
            'active_callback' => ''
        );
        $args = array_merge($default, $args);

        switch ($type) {
            case 'text':
            case 'textarea':
            case 'checkbox':
                $wp_customize->add_setting($name, array(
                    'default' => $args['default']
                ));
                $wp_customize->selective_refresh->add_partial($name, array(
                    'selector' => '.' . $name
                ));
                $wp_customize->add_control($name, array(
                        'label' => $args['label'],
                        'section' => 'wprt_settings',
                        'description' => $args['description'],
                        'type' => $type,
                    )
                );
                break;

            case 'select':
                $wp_customize->add_setting($name, array(
                    'capability' => 'edit_theme_options',
                    'default' => $args['default'],
                ));

                $wp_customize->add_control($name, array(
                    'type' => 'select',
                    'section' => 'wprt_settings',
                    'label' => $args['label'],
                    'description' => $args['description'],
                    'choices' => $args['choices'],
                ));
                break;

            case 'radio':
                $wp_customize->add_setting($name, array(
                    'capability' => 'edit_theme_options',
                    'default' => $args['default'],
                ));
                $wp_customize->selective_refresh->add_partial($name, array(
                    'selector' => '.'.$name
                ));

                $wp_customize->add_control($name, array(
                    'type' => 'radio',
                    'section' => 'wprt_settings',
                    'label' => $args['label'],
                    'description' => __($args['description'], 'wp-responsive-table'),
                    'choices' => $args['choices'],
                ));
                break;

            case 'range':
                $wp_customize->add_setting($name, array(
                    'default' => $args['default']
                ));
                $wp_customize->selective_refresh->add_partial($name, array(
                    'selector' => '.'.$name
                ));

                $wp_customize->add_control(new CustomizeRange($wp_customize, $name, array(
                    'label' => $args['label'],
                    'min' => $args['min'],
                    'max' => $args['max'],
                    'step' => $args['step'],
                    'section' => 'wprt_settings',
                )));

                break;

            case 'color':
                $wp_customize->add_setting($name, array(
                    'default' => $args['default']
                ));
                $wp_customize->selective_refresh->add_partial($name, array(
                    'selector' => '.'.$name
                ));

                $wp_customize->add_control(new \WP_Customize_Color_Control($wp_customize, $name, array(
                    'label' => $args['label'],
                    'section' => 'wprt_settings',
                    'settings' => $name,
                    'active_callback' =>  $args['active_callback']
                )));


                break;
        }

    }

    public function isHeadRow($control){
        $isAlternatingRow = $control->manager->get_setting( 'wprt_is_head_row_color' )->value();
        if($isAlternatingRow) {
            return true;
        } else {
            return false;
        }
    }







}