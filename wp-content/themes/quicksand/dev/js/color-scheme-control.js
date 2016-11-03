/* global colorScheme, Color */
/**
 * Add a listener to the Color Scheme control to update other color controls to new values/defaults.  
 */

(function (api) { 

    api.controlConstructor.select = api.Control.extend({
        ready: function () {
            if ('color_scheme' === this.id) {
                this.setting.bind('change', function (value) {
                    // other settings
                    api('qs_nav_fullwidth').set(colorScheme[value]['settings']['qs_nav_fullwidth']);
                    api('qs_header_fullwidth').set(colorScheme[value]['settings']['qs_header_fullwidth']);
                    api('qs_biography_show').set(colorScheme[value]['settings']['qs_biography_show']);
                    api('qs_sidebar_border_width').set(colorScheme[value]['settings']['qs_sidebar_border_width']); 
                    api('qs_content_fullwidth').set(colorScheme[value]['settings']['qs_content_fullwidth']); 
                    api('qs_header_show_front').set(colorScheme[value]['settings']['qs_header_show_front']);  
                    api('qs_content_masonry').set(colorScheme[value]['settings']['qs_content_masonry']);   
                    api('qs_content_use_lightgallery').set(colorScheme[value]['settings']['qs_content_use_lightgallery']);   
                    api('qs_slider_enabled').set(colorScheme[value]['settings']['qs_slider_enabled']); 
                    api('qs_slider_fullwidth').set(colorScheme[value]['settings']['qs_slider_fullwidth']); 
                    api('qs_header_enabled').set(colorScheme[value]['settings']['qs_header_enabled']); 
                    api('qs_slider_height').set(colorScheme[value]['settings']['qs_slider_height']); 
                    api('qs_header_hide_when_slider_enabled').set(colorScheme[value]['settings']['qs_header_hide_when_slider_enabled']);
                    api('qs_slider_margin_top').set(colorScheme[value]['settings']['qs_slider_margin_top']);  
                    
                    // colors
                    var colors = colorScheme[value].colors;  
                    var color = colors[0];  
                    api('background_color').set(color);
                    api.control('background_color').container.find('.color-picker-hex')
                            .data('data-default-color', color)
                            .wpColorPicker('defaultColor', color);
                    
                    
                    color = colors[1]; 
                    api('qs_content_background_color').set(color);
                    api.control('qs_content_background_color').container.find('.color-picker-hex')
                            .data('data-default-color', color)
                            .wpColorPicker('defaultColor', color);
 
                    color = colors[2];
                    api('qs_content_link_color').set(color);
                    api.control('qs_content_link_color').container.find('.color-picker-hex')
                            .data('data-default-color', color)
                            .wpColorPicker('defaultColor', color); 
                    
                    color = colors[3];
                    api('qs_content_text_color').set(color);
                    api.control('qs_content_text_color').container.find('.color-picker-hex')
                            .data('data-default-color', color)
                            .wpColorPicker('defaultColor', color);
 
                    color = colors[4];
                    api('qs_content_secondary_text_color').set(color);
                    api.control('qs_content_secondary_text_color').container.find('.color-picker-hex')
                            .data('data-default-color', color)
                            .wpColorPicker('defaultColor', color);
 
                    color = colors[5];
                    api('header_textcolor').set(color);
                    api.control('header_textcolor').container.find('.color-picker-hex')
                            .data('data-default-color', color)
                            .wpColorPicker('defaultColor', color);
                    
 
                    color = colors[6];
                    api('qs_nav_background_color').set(color);
                    api.control('qs_nav_background_color').container.find('.color-picker-hex')
                            .data('data-default-color', color)
                            .wpColorPicker('defaultColor', color);
                    
                    color = colors[7];
                    api('qs_nav_link_color').set(color);
                    api.control('qs_nav_link_color').container.find('.color-picker-hex')
                            .data('data-default-color', color)
                            .wpColorPicker('defaultColor', color);
                    
                    color = colors[8];
                    api('qs_header_background_color').set(color);
                    api.control('qs_header_background_color').container.find('.color-picker-hex')
                            .data('data-default-color', color)
                            .wpColorPicker('defaultColor', color);
                    
                    color = colors[9];
                    api('qs_footer_background_color').set(color);
                    api.control('qs_footer_background_color').container.find('.color-picker-hex')
                            .data('data-default-color', color)
                            .wpColorPicker('defaultColor', color);
                    
                    color = colors[10];
                    api('qs_footer_link_color').set(color);
                    api.control('qs_footer_link_color').container.find('.color-picker-hex')
                            .data('data-default-color', color)
                            .wpColorPicker('defaultColor', color);
                    
                    color = colors[11];
                    api('qs_footer_text_color').set(color);
                    api.control('qs_footer_text_color').container.find('.color-picker-hex')
                            .data('data-default-color', color)
                            .wpColorPicker('defaultColor', color);
 
                    color = colors[12];
                    api('qs_sidebar_background_color').set(color);
                    api.control('qs_sidebar_background_color').container.find('.color-picker-hex')
                            .data('data-default-color', color)
                            .wpColorPicker('defaultColor', color); 
                    
                    color = colors[13];
                    api('qs_sidebar_text_color').set(color);
                    api.control('qs_sidebar_text_color').container.find('.color-picker-hex')
                            .data('data-default-color', color)
                            .wpColorPicker('defaultColor', color);
 
 
                    color = colors[14];
                    api('qs_sidebar_link_color').set(color);
                    api.control('qs_sidebar_link_color').container.find('.color-picker-hex')
                            .data('data-default-color', color)
                            .wpColorPicker('defaultColor', color); 
 
                    color = colors[15];
                    api('qs_sidebar_border_color').set(color);
                    api.control('qs_sidebar_border_color').container.find('.color-picker-hex')
                            .data('data-default-color', color)
                            .wpColorPicker('defaultColor', color);
 
                    color = colors[16];
                    api('qs_nav_link_hover_background_color').set(color);
                    api.control('qs_nav_link_hover_background_color').container.find('.color-picker-hex')
                            .data('data-default-color', color)
                            .wpColorPicker('defaultColor', color);
 
                    color = colors[17];
                    api('qs_footer_link_hover_color').set(color);
                    api.control('qs_footer_link_hover_color').container.find('.color-picker-hex')
                            .data('data-default-color', color)
                            .wpColorPicker('defaultColor', color);
 
                    color = colors[18];
                    api('qs_content_post_bg_color').set(color);
                    api.control('qs_content_post_bg_color').container.find('.color-picker-hex')
                            .data('data-default-color', color)
                            .wpColorPicker('defaultColor', color);
 
                    color = colors[19];
                    api('qs_content_post_border_color').set(color);
                    api.control('qs_content_post_border_color').container.find('.color-picker-hex')
                            .data('data-default-color', color)
                            .wpColorPicker('defaultColor', color);
 
                    color = colors[20];
                    api('qs_content_title_bg_color').set(color);
                    api.control('qs_content_title_bg_color').container.find('.color-picker-hex')
                            .data('data-default-color', color)
                            .wpColorPicker('defaultColor', color);
                });
            }
        }
    }); 
})(wp.customize);
