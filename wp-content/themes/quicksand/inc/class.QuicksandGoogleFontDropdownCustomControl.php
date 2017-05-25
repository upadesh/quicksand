<?php
/**
 * A class to create a dropdown for all google fonts
 */
if (class_exists('WP_Customize_Control')) {

    class GoogleFontDropdownCustomControl extends WP_Customize_Control {

        private $fonts = false;

        public function __construct($manager, $id, $args = array(), $options = array()) {
            $this->fonts = $this->get_google_fonts();
            parent::__construct($manager, $id, $args);
        }

        public function render_content() {
            ?>
            <label class="customize_dropdown_input">
                <span class="customize-control-title"><?php echo esc_html($this->label); ?></span>
                <select id="<?php echo esc_attr($this->id); ?>" name="<?php echo esc_attr($this->id); ?>" data-customize-setting-link="<?php echo esc_attr($this->id); ?>">
                    <?php
                    if (isset($this->fonts)) {
                        foreach ($this->fonts as $k => $v) {
                            echo '<option value="' . $v['family'] . '" ' . selected($this->value(), $v['family'], false) . '>' . $v['family'] . '</option>';
                        }
                    }
                    ?>
                </select>
            </label>
            <?php
        }

        public function get_google_fonts() {
            $key = get_theme_mod('qs_content_google_api_key', NULL);
            if (!isset($key)) {
                return NULL;
            }
            $googleApi = 'https://www.googleapis.com/webfonts/v1/webfonts?sort=alpha&key=' . $key;
            $fontContent = wp_remote_get($googleApi, array('sslverify' => false));
            if (is_wp_error( $fontContent ) ) {
                return NULL;
            }
            $content = json_decode($fontContent['body'], true);

            return $content['items'];
        }

    }

}
