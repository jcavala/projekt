
<?php
include 'registracija.html';

if(isset($_POST['submit'])){
include 'connect.php';
$con = $GLOBALS['con'];
$ime = $_POST['ime'];
$prezime = $_POST['prezime'];
$username = $_POST['username'];
$lozinka = $_POST['pass'];
$hashed_password = password_hash($lozinka, CRYPT_BLOWFISH);
$razina = 1;
$registriranKorisnik = '';

$sql = "SELECT * FROM korisnik WHERE username = ?";
$stmt = mysqli_stmt_init($con);
echo mysqli_stmt_error($stmt);
if (mysqli_stmt_prepare($stmt, $sql)) {
 mysqli_stmt_bind_param($stmt, 's', $username);
 mysqli_stmt_execute($stmt);
 mysqli_stmt_store_result($stmt);
 }
 else echo mysqli_error($con);
 
if(mysqli_stmt_num_rows($stmt) > 0){
 echo 'Korisničko ime već postoji!';
}else{
 $sql = "INSERT INTO korisnik (ime, prezime,username, lozinka,razina)VALUES (?, ?, ?, ?, ?)";
 $stmt = mysqli_stmt_init($con);
 if (mysqli_stmt_prepare($stmt, $sql)) {
 mysqli_stmt_bind_param($stmt, 'ssssd', $ime, $prezime, $username,$hashed_password, $razina);
 mysqli_stmt_execute($stmt);
 $registriranKorisnik = true;
 }
}
mysqli_close($con);

if($registriranKorisnik == true) {
  echo '<p>Korisnik je uspješno registriran!</p>';
  } else {
  echo '<p> Neuspješna registriracija!</p>';
 }
}
 ?>