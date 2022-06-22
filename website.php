<?php
$result;

function style(){
    echo '
    <!doctype html>
    <html lang="en">
      <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Newsweek</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
      <style>
        .navigation{
            background-color: red;
            color: white;
            
        }
        .naslov{
            font-size: 60px;
            font-family: Georgia, "Times New Roman", Times, serif;
            font-weight:bolder;
        }
        .img{
            height: 190px;
            width: 200px;
        }
        .image{height: 500px;width:150%;}
        a, a:link, a:visited{text-decoration: none; color:black; font-weight:bolder;}
        body{font-family:Arial;}
        .black{color:black;}
        #footer {
            position:relative;
            bottom: 0px;
            width:100%;
            height:20px;   /* Height of the footer */   
         }
         span{color:red;}
         main{height:auto;}
      </style>
    </head>
      <body>
    ';
}

 function nav(){
    echo'
<header>
    <div class="navigation">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-5 ">'.date('d.m.y').'</div>
            <div class="col-lg-6 naslov">Newsweek</div>
            <div class="col-lg-1 "><a href="login1.php">login</a></div>
        </div>
    </div>
</div>
<div class="container">
    <div class="row black">
        <div class="col"><a href="index.php">Home</a></div>
        <div class="col"><a href="Kategorija.php?id=U.S">U.S.</a></div>
        <div class="col"><a href="Kategorija.php?id=World">World</a></div>
        <div class="col"><a href="administracija.php">Administracija</a></div>
        <div class="col"></div>
    </div>
</div>
</header>
<hr>
<main>';




 }

 function body(){
    $query = "SELECT * FROM vijesti WHERE arhiva=0 AND kategorija='U.S' ";
    $GLOBALS['result'] = mysqli_query($GLOBALS['con'], $query);
    formatArticles('U.S');
    $query = "SELECT * FROM vijesti WHERE arhiva=0 AND kategorija='World' ";
    $GLOBALS['result'] = mysqli_query($GLOBALS['con'], $query);
    formatArticles('World');
 }

 function category($kategorija){
    $query = "SELECT * FROM vijesti WHERE arhiva=0 AND kategorija='$kategorija' ";
    $GLOBALS['result'] = mysqli_query($GLOBALS['con'], $query);
    formatArticles($kategorija);
 }

 function formatArticles($cat){
    $articles = articles();
    $rows = count($articles)/3;
    if( count($articles)<3) $rows=1;
 
    echo'<div class="container">
    <section class="col-12">
        <div class="row"><h2>'.$cat.'</h2></div>';
   // za svaka 3 clanka novi row 
 
  

   for($i=0;$i<$rows;$i++){
    
   
     echo'<div class="row">
              <div class="container">
                  <div class="row">
                  <div class="col-lg-1"></div>
                     <div class="col-lg-3">'.handle($articles,$i,0).'</div>
                     <div class="col-lg-3">'.handle($articles,$i,1).'</div>
                     <div class="col-lg-3">'.handle($articles,$i,2).' </div>
                     <div class="col-lg-2"></div>
                  </div>
                 </div>
             </div>';
   }
   echo '</section>
         </div>';
 }

 function handle($articles,$i,$n){

    try{return $articles[$i*3+$n];}
    catch(Exception $e){return '';}


 }




 function articles(){
     $articles =array();
     $i=0;
    while($row = mysqli_fetch_array($GLOBALS["result"])) {
        $articles[$i++]= '
        <article>
        <a href="clanak.php?id='.$row['id'].'">
        <img src="' . UPLPATH . $row['slika'] . '" class="img">
        <h4>'.$row['naslov'].'</a></h4>
        <p>'.$row['opis'].'</p>
         </article>';
        }
        return $articles;
 }

 function clanak(){
    $row = mysqli_fetch_array($GLOBALS["result"]);
    echo ' <div class="container">
    <div class="row">
    <div class="col-2"></div>
    <div class="col-6">
    <section class="">
        <article>
            <h2 class="title">' .$row['naslov'].'</h2>
            <img class="image" src="' . UPLPATH . $row['slika'] . '">
            <p>'.$row['tekst'].'</p> 
        </article>
    </section>
    </div>
    <div class="col-4"></div>
    </div>
    </div>';
 }




 function footer(){
     echo '
     </main>
     <br><br><br><br>
     <footer id="footer">
     <div class="container"></div>
     <div class="row">
     <div class="col">Newsweek 2022</div>
     </div>
     </footer>
    
     </body><br>
     ';
 }
?>