<script>
    function validateForm() {
        var x = document.forms["create_question"]["title","category"].value;
        if (x===null || x==="") {
            alert("You must fill at least Title and Category");
            return false;
        }
    }
</script>


<div class="container">
<div class="row">
	<div class="col-md-8">
          <h2><?php echo $create_question; ?></h2>

          <form name="create_question" onsubmit="return validateForm()" action="question/create" method="post">
            <div class="form-group">
              <input type="text" class="form-control" placeholder="Title" name="title" required>
            </div>

            <div class="form-group">
              <textarea rows="12" class="form-control" placeholder="Description" name="description"></textarea>
            </div>

            <div class="form-group">
              <select class="form-control" name="category" required>
                  <option value=<?php echo ""; ?>>Select a category:</option>
                  <?php foreach($categories  as $r): ?>
                    <option value=<?php echo "\"$r->idcategory\""?>>
                      <?php echo $r->title; ?>
                    </option>
                  <?php endforeach; ?>
              </select>
            </div>
              <div class="navbar-right">
                    <button type="submit" class="btn btn-success" name="submit">Create question &raquo;</button>
                </div>

          	
          </form>
    </div>
    <div class="col-md-4">
          <h2>My questions</h2>
            <div class="list-group">
            <?php $i = 0; foreach($my_question_list  as $r): if (++$i == 6) break;?>

              <a href=<?php echo base_url() . "question/show/$r->idquestion"; ?> class="list-group-item"><?php echo $r->title; ?>

              </a>
            <?php endforeach; $i = 0; ?>
          </div>
          </div>
    </div>
<hr>

      