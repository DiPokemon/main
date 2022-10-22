(function() {

    var ufks_documents_string = 'Документы';
    var UKFS_DOCUMENTS_SHORTCODE = '[ufks_documents][/ufks_documents]';

    var html = function () {
        return '<div class="wp-ufks_documents" data-shortcode=ufks_documents>' + ufks_documents_string + '</div>';
    }

    var replaceShortcodes = function(content) {
        return  content.replace(UKFS_DOCUMENTS_SHORTCODE, function() {
                    return html();
                });
    }

    function restoreShortcodes( content ) {
        $('iframe#content_ifr').load(function(){
            $('[data-shortcode=ufks_documents]').replaceWith(UKFS_DOCUMENTS_SHORTCODE)
        });
    }

    tinymce.create("tinymce.plugins.documents_button_plugin", {

        // url argument holds the absolute url of our plugin directory
        init : function(editor, url) {

            var data = {
                action: 'list_for_tiny_mce'
            };
            jQuery.post( ajaxurl, data, function(response) {
                ufks_documents_string = response;
            });

            // add new button     
            editor.addButton("documents_tinymce_button", {
                title : "Документы",
                cmd : "documents_command",
                image : "https://cdn3.iconfinder.com/data/icons/softwaredemo/PNG/32x32/Circle_Green.png"
            });

            // button functionality.
            editor.addCommand("documents_command", function() {
                jQuery(document).ready(function($) {
                    editor.execCommand("mceInsertContent", 0, UKFS_DOCUMENTS_SHORTCODE);
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

    tinymce.PluginManager.add("documents_button_plugin", tinymce.plugins.documents_button_plugin);
})();