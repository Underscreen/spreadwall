$( "#sw_user_category_category" )
  .change(function() {
    var str = "";
    $( "#sw_user_category_category option:selected" ).each(function() {
      id = $( this ).val();
    });
    $('#sw_user_category_parent').val(id);
  })
  .trigger( "change" );

  /* AJAX */
$('.edit-slide').click(function(){
	var id = $(this).attr('data-id');
	$.ajax({
		type: 'get',
		url: Routing.generate('sw_slide_edit', { slideId: id }),
		beforeSend: function(){
				$('.render-slide .loading').fadeIn('fast');
				},
		success: function(data){
				$('.slide-edit-render').html(data.slideform);
				$('.render-slide .loading').fadeOut('fast');
				$('.slide-edit-render').fadeIn('fast');
				}
	});
});