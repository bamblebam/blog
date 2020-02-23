<?php
   
    

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0 ">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Bam's blog</title>
    <link rel="stylesheet" href="./blog.css" type="text/css">
    
</head>
<body>
    <div class="heading">
        <header>Bam's blog</header>
    </div>

    
    <form action="blog.php" method="POST">
        <label for="name">Enter your name</label>
        <input type="text" name="name" id="name" value="" required maxlength="50" placeholder="NAME">
        <br><br>
        <label for="email">Enter your email id</label>
        <input type="email" id="email" name="email" value="" maxlength="50" placeholder="EMAIL ID">
        <br><br>
        <label for="subject">Write a comment down in the box</label>
        <br>
        <textarea id="subject" value="" rows="10" cols="40" placeholder="Write a comment!!!" name="subject"></textarea>
        <br>
        <input type="submit" name="submit" value="Submit">
        
    </form>
    <div class='table' href="comments">
        <br>
<?php
   $name=$_POST['name'];
   $email=$_POST['email'];
   $subject=$_POST['subject'];
   $con = @mysqli_connect ('localhost', 'root', '', 'comments')
   OR die("could not connect");
  if(isset($_POST['name'])){
    $query="INSERT INTO comments(name,email,subject) VALUES('$name','$email','$subject')";
  mysqli_query($con,$query);
  }
  
   $table="SELECT*FROM comments";
   $comres = mysqli_query($con, $table);
   
?>
<ol>
    
    <?php 
    while($comr = mysqli_fetch_assoc($comres)){
   echo "<li>";
   echo $comr['name'];
   echo " \n";
   echo $comr['subject'];
   echo " \n";
   echo "</li>";
   }
   ?>
    
</ol>
        <br>
    </div>
</body>
</html>