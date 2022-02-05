<?php

namespace ResponsiveTable\Admin\Customizer;


class CustomizeDonate extends \WP_Customize_Control
{
    public function render_content()
    {
        ?>
        <label>
            <?php echo esc_html($this->label); ?>:
        </label>
        <a href="https://www.patreon.com/processby">
            <?php _e('Support on Patreon', 'wp-responsive-table'); ?>
        </a>,  <a href="https://www.paypal.com/donate/?hosted_button_id=C28JNE5JS75X4">
        <?php _e('PayPal', 'wp-responsive-table'); ?>
    </a><br><br><br><br>



        <span class="customize-control-title"><?php  _e('Development plan:', 'wp-responsive-table'); ?></span>
        </label>

        <ul>
            <li>
                <?php  _e('More style options', 'wp-responsive-table'); ?>
            </li>
            <li>
                <?php  _e('Hover effect for rows, columns', 'wp-responsive-table'); ?>
            </li>
            <li>
                <?php  _e('Vertical scroll on small screens', 'wp-responsive-table'); ?>
            </li>
            <li>
                <?php  _e(' Selection of the work area of the plugin. Post content or the whole site.', 'wp-responsive-table'); ?>
            </li>
        </ul>

        <?php
    }

}