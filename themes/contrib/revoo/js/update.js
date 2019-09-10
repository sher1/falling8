jQuery(document).ready(function($) {
	 // $('.class_slider1-2 a').attr('class', 'btn btn-hvr-white hvr-pulse-grow');
	 // $('.class_slider2-2 a').attr('class', 'btn btn-white hvr-pulse-grow');
	 // $('.class_slider3-1 a').attr('class', 'btn btn-round btn-hvr-white hvr-pulse-grow');
	// $('.top-link >ul >li:nth-child(1) >a').prepend('<i class="fa fa-user"></i>');
	// $('.top-link >ul >li:nth-child(2) >a').prepend('<i class="fa fa-share"></i>');
	// $('.top-link >ul >li:nth-child(3) >a').prepend('<i class="fa fa-unlock-alt"></i>');
	$(' input[type=search]').attr('placeholder', 'SEARCH');
	$('.widget-subscribe input[type=email]').attr('placeholder', 'Enter your email.');
	$('.comment-form .form-item-name input[type=text]').attr('placeholder', 'NAME');
	$('.comment-form .form-item-subject-0-value input[type=text]').attr('placeholder', 'SUBJECT');
	$('.comment-form textarea').attr('placeholder', 'COMMENT');	
	$('#contact-message-feedback-form .form-item-name input[type=text]').attr('placeholder', 'NAME');
	$('#contact-message-feedback-form .form-item-mail input[type=email]').attr('placeholder', 'EMAIL');
	$('#contact-message-feedback-form .form-item-subject-0-value input[type=text]').attr('placeholder', 'SUBJECT');
	$('#contact-message-feedback-form textarea').attr('placeholder', 'COMMENT');	
	$('#contact-message-feedback-form input[type = submit]').attr('class', 'btn wow swing');
});
