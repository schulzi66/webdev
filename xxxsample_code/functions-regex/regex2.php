<?php
// match an email
  $emailRegex = '/^[a-z\._-]+@([a-z\d-
     ]+\.)+[a-z]{2,6}$/i' ;
  $input = 'jsmith01@gmail.com';
  if (preg_match($emailRegex,$input)) {
      echo 'Valid email';
   } else {
      echo 'Invalid email';
   }
?>