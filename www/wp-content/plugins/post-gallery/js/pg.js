jQuery( document ).ready( function($){

		(function() {

			var mediaUploader;
			var frame;

			if ( mediaUploader ) {
				mediaUploader.open();
				return;
			}

			// add
			$( '.upload-gallery-img-button' ).on( 'click',function(e) {
				e.preventDefault();

				mediaUploader = wp.media.frames.file_frame = wp.media({
					title: 'Задать',
					button: {
						text: 'Задать изображение'
					},
					library: {
						type : 'image'
					},
					multiple: false
				});

				mediaUploader.on( 'select', function(event) {

					attachment = mediaUploader.state().get('selection').first().toJSON();

					var imgPrev = document.createElement('div'),
						inputHidden = document.createElement('input'),
						editLink = document.createElement('span');

					inputHidden.type = 'hidden';
					inputHidden.value = JSON.stringify({
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

					inputHidden.name = '_gallery_img[]';

					imgPrev.className = 'gallery-img-prev';
					imgPrev.style.backgroundImage = 'url("' + attachment.url + '")';

					imgPrev.appendChild(inputHidden);

					editLink.className = 'edit-gallery-img-link';
					editLink.setAttribute('data-img-id', attachment.id)

					editLink.appendChild(imgPrev);

					$('.gallery-img-fields-wrap').append(editLink);
				});

				mediaUploader.open();
			});

			// delete
			$('.remove-gallery-img-button').on('click', function(e) {
				e.preventDefault();
				e.stopPropagation();

				var target = $( e.target ),
					answer = confirm("Точно?");

				if( answer == true ){
					$(this).parent().find('[name="_gallery_img[]"]').val('');
					$(this).parent().css( 'display','none' );
				}

				return;
			});

			// edit
			$('.gallery-img-fields-wrap').on('click', '.edit-gallery-img-link', function(e) {
				e.preventDefault();
				var _ = this;

				mediaUploader = wp.media.frames.file_frame = wp.media({
					title: 'Изменить изображение',
					button: {
						text: 'Изменить изображение'
					},
					library: {
						type : 'image'
					},
					multiple: false
				});

				mediaUploader.on('select', function(e) {
					var attachment = mediaUploader.state().get('selection').first().toJSON();
						$imgPrev = $(_).find('.gallery-img-prev'),
						$inputHidden = $(_).find('[name="_gallery_img[]"]');

					$inputHidden.val(JSON.stringify({
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
					}));

					$imgPrev.css('backgroundImage', 'url("' + attachment.url + '")');
				});

				mediaUploader.on('open', function() {
					var selection = mediaUploader.state().get('selection');

					attachment = wp.media.attachment($(_).attr('data-img-id'));
					attachment.fetch();
					selection.add( attachment ? [ attachment ] : [] );
				});

				mediaUploader.open();
			});


			$( '.upload-platform-img-button' ).on( 'click',function(e) {
				e.preventDefault();

				mediaUploader = wp.media.frames.file_frame = wp.media({
					title: 'Задать',
					button: {
						text: 'Задать изображение'
					},
					library: {
						type : 'image'
					},
					multiple: false
				});

				mediaUploader.on( 'select', function(event) {

					attachment = mediaUploader.state().get('selection').first().toJSON();

					var imgPrev = document.createElement('div'),
						inputHidden = document.querySelector('input.platform-img'),
						editLink = document.createElement('span');

					inputHidden.value = JSON.stringify({
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

					// imgPrev.className = 'platform-img-prev';
					// imgPrev.style.backgroundImage = 'url("' + attachment.url + '")';

					// imgPrev.appendChild(inputHidden);

					// editLink.className = 'edit-platform-img-link';
					// editLink.setAttribute('data-img-id', attachment.id)

					// editLink.appendChild(imgPrev);

					// $('.platform-img-fields-wrap').append(editLink);
				});

				mediaUploader.open();
			});


		}());
	});
