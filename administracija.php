<?php
include 'connect.php';
include 'website.php';

$query = "SELECT * FROM vijesti";
$result = mysqli_query($con, $query);
style();
nav();

session_start(); 
      
if(  $_SESSION['razina'] == 1)
{
echo '<div class="container">
<div class="row">
<div class="col-5"></div>
<div class="col-7">';

while($row = mysqli_fetch_array($result)) {  
 echo '<form enctype="multipart/form-data" action="" method="POST">
 <div class="form-item">
 <label for="title">Naslov vjesti:</label>
 <div class="form-field">
 <input type="text" name="title" class="form-field-textual" value="'.$row['naslov'].'" id="naslov'.$row['id'].'">
 <span id="porukaNaslov'.$row['id'].'" ></span>
 </div>
 </div>
 <div class="form-item">
 <label for="about">Kratki sadržaj vijesti (do 50
znakova):</label>
 <div class="form-field">
 <textarea name="about" id="opis'.$row['id'].'" cols="30" rows="10" class="formfield-textual">'.$row['opis'].'</textarea>
 <span id="porukaOpis'.$row['id'].'" ></span>
 </div>
 </div>
 <div class="form-item">
 <label for="content">Sadržaj vijesti:</label>
 <div class="form-field">
 <textarea name="content" id="tekst'.$row['id'].'" cols="30" rows="10" class="formfield-textual">'.$row['tekst'].'</textarea>
 <span id="porukaTekst'.$row['id'].'" ></span>
 </div>
 </div>
 <div class="form-item">
 <label for="pphoto">Slika:</label>
 <div class="form-field">
 <input type="file" class="input-text" id="slika'.$row['id'].'"value="'.$row['slika'].'" name="pphoto"/> <br><img src="' . UPLPATH .$row['slika'] . '" width=100px>
 <span id="porukaSlika'.$row['id'].'" ></span>
 </div>
 </div>
 <div class="form-item">
 <label for="category">Kategorija vijesti:</label>
 <div class="form-field">
 <select name="category" id="kategorija'.$row['id'].'" class="form-field-textual"
value="'.$row['kategorija'].'">
<option value="U.S">odaberi</option>
 <option value="U.S">U.S</option>
 <option value="World">World</option>
 </select>
 <span id="porukaKategorija'.$row['id'].'" ></span>
 </div>
 </div>
 <div class="form-item">
 <label>Spremiti u arhivu:
 <div class="form-field">';
 if($row['arhiva'] == 0) {
 echo '<input type="checkbox" name="archive" id="arhiva'.$row['id'].'"/>
Arhiviraj?';
 } else {
 echo '<input type="checkbox" name="archive" id="arhiva'.$row['id'].'"
checked/> Arhiviraj?';
 }
 echo '</div>
 </label>
 </div>
 
 <div class="form-item">
 <input type="hidden" name="id" class="form-field-textual"
value="'.$row['id'].'">
<input type="hidden" name="slika" class="form-field-textual" value="'.$row['slika'].'" >
 <button type="reset" value="Poništi">Poništi</button>
 <button type="submit" name="update" value="Prihvati" id ="'.$row['id'].'" onclick="validate(event)">
Izmjeni</button>
 <button type="submit" name="delete" value="Izbriši" id =delete'.$row['id'].'>
Izbriši</button>
 </div>
 </form>
 ';
 
}
echo'</div>
</div>
</div>
<script src="script.js"></script>
';
}
else echo 'Niste ulogirani kao administrator';

footer();

if(isset($_POST['delete'])){
    $id=$_POST['id'];
    $query = "DELETE FROM vijesti WHERE id=$id";
    $result = mysqli_query($con, $query);
    header('localhost/administracija.php');
   }

if(isset($_POST['update'])){
    $id=$_POST['id'];
    $picture;
    if($_FILES['pphoto']['name']!=''){$picture = $_FILES['pphoto']['name'];}
    else{ $picture = $_POST['slika'];}
    $title=$_POST['title'];
    $about=$_POST['about'];
    $content=$_POST['content'];
    $category=$_POST['category'];
    $date=date('Y-m-d');
    if(isset($_POST['archive'])){
     $archive=1;
    }else{
     $archive=0;
    }
    $dir = 'img/'.$picture;
    move_uploaded_file($_FILES["pphoto"]["tmp_name"], $dir);
    
    $query = "UPDATE vijesti SET naslov='$title', opis='$about', tekst='$content' , slika='$picture', kategorija='$category',datum='$date', arhiva=$archive WHERE id=$id";
    $result = mysqli_query($con, $query);
    if(!$result){printConnectionError();}
    
    }
    function printConnectionError(){
        echo("Error description: " . mysqli_error($GLOBALS['con']));
    }

 ?>