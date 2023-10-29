
jQuery(function($) {

	$('.cndev_meta--upload').on('click', (e) => {
		e.preventDefault();
		const parent = $(e.target).closest('td');
		const hiddenInput = $(parent).find('input[type="hidden"]');
		const imgContainer = $(parent).find('div.preview-container');
		const imgTag = $(imgContainer).find('img');

		const imageUploader = wp.media({
			title: 'Choose an image',
			multiple: false
		});
		imageUploader.on('select', () => {
			const attachment = imageUploader.state().get('selection').first().toJSON();
			$(hiddenInput).val(attachment.id);
			$(imgContainer).removeClass('hidden');
			$(imgTag).attr('src', attachment.url);
		});
		imageUploader.open();
	})
});