$(document).on('ready',function(){

	// Barre de recherche
	$(document).on('keyup','#recherche',function(input){
		
		if($(this).val().length > 0){
			$.ajax({
				url: getUrl() + "articles/getArticlesAjax/" + $(this).val(),
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

	function getUrl(){
		return window.location.protocol + '//' + window.location.host + '/' + window.location.pathname.split('/')[1] + '/';
	}

});
