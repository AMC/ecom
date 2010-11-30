<?php $result = $db->query("SELECT DISTINCT(category) FROM products"); ?>

<div class='categories'>
  <div class='list_header'>
    CATAGORIES
  </div>
<?php while ($row = $result->fetch_array(MYSQLI_ASSOC)) { ?>
  
  <a href='catalog.php?action=index&category=<?php echo str_replace(" ", "_", $row['category']); ?>' >
    <?php echo $row['category']; ?>
  </a><br />
<?php }?>
</div>