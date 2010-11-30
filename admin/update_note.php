<?php

if ( empty($note_name)) {
  $_SESSION['flash'][] = 'Unable to determine which note to update';
} else {
  $db->query("UPDATE notes SET note='$note' WHERE name='$note_name'");
  $_SESSION['flash'][] = 'Note updated';
}

header("Location: $return_url");

?>