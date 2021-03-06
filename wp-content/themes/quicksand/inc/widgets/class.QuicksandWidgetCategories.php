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
     * Sanitize widget form values as they are saved.
     *
     * @see WP_Widget::update()
     *
     * @param array $new_instance Values just sent to be saved.
     * @param array $old_instance Previously saved values from database.
     *
     * @return array Updated safe values to be saved.
     */
    public function update($new_instance, $old_instance) {
        $instance = array();
        $instance['title'] = sanitize_text_field((!empty($new_instance['title']) ) ? strip_tags($new_instance['title']) : '');
        $instance['enable_count'] = absint((!empty($new_instance['enable_count']) ) ? 1 : 0);
        $instance['limit'] = absint((!empty($new_instance['limit']) ) ? strip_tags($new_instance['limit']) : 0);

        return $instance;
    }

    /**
     * output of the widget
     * 
     * @param type $args
     * @param type $instance
     */
    function widget($args, $instance) {
        extract($args);
 
        echo wp_kses_post($before_widget);
        
        if (!empty($instance['title'])) {
            echo wp_kses_post($before_title);
            echo wp_kses_post(apply_filters('widget_title', $instance['title'], $this->id_base));
            echo wp_kses_post($after_title);
        }
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
                if (!empty($instance['enable_count'])) {
                    $args['show_count'] = 1;
                }
                if (!empty($instance['limit'])) {
                    $args['number'] = $instance['limit'];
                }

                $cat = wp_list_categories($args);
                $cat = str_replace('(', '<span class="tag tag-default tag-pill float-xs-right">', $cat);
                $cat = str_replace(')', '</span>', $cat);
                echo wp_kses_post($cat);
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
            $instance['limit'] = 0;
        if (!isset($instance['enable_count']))
            $instance['enable_count'] = 0;
        ?>

        <p>
            <label for="<?php echo esc_attr($this->get_field_id('title')); ?>"><?php esc_html_e('Title ', 'quicksand') ?></label>
            <input  type="text" value="<?php echo esc_attr($instance['title']); ?>"
                    name="<?php echo esc_attr($this->get_field_name('title')); ?>"
                    id="<?php esc_attr($this->get_field_id('title')); ?>" />
        </p>

        <p>
            <label for="<?php echo esc_attr($this->get_field_id('limit')); ?>"> <?php esc_html_e('Limit Categories ', 'quicksand') ?></label>
            <input type="number" min="0" value="<?php echo esc_attr($instance['limit']); ?>"
                   name="<?php echo esc_attr($this->get_field_name('limit')); ?>"
                   id="<?php esc_attr($this->get_field_id('limit')); ?>" />
        </p>

        <p>
            <label>
                <input  type="checkbox"
                        name="<?php echo esc_attr($this->get_field_name('enable_count')); ?>"
                        id="<?php esc_attr($this->get_field_id('enable_count')); ?>" <?php checked( $instance['enable_count'], 1 ); ?>
                        />
                        <?php esc_html_e('Enable Posts Count', 'quicksand') ?>
            </label>
        </p>

        <?php
    }

}