<div class="container">
<div class="row">
	<div class="col-md-8">
          
          <h2>Daejeon Questions</h2>
          <div class="list-group">
            <?php foreach($daejeon_list as $r) {?>

              <a href=<?php echo base_url() . "question/show/$r->idquestion"; ?> class="list-group-item">
                <?php echo $r->title; ?>

              </a>
            <?php } ?>
          </div>
         
    </div>
    <div class="col-md-4">
          <h2 class="home_box">Top Questions</h2>
          <div class="list-group">
            <?php $i = 0; foreach($question_na_list  as $d): if (++$i == 4) break;?>

              <a href=<?php echo base_url() . "question/show/$d->idquestion"; ?> class="list-group-item"><?php echo $d->title; ?>

              </a>
            <?php endforeach; ?>
          </div>
           
           <hr>
           
           <h2 class="home_box">Not Answered</h2>
          <div class="list-group">
            <?php $i = 0; foreach($question_top_list  as $a): if (++$i == 4) break;?>

              <a href=<?php echo base_url() . "question/show/$a->idquestion"; ?> class="list-group-item"><?php echo $a->title; ?>

              </a>
            <?php endforeach; ?>
          </div>
           
           <hr>
    </div>
    </div>
<hr>

      