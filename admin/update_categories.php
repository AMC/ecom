<?php
  foreach ($_POST["product"] as $key=>$values) {
    $sql = "UPDATE PRODUCTS SET name='".$values['name']."', quantity=".$values['quantity'].", price=".$values['price'].", cost=".$values['cost']." WHERE id=".$key;
    $db->query( $sql );
    //echo ( $db->error );
    $_REQUEST['action'] = 'category_contents';
  }
?>
