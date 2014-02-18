<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js" type="text/javascript"></script>
		<script>
		$(document).ready( function() {

			$('#loginform').submit( function() {
                                
                                var email = $('#Email').val();
				if( !validateEmail(email))
				{
					alert('Please enter a valid email address.');
					return false
				}
                                
                                var pass = $('#password').val();
				if(pass.length < 8)
				{
					alert('Your password must be longer than 8 characters.');
					return false
				}
                                
                                return true;
			});

		});
		
		function validateEmail(email) { 
		    var re = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
		    return re.test(email);
		}
		</script>