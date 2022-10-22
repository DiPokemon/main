(function() {

    var ufks_partners_string = 'Партнеры';
    var UFKS_PARTNERS_SHORTCODE = '[ufks_partners][/ufks_partners]';

    var html = function () {
        return '<div class="wp-ufks_partners" data-shortcode=ufks_partners>' + ufks_partners_string + '</div>';
    }

    var replaceShortcodes = function(content) {
        return  content.replace(UFKS_PARTNERS_SHORTCODE, function() {
                    return html();
                });
    }

    function restoreShortcodes( content ) {
        $('iframe#content_ifr').load(function(){
            $('[data-shortcode=ufks_partners]').replaceWith(UFKS_PARTNERS_SHORTCODE)
        });
    }

    tinymce.create("tinymce.plugins.sportschools_button_plugin", {

        // url argument holds the absolute url of our plugin directory
        init : function(editor, url) {

            var data = {
                action: 'list_for_tiny_mce'
            };
            jQuery.post( ajaxurl, data, function(response) {
                ufks_partners_string = response;
            });

            // add new button     
            editor.addButton("partners_tinymce_button", {
                title : ufks_partners_string,
                cmd : "partners_command",
                image : "https://cdn3.iconfinder.com/data/icons/softwaredemo/PNG/32x32/Circle_Green.png"
            });

            // button functionality.
            editor.addCommand("partners_command", function() {
                jQuery(document).ready(function($) {
                    editor.execCommand("mceInsertContent", 0, UFKS_PARTNERS_SHORTCODE);
                });
            });

            // replace from shortcode to an placeholder image
            editor.on('BeforeSetcontent', function(event){
                // event.content = replaceShortcodes( event.content );
            });
             
            // replace from placeholder image to shortcode
            editor.on('GetContent', function(event){
                // restoreShortcodes(event.content);
            });

        },

        createControl : function(n, cm) {
            return null;
        },

        getInfo : function() {
            return {
                longname : "Extra Buttons",
                author : "raxee.ru",
                version : "1"
            };
        }
    });

    tinymce.PluginManager.add("partners_button_plugin", tinymce.plugins.partners_button_plugin);
})();