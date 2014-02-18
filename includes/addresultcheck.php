<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js" type="text/javascript"></script>
		<script>
		$(document).ready( function() {

			$('#addresult').submit( function() {
                                
                                
                                var title = $('#title').val();
				if(title.length < 1)
				{
					alert('Title is required.');
					return false
				}
                                
                                var description = $('#description').val();
				if(description.length < 1)
				{
					alert('Description is required');
					return false
				}
                                
                                var categoryOne = $('#categoryOne').val();
				if(categoryOne == 0 )
				{
					alert('First Category is required');
					return false
				}
				
				var imageOne = $('#imageOne').val();
				if(imageOne == '')
				{
					alert('You must upload at least one image.');
					return false
				}
				
                               
				
				return true;
			});

		});
</script>