/* AJAX */
$('.cat-id').click(function(){
	var id = $(this).attr('data-id');
	$(this).siblings('.btn').removeClass('btn-success').addClass('btn-default');
	$(this).removeClass('btn-default').addClass('btn-success');
	$('.act-container').fadeOut('fast');
	
	$.ajax({
		type: 'get',
		url: Routing.generate('sw_user_check_category_activity', { id: id }),
		beforeSend: function(){
				$('.bbox .loading').fadeIn('fast');
				},
		success: function(data){
				$('.act-content').html(data.listActivities);
				$('.bbox .loading').fadeOut('fast');
				$('.act-container').fadeIn('fast');
				}
	});
});

$('.bbox').on('click', '.act-id', function(){
	var id = $(this).attr('data-id');
	$('.sty-container').fadeOut('fast');
	$(this).siblings('.btn').removeClass('btn-success').addClass('btn-default');
	$(this).removeClass('btn-default').addClass('btn-success');
	$.ajax({
		type: 'get',
		url: Routing.generate('sw_user_check_activity_style', { id: id }),
		beforeSend: function(){
				$('.cbox .loading').fadeIn('fast');
				},
		success: function(data){
				$('.sty-content').html(data.listStyles);
				$('.cbox .loading').fadeOut('fast');
				$('.sty-container').fadeIn('fast');
				}
	});
});

// On assigne les catégories, activités et styles aux utilisateurs
$('.cbox').on('click', '.sty-id', function(){
	var id = $(this).attr('data-id');
	$('.alert-success').fadeOut('slow');
	$(this).siblings('.btn').removeClass('btn-success').addClass('btn-default');
	$(this).removeClass('btn-default').addClass('btn-success');
	$.ajax({
		type: 'get',
		url: Routing.generate('sw_user_check_profil_validation', { id: id }),
		success: function(){
				$('.alert-success').fadeIn('slow');
				}
	});
});

(function($) {
	$(document).ready(function() {
		$.slidebars();
	});
}) (jQuery);

$('.icon-plus').click(function(e){
	e.preventDefault();
	var parent = $(this).parent();
	var grand_parent = parent.parent();
	var menu = grand_parent.children('ul');
	
	if(menu.is(":visible")){
		$(this).removeClass('glyphicon-minus').addClass('glyphicon-plus');
	}else{
		$(this).removeClass('glyphicon-plus').addClass('glyphicon-minus');
	}
	menu.slideToggle('slow');

});




