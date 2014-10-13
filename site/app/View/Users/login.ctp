<?php echo $this->Session->flash('auth'); ?>
   
<!DOCTYPE HTML>
<html>
<head>
	<title>ProFinder</title>
	<link href="/profinder/site/css/style.css" rel="stylesheet" type="text/css" media="all" />
</head>
<body>
	<div class="main">
		<div class="wrap">
			<div class="content-top">
				<div class="top-box">
					<font color = "#8F6442" size = "5px"> Conecte-se à sua conta ProFinder</font>
			 	</div>
			 	<div class="top-box">
						<div class="users form">
							<?php echo $this->Session->flash('auth'); ?>
							<?php echo $this->Form->create('User'); ?>
							
							<div align="center" style="height: 202x; width: 700px; float: left; margin-left: 250px;">
						
								<br />
								<?php 
									echo $this->Form->input('username', array (
										'type' => 'text',
										'label' => '',
										'style' => 'width:300px; height:30px; resize:none;',
										'placeholder' => ' email@email.com', 
										'type' => 'email' 
									));
								?>	
								<br />
								<?php 
									echo $this->Form->input('password', array (
										'label' => '',
										'style' => 'width:300px; height:30px; resize:none;',
										'placeholder' => ' Senha'
									));
								?>	
								<br /> <br />
								<?php 
									echo $this->Form->button(
										$this->Html->tag('span', '', array('class' => 'glyphicon glyphicon-ok-sign'))." Login",
										array('type' => 'submit', 'class' => 'btn btn-default', 'escape' => false));
									echo $this->Form->end();
								?>
								
								<br /> <br />
								
								
		          						
								<br /><br />
								
							</div>
							  
							    <br /><br />
						</div>
			 	</div>
			 	
				<div class="clear"></div>
				<button class="btn btn-default data-toggle" data-toggle="modal" data-target="#myModal">Esqueci minha senha</button>
			</div>
		</div>
		
				<div class="clear"></div>
			</div>
		</div>
		
				<div class="clear"></div>
				
			</div>
			

   <fb:login-button scope="public_profile,email" onlogin="checkLoginState();">
</fb:login-button>

</body>

</html>

<!-- Modal -->
<div class="modal fade" data-backdrop="static" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="myModalLabel">Dados do Usuário</h4>
      </div>
      <div class="modal-body">
      	
        	<form id = "formEmail" action = "/profinder/site/clientes/enviar_email" method = "post">
			<input type='text' name='username'>
				
			<button type="submit" class="btn btn-default">Solicitar Senha</button>
			</form>
      </div>
    </div>
  </div>
</div>


    	

<script>
  // This is called with the results from from FB.getLoginStatus().
  function statusChangeCallback(response) {
    console.log('statusChangeCallback');
    console.log(response);
    // The response object is returned with a status field that lets the
    // app know the current login status of the person.
    // Full docs on the response object can be found in the documentation
    // for FB.getLoginStatus().
    if (response.status === 'connected') {
      // Logged into your app and Facebook.
      testAPI();
    } else if (response.status === 'not_authorized') {
      // The person is logged into Facebook, but not your app.
      document.getElementById('status').innerHTML = 'Please log ' +
        'into this app.';
    } else {
      // The person is not logged into Facebook, so we're not sure if
      // they are logged into this app or not.
      document.getElementById('status').innerHTML = 'Please log ' +
        'into Facebook.';
    }
  }

  // This function is called when someone finishes with the Login
  // Button.  See the onlogin handler attached to it in the sample
  // code below.
  function checkLoginState() {
    FB.getLoginStatus(function(response) {
      statusChangeCallback(response);
    });
  }

  window.fbAsyncInit = function() {
  FB.init({
    appId      : '1496505570602503',
    cookie     : true,  // enable cookies to allow the server to access 
                        // the session
    xfbml      : true,  // parse social plugins on this page
    version    : 'v2.1' // use version 2.1
  });

  // Now that we've initialized the JavaScript SDK, we call 
  // FB.getLoginStatus().  This function gets the state of the
  // person visiting this page and can return one of three states to
  // the callback you provide.  They can be:
  //
  // 1. Logged into your app ('connected')
  // 2. Logged into Facebook, but not your app ('not_authorized')
  // 3. Not logged into Facebook and can't tell if they are logged into
  //    your app or not.
  //
  // These three cases are handled in the callback function.

  FB.getLoginStatus(function(response) {
    statusChangeCallback(response);
  });

  };

  // Load the SDK asynchronously
  (function(d, s, id) {
    var js, fjs = d.getElementsByTagName(s)[0];
    if (d.getElementById(id)) return;
    js = d.createElement(s); js.id = id;
    js.src = "//connect.facebook.net/en_US/sdk.js";
    fjs.parentNode.insertBefore(js, fjs);
  }(document, 'script', 'facebook-jssdk'));

  // Here we run a very simple test of the Graph API after login is
  // successful.  See statusChangeCallback() for when this call is made.
  function testAPI() {
    console.log('Welcome!  Fetching your information.... ');
    FB.api('/me', function(response) {
      console.log('Successful login for: ' + response.name);
      document.getElementById('status').innerHTML =
        'Thanks for logging in, ' + response.name + '!';
    });
  }
</script>
            