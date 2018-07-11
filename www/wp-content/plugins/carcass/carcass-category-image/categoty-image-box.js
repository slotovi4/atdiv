
jQuery(document).ready( function($) {

ct_media_upload('.carcass_media_button.button');
function ct_media_upload(button_class) {
   var _custom_media = true,
   _orig_send_attachment = wp.media.editor.send.attachment;

   $('body').on('click', button_class, function(e) {
      var button_id = '#'+$(this).attr('id'),
          send_attachment_bkp = wp.media.editor.send.attachment,
          button = $(button_id);

      _custom_media = true;

      wp.media.editor.send.attachment = function(props, attachment) {
         if ( _custom_media ) {
            var value = JSON.stringify({
               id: attachment.id,
               nonces: attachment.nonces,
               filename: attachment.filename,
               url: attachment.url,
               editLink: attachment.editLink,
               title: attachment.title,
               caption: attachment.caption || '',
               alt: attachment.alt || '',
               description: attachment.description || '',
               sizes: attachment.sizes
            });
            $('#carcass_category-image').val(value);
            $('#carcass_category-image-wrapper').html('<img class="custom_media_image" src="" style="margin:0;padding:0;max-height:100px;float:none;" />');
            $('#carcass_category-image-wrapper .custom_media_image').attr('src',attachment.url).css('display','block');
         } else {
            return _orig_send_attachment.apply( button_id, [props, attachment] );
         }
      };

      wp.media.editor.open(button);
      return false;
   });
}

$('body').on('click','.carcass_media_remove',function(){
   $('#carcass_category-image').val('');
   $('#carcass_category-image-wrapper').html('<img class="custom_media_image" src="" style="margin:0;padding:0;max-height:100px;float:none;" />');
});
});
