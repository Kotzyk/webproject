<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Hello, World!</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
        <link rel="stylesheet" href="./css/main.css">

        <?php include_once("./db_connect.php"); ?>
    </head>
    <body>
        <!--[if lt IE 7]>
            <p class="browsehappy">You are using an <strong>outdated</strong> browser. Please <a href="#">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->

    <nav class="navbar navbar-expand-sm navbar-dark bg-dark mb-3">
        <div class="container">
            <a class="navbar-brand" href="/mkoz">
              <img src="./images/WordBearersBadge2.png" class="img-fluid" id="logo">
          </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                  <li class="nav-item">
                      <a class="nav-link" href="/mkoz">Strona główna</a>
                  </li>
                  <li class="nav-item">
                      <a class="nav-link" href="./gallery.php">Galeria</a>
                  </li>
                </ul>
                <ul class="navbar-nav ml-auto">
                  <li class="nav-item dropdown">
                      <a href="./index.php" class="nav-link dropdown-toggle"
                      data-toggle="dropdown" id="navbarDropdownMenuLink">Informacje</a>
                        <div class="dropdown-menu">
                          <a href="./index.php#about-me" class="dropdown-item">O stronie</a>
                          <a href="./index.php#about-WH40k" class="dropdown-item">O Warhammerze 40 000</a>
                        </div>
                  </li>
                </ul>
            </div>
        </div>
    </nav>

    <main role="main" class="container">
      <div id="demoCaro" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner rounded">
          <?php 
            $sql = "SELECT address, description, kategoria, klasa FROM Obrazy WHERE INSTR(klasa,'Armia')> 0";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
              $counter = 1;
              while ($row = $result->fetch_assoc()) {
                if($counter==1){
                  echo "<div class='carousel-item active'>";
                }else{
                  echo "<div class='carousel-item'>";
                }
                echo  "<a href='./gallery.php'><img class='d-block w-100 img-fluid' src='".$row["address"]."' alt='".$row['klasa']."'>";
                echo "<div class='carousel-caption d-none d-md-block'>";
                echo "<h5> Chaos Space Marines - Word Bearers Legion</h5>";
                echo "<p>".$row['description']."</p>";
                echo  "</div></a></div>";
                $counter = $counter +1;
              }
            }else {
              echo "0 results";
            }
          ?>
        </div>
        <ol class="carousel-indicators">
          <li data-target="#demoCaro" data-slide-to="0" class="active"></li>
          <li data-target="#demoCaro" data-slide-to="1"></li>
          <li data-target="#demoCaro" data-slide-to="2"></li>
        </ol>

        <a class="carousel-control-prev" href="#demoCaro" role="button" data-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#demoCaro" role="button" data-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="sr-only">Next</span>
        </a>
    </div>
      <div class="container ">
        <h1>Galeria figurek Mateusza Koziestańskiego</h1>
        <p class="primary">Kolekcjonuję i maluję figurki do Warhammera 40 000.<br>
          Mogą nie być tak piękne jak bym chciał, mogę mieć nienajlepszy aparat, ale i tak jestem dumny ;)</p>
        <div class="container fluid" id="about-me">
          <h3>O mnie</h3>
            <p class="secondary"> 
              Student 3 roku Automatyki i Robotyki na Wydziale Inżynierii Mechanicznej i Robotyki AGH. Niniejsza strona powstała w ramach projektu zaliczeniowego.
            </p>
          </div>
      </div>
    
      <div class="container text-justify" id="about-WH40k">
        <h3> Czym jest Warhammer 40 000? </h3>
        <p> Warhammer 40000 jest zdecydowanie najpopularniejszą z tak zwanych figurkowych gier strategicznych, powstałą w 1987r. W telegraficznym skrócie, jest to całe hobby, w którym do popularnych dawniej plastikowych lub ołowianych "żołnierzyków" dodano skomplikowane zasady z elementami strategii i&nbsp;dużą ilością rzutów kostkami k6.
          Sercem hobby są plastikowe lub żywiczne figurki do samodzielnego złożenia i pomalowania, które razem są w stanie tworzyć grywalne armie. Sama gra jest przede wszystkim okazją do spotkania ze znajomymi lub zapoznania nowych osób dzięki prężnym społecznościom lokalnym skupionym wokół sklepów z figurkami, udostępniającymi stoły i&nbsp;tereny do gry. <br> </p>
          <p>Ilu hobbystów, tyle powodów w nim uczestnictwa i sposobów cieszenia się nim: Niektórych bawi składanie części różnych zestawów ze sobą, samodzielne dorabianie elementów w styrodurze czy rzeźbiarskich masach plastycznych, aby każda figurka lub oddział miały żądany styl wizualny, niezależny od zamysłu producenta. Inni skupiają się na malowaniu swoich armii, starając się by były piękne, śmieszne lub przerażające. 
          Ludzie zainteresowani głównie grą gotowi są nawet zlecić malowanie swoich armii komuś innemu, o ile w ogóle chcą mieć kolorowe figurki - niemniej, całe armie w szarym plastiku są bardzo niemile widziane, nawet na turniejach. Ostatnia grupa koncentruje się na zgłębianiu fikcyjnego uniwersum poprzez wydawane książki i gry wideo. 
          Oczywiście, większość graczy łączy te aspekty zgodnie z własnymi preferencjami i umiejętnościami.
        </p>
      </div>
      <div class="container text-justify" id="fabula">
        <h4> Tło fabularne </h4>
        <p>Tło fabularne rozgrywa się w retrofuturystycznej dystopii lat 40 000 n.e., a całe uniwersum jest połączeniem fantasy i science-fiction.
        Ludzkość kontroluje większość galaktyki poprzez ogromne, zbiurokratyzowane i krwawe <i>Imperium Ludzkości</i>, w imię przetrwania zmuszone do bycia równie okrutnym dla własnych obywateli co dla wrogów. </p>
    
        <img class="img-fluid mx-auto d-block rounded" id="map-galaxy" src="./images/galaxy-shadowbox.jpg">
       <p class="text-wrap"> 
         <img class="img-fluid float-right rounded" id="SM" src="./images/SMvHuman.jpg"> 
       Nieustannie szarpane na niezliczonych frontach, z zewnątrz i od wewnątrz, przez obcych, zdrajców zaprzysiężonych Mrocznym Bóstwom oraz demoniczne zastępy tych ostatnich, 
       Imperium polega na przewadze liczebnej, wierze w nieśmiertelnego Imperatora na Złotym Tronie Terry (Ziemi) i&nbsp;istnieniu Space Marines - niekwestionowanych ikon uniwersum, 
       superżołnierzy których najłatwiej porównać do Marvel'owskiego Kapitana Ameryki, tylko o wzroście 220+ cm i&nbsp;w pancerzu zawstydzającym&nbsp;nowoczesne czołgi. 
        </p>
        <p>
        Grywalnych frakcji jest kilkanaście, choć dzielą się na duże kategorie: Xenos (obcy), Chaos&nbsp;i&nbsp;Imperium. Każda rasa ma swoje interesy w fabule, ale większość z nich sprowadzić najłatwiej do annihilacji pozostałych. Nie ma obiektywnie dobrych ani złych, są tylko moralne odcienie szarości. Przytaczając wprowadzenie obecne w każdej publikacji uniwersum: <i>(...) Forget the promise of progress and understanding, for <b>in the grim dark future there is only war. </b> There is no peace amongst the stars, only an eternity of carnage and slaughter, and the laughter of thirsting gods.
        </i>
        </p> 
      </div>
    </main>
    <!-- /.container -->
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
        <!-- <script src="" async defer></script> -->
    </body>
    <footer class="page-footer text-center d-block w-100">
        Warhammer, Warhammer 40 000, znaki towarowe i projekty figurek z nimi związane są własnością intelektualną Games Workshop Limited z siedzibą w UK.
    </footer>
    
</html>