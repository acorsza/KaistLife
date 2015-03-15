<div class="container">
<div class="row">
	<div class="col-md-8">
          
          <h2><?php echo $last_questions; ?></h2>
          <div class="list-group">
            <?php foreach($question_top_list as $r) {?>

              <a href=<?php echo base_url() . "question/show/$r->idquestion"; ?> class="list-group-item">
                <?php echo $r->title; 
                    $timestamp = strtotime($r->created_at);
                echo "<p class=\"user_answer\">" . date('l jS \of F Y h:i:s A', $timestamp) . "</p>";
                
                ?>

              </a>
            <?php } ?>
          </div>
         
    </div>
    <div class="col-md-4">
          <h2 class="home_box">Daejeon Questions</h2>
          <div class="list-group">
            <?php $i = 0; foreach($daejeon_list  as $d): if (++$i == 4) break;?>

              <a href=<?php echo base_url() . "question/show/$d->idquestion"; ?> class="list-group-item"><?php echo $d->title; ?>

              </a>
            <?php endforeach; ?>
          </div>
           
           <hr>
           
           <h2 class="home_box">Academic Questions</h2>
          <div class="list-group">
            <?php $i = 0; foreach($academic_list  as $a): if (++$i == 4) break;?>

              <a href=<?php echo base_url() . "question/show/$a->idquestion"; ?> class="list-group-item"><?php echo $a->title; ?>

              </a>
            <?php endforeach; ?>
          </div>
           
           <hr>
           
           <h2 class="home_box">Campus Questions</h2>
          <div class="list-group">
            <?php $i = 0; foreach($campus_list  as $c): if (++$i == 4) break;?>

              <a href=<?php echo base_url() . "question/show/$c->idquestion"; ?> class="list-group-item"><?php echo $c->title; ?>

              </a>
            <?php endforeach; ?>
          </div>
    </div>
    </div>
<hr>

      