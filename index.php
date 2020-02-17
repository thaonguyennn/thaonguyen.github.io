<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <meta charset="ISO-8859-1" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <!-- Latest compiled and minified CSS -->
    <!-- <link rel="stylesheet" href="../css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous"> -->

    <!-- Optional theme -->
    <!-- <link rel="stylesheet" href="../css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous"> -->

  <script src="../js/jquery.min.js"></script>
  <script src="../js/bootstrap.min.js"></script>

  <!-- Bootstrap core CSS -->
  <link media="all" type="text/css"  href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom styles for heroic template -->
  <link media="all" type="text/css"  href="../css2/heroic-features.css" rel="stylesheet">

  <!-- Custom fonts for landing-page template -->
  <link media="all" type="text/css"  href="../vendor1/fontawesome-free/css/all.min.css" rel="stylesheet">
  <link  rel="stylesheet" type="text/css" href="../vendor1/simple-line-icons/css/simple-line-icons.css" media="all" >
  <link media="all"  href="https://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic,700italic" rel="stylesheet" type="text/css">

  <!-- Custom styles for landing-page template -->
  <link type="text/css"  href="../css2/landing-page.min.css" rel="stylesheet" media="all" >
    
  <link rel="stylesheet" type="text/css" href="../css/style1.css" media="all" />

  <link rel="stylesheet" type="text/css"  href="https://fonts.googleapis.com/icon?family=Material+Icons">

  <title>Trang chủ</title>

</head>

