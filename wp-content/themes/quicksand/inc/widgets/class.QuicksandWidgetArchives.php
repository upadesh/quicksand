<?php

/**
 * A prettier Archives Widget 
 */
class QuicksandWidgetArchives extends WP_Widget {

    function __construct() {
        parent::__construct(
                'quicksand-archives-custom', __('Quicksand Archives', 'quicksand'), array('classname' => 'quicksand-archives-custom')
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

        $title = isset($instance['title']) ? $instance['title'] : esc_html__('Archives', 'quicksand');
        $enable_count = isset($instance['enable_count']) ? $instance['enable_count'] : NULL;
        $limit = isset($instance['limit']) ? $instance['limit'] : NULL;

        echo $before_widget;
        echo $before_title;
        echo $title;
        echo $after_title;
        ?>


        <div class="archives-widget">

            <ul>
                <?php
                $args = array(
                    'type' => 'monthly',
                    'format' => 'html',
                    'before' => '',
                    'after' => '',
                    'echo' => 0,
                    'order' => 'DESC',
                    'post_type' => 'post'
                );
                if (isset($enable_count)) {
                    $args['show_post_count'] = 1;
                }
                if (!empty($limit)) {
                    $args['limit'] = $limit;
                }

                $variable = wp_get_archives($args);
                $variable = str_replace('(', '<span class="tag tag-default tag-pill float-xs-right">', $variable);
                $variable = str_replace(')', '</span>', $variable);
                echo $variable;
                ?>
            </ul>  
        </div><!-- end widget content -->

        <?php
        echo $after_widget;
    }

    /**
     * form in the BE
     * 
     * @param type $instance
     */
    function form($instance) {
        if (!isset($instance['title']))
            $instance['title'] = esc_html__('Archives', 'quicksand');
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
            <label for="<?php echo $this->get_field_id('limit'); ?>"> <?php esc_html_e('Limit Archives ', 'quicksand') ?></label>
            <input  type="text" value="<?php echo esc_attr($instance['limit']); ?>"
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