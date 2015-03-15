

<!-- Main jumbotron for a primary marketing message or call to action -->
     <?php 
    $i = 0;        

    ?>
    <div class="home" id="get_height">
    <div class="jumbotron">
      <div class="container">
          
            <!-- SEARCH FIELD -->
         
          <form action="<?php echo base_url()?>search/result" method="POST">
            <div class="input-group input-group-lg search">
          	<input type="text" id="inputsearch" name="filter" class="form-control" placeholder="Search">
          	<span class="input-group-btn">
             <button class="btn btn-default" type="submit">Go!</button>
            </div>
          </form>
          
          
        <h1 class="welcome"><?php echo $welcome; ?></h1>
        <p class="home_slogan"><?php echo $slogan; ?></p>
      </div>
    </div>

    <div class="container">
      <!-- Example row of columns -->
      
      <div class="row home_row">
          
          <!-- LOGIN COLUMN -->
          
      <?php if($username == null) {?>
        <div class="col-md-4">
          <h2 class="home_box"><?php echo $create_account; ?></h2>

          <form name="create_account" action="user/create" method="post">
            <div class="form-group">
              <input type="text" class="form-control" placeholder="Username" name="username">
            </div>

            <div class="form-group">  
              <input type="email" class="form-control" placeholder="Email" name="email">
            </div>

            <div class="form-group">
              <input type="password" class="form-control" placeholder="Password" name="password">
            </div>
              <button type="submit" class="btn btn-success btn-block" name="submit"><span class="btn-text">Create user</span></button>
          
          </form>
        </div>


        <?php } else { ?>
          
          <!-- MY QUESTIONS COLUMN -->
          
        <div class="col-md-4">
          <h2 class="home_box">My questions</h2>
            <div class="list-group">
            <?php foreach($my_question_list  as $r): if (++$i == 6) break;?>

              <a href=<?php echo base_url() . "question/show/$r->idquestion"; ?> class="list-group-item"><?php echo $r->title; ?>

              </a>
            <?php endforeach; $i = 0; ?>
          </div>
          <p><a class="btn btn-info btn-block" href="question/all_my" role="button"><span class="btn-text">My Questions</span></a></p>
        </div>

<?php } ?>
        <div class="col-md-4">
          <h2 class="home_box"><?php echo $last_questions; ?></h2>
          <div class="list-group">
            <?php foreach($question_top_list  as $r): if (++$i == 6) break;?>

              <a href=<?php echo base_url() . "question/show/$r->idquestion"; ?> class="list-group-item"><?php echo $r->title; ?>

              </a>
            <?php endforeach; $i = 0;?>
          </div>
          <p><a class="btn btn-info btn-block" href="question/all_top" role="button"><span class="btn-text">See more on this category</span></a></p>
       </div>
        <div class="col-md-4">
          <h2 class="home_box"><?php echo $no_answer; ?></h2>
          <div class="list-group">
            <?php foreach($question_na_list  as $r): if (++$i == 6) break;?>

              <a href=<?php echo base_url() . "question/show/$r->idquestion"; ?> class="list-group-item"><?php echo $r->title; ?>

              </a>
            <?php endforeach; $i = 0;?>
          </div>
          <p><a class="btn btn-info btn-block" href="question/all_na" role="button"><span class="btn-text">See more on this category</span></a></p>
        </div>
      </div>
      <?php if($username != null) {?>
      <hr>
      <div class="row home_row">
          
          <!-- DAEJEON QUESTIONS -->
          
          <div class="col-md-4">
          <h2 class="home_box">Daejeon Questions</h2>
          <div class="list-group">
            <?php foreach($daejeon_list  as $d): if (++$i == 8) break;?>

              <a href=<?php echo base_url() . "question/show/$d->idquestion"; ?> class="list-group-item"><?php echo $d->title; ?>

              </a>
            <?php endforeach; $i = 0;?>
          </div>
          <p><a class="btn btn-warning btn-block" href="question/all_daejeon" role="button"><span class="btn-text">All Daejeon questions</span></a></p>
        </div>
          
          <!-- ACADEMIC QUESTIONS -->
          
          <div class="col-md-4">
          <h2 class="home_box">Academic Questions</h2>
          <div class="list-group">
            <?php foreach($academic_list  as $a): if (++$i == 8) break;?>

              <a href=<?php echo base_url() . "question/show/$a->idquestion"; ?> class="list-group-item"><?php echo $a->title; ?>

              </a>
            <?php endforeach; $i = 0;?>
          </div>
          <p><a class="btn btn-warning btn-block" href="question/all_academic" role="button"><span class="btn-text">All Academic questions</span></a></p>
        </div>
          
          <!-- CAMPUS QUESTIONS -->
          
          <div class="col-md-4">
          <h2 class="home_box">Campus Questions</h2>
          <div class="list-group">
            <?php foreach($campus_list  as $c): if (++$i == 8) break;?>

              <a href=<?php echo base_url() . "question/show/$c->idquestion"; ?> class="list-group-item"><?php echo $c->title; ?>

              </a>
            <?php endforeach; $i = 0;?>
          </div>
          <p><a class="btn btn-warning btn-block" href="question/all_campus" role="button"><span class="btn-text">All Campus questions</span></a></p>
        </div>
      
                </div>
<?php } ?>
    

      <hr>