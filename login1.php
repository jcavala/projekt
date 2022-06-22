

<?php
include 'connect.php';
include 'website.php';
style();
nav();
echo '<div class="container">
<div class="row">
<div class="col-5"></div>
<div class="col-3">';
echo'<form action="" method="post">
    
<br>
Korisničko ime
<input type="text" name="username" />
<br>
Lozinka
<input type="password" name="password" />
<br>
<input type="submit" name="submit" value="prijava" />  
</form>
<br> 
<div style="border:solid black 2px";>
<p style="color:red;"> Niste registrirani?</p>

<button class="btn btn-secondary">
      <a href="register.php"> registracija</a>
      </button>
  </div>
';
echo'</div>
<div class="col-4">
</div
</div>
</div>';
footer();
$con = $GLOBALS['con'];

if(isset($_POST['submit'])){

$uname=$_POST['username'];
$pass=$_POST['password'];

$sql = "SELECT username,lozinka,razina FROM korisnik WHERE username = ?";

$stmt=mysqli_stmt_init($con);

if (mysqli_stmt_prepare($stmt, $sql)){
  mysqli_stmt_bind_param($stmt,'s',$uname);
  mysqli_stmt_execute($stmt);
  mysqli_stmt_store_result($stmt);
}  else echo mysqli_error($con);
$a;
$b;
$c;

mysqli_stmt_bind_result($stmt, $a, $b,$c);
mysqli_stmt_fetch($stmt); 

    
    if($a==$uname){
    if(password_verify($pass,$b)){
      echo'Dobrodosli '.$a;
     if($c==1){
      session_start(); 
      
      $_SESSION['razina'] = 1;

      echo'
      <button class="btn btn-primary" type="submit">
      <a href="unos.php"> Unos nove vijesti</a>
      </button>
      <br>
      <p> Vi ste administrator <p>
      ' ;
     }
    }
    else echo'neuspjesna prijava';
  }
  }
$con->close();
?>