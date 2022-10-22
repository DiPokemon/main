(function() {

    var ufks_gto_string = 'ГТО';
    var UKFS_GTO_SHORTCODE = '[ufks_gto][/ufks_gto]';

    var html = function () {
        return '<div class="wp-ufks_gto" data-shortcode=ufks_gto>' + ufks_gto_string + '</div>';
    }

    var replaceShortcodes = function(content) {
        return  content.replace(UKFS_GTO_SHORTCODE, function() {
                    return html();
                });
    }

    function restoreShortcodes( content ) {
        $('iframe#content_ifr').load(function(){
            $('[data-shortcode=ufks_gto]').replaceWith(UKFS_GTO_SHORTCODE)
        });
    }

    tinymce.create("tinymce.plugins.gto_button_plugin", {

        // url argument holds the absolute url of our plugin directory
        init : function(editor, url) {

            var data = {
                action: 'list_for_tiny_mce'
            };
            jQuery.post( ajaxurl, data, function(response) {
                ufks_gto_string = response;
            });

            // add new button     
            editor.addButton("gto_tinymce_button", {
                title : "ГТО",
                cmd : "gto_command",
                image : "https://cdn3.iconfinder.com/data/icons/softwaredemo/PNG/32x32/Circle_Green.png"
            });

            // button functionality.
            editor.addCommand("gto_command", function() {
                jQuery(document).ready(function($) {
                    editor.execCommand("mceInsertContent", 0, UKFS_GTO_SHORTCODE);
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

    tinymce.PluginManager.add("gto_button_plugin", tinymce.plugins.gto_button_plugin);
})();