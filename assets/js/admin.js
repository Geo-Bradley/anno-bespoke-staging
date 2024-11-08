jQuery(document).ready(function(){
	// Image
	jQuery('.image_remover').on('click', function(e){
		e.preventDefault();
		var id = jQuery(this).attr("id");
		var btn = id.split("remove_");
		img_id = btn[1];
		jQuery("#image_"+img_id).val('');
		jQuery('.preview_'+img_id).attr("src", '');
		
		jQuery('.image_uploader_'+img_id).val('Select Image');
		jQuery('#remove_'+img_id).removeClass('visible');
		jQuery('.preview_'+img_id).removeClass('visible');
	});
	
	jQuery('.image_uploader').on("click", function(e){
		e.preventDefault();
		var id = jQuery(this).attr('data-id');
		
		image_uploader(id);
	});
	
	jQuery('.image_previewer').on("click", function(e){
		e.preventDefault();
		var id = jQuery(this).attr('data-id');
		
		image_uploader(id);
	});
	
	
	// Video
	jQuery('.video_remover').on('click', function(e){
		e.preventDefault();
		var id = jQuery(this).attr("id");
		var btn = id.split("remove_");
		video_id = btn[1];
		jQuery("#video_"+video_id).val('');
		jQuery('.preview_'+video_id+' source').attr("src", '');
		
		jQuery('.video_uploader_'+video_id).val('Select Video');
		jQuery('#remove_'+video_id).removeClass('visible');
		jQuery('.preview_'+video_id).removeClass('visible');
	});
	
	jQuery('.video_uploader').on("click", function(e){
		e.preventDefault();
		var id = jQuery(this).attr('data-id');
		
		video_uploader(id);
	});
	
	
	// PDF
	jQuery('.pdf_remover').on('click', function(e){
		e.preventDefault();
		var id = jQuery(this).attr("id");
		var btn = id.split("remove_");
		video_id = btn[1];
		jQuery("#pdf_"+video_id).val('');
		jQuery('.preview_'+video_id+' source').attr("src", '');
		
		jQuery('.pdf_uploader_'+video_id).val('Select PDF');
		jQuery('#remove_'+video_id).removeClass('visible');
		jQuery('.preview_'+video_id).removeClass('visible');
	});
	
	jQuery('.pdf_uploader').on("click", function(e){
		e.preventDefault();
		var id = jQuery(this).attr('data-id');
		
		pdf_uploader(id);
	});
});


function image_uploader(id){
	if(id == '') return '';
	
	var mediaUploader = null;
	
	if(mediaUploader){
		mediaUploader.open();
		return;
	}
	
	mediaUploader = wp.media.frames.file_frame = wp.media({
		title: 'Choose Image',
		button: {
			text: 'Choose Image'
		},
		multiple: false,
		library: {
			type: ['image'],
		},
	});
	
	mediaUploader.on('select', function(){
		var attachment = mediaUploader.state().get('selection').first().toJSON();
		jQuery('#image_'+id).val(attachment.id);
		jQuery('.preview_'+id).attr("src", attachment.url);
		
		jQuery('.image_uploader_'+id).val('Replace Image');
		jQuery('#remove_'+id).addClass('visible');
		jQuery('.preview_'+id).addClass('visible');
	});
	
	mediaUploader.open();
}

function video_uploader(id){
	if(id == '') return '';
	
	var mediaUploader = null;
	
	if(mediaUploader){
		mediaUploader.open();
		return;
	}
	
	mediaUploader = wp.media.frames.file_frame = wp.media({
		title: 'Choose Video',
		button: {
			text: 'Choose Video'
		},
		multiple: false,
		library: {
			type: ['video'],
		},
	});
	
	mediaUploader.on('select', function(){
		var attachment = mediaUploader.state().get('selection').first().toJSON();
		jQuery('#video_'+id).val(attachment.id);
		jQuery('.preview_'+id+' source').attr("src", attachment.url);
		
		jQuery('.video_uploader_'+id).val('Replace Video');
		jQuery('#remove_'+id).addClass('visible');
		jQuery('.preview_'+id).addClass('visible');
		
		jQuery('.preview_'+id)[0].load();
	});
	
	mediaUploader.open();
}

function pdf_uploader(id){
	if(id == '') return '';
	
	var mediaUploader = null;
	
	if(mediaUploader){
		mediaUploader.open();
		return;
	}
	
	mediaUploader = wp.media.frames.file_frame = wp.media({
		title: 'Choose PDF',
		button: {
			text: 'Choose PDF'
		},
		multiple: false,
		library: {
			type: ['application/pdf'],
		},
	});
	
	mediaUploader.on('select', function(){
		var attachment = mediaUploader.state().get('selection').first().toJSON();
		var attachment_url = attachment.url;
		
		var preview_url = attachment.sizes.large.url;
		
		console.log(attachment);
		
		jQuery('#pdf_'+id).val(attachment.id);
		jQuery('.preview_'+id).attr("src", preview_url);
		
		jQuery('.pdf_uploader_'+id).val('Replace PDF');
		jQuery('#remove_'+id).addClass('visible');
		jQuery('.preview_'+id).addClass('visible');
	});
	
	mediaUploader.open();
}