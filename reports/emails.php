
<h3> Newsletter Opt Ins</h3>
<table>
  <th>EMAIL</th>
  
  <?php $emails = $db->query("SELECT DISTINCT(email) FROM cart WHERE email_opt_in = 1"); ?>
  <?php while ($email = $emails->fetch_array(MYSQL_ASSOC)) { ?>
  <tr>
    <td>  
      <?php echo $email['email']; ?>
    </td>
  </tr>
<?php } ?>

</table>


