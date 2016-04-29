$(document).on('ready',function(){

	$(document).on('keyup','#recherche',function(input){
		
		if($(this).val().length > 0){
			$.ajax({
				url: "http://localhost/basenova/articles/getArticlesAjax/" + $(this).val(),
				get: 'get',
				data: '',
				success: function(e){
					$('#suggest').empty();
					$('#suggest').html(e);
					console.log('success ' + e);
				},
				error: function(e){
					console.log('error ' + e);
				}
			});
		}else{
			$('#suggest').empty();
		}
			
	});
});
