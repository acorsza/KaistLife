<script type="text/javascript">

    var _idQuestion = '';

    function rateAnswer($this)
    {
        //alert($this);
        //var idquestion = ($this.id).substr(7, ($this.id).length);
        //var clas     = ".point_" + idreply;

        $.ajax({
            url: '<?php echo base_url(); ?>question/up/'.concat($this),
            success: function() {
                window.location.reload(true);
            }
        });
    }

</script>

<div id="fb-root"></div>
<script>(function(d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id))
            return;
        js = d.createElement(s);
        js.id = id;
        js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&appId=808693475807369&version=v2.0";
        fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));</script>

<div class="container">
    <div class="row">
        <div class="col-md-8">

<?php foreach ($question as $q) { ?>



                <?php
                echo "<h2>" . $q->title . "</h2>";
                echo "<p>" . $q->description . "</p>";
                
            }
            ?>
            <div>
                <?php
                foreach ($user as $u) {
                    $timestamp = strtotime($q->created_at);
                    echo "<p class=\"user_answer\">" . $u->username . " asked on " . date('l jS \of F Y h:i:s A', $timestamp) . "</p>";
                    echo "<div class=\"navbar-right\">";
                    echo "<a class=\"btn btn-danger btn-xs\" href=" . base_url() . "question/report_question/" . $q->idquestion . ">Report</a>";
                    echo "</div>";
                    echo "<br>";
                }
                ?>
                
            </div>
            <div class="fb-share-button" data-href=<?php echo base_url() . "question/show/$q->idquestion"; ?> data-type="button"></div>
<?php if ($reply) { ?>
                <hr>

                <h4 class="reply"><?php echo $replies; ?></h4>

                <?php $x = 0;
                foreach ($reply as $r) {
                    ?>

                    <hr>
                    <?php
                    echo "<p class=\"user_answer\">" . $r->username . " answered this question on " . date('l jS \of F Y h:i:s A', $timestamp) . "</p>";
                    if ($x == 0) {
                        echo "<div class=\"navbar-form navbar-left\">  <span class=\"glyphicon glyphicon-fire yellow\"></span></div>";
                    }
                    ?>
                    <div class="navbar-form navbar-right my_bar">
                        <a class="btn btn-success" onclick="rateAnswer(<?php echo $r->idreply; ?>)" href="#">
                            <i class="glyphicon glyphicon-ok-sign"></i>
                            <?php echo " " . $r->point;
                            ?></a>
                        <a class="btn btn-danger btn-xs" href="<?php echo base_url(); ?>">Report</a>
                                            


                    </div>
                    <?php
                    
                    
                    
                    ?>
                    <div class="text-justify text_answer <?php if ($x++ == 0) { echo "answer_first"; }?> ">
                    <?php echo "<p>" . $r->description . "</p>"; ?>
                    </div>
                    <?php
                    
                    echo "<br />";
                    ?>
                    
                    <?php
                }
            }
            ?>
            
            <hr>
            <h4><?php echo $answer_question; ?></h4>

            <form action="<?php echo base_url(); ?>question/answer" method="post">
                <div class="form-group">
                    <textarea rows="7" class="form-control" placeholder="Description" name="description" required></textarea>
                </div>
                <input type="hidden" name="idquestion" value="<?php echo $q->idquestion; ?>">
                <div class="navbar-right">
                    <button type="submit" class="btn btn-success" name="submit">Answer question &raquo;</button>
                </div>



            </form>
            

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

