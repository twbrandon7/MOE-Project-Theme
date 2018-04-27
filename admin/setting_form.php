<div class="wrap">
    <h1>佈景設定</h1>
    <form method="post" action="options.php"> 
        <?php
            settings_fields( 'home_setting' );
            do_settings_sections( 'home_setting' );
        ?>

        <table class="form-table">
            <!-- <tr valign="top">
                <th scope="row">全站標題底圖</th>
                <td>
                    <input type="hidden" id="index_cover_image_path" name="index_cover_image_path" value="<?php echo esc_attr( get_option('index_cover_image_path') ); ?>" />
                    <input id="upload_image_button" type="button" class="button" value="<?php _e( 'Upload image' ); ?>" />
                </td>
            </tr>

            <tr valign="top">
                <td colspan="2">
                    <div class='image-preview-wrapper'>
                        <?php
                            $cover_img_url = esc_attr( get_option('index_cover_image_path'));
                            if($cover_img_url != ""){
                                echo "<img id='image-preview' src='".wp_get_attachment_image_src($cover_img_url, 'full')[0]."' style='max-height: auto; width: 30%;'>";
                            }else{
                                echo "<img id='image-preview' src='<?php bloginfo('template_url'); ?>/image/home-bg.jpg' style='max-height: auto; width: 30%;'>";
                            }
                        ?>
                    </div>
                    <!-<input type='hidden' name='image_attachment_id' id='image_attachment_id' value=''>->
                </td>
            </tr> -->
            
            <tr valign="top">
                <th scope="row">首頁頁面</th>
                <td>
                    <?php
                        $args = array(
                            'child_of'     => 0,
                            'sort_order'   => 'ASC',
                            'sort_column'  => 'post_title',
                            'hierarchical' => 1,
                            'name' => 'index_page_id',
                            'selected' => esc_attr(get_option('index_page_id')),
                            'post_type' => 'page'
                        );
                        wp_dropdown_pages($args);
                    ?> 
                </td>
            </tr>

            <tr valign="top">
                <th scope="row">首頁相簿</th>
                <td>
                    <input type="text" id="index_gallery_image_ids" name="index_gallery_image_ids" value="<?php echo esc_attr( get_option('index_gallery_image_ids') ); ?>" readonly/>
                    <input id="upload_image_button" type="button" class="button" value="<?php _e( '上傳 / 選擇圖片' ); ?>"/>
                </td>
            </tr>
            
            <!--<tr valign="top">
                <th scope="row">Options, Etc.</th>
                <td><input type="text" name="option_etc" value="<?php //echo esc_attr( get_option('option_etc') ); ?>" /></td>
            </tr>-->
        </table>

        <?php submit_button(); ?>
    </form>
</div>

<?php
    add_action( 'admin_footer', 'media_selector_print_scripts' );
    
    function media_selector_print_scripts() {
    
        $my_saved_attachment_post_id = get_option( 'image_attachment_id', 0 );
    
        ?><script type='text/javascript'>
            jQuery( document ).ready( function( $ ) {
                // Uploading files
                var file_frame;
                var wp_media_post_id = wp.media.model.settings.post.id; // Store the old id
                var set_to_post_id = <?php echo $my_saved_attachment_post_id; ?>; // Set this
                jQuery('#upload_image_button').on('click', function( event ){
                    event.preventDefault();
                    // If the media frame already exists, reopen it.
                    if ( file_frame ) {
                        // Set the post ID to what we want
                        file_frame.uploader.uploader.param( 'post_id', set_to_post_id );
                        // Open frame
                        file_frame.open();
                        return;
                    } else {
                        // Set the wp.media post id so the uploader grabs the ID we want when initialised
                        wp.media.model.settings.post.id = set_to_post_id;
                    }
                    // Create the media frame.
                    file_frame = wp.media.frames.file_frame = wp.media({
                        title: '選擇要上傳的圖片',
                        button: {
                            text: '使用這些圖片',
                        },
                        multiple: true	// Set to true to allow multiple files to be selected
                    });
                    // When an image is selected, run a callback.
                    file_frame.on( 'select', function() {
                        // We set multiple to false so only get one image from the uploader
                        //attachment = file_frame.state().get('selection').first().toJSON();
                        var selections = file_frame.state().get('selection');
                        var ids = [];
                        for(var i = 0; i < selections.length; i++){
                            var attachment = selections.models[i].toJSON();
                            ids.push(attachment.id);
                        }
                        // Do something with attachment.id and/or attachment.url here
                        //$( '#image-preview' ).attr( 'src', attachment.url )/*.css( 'width', 'auto' )*/;
                        $( '#index_gallery_image_ids' ).val( JSON.stringify(ids) );
                        // Restore the main post ID
                        wp.media.model.settings.post.id = wp_media_post_id;
                    });
                        // Finally, open the modal
                        file_frame.open();
                });
                // Restore the main ID when the add media button is pressed
                jQuery( 'a.add_media' ).on( 'click', function() {
                    wp.media.model.settings.post.id = wp_media_post_id;
                });
            });
        </script><?php
    }
    wp_enqueue_media();
?>