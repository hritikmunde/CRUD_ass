<?php
    $name = $_POST['name'];
    $email = $_POST['email'];
    $bookname = $_POST['bookname'];
    $mobile = $_POST['mobile'];
    
    if (strlen($name) <= 3) {
        $name_error = 'Name must contain more than 3 character';
    }
    
    if (!preg_match("/^[7-9]{1}[0-9]{9}$/i", $mobile)) {
        $mobile_error = "Please enter a valid phone number";
    }
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $email_error = "Invalid email format";
    }
    if (strlen($bookname) <= 3) {
        $bookname_error = 'Book name must contain more than 3 character';
    }
    
    if((strlen($name) <= 3) OR (!preg_match("/^[7-9]{1}[0-9]{9}$/i", $mobile)) OR
     (!filter_var($email, FILTER_VALIDATE_EMAIL)) OR (strlen($bookname) <= 3)){
        echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
    <strong>ERROR!</strong> Something went wrong
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
    </button>
    </div>'; 
        include('index.php');
    }
    else{
        include('insert.php');
    }

