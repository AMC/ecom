<?php 

# everything must be in a single php block otherwise the header re-direct will not work

$users = $db->query("SELECT id, email, first_name, last_name, zip_code, role FROM users WHERE email = '$email' AND password_hash = '$password_hash'"); 

if ($users->num_rows == 1) {
  $user = $users->fetch_array(MYSQLI_ASSOC);

  $_SESSION['user']['id'] = $user['id'];
  $_SESSION['user']['email'] = $user['email'];
  $_SESSION['user']['first_name'] = $user['first_name'];
  $_SESSION['user']['last_name'] = $user['last_name'];
  $_SESSION['user']['zip_code'] = $user['zip_code'];
  $_SESSION['user']['role'] = $user['role'];
  $_SESSION['logged_in'] = "TRUE";
  $_SESSION['flash'][] = "You have logged in";
  
} else {
  $_SESSION['flash'][] = "Invalid username or password";
}
  
  # sends the user back to where they logged in at 
  if ( isset($just_registered) && $just_registered == TRUE) {

    header("Location: index.php"); 
  } else {
    $referer = $_SERVER['HTTP_REFERER'];
    header("Location: $referer"); 
  }
?>
