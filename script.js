 function validate(event) {


 var id = event.target.id;
 var slanjeForme = true;

 // Naslov vjesti (5-30 znakova)
 var poljeTitle = document.getElementById("naslov"+id);
 var title = document.getElementById("naslov"+id).value;
 if (title.length < 5 || title.length > 30) {
 slanjeForme = false;
 poljeTitle.style.border="1px dashed red";
 document.getElementById("porukaNaslov"+id).innerHTML="Naslov vjesti mora imati između 5 i 30 znakova!<br>";
 } else {
 poljeTitle.style.border="1px solid green";
 document.getElementById("porukaNaslov"+id).innerHTML="";
 }

 
 var poljeAbout = document.getElementById("opis"+id);
 var about = document.getElementById("opis"+id).value;
 if (about.length < 10 || about.length > 100) {
 slanjeForme = false;
 poljeAbout.style.border="1px dashed red";
 document.getElementById("porukaOpis"+id).innerHTML="Kratki sadržaj mora imati između 10 i 100 znakova!<br>";
 } else {
 poljeAbout.style.border="1px solid green";
 document.getElementById("porukaOpis"+id).innerHTML="";
 }
 // Sadržaj mora biti unesen
 var poljeContent = document.getElementById("tekst"+id);
 var content = document.getElementById("tekst"+id).value;
 if (content.length == 0) {
 slanjeForme = false;
 poljeContent.style.border="1px dashed red";
 document.getElementById("porukaTekst"+id).innerHTML="Sadržaj mora biti unesen!<br>";
 } else {
 poljeContent.style.border="1px solid green";
10
 document.getElementById("porukaTekst"+id).innerHTML="";}
 
 var poljeSlika = document.getElementById("slika"+id);
 var pphoto = document.getElementById("slika"+id).value;
 if (pphoto.length == 0) {
 slanjeForme = false;
 poljeSlika.style.border="1px dashed red";
 document.getElementById("porukaSlika"+id).innerHTML="Slika mora biti unesena!<br>";
 } else {
 poljeSlika.style.border="1px solid green";
 document.getElementById("porukaSlika"+id).innerHTML="";
 }
 // Kategorija mora biti odabrana
 var poljeCategory = document.getElementById("kategorija"+id);
 if(document.getElementById("kategorija"+id).selectedIndex == 0) {
 slanjeForme = false;
 poljeCategory.style.border="1px dashed red";

document.getElementById("porukaKategorija"+id).innerHTML="Kategorija mora biti odabrana!<br>";
 } else {
 poljeCategory.style.border="1px solid green";
 document.getElementById("porukaKategorija"+id).innerHTML="";
 }

 if (slanjeForme != true) {
 event.preventDefault();
 }

 };


 function validate1(event) {
    alert('activated');
    var slanjeForme = true;
   
    // Naslov vjesti (5-30 znakova)
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
   10
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
