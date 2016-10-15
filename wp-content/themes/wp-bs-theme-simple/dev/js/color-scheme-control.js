/* global colorScheme, Color */
/**
 * Add a listener to the Color Scheme control to update other color controls to new values/defaults.  
 */

(function (api) { 

    api.controlConstructor.select = api.Control.extend({
        ready: function () {
            if ('color_scheme' === this.id) {
                this.setting.bind('change', function (value) {
                    var colors = colorScheme[value].colors;  
                    var color = colors[0]; 
                    
                    color = colors[0];
                    api('background_color').set(color);
                    api.control('background_color').container.find('.color-picker-hex')
                            .data('data-default-color', color)
                            .wpColorPicker('defaultColor', color);
                    
                    
                    color = colors[1]; 
                    api('wbts_content_background_color').set(color);
                    api.control('wbts_content_background_color').container.find('.color-picker-hex')
                            .data('data-default-color', color)
                            .wpColorPicker('defaultColor', color);
 
                    color = colors[2];
                    api('wbts_content_link_color').set(color);
                    api.control('wbts_content_link_color').container.find('.color-picker-hex')
                            .data('data-default-color', color)
                            .wpColorPicker('defaultColor', color); 
                    
                    color = colors[3];
                    api('wbts_content_text_color').set(color);
                    api.control('wbts_content_text_color').container.find('.color-picker-hex')
                            .data('data-default-color', color)
                            .wpColorPicker('defaultColor', color);
 
                    color = colors[4];
                    api('wbts_content_secondary_text_color').set(color);
                    api.control('wbts_content_secondary_text_color').container.find('.color-picker-hex')
                            .data('data-default-color', color)
                            .wpColorPicker('defaultColor', color);
 
                    color = colors[5];
                    api('header_textcolor').set(color);
                    api.control('header_textcolor').container.find('.color-picker-hex')
                            .data('data-default-color', color)
                            .wpColorPicker('defaultColor', color);
                    
 
                    color = colors[6];
                    api('wbts_nav_background_color').set(color);
                    api.control('wbts_nav_background_color').container.find('.color-picker-hex')
                            .data('data-default-color', color)
                            .wpColorPicker('defaultColor', color);
                    
                    color = colors[7];
                    api('wbts_nav_link_color').set(color);
                    api.control('wbts_nav_link_color').container.find('.color-picker-hex')
                            .data('data-default-color', color)
                            .wpColorPicker('defaultColor', color);
                    
                    color = colors[8];
                    api('wbts_header_background_color').set(color);
                    api.control('wbts_header_background_color').container.find('.color-picker-hex')
                            .data('data-default-color', color)
                            .wpColorPicker('defaultColor', color);
                    
                    color = colors[9];
                    api('wbts_footer_background_color').set(color);
                    api.control('wbts_footer_background_color').container.find('.color-picker-hex')
                            .data('data-default-color', color)
                            .wpColorPicker('defaultColor', color);
                    
                    color = colors[10];
                    api('wbts_footer_link_color').set(color);
                    api.control('wbts_footer_link_color').container.find('.color-picker-hex')
                            .data('data-default-color', color)
                            .wpColorPicker('defaultColor', color);
                    
                    color = colors[11];
                    api('wbts_footer_text_color').set(color);
                    api.control('wbts_footer_text_color').container.find('.color-picker-hex')
                            .data('data-default-color', color)
                            .wpColorPicker('defaultColor', color);
 
                });
            }
        }
    }); 
})(wp.customize);
