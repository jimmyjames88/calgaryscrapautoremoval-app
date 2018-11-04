
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');
require('./jquery-ui');
require('./jquery.ui.touch-punch');  

$('.sortable').sortable({
	handle: '.handle',
	axis: 'y',
	items: '> .list-group-item',
	update: function(e, ui){
		var rows = $(this).children('.list-group-item');

		var order = {};
		$.each(rows, function(k, v){
			var id = $(this).data('id');
			order[k] = id;
		});



		var self = $(this);
		var handle = $('.ui-sortable-handle i.fa', ui.item);
		$.ajax({
			url: '/admin/testimonials/sort',
			headers: {
			    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			},
			dataType: 'JSON',
			type: 'POST',
			data: order,
			beforeSend: function(){
				self.sortable('disable');
				handle.removeClass('fa-arrows-v').addClass('fa-spinner fa-spin');
			},
			complete: function(result){
				self.sortable('enable');
				handle.removeClass('fa-spinner fa-spin').addClass('fa-arrows-v');
			}
		});
	}
});

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */
