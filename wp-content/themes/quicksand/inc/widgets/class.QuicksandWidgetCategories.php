<?php

/**
 * A prettier Categories Widget 
 */
class QuicksandWidgetCategories extends WP_Widget {

    function __construct() {
        parent::__construct(
                'quicksand-categories-custom', __('Quicksand Categories', 'quicksand'), array('classname' => 'quicksand-categories-custom')
        );
    }

    /**
     * output of the widget
     * 
     * @param type $args
     * @param type $instance
     */
    function widget($args, $instance) {
        extract($args);

        $title = isset($instance['title']) ? $instance['title'] : esc_html__('Categories', 'quicksand');
        $enable_count = isset($instance['enable_count']) ? $instance['enable_count'] : NULL;
        $limit = isset($instance['limit']) ? $instance['limit'] : NULL;

        echo wp_kses_post($before_widget);
        echo wp_kses_post($before_title);
        echo wp_kses_post($title);
        echo wp_kses_post($after_title);
        ?>


        <div class="categories-widget">

            <ul>
                <?php
                $args = array(
                    'echo' => 0,
                    'show_count' => 0,
                    'title_li' => '',
                    'depth' => 1,
                    'hide_empty' => 1,
                    'orderby' => 'count',
                    'order' => 'DESC'
                );
                if (isset($enable_count)) {
                    $args['show_count'] = 1;
                }
                if (!empty($limit)) {
                    $args['number'] = $limit;
                }

                $variable = wp_list_categories($args);
                $variable = str_replace('(', '<span class="tag tag-default tag-pill float-xs-right">', $variable);
                $variable = str_replace(')', '</span>', $variable);
                echo wp_kses_post($variable);
                ?>
            </ul>  
        </div><!-- end widget content -->

        <?php
        echo wp_kses_post($after_widget);
    }

    /**
     * form in the BE
     * 
     * @param type $instance
     */
    function form($instance) {
        if (!isset($instance['title']))
            $instance['title'] = esc_html__('Categories', 'quicksand');
        if (!isset($instance['limit']))
            $instance['limit'] = NULL;
        if (!isset($instance['enable_count']))
            $instance['enable_count'] = FALSE;
        ?>

        <p>
            <label for="<?php echo $this->get_field_id('title'); ?>"><?php esc_html_e('Title ', 'quicksand') ?></label>
            <input  type="text" value="<?php echo esc_attr($instance['title']); ?>"
                    name="<?php echo $this->get_field_name('title'); ?>"
                    id="<?php $this->get_field_id('title'); ?>" />
        </p>

        <p>
            <label for="<?php echo $this->get_field_id('limit'); ?>"> <?php esc_html_e('Limit Categories ', 'quicksand') ?></label>
            <input type="number" min="0" value="<?php echo esc_attr($instance['limit']); ?>"
                    name="<?php echo $this->get_field_name('limit'); ?>"
                    id="<?php $this->get_field_id('limit'); ?>" />
        </p>

        <p>
            <label>
                <input  type="checkbox"
                        name="<?php echo $this->get_field_name('enable_count'); ?>"
                        id="<?php $this->get_field_id('enable_count'); ?>" <?php if ($instance['enable_count']) echo 'checked=checked '; ?>
                        />
                        <?php esc_html_e('Enable Posts Count', 'quicksand') ?>
            </label>
        </p>

        <?php
    }

}
?>