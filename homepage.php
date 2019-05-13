<?php
//Se non è loggato (o è scaduto) lo riportiamo alla pagina di login.
session_start();
if (!isset($_SESSION['id']) || !isset($_SESSION['tipoutente'])) {
	header("Location: /RegistroElettronicoPHP/index.php?login=expired");
	exit();
}

$pathfunctions = $_SERVER['DOCUMENT_ROOT'].'/RegistroElettronicoPHP/functions/';

require($pathfunctions.'func.php');
require($pathfunctions.'snippets.php');

$db = Connect();
$id = $_SESSION['id'];
$tipoutente = $_SESSION['tipoutente'];

?>

<!doctype html>
<html class="no-js h-100" lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">

    <title>FAKElog homepage</title>
    <meta name="description" content="FAKElog Registro Elettronico">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://use.fontawesome.com/releases/v5.0.6/css/all.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.css" crossorigin="anonymous">
    <link rel="stylesheet" data-version="1.1.0" href="/RegistroElettronicoPHP/styles/shards-dashboards.1.1.0.css">
    <link rel="stylesheet" href="/RegistroElettronicoPHP/styles/extras.1.1.0.min.css">
    <link rel="stylesheet" href="/RegistroElettronicoPHP/css/commonstyle.css">
  </head>
  <body class="h-100">
    <div class="container-fluid">
      <div class="row">
        <!-- Main Sidebar -->
        <aside class="main-sidebar col-12 col-md-3 col-lg-2 px-0">
          <div class="main-navbar">
            <nav class="navbar align-items-stretch navbar-light bg-blue flex-md-nowrap p-0">
              <a class="navbar-brand w-100 mr-0" href="#" style="line-height: 25px;">
                <div class="d-table m-auto">
                  <span class="d-none d-md-inline ml-1 text-white">Registro Elettronico</span>
                </div>
              </a>
              <a class="toggle-sidebar d-sm-inline d-md-none d-lg-none">
                <i class="material-icons text-white">&#xE5C4;</i>
              </a>
            </nav>
          </div>
          <form action="#" class="main-sidebar__search w-100 d-sm-flex d-md-none d-lg-none">
            <div class="input-group input-group-seamless ml-3">
              <input class="ml-3 navbar-search form-control bg-transparent text-dark" type="text" placeholder="Cerca qualcosa..." aria-label="Search">
            </div>
          </form>
          <div class="nav-wrapper">
            <ul class="nav flex-column">
              <li class="nav-item">
                <a class="nav-link active" href="homepage.php">
                  <i class="material-icons">edit</i>
                  <span>Dashboard</span>
                </a>
              </li>
              <?php StampaNavItems($tipoutente); ?>
            </ul>
          </div>
        </aside>
        <!-- End Main Sidebar -->
        <main class="main-content col-lg-10 col-md-9 col-sm-12 p-0 offset-lg-2 offset-md-3">
          <div class="main-navbar sticky-top bg-lightblue">
            <!-- Main Navbar -->
            <nav class="navbar align-items-stretch navbar-light flex-md-nowrap p-0">
              <form action="#" class="main-navbar__search w-100 d-none d-md-flex d-lg-flex">
                <div class="input-group input-group-seamless ml-3">
                  <div class="input-group-prepend">
                    <div class="input-group-text">
                      <i class="fas fa-search text-white"></i>
                    </div>
                  </div>
                  <input class="navbar-search form-control bg-transparent text-white" type="text" placeholder="Cerca qualcosa..." aria-label="Search">
                </div>
              </form>
              <ul class="navbar-nav flex-row ">
                <li class="nav-item dropdown notifications">
                  <a class="nav-link nav-link-icon text-center" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <div class="nav-link-icon__wrapper">
                      <i class="material-icons text-white">&#xE7F4;</i>
                      <span class="badge badge-pill badge-warning">4</span>
                    </div>
                  </a>
                  <?php StampaNotificheEsempio(); ?>
                </li>
                <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle text-nowrap px-4" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
                    <img class="user-avatar rounded-circle mr-2" src="<?php GetPercorsoFoto($db, $id); ?>" alt="User Avatar">
                    <span class="d-none d-md-inline-block text-white">
                    <?php
                      list($nome, $cognome) = GetNomeCognome($db, $id);
                      if ($nome != null && $cognome != null)
                      {
                        if ($tipoutente == 2) //Genitore
                          echo "Genitore per ";
                        echo "$cognome $nome";
                      }
                    ?>
                    </span>
                  </a>
                  <div class="dropdown-menu dropdown-menu-big">
                    <a class="dropdown-item" href="/RegistroElettronicoPHP/profile.php">
                      <i class="material-icons">&#xE7FD;</i> Profilo</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item text-danger" href="/RegistroElettronicoPHP/logout.php">
                      <i class="material-icons text-danger">&#xE879;</i> Esci </a>
                  </div>
                </li>
              </ul>
              <nav class="nav">
                <a href="#" class="nav-link nav-link-icon toggle-sidebar d-md-inline d-lg-none text-center" data-toggle="collapse" data-target=".header-navbar" aria-expanded="false" aria-controls="header-navbar">
                  <i class="material-icons text-white">&#xE5D2;</i>
                </a>
              </nav>
            </nav>
          </div>
          <!-- / .main-navbar -->
          <div class="main-content-container container-fluid px-4">
            <!-- Page Header -->
            <div class="page-header row no-gutters py-4">
              <div class="col-12 col-sm-4 text-center text-sm-left mb-0">
                <span class="text-uppercase page-subtitle">Dashboard</span>
                <h3 class="page-title">Funzionalità</h3>
              </div>
            </div>
            <div class="container" data-masonry='{ "itemSelector": ".card" }'>
              <div class="grid" >
                
                <!-- Card Appello -->
                <div class="card card-item" style="width: 18rem;">
                  <div class="card-body">
                    <h5 class="card-title">APPELLO</h5>
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                    <a href="appello.php" class="btn btn-primary" style="float: right;">Visualizza</a>
                  </div>
                </div>

                <!-- Card Assenze -->
                <div class="card card-item" style="width: 18rem;">
                  <div class="card-body">
                    <h5 class="card-title">ASSENZE</h5>
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                    <a href="assenze.php" class="btn btn-primary" style="float: right;">Visualizza</a>
                  </div>
                </div>

                <!-- Card NOTE -->
                <div class="card card-item" style="width: 18rem;">
                  <div class="card-body">
                    <h5 class="card-title">NOTE DISCIPLINARI</h5>
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                    <a href="#" class="btn btn-primary" style="float: right;">Visualizza</a>
                  </div>
                </div>

                <!-- Card COMUNICAZIONI -->
                <div class="card card-item" style="width: 18rem;">
                  <div class="card-body">
                    <h5 class="card-title">COMUNICAZIONI</h5>
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                    <a href="#" class="btn btn-primary" style="float: right;">Visualizza</a>
                  </div>
                </div>

                <!-- Card ORARIO -->
                <div class="card card-item" style="width: 18rem;">
                  <div class="card-body">
                    <h5 class="card-title">ORARIO</h5>
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                    <a href="#" class="btn btn-primary" style="float: right;">Visualizza</a>
                  </div>
                </div>

                <!-- Card UDIENZE -->
                <div class="card card-item" style="width: 18rem;">
                  <div class="card-body">
                    <h5 class="card-title">UDIENZE</h5>
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                    <a href="#" class="btn btn-primary" style="float: right;">Visualizza</a>
                  </div>
                </div>

              </div>
            </div>
            <!-- End Page Header -->
          </div>
          <footer class="main-footer footer d-flex p-2 px-3 bg-white">
            <?php StampaFooter(); ?>
          </footer>
        </main>
      </div>
    </div>
    <script src="https://unpkg.com/masonry-layout@4.2.2/dist/masonry.pkgd.min.js" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.js" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.js" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/shards-ui@latest/dist/js/shards.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Sharrre/2.0.1/jquery.sharrre.min.js"></script>
    <script src="/RegistroElettronicoPHP/scripts/extras.1.1.0.min.js"></script>
    <script src="/RegistroElettronicoPHP/scripts/shards-dashboards.1.1.0.min.js"></script>
  </body>
</html>