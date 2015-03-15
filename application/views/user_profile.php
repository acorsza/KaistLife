<script type="text/javascript">


$(document).ready(function(){
	loadInfo();


	//while users type a new username the fixed username below de users img is changed.
	$('body').delegate('#username', 'keyup change', function(){
   		$('#fixedName').text(this.value);
	});

	//while users type a new username the fixed username below de users img is changed.
	$('body').delegate('#email', 'keyup change', function(){
   		$('#fixedEmail').text('(' + this.value + ')');
	});

});

//------------------------------------------------
function loadInfo()
//------------------------------------------------
{
	
	var username, email = '';

	<?php foreach($userinfo  as $r): ?>
	 	username = '<?php echo $r->username; ?>';
	 	email = '<?php echo $r->email; ?>';
	<?php endforeach; ?>


	$('#fixedName').html(username);
	$('#fixedEmail').html('(' + email + ')');

	$('#username').val(username);
	$('#email').val(email);

}


function validatePassword(){

		if($("#oldPassword").val() !== '' && $("#newPassword").val() !== ''){
			return true;
		}
	
	return false;
}


//------------------------------------------------
function save()
//------------------------------------------------
{
	_username = $("#username").val();
	_email    = $("#email").val();
	var save = true;
	//_country  = $("#country").val();

	var parameters = 'username=' + _username + '&' + 'email=' + _email;


	if(($('.change-password').css('display')) != 'none'){
		if(validatePassword()){
			_oldPassword = $("#oldPassword").val();
			_newPassword = $("#newPassword").val();

			parameters += '&' + 'oldPassword=' + _oldPassword + '&' + 'newPassword=' + _newPassword + '&' + 'alterPass=' + 'true';
		}
		else{
			save = false;
			alert('Incorrect Password!');
		}
	}

	

	if(save){
		$.ajax({
			type: 'post',
			data: parameters,
			url:'<?php echo base_url();?>user/save',
			success: function(retorno){
        		if(retorno == 'false'){
        			alert("Last Incorrect!");
        		}
        		else{
        			$("#success").css("opacity", 0);
        			$("#danger").css("opacity", 0);
        			$("#success").delay(50).animate({"opacity": "1"}, 700);
        		}
        	},
        	error: function(retorno){
        	$("#success").css("opacity", 0);
        	$("#danger").css("opacity", 0);
        	$("#danger").delay(50).animate({"opacity": "1"}, 700);
        	}
    	});
	}
}

function showPasswordFields(){
	if($('.change-password').css('display') == 'none'){
		$('.change-password').css('display', 'block');
	}
	else{
		$('.change-password').css('display', 'none');
	}
}


</script>

<div class="container">
<div class="row">
	<div class="col-md-8">
          
          <h2 id="fixedName"></h2>
          <div>
						<h5 id="fixedEmail"></h5>
						
					</div>

					<div class="user-info-pos">
						<input type="text" class="form-control replace-width" id="username" name="username" placeholder="Name"/>
						<input type="text" class="form-control replace-width" id="email" name="email" placeholder="Email" />
						<div class="alt-pass-usr-perf">
							<a href="#" onclick="showPasswordFields()">Alter Password</a> 
						</div>
						
						<div class="change-password">
							<input type="password" class="form-control replace-width" id="oldPassword" name="oldPassword" placeholder="Last Password"/>
							<input type="password" class="form-control replace-width" id="newPassword" name="newPassword" placeholder="New Password" />
						</div>
                                                

						<div class="cnt-bnt-save-cancel">
							<button type="button" class="btn bnt-save-user" onclick="save()">Save</button>
							<button type="button" class="btn bnt-cancel-user" onclick="location.href = '<?php echo base_url(); ?>'">Cancel</button>
						</div>
                                                <div id="success" class="alert alert-success msg-sucsess-user">
						<i class="glyphicon glyphicon-ok"></i>
						User's Informations have been saved!
					</div>
					<div id="danger" class="alert alert-danger msg-danger-user">
						<i class="glyphicon glyphicon-warning-sign"></i>
						User's Informations haven't been saved!
					</div>
                                                
					</div>

					
         
    </div>
    <div class="col-md-4">
          <h2 class="home_box">My Questions</h2>
          <div class="list-group">
            <?php $i = 0; foreach($my_question_list  as $r): if (++$i == 6) break;?>
				<a href=<?php echo base_url() . "question/show/$r->idquestion"; ?> class="list-group-item"><?php echo $r->title; ?>
				</a>
			<?php endforeach; $i = 0; ?>
          </div>
    </div>
    </div>
<hr>

      