<?php
session_start();
if(isset($_SESSION['user_id'])){
  header("location:index.php");
}else{
include("config.php");
?>

<!doctype html>
<html lang="en">
  <head>
    <title>Registration</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  </head>
  <body>

        <div class="container">
            <form action="siginup.php" method="post">
                <div class="form-group">
                  <label for="">Name</label>
                  <input type="text"class="form-control" name="name" id="" aria-describedby="helpId" placeholder="">
                
                </div>

                <div class="form-group">
                  <label for="">Email</label>
                  <input type="text"class="form-control" name="email" id="" aria-describedby="helpId" placeholder="">
                
                </div>

                <div class="form-group">
                  <label for="">Password</label>
                  <input type="text"class="form-control" name="password" id="" aria-describedby="helpId" placeholder="">
                
                </div>

                <div class="form-group">
                  <label for="">Contact Number</label>
                  <input type="text"class="form-control" name="phone" id="" aria-describedby="helpId" placeholder="">
                
                </div>

                <input type="submit" value="submit" name="submit" class="btn btn-primary">
            </form>
        </div>
      
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>

<?php

if(isset($_POST['submit'])){

    $name=$_POST['name'];
    $email=$_POST['email'];
    $password=$_POST['password'];
    $phone=$_POST['phone'];


    $check= $con->query("SELECT `email` FROM `user` WHERE `email`='$email'");
    //    $fetch = mysqli_fetch_array($check);
        $count=mysqli_num_rows($check);
    
        if($count > 0){
            ?>
    <script>
    alert("Email already exist");
    </script>
            <?php
        }else{
    $insert = $con->query("INSERT INTO `user`(`name`, `email`, `password`, `phone`) VALUES ('$name','$email','$password','$phone')");

 
    if($insert){
        header("location:signin.php");
    }else{
?>
<script>
alert("Error");
</script>
<?php
    }

}
}
}

?>