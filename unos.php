



 <?php
 include 'website.php';
style();
nav();

echo '
<div class="container">
<div class="row">
<div class="col-4"></div>
<div class="col-8"><form action="" name="unos" method="post" enctype="multipart/form-data">

<h3>Naslov</h3>
<input type="text" name="naslov" id="naslov" />
<span id="porukaNaslov"></span>
<br>
<br>
<br>
<h3>Opis</h3>
<textarea rows="4" cols="50" name="opis" id="opis"> </textarea>
<span id="porukaOpis"></span>
<br>
<br>
<h3>Sadrzaj</h3>
<textarea rows="4" cols="50" name="tekst" id="tekst"> </textarea>
<span id="porukaTekst"></span>
<br>
<br>
<h3>Slika</h3> 
<input type="file" id="slika" name="picture" /> 
<span id="porukaSlika"></span>
<br>

<h3>Kategorija</h3> 
<select name="kategorija" id="kategorija" size="2">
<option value="U.S">odaberi</option>
<option value="World">World</option>
<option value="U.S">U.S</option>
</select> 
<span id="porukaKategorija"></span>
<br>
<h3>Arhiva</h3>
<input type="checkbox" name="arhiva" value="check">
 <br>
 <button type="submit" name="submit" id="unos" value="unos" onclick="valid(event)" >
 unos</button>
</form></div>
</div></div>
<script type="text/javascript">


function valid(event) {
    
    var slanjeForme = true;
   
   
    var poljeTitle = document.getElementById("naslov");
    
    var title = document.getElementById("naslov").value;
    
    if (title.length < 5 || title.length > 30) {
    slanjeForme = false;
    poljeTitle.style.border="1px dashed red";
    document.getElementById("porukaNaslov").innerHTML="Naslov vjesti mora imati između 5 i 30 znakova!<br>";
    } else {
    poljeTitle.style.border="1px solid green";
    document.getElementById("porukaNaslov").innerHTML="";
    }
    
    
    var poljeAbout = document.getElementById("opis");
    var about = document.getElementById("opis").value;
    if (about.length < 10 || about.length > 100) {
    slanjeForme = false;
    poljeAbout.style.border="1px dashed red";
    document.getElementById("porukaOpis").innerHTML="Kratki sadržaj mora imati između 10 i 100 znakova!<br>";
    } else {
    poljeAbout.style.border="1px solid green";
    document.getElementById("porukaOpis").innerHTML="";
    }
    
    // Sadržaj mora biti unesen
    var poljeContent = document.getElementById("tekst");
    var content = document.getElementById("tekst").value;
    if (content.length == 0) {
    slanjeForme = false;
    poljeContent.style.border="1px dashed red";
    document.getElementById("porukaTekst").innerHTML="Sadržaj mora biti unesen!<br>";
    } else {
    poljeContent.style.border="1px solid green";
   
    document.getElementById("porukaTekst").innerHTML="";}
    
    var poljeSlika = document.getElementById("slika");
    var pphoto = document.getElementById("slika").value;
    if (pphoto.length == 0) {
    slanjeForme = false;
    poljeSlika.style.border="1px dashed red";
    document.getElementById("porukaSlika").innerHTML="Slika mora biti unesena!<br>";
    } else {
    poljeSlika.style.border="1px solid green";
    document.getElementById("porukaSlika").innerHTML="";
    }
   
    // Kategorija mora biti odabrana
    var poljeCategory = document.getElementById("kategorija");
    
    if(document.getElementById("kategorija").selectedIndex == 0) {
        alert(title);
    slanjeForme = false;
    poljeCategory.style.border="1px dashed red";
   document.getElementById("porukaKategorija").innerHTML="Kategorija mora biti odabrana!<br>";
   
} else {
    
    poljeCategory.style.border="1px solid green";
    document.getElementById("porukaKategorija").innerHTML="";
    }
    
    
    if (slanjeForme != true) {
        
        event.preventDefault();
        }
      
    };
   
</script>
';

footer();

    if(isset($_POST['submit'])){
        include 'connect.php';

        $ext = pathinfo($_FILES['picture']['name'], PATHINFO_EXTENSION);
        $naslov=$_POST['naslov'];
        $opis=$_POST['opis'];
        $tekst=$_POST['tekst'];
        $slika=$_FILES['picture']['name'].'.'.$ext;
        $kategorija=$_POST['kategorija'];
        $arhiva=isset($_POST['arhiva'])?1:0;
        $date=date('Y-m-d');
        
        

       $target = 'img/'.$slika;
       move_uploaded_file($_FILES['picture']['tmp_name'], $target);

        $sql = "insert into vijesti(naslov,tekst,opis,slika,kategorija,arhiva,datum) values('$naslov','$tekst','$opis','$slika','$kategorija',$arhiva,'$date');";
       echo $con->query($sql)?'uspjesno':'greska';

    }

 ?>
