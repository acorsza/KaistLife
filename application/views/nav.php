<body onload="main()">
    <script>
        function validateFormLogin() {
            var x = document.forms["login"]["email","password"].value;
            if (x===null || x==="") {
                alert("Email and/or passoword cannot be empty");
                return false;
            }
        }
    </script>
    

    <div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
      <div class="container">
        <div class="navbar-header">
          <a class="navbar-brand logo" href="<?php echo base_url(); ?>home"><?php echo $title; ?></a>
        </div>
        <?php if($username == null) {?>
        <div class="navbar-collapse collapse">
          <?php echo validation_errors(); ?>
          <form onsubmit="return validateFormLogin()" class="navbar-form navbar-right" name="login" role="form" action="<?php echo base_url(); ?>user/verify_login" method="post">
            <div class="form-group">
              <input type="text" placeholder="Email" class="form-control" name="email">
            </div>
            <div class="form-group">
              <input type="password" placeholder="Password" class="form-control" name="password">
            </div>
            <button type="submit" class="btn btn-success">Sign in</button>
          </form>
        </div><!--/.navbar-collapse -->
        <?php } else { ?>
          <div class="navbar-form navbar-right">
            <a class="btn btn-info" href="<?php echo base_url(); ?>question">Create a question</a>
            <a class="btn btn-info" href="<?php echo base_url(); ?>question/all_my">My Topics</a>
            <a class="btn btn-info" href="<?php echo base_url(); ?>user/show">My Profile</a>
            <a class="btn btn-danger" href="<?php echo base_url(); ?>user/logout">Logout</a>
          </div>

        <?php } ?>
      </div>
        
       
        
        
    </div>