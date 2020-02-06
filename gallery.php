<!DOCTYPE html>
<head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Hello, World!</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
        <link rel="stylesheet" href="./css/main.css">
        <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
        <script type="text/javascript" src="./scr.js"></script>

</head>
    <body>
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
        <main>
            <div class="card-columns">
                <?php
                    include_once("./db_connect.php");
                    $sql = "SELECT id, address, description, kategoria, klasa, jednostka, ROUND(AVG(ocena),2) as 'avg' FROM Obrazy 
                    LEFT OUTER JOIN Oceny ON Obrazy.id = Oceny.img_id GROUP BY Obrazy.id";

                    $result = $conn->query($sql);
                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            echo "<div class='card' id='photo-".$row['id']."'>";
                            echo "<a class='pop' href='#'> ";
                            echo "<img src='".$row['address']."' class='card-img-top' alt='".$row['description']."'></a> "; ?>
                            <div class='card-body'> 
                                <h5 class='card-title'>
                            <?php echo "<span class='badge badge-primary'>".$row['kategoria']. " </span>";
                            echo "<span class='badge badge-secondary'>".$row['klasa']. " </span>";
                            if(!is_null($row['jednostka'])){
                                echo "<span class='badge badge-light'>".$row['jednostka']. " </span>";
                            }
                            echo  "</h5> <p class='card-text'>".$row['description']."</p> <p class='card-text float-right'> Średnia ocen: ".$row['avg']."</p>"; ?>
                        <form action="" method="post">
                            <input type="hidden" name="img_id" value="<?php echo $row['id']?>">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input " type="radio" name="ocena" id="inlineRadio1" value="1">
                                <label class="form-check-label" for="inlineRadio1">1</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="ocena" id="inlineRadio2" value="2">
                                <label class="form-check-label" for="inlineRadio2">2</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="ocena" id="inlineRadio3" value="3">
                                <label class="form-check-label" for="inlineRadio3">3</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="ocena" id="inlineRadio4" value="4">
                                <label class="form-check-label" for="inlineRadio4">4</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="ocena" id="inlineRadio5" value="5">
                                <label class="form-check-label" for="inlineRadio5">5</label>
                            </div>

                            <button type="submit" class="btn btn-primary mb-1">Oceń zdjęcie</button>
                        </form>
                       <?php     
                           echo" </div> </div>";
                        }
                    }
                    
                ?>
            </div>
<div class="modal fade" id="imagemodal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-body">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <img src="" class="imagepreview">
      </div>
    </div>
  </div>
</div>
<?php
if(!empty($_POST['ocena']) && !empty($_POST['img_id'])){
    $itemId = $_POST['img_id'];
    $insertRating = "INSERT INTO Oceny(rating_id, img_id, ocena) VALUES('','".$_POST["img_id"]."','".$_POST["ocena"]."')";;
    mysqli_query($conn, $insertRating);
}
?>
        </main>
    </body>
</html>