<body class="have-bckgr">

  <!-- Navigation -->
  <nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top">
    <div class="container">
        <a class="navbar-brand" href="index.php">
          <img style="width: 180px; height: auto;" src="../image/logo1.png" alt = "Logo" />
        </a>
        <!-- <a class="navbar-brand" href="index.php">
          Vườn quốc gia Tràm Chim
        </a> -->
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <?php
        $con = new mysqli("localhost","mekongwildlife","Mekong2020@data","mekongwildlife_data");
        mysqli_set_charset($con, 'UTF8');
        $sql_laychude = "SELECT * from topics where censored = b'1'";
          $laychude = $con->query($sql_laychude);
        $categories = array();
        while ($row = mysqli_fetch_assoc($laychude)){
            $categories[] = $row;
        }
        require '../php/data.php';
      ?>
      <div class="collapse navbar-collapse menu" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item active">
            <a class="nav-link" href="index.php">Trang chủ
              <span class="sr-only">(current)</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link dropdown-toggle">Tin tức
            </a>
              <?php showTopicMenu($categories);?>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="xem-video.php">Video</a>
          </li>
          <li class="nav-item">
            <a class="nav-link dropdown-toggle">
              Thông tin loài
            </a>
            <ul>
              <li><a href="tim-loai.php"> Tìm loài </a>
              <li><a href="xuat-bao-cao.php"> Xuất báo cáo </a></li>
            </ul>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="about.php">Về Tràm Chim</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
  <br>

  <!-- Page Content -->
  <div class="container">

    <!-- Jumbotron Header -->
    <header class="masthead text-white text-center">
      <div class="overlay"></div>
      <div class="container">
        <div class="row">
          <div class="col-xl-9 mx-auto">
            <h1 class="mb-5">Khám phá những loài sống ở vườn quốc gia Tràm Chim</h1>
          </div>
          <div class="col-md-10 col-lg-8 col-xl-7 mx-auto">
            <form action="tim-loai.php" method="get">
              <div class="form-row">
                <div class="col-12 col-md-9 mb-2 mb-md-0">
                  <input type="search" name="s" class="form-control form-control-md" placeholder="Nhập tên loài...">
                </div>
                <div class="col-12 col-md-3">
                  <button type="submit" class="btn btn-block btn-md btn-primary">Tìm kiếm</button>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </header>
    <br><br>
    <!-- <div class="row">
      <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
        <div id="srch-rs">
        
        </div>
      </div>
    </div>
    <br> -->
    <p class="index-header">- TIN MỚI -</p> <br>
    <!-- Image Showcases -->
    <section class="showcase">
      <div class="container-fluid p-0">
      <?php
        mysqli_set_charset($con, 'UTF8');
        $sql_laytin = "SELECT * from news where censored = b'1' and deleted = b'0' and news_type = 'normal' order by news_id desc limit 4";
        $laytin = $con->query($sql_laytin);
        while ($result = mysqli_fetch_assoc($laytin)){
          $idtin = $result["news_id"];
          $sql_layhinh = "select * from images where news_id = '$idtin'";
          $layhinh = $con->query($sql_layhinh);
          if ($result_layhinh = mysqli_fetch_assoc($layhinh)) {
            $hinh[] = $result_layhinh["img_path"];
          }
          $idt[] = $result["news_id"];
          $tieude[] = $result["title"];
          $tomtat[]= $result["summary"];
        }
      ?>
        <div class="row no-gutters light-bgr">

          <div class="col-lg-6 order-lg-2 text-white showcase-img" style="background-image: url('<?php echo $hinh[0]; ?>');"></div>
          <div class="col-lg-6 order-lg-1 my-auto showcase-text">
            <h3><?php echo $tieude[0];?></h3>
            <p class="lead mb-0"><?php echo $tomtat[0];?></p>
            <br>
            <a href="chi-tiet-tin.php?id=<?php echo $idt[0];?>" class="btn btn-primary showcase-btn">Xem chi tiết</a>
          </div>
        </div>
        <div class="row no-gutters light-bgr">
          <div class="col-lg-6 text-white showcase-img" style="background-image: url('<?php echo $hinh[1]; ?>');"></div>
          <div class="col-lg-6 my-auto showcase-text ">
            <h3><?php echo $tieude[1];?></h3>
            <p class="lead mb-0"><?php echo $tomtat[1];?></p>
            <br>
            <a href="chi-tiet-tin.php?id=<?php echo $idt[1];?>" class="btn btn-primary">Xem chi tiết</a>
          </div>
        </div>
        <div class="row no-gutters light-bgr">
          <div class="col-lg-6 order-lg-2 showcase-img" style="background-image: url('<?php echo $hinh[2]; ?>');"></div>
          <div class="col-lg-6 order-lg-1 my-auto showcase-text">
            <h3><?php echo $tieude[2];?></h3>
            <p class="lead mb-0 card-text"><?php echo $tomtat[2];?></p>
            <br>
            <a href="chi-tiet-tin.php?id=<?php echo $idt[2];?>" class="btn btn-primary showcase-btn">Xem chi tiết</a>
          </div>
        </div>
        <div class="row no-gutters light-bgr">
          <div class="col-lg-6 text-white showcase-img" style="background-image: url('<?php echo $hinh[3]; ?>');"></div>
          <div class="col-lg-6 my-auto showcase-text">
            <h3><?php echo $tieude[3];?></h3>
            <p class="lead mb-0"><?php echo $tomtat[3];?></p>
            <br>
            <a href="chi-tiet-tin.php?id=<?php echo $idt[3];?>" class="btn btn-primary">Xem chi tiết</a>
          </div>
        </div>
      </div>
    </section>
    <br><br>

    <!-- Page Features -->
      <?php
        $sql = "SELECT n.news_id AS id, n.title AS title FROM news n JOIN species s ON n.news_id = s.species_id WHERE n.news_type = 'species' AND s.is_animal = b'1' and n.censored = b'1' and n.deleted = b'0' ORDER BY n.news_id DESC LIMIT 18";
        $lay_ds = $con->query($sql);
        $dv = mysqli_fetch_assoc($lay_ds);
          if($dv){
      ?>
      <p class="index-header">- ĐỘNG VẬT -</p> <br>
    <div class="row text-center species-list">
      <?php
        $sql = "SELECT n.news_id AS id, n.title AS title FROM news n JOIN species s ON n.news_id = s.species_id WHERE n.news_type = 'species' AND s.is_animal = b'1' and n.censored = b'1' and n.deleted = b'0' ORDER BY n.news_id DESC LIMIT 18";
        $lay_ds = $con->query($sql);
        while ($dsdv = mysqli_fetch_assoc($lay_ds)) {
          $idsv = $dsdv['id'];
          $title = $dsdv['title'];
          $sql_layhinh = "SELECT * from images where news_id = '$idsv'";
          $layhinh = $con->query($sql_layhinh);
          if ($result_layhinh = mysqli_fetch_assoc($layhinh)) {
            $hinh = $result_layhinh["img_path"];
          }
      ?>

      

      <div class="col-xs-6 col-lg-2 mb-4 px-1">
        <a href="chi-tiet-loai.php?id=<?php echo $idsv;?>">
          <div style="height: 100%" class="card h-100">
            <img class="card-img-top lated-news-img" src="<?php echo $hinh; ?>" alt="">
            <div class="card-body">
                <p class="card-text"><?php echo $title; ?></p>
            </div>
          </div>
        </a>
      </div>
      <?php
          }
        }
      ?>

    </div>
    <!-- /.row -->

    <!-- Page Features -->
      <?php
        $sql = "SELECT n.news_id AS id, n.title AS title FROM news n JOIN species s ON n.news_id = s.species_id WHERE n.news_type = 'species' AND s.is_animal = b'1' and n.censored = b'1' and n.deleted = b'0' ORDER BY n.news_id DESC LIMIT 18";
        $lay_ds = $con->query($sql);
        $dv = mysqli_fetch_assoc($lay_ds);
          if($dv){
      ?>
      <p class="index-header">- THỰC VẬT -</p> <br>
    <div class="row text-center species-list">
      <?php
        $sql = "SELECT n.news_id AS id, n.title AS title FROM news n JOIN species s ON n.news_id = s.species_id WHERE n.news_type = 'species' AND s.is_animal = b'0' and n.censored = b'1' and n.deleted = b'0' ORDER BY n.news_id DESC LIMIT 18";
        $lay_ds = $con->query($sql);
        while ($dsdv = mysqli_fetch_assoc($lay_ds)) {
          $idsv = $dsdv['id'];
          $title = $dsdv['title'];
          $sql_layhinh = "SELECT * from images where news_id = '$idsv'";
          $layhinh = $con->query($sql_layhinh);
          if ($result_layhinh = mysqli_fetch_assoc($layhinh)) {
            $hinh = $result_layhinh["img_path"];
          }
      ?>
      <div class="col-xs-6 col-lg-2 mb-4 px-1">
        <a href="chi-tiet-loai.php?id=<?php echo $idsv;?>">
          <div class="card h-100">
            <img class="card-img-top lated-news-img" src="<?php echo $hinh; ?>" alt="">
            <div class="card-body">
                <p class="card-text"><?php echo $title; ?></p>
            </div>
          </div>
        </a>
      </div>
      <?php
          }
        }
      ?>

    </div>
    <!-- /.row -->

  </div>
  <!-- /.container -->

  <!-- Footer -->
  <footer class="py-5 bg-dark">
    <div class="container">
      <p class="m-0 text-center text-white">Copyright &copy; Your Website 2019</p>
    </div>
    <!-- /.container -->
  </footer>

  <!-- Bootstrap core JavaScript -->
  <script src="../css/vendor/jquery/jquery.min.js"></script>
  <script src="../css/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <script>

    var input = document.getElementById("srch");
    input.addEventListener("keyup", function(event) {
      if (event.keyCode === 13) {
        event.preventDefault();
        document.getElementById("srch-btn").click();
      }
    });

    function showSpecies(){
      var xhttp;
      var tim = document.getElementById("srch").value;
      xhttp = new XMLHttpRequest();
      xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
          document.getElementById("srch-rs").innerHTML = this.responseText;
          document.getElementById("srch-rs").scrollIntoView();
        }
      };
      xhttp.open("GET", "../php/getSpecies1.php?s="+tim, true);
      xhttp.send();
    }
  </script>

</body>

</html>
