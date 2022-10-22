(function() {

    var ufks_sudkorpus_string = 'Судейский корпус';
    var UKFS_SUDKORPUS_SHORTCODE = '[ufks_sudkorpus][/ufks_sudkorpus]';

    var html = function () {
        return '<div class="wp-ufks_sudkorpus" data-shortcode=ufks_sudkorpus>' + ufks_sudkorpus_string + '</div>';
    }

    var replaceShortcodes = function(content) {
        return  content.replace(UKFS_SUDKORPUS_SHORTCODE, function() {
                    return html();
                });
    }

    function restoreShortcodes( content ) {
        $('iframe#content_ifr').load(function(){
            $('[data-shortcode=ufks_sudkorpus]').replaceWith(UKFS_SUDKORPUS_SHORTCODE)
        });
    }

    tinymce.create("tinymce.plugins.sudkorpus_button_plugin", {

        // url argument holds the absolute url of our plugin directory
        init : function(editor, url) {

            var data = {
                action: 'list_for_tiny_mce'
            };
            jQuery.post( ajaxurl, data, function(response) {
                ufks_sudkorpus_string = response;
            });

            // add new button
            editor.addButton("sudkorpus_tinymce_button", {
                title : "Судейский корпус",
                cmd : "sudkorpus_command",
                image : "https://cdn3.iconfinder.com/data/icons/softwaredemo/PNG/32x32/Circle_Green.png"
            });

            // button functionality.
            editor.addCommand("sudkorpus_command", function() {
                jQuery(document).ready(function($) {
                    editor.execCommand("mceInsertContent", 0, UKFS_SUDKORPUS_SHORTCODE);
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

    tinymce.PluginManager.add("sudkorpus_button_plugin", tinymce.plugins.sudkorpus_button_plugin);
})();
