<?php
session_start();
	include("connection.php");
	include("functions.php");

	// echo("<script>console.log('PHP: test index page');</script>");
	// $user_data = check_login($conn);
// if(!empty($_SESSION['email'])){
// 	echo $_SESSION['email'];
// }
?>
 <!DOCTYPE html>

<head>
  <title>organicproduce.com</title>
  <meta charset="utf-8">
  <link rel="stylesheet" href="style.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</head>

<body>
  <nav class="navbar navbar-expand-lg navbar-light sticky-top">
    <div class="container-fluid">
      <a class="navbar-brand" href="index.php">
        <img src="assets/logo.png" alt="" width=auto height=auto>
      </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="index.php">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Order</a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Produce
            </a>
            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
              <li><a class="dropdown-item" href="#">Fruits</a></li>
              <li><a class="dropdown-item" href="#">Vegetables</a></li>
              <li><hr class="dropdown-divider"></li>
              <li><a class="dropdown-item" href="#">Show all</a></li>
            </ul>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="about/index.html">About</a>
          </li>
          <!-- <li class="nav-item">
            <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
          </li> -->
        </ul>
        <form class="d-flex">
          <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
          <button class="btn btn-outline-success" type="submit">Search</button>
        </form>
				<?php if(empty($_SESSION['email'])){ ?>
        <ul class="navbar-nav">
        <li class="nav-item">
					<a class="nav-link" href="login.php">Login</a>
					<!-- <a class="nav-link" href="logout.php">Logout</a> -->

        </li>
      </ul>
			<?php } ?>
			<?php if(!empty($_SESSION['email'])){ ?>
			<ul class="navbar-nav">
			<li class="nav-item">
				<!-- <a class="nav-link" href="login.php">Login</a> -->

				<p>Hello, <?php echo $_SESSION['first_name']; ?> <a class="nav-link" href="logout.php">Logout</a>

			</li>
		</ul>
	<?php } ?>
      </div>
    </div>

  </nav>

  <main class="container">
    <section class="content">
      <h3>We provide local produce</h3>
      <h4>To local needs</h4>
      <a href="hello.php" id="getstarted" class="btn btn-success btn-lg active" role="button" aria-pressed="true">Get
        Started</a>
      </section>
  </main>


    <footer>
    </footer>
</body>
</html>
