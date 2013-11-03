<html>
<head>
<title><?php echo $current_game['opponent'];?> vs Leafs - Bingo</title>
<?php echo link_tag('css/style.css');?>
<!--[if gte IE 9]>
  <style type="text/css">
    .gradient {
       filter: none;
    }
  </style>
<![endif]-->
</head>
<body>

<div class="container">
<header>
  <h1>Leafs Bingo</h1>
  <h2><img src="<?php echo $teams[$current_game['opponent']]['logo'];?>" class="game_logo"> <?php echo $current_game['opponent'];?> on <?php echo $current_game['nicer_start_date'];?></h2>
</header>
  <div class="grid">
    <div class="table">
      <?php foreach ($blocks as $row): ?>
      <div class="table-row">
        <?php foreach ($row as $block): ?>
        <div class="table-cell<?php if ($block['hit']) echo ' hit';?>" title="<?php echo $block['details'];?>">
          <?php echo $block['suggestion'];?>
          <?php if ($admin):?>
          <div>
            <label for="hit<?php echo $block['id'];?>" data-hid="<?php echo $block['id'];?>">
              <input type="checkbox" id="hit<?php echo $block['id'];?>" name="hit<?php echo $block['id'];?>"<?php if ($block['hit']):?> checked="true"<?php endif;?>>
              Hit
            </label>
            <label for="bingo<?php echo $block['id'];?>" data-bid="<?php echo $block['id'];?>">
              <input type="checkbox" id="bingo<?php echo $block['id'];?>" name="bingo<?php echo $block['id'];?>"<?php if ($block['bingo']):?> checked="true"<?php endif;?>>
              Bingo
            </label>
          </div>
          <?php endif; ?>
        </div>
        <?php endforeach; ?>
      </div>
      <?php endforeach; ?>
    </div>
  </div>
  <aside class="sidebar">
    Games
    <ul class="games">
    <?php foreach ($games as $game): ?>
      <li class="game">
        <img src="<?php echo $teams[$game['opponent']]['logo'];?>" class="game_logo">
        <div class="game-details">
          <a href="<?php echo base_url(); ?>index.php/<?php echo $game['id'];?>"><?php echo $game['opponent'];?></a>
          <div class="start-time"><?php echo $game['nice_start_date'].' at '.$game['nice_start_time'];?></div>
        </div>
      </li>
    <?php endforeach;?>
    </ul>
  </aside>
  <footer>
    The original <a href="http://www.youtube.com/watch?v=PPRJDh7j2VM">Leafs Bingo</a> was by <a href="http://stevedangle.com">SteveDangle.com</a>.
  </footer>
</div>

<?php if ($admin): ?>
<script src="http://code.jquery.com/jquery-1.10.1.min.js"></script>
<script>
$('label[for^=hit]').click(function(){
  var data = {
    id: $(this).attr('data-hid'),
    hit: $(this).find('input').is(':checked')
  };
  console.log(data);
  // $.post("play/save/", function( data ) {
  //   $( ".result" ).html( data );
  // });
});
</script>
<?php endif; ?>
</body>
</html>