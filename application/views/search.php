<script type="text/javascript">

$(document).ready(function() {
  showResultDaejeonHub();

});

//Ruan @ 29/05/2014 - Makes a consult on database to select topics where title ou content presents the typed filter.
//----------------------------------------------------------------------------------
function showResultDaejeonHub()
//----------------------------------------------------------------------------------
{
  var title, description, idquestion, resultElement  = '';
  <?php if($list != null && $list != ""){ ?>
        <?php foreach($list  as $c){ ?>;
            
          //Remove formatting to prevent error undertermined literal string
          <?php $desc  = str_replace(array("\n","\r"), "", $c->description); ?>
              
          idquestion     = <?php echo "\"$c->idquestion\""; ?>;
          title       = <?php echo "\"$c->title\""; ?>;
          description = <?php echo "\"$desc\""; ?>; 

          resultElement += '<a href="<?php echo base_url();?>question/show/' + idquestion + '" class="list-group-item">';
          resultElement += '<h4 class="list-group-item-heading">' + title + '</h4>';
          resultElement += '<p class="list-group-item-text">' + description + '</p>';
          resultElement += '<p class="list-group-item-text">...</p></a>';

          $('#resultDaejeonHub').append( resultElement );
          resultElement = '';

        <?php 
        }
      }
      else{
      ?>;
        $('.no-result-daej').append('Sorry, no results found...');
      <?php } ?>
}
</script>

    <!-- Dajeon Hub results -->
    <div class="container"> 
    <div class="row">
        
            <h3>Dajeon Hub Results</h3>        
            <hr/>
            <div class="list-group" ></div>

        <div class="col-md-8">
        <div class="list-group">
          <div class="list-group" id="resultDaejeonHub"></div>
        </div>
        
        </div>
            <div class="col-md-4">
          <h2>Tips</h2>

          <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras condimentum orci quis sapien interdum, nec tincidunt diam adipiscing. Fusce lorem leo, dapibus et urna in, auctor porta tellus. Maecenas sit amet diam id arcu feugiat egestas quis id enim. Morbi malesuada diam sit amet libero vestibulum imperdiet. Phasellus purus mauris, egestas porta risus quis, aliquam fringilla nisl. Quisque consequat id leo id euismod. Nunc egestas turpis rhoncus ligula ultricies, vel sagittis purus vulputate. Donec eu elit congue metus pharetra pulvinar. Proin porttitor convallis odio, eget ullamcorper elit aliquam at. Etiam sed nisi orci. Fusce tempus pellentesque dui eget euismod. Praesent tristique in nisl eu elementum. Donec ipsum sapien, imperdiet eu justo ut, dictum luctus augue. Donec neque nisi, varius eu metus eu, dapibus dignissim nulla. Morbi ultrices commodo felis id tincidunt. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas.

Interdum et malesuada fames ac ante ipsum primis in faucibus. Donec feugiat metus quis libero elementum tincidunt sit amet sit amet orci. Ut hendrerit turpis ut est auctor, placerat rhoncus turpis consequat. Sed posuere a tellus sit amet ultrices. Morbi a diam quis nulla viverra porttitor in sed nisi. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Donec nec ipsum sit amet enim porttitor aliquam. Cras varius elementum nibh, sed laoreet ipsum congue et. Etiam accumsan risus at leo vestibulum bibendum. Aenean ut tortor ut risus fringilla bibendum. Duis imperdiet nisi id erat aliquam hendrerit. Nullam eu nibh vel massa varius vehicula. Nunc id semper purus, non euismod arcu. Aliquam pellentesque consequat dui, a ultrices mauris placerat nec. Morbi tincidunt orci ut tellus egestas, eget cursus nisi blandit.

Curabitur laoreet at nunc nec laoreet. Donec gravida egestas velit, eu lobortis quam eleifend non. Curabitur fringilla non metus a fermentum. Pellentesque condimentum augue sem, volutpat pharetra ipsum fringilla eget. Vivamus ac nunc pharetra, blandit justo in, faucibus massa. Vivamus vehicula nulla at erat faucibus fermentum. Aenean vitae euismod mauris. Sed in sem sodales, porttitor arcu ac, rhoncus nisl. Donec in leo venenatis nibh elementum auctor vitae non dui. Donec vitae faucibus ante. Donec placerat cursus laoreet.

Sed rhoncus, metus sed malesuada accumsan, erat ligula convallis nunc, eu gravida ipsum mauris vitae sem. Donec at odio hendrerit, imperdiet ipsum sit amet, consectetur felis. Vivamus eu pellentesque lorem, et facilisis metus. Nullam ut sapien vitae quam laoreet lobortis a vel lacus. Vestibulum sollicitudin nisi eu lectus condimentum tempus at id velit. Morbi tempor erat at turpis lacinia accumsan. In dignissim sagittis egestas. Praesent imperdiet leo leo, sit amet sollicitudin augue porta at. Etiam sodales sollicitudin turpis. In eget dapibus enim, vitae vestibulum enim. Nulla consequat fermentum arcu at luctus. Integer eget nisl bibendum, mollis dui in, posuere urna. Mauris eu mi tristique, pharetra ligula sed, tempor velit. Etiam luctus, erat vitae fringilla tristique, neque augue euismod enim, eget rutrum massa turpis at risus. Nulla consectetur nisl augue, non malesuada sem pellentesque eget. Donec leo massa, aliquam a justo nec, lacinia eleifend eros.

Praesent tincidunt laoreet molestie. Nullam feugiat quam tristique neque lobortis porta. Pellentesque euismod adipiscing laoreet. Donec non dolor ac sem adipiscing eleifend eget at elit. Fusce lobortis vel orci eget convallis. Etiam mattis dignissim erat, ut varius mi suscipit dictum. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec vestibulum tincidunt sagittis. Quisque quis rutrum lorem. Nunc malesuada nisl id magna cursus dapibus. Mauris eget odio dictum, vulputate felis et, ornare magna. Mauris dignissim arcu eget massa elementum placerat. Proin imperdiet nisl ipsum, gravida rhoncus quam fringilla in. Donec tristique, augue a feugiat feugiat, nunc felis iaculis felis, a mollis ligula est euismod orci. Vivamus sed justo fermentum, viverra ipsum sit amet, luctus eros.</p>
    </div>
    </div>
        <hr>