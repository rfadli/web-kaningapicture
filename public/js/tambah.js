$( document ).ready(function() {
	$( "body" ).delegate( "#pilih_category", "change", function(e) {
		e.preventDefault();
		cat = $( this ).val();
		$.get('/registration/pilihcategory?id='+cat, function(data){
			$('#isi_typeproduct').replaceWith(data);
			//alert(data);
			return false;
		});
	});
});