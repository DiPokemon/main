(function() {

    var ufks_federations_string = 'Менеджеры';
    var UKFS_FEDERATIONS_SHORTCODE = '[ufks_federations][/ufks_federations]';

    var html = function () {
        return '<div class="wp-ufks_federations" data-shortcode=ufks_federations>' + ufks_federations_string + '</div>';
    }

    var replaceShortcodes = function(content) {
        return  content.replace(UKFS_FEDERATIONS_SHORTCODE, function() {
                    return html();
                });
    }

    function restoreShortcodes( content ) {
        $('iframe#content_ifr').load(function(){
            $('[data-shortcode=ufks_federations]').replaceWith(UKFS_FEDERATIONS_SHORTCODE)
        });
    }

    tinymce.create("tinymce.plugins.sportschools_button_plugin", {

        // url argument holds the absolute url of our plugin directory
        init : function(editor, url) {

            var data = {
                action: 'list_for_tiny_mce'
            };
            jQuery.post( ajaxurl, data, function(response) {
                ufks_federations_string = response;
            });

            // add new button     
            editor.addButton("federations_tinymce_button", {
                title : ufks_federations_string,
                cmd : "federations_command",
                image : "https://cdn3.iconfinder.com/data/icons/softwaredemo/PNG/32x32/Circle_Green.png"
            });

            // button functionality.
            editor.addCommand("federations_command", function() {
                jQuery(document).ready(function($) {
                    editor.execCommand("mceInsertContent", 0, UKFS_FEDERATIONS_SHORTCODE);
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

    tinymce.PluginManager.add("federations_button_plugin", tinymce.plugins.sportschools_button_plugin);
})();