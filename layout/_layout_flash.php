<?php if ($_SESSION['flash']) { echo "<div id='flash' class='flash'>"; } ?>
  <?php foreach ($_SESSION['flash'] as $message) { ?>
    <?php echo "$message <br />"; } ?>
    <?php #print_r($_SESSION); ?>
<?php if ($_SESSION['flash']) { echo "</div"; } ?>
<?php $_SESSION['flash'] = array(); ?>