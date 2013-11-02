<html>
<head>
<title>Leafs Bingo</title>
<?php echo link_tag('css/style.css');?>
</head>
<body>
  <!-- <h1>Leafs Bingo</h1>
  <?php print_r($blocks);?> -->


<div class="container">
<header>
  <h1>Leafs Bingo</h1>
</header>
  <div class="grid">
    <div class="table">
    <?php for ($i=0; $i<5; $i++): ?>
      <div class="table-row">
      <?php for ($j=0; $j<5; $j++): ?>
        <div class="table-cell">
          Test
        </div>
      <?php endfor; ?>
      </div>
    <?php endfor; ?>
    </div>
  </div>
  <aside class="sidebar">Games</aside>
</div>


</body>
</html>