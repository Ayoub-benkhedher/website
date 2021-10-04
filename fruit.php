<?php
session_start();
	include("connection.php");
	include("functions.php");
	$query = "select * from produce";
	$result = mysqli_query($conn, $query);

	if($result)
	{
		if($result && mysqli_num_rows($result) > 0)
		{
			$produce_data = mysqli_fetch_assoc($result);
			die;
		}
	}

	?>
<!DOCTYPE html>
<html>
<head>
	<title>Login Page</title>

	<!--Bootsrap 4 CDN-->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <!--Fontawesome CDN-->
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
	<!--Custom styles-->
	<link rel="stylesheet" href="fruit.css">
    <link rel="stylesheet" href="style.css">
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
<div class="container d-flex justify-content-center mt-50 mb-50">
    <div class="row">

        <div class="col-md-4 mt-2">
            <div class="card">
                <div class="card-body">
                    <div class="card-img-actions"> <img src=<?php $produce_data['image'] ?> class="card-img img-fluid" width="96" height="350" alt=""> </div>
                </div>
                <div  class="card-body bg-light text-center">
                    <div class="mb-2">
                        <h6 class="font-weight-semibold mb-2"> <a href="#" class="text-default mb-2" data-abc="true">Banana</a> </h6> <a href="#" class="text-muted" data-abc="true">Fresh Fruit</a>
                    </div>
                    <h3 class="mb-0 font-weight-semibold">$0.89lb</h3>
										<div class="text-muted mb-3"></div>
                   <button type="button" class="btn bg-cart"><i class="fa fa-cart-plus mr-2"></i> Add to cart</button>
                </div>
            </div>
        </div>

				<div class="col-md-4 mt-2">
            <div class="card">
                <div class="card-body">
                    <div class="card-img-actions"> <img src="assets/apple.jfif" class="card-img img-fluid" width="96" height="350" alt=""> </div>
                </div>
                <div  class="card-body bg-light text-center">
                    <div class="mb-2">
                        <h6 class="font-weight-semibold mb-2"> <a href="#" class="text-default mb-2" data-abc="true">Gala Apple</a> </h6> <a href="#" class="text-muted" data-abc="true">Fresh Fruit</a>
                    </div>
                    <h3 class="mb-0 font-weihght-semibold">$2.19lb</h3>
										<div class="text-muted mb-3"></div>
                   <button type="button" class="btn bg-cart"><i class="fa fa-cart-plus mr-2"></i> Add to cart</button>
                </div>
            </div>
        </div>
        <div class="col-md-4 mt-2">
            <div class="card">
                <div class="card-body">
                    <div class="card-img-actions"> <img src="https://res.cloudinary.com/dxfq3iotg/image/upload/v1562074043/234.png" class="card-img img-fluid" width="96" height="350" alt=""> </div>
                </div>
                <div class="card-body bg-light text-center">
                    <div class="mb-2">
                        <h6 class="font-weight-semibold mb-2"> <a href="#" class="text-default mb-2" data-abc="true">Toshiba Notebook with 500GB HDD & 8GB RAM</a> </h6> <a href="#" class="text-muted" data-abc="true">Laptops & Notebooks</a>
                    </div>
                    <h3 class="mb-0 font-weight-semibold">$250.99</h3>
                    <div> <i class="fa fa-star star"></i> <i class="fa fa-star star"></i> <i class="fa fa-star star"></i> <i class="fa fa-star star"></i> </div>
                    <div class="text-muted mb-3">34 reviews</div> <button type="button" class="btn bg-cart"><i class="fa fa-cart-plus mr-2"></i> Add to cart</button>
                </div>
            </div>
        </div>
        <div class="col-md-4 mt-2">
            <div class="card">
                <div class="card-body">
                    <div class="card-img-actions"> <img src="https://res.cloudinary.com/dxfq3iotg/image/upload/v1562074043/234.png" class="card-img img-fluid" width="96" height="350" alt=""> </div>
                </div>
                <div class="card-body bg-light text-center">
                    <div class="mb-2">
                        <h6 class="font-weight-semibold mb-2"> <a href="#" class="text-default mb-2" data-abc="true">Toshiba Notebook with 500GB HDD & 8GB RAM</a> </h6> <a href="#" class="text-muted" data-abc="true">Laptops & Notebooks</a>
                    </div>
                    <h3 class="mb-0 font-weight-semibold">$250.99</h3>
                    <div> <i class="fa fa-star star"></i> <i class="fa fa-star star"></i> <i class="fa fa-star star"></i> <i class="fa fa-star star"></i> </div>
                    <div class="text-muted mb-3">34 reviews</div> <button type="button" class="btn bg-cart"><i class="fa fa-cart-plus mr-2"></i> Add to cart</button>
                </div>
            </div>
        </div>
        <div class="col-md-4 mt-2">
            <div class="card">
                <div class="card-body">
                    <div class="card-img-actions"> <img src="https://res.cloudinary.com/dxfq3iotg/image/upload/v1562074043/234.png" class="card-img img-fluid" width="96" height="350" alt=""> </div>
                </div>
                <div class="card-body bg-light text-center">
                    <div class="mb-2">
                        <h6 class="font-weight-semibold mb-2"> <a href="#" class="text-default mb-2" data-abc="true">Toshiba Notebook with 500GB HDD & 8GB RAM</a> </h6> <a href="#" class="text-muted" data-abc="true">Laptops & Notebooks</a>
                    </div>
                    <h3 class="mb-0 font-weight-semibold">$250.99</h3>
                    <div> <i class="fa fa-star star"></i> <i class="fa fa-star star"></i> <i class="fa fa-star star"></i> <i class="fa fa-star star"></i> </div>
                    <div class="text-muted mb-3">34 reviews</div> <button type="button" class="btn bg-cart"><i class="fa fa-cart-plus mr-2"></i> Add to cart</button>
                </div>
            </div>
        </div>
        <div class="col-md-4 mt-2">
            <div class="card">
                <div class="card-body">
                    <div class="card-img-actions"> <img src="https://res.cloudinary.com/dxfq3iotg/image/upload/v1562074043/234.png" class="card-img img-fluid" width="96" height="350" alt=""> </div>
                </div>
                <div class="card-body bg-light text-center">
                    <div class="mb-2">
                        <h6 class="font-weight-semibold mb-2"> <a href="#" class="text-default mb-2" data-abc="true">Toshiba Notebook with 500GB HDD & 8GB RAM</a> </h6> <a href="#" class="text-muted" data-abc="true">Laptops & Notebooks</a>
                    </div>
                    <h3 class="mb-0 font-weight-semibold">$250.99</h3>
                    <div> <i class="fa fa-star star"></i> <i class="fa fa-star star"></i> <i class="fa fa-star star"></i> <i class="fa fa-star star"></i> </div>
                    <div class="text-muted mb-3">34 reviews</div> <button type="button" class="btn bg-cart"><i class="fa fa-cart-plus mr-2"></i> Add to cart</button>
                </div>
            </div>
        </div>
				<div class="col-md-4 mt-2">
            <div class="card">
                <div class="card-body">
                    <div class="card-img-actions"> <img src="https://res.cloudinary.com/dxfq3iotg/image/upload/v1562074043/234.png" class="card-img img-fluid" width="96" height="350" alt=""> </div>
                </div>
                <div class="card-body bg-light text-center">
                    <div class="mb-2">
                        <h6 class="font-weight-semibold mb-2"> <a href="#" class="text-default mb-2" data-abc="true">Toshiba Notebook with 500GB HDD & 8GB RAM</a> </h6> <a href="#" class="text-muted" data-abc="true">Laptops & Notebooks</a>
                    </div>
                    <h3 class="mb-0 font-weight-semibold">$250.99</h3>
                    <div> <i class="fa fa-star star"></i> <i class="fa fa-star star"></i> <i class="fa fa-star star"></i> <i class="fa fa-star star"></i> </div>
                    <div class="text-muted mb-3">34 reviews</div> <button type="button" class="btn bg-cart"><i class="fa fa-cart-plus mr-2"></i> Add to cart</button>
                </div>
            </div>
        </div>
				<div class="col-md-4 mt-2">
            <div class="card">
                <div class="card-body">
                    <div class="card-img-actions"> <img src="https://res.cloudinary.com/dxfq3iotg/image/upload/v1562074043/234.png" class="card-img img-fluid" width="96" height="350" alt=""> </div>
                </div>
                <div class="card-body bg-light text-center">
                    <div class="mb-2">
                        <h6 class="font-weight-semibold mb-2"> <a href="#" class="text-default mb-2" data-abc="true">Toshiba Notebook with 500GB HDD & 8GB RAM</a> </h6> <a href="#" class="text-muted" data-abc="true">Laptops & Notebooks</a>
                    </div>
                    <h3 class="mb-0 font-weight-semibold">$250.99</h3>
                    <div> <i class="fa fa-star star"></i> <i class="fa fa-star star"></i> <i class="fa fa-star star"></i> <i class="fa fa-star star"></i> </div>
                    <div class="text-muted mb-3">34 reviews</div> <button type="button" class="btn bg-cart"><i class="fa fa-cart-plus mr-2"></i> Add to cart</button>
                </div>
            </div>
        </div>
				<div class="col-md-4 mt-2">
            <div class="card">
                <div class="card-body">
                    <div class="card-img-actions"> <img src="https://res.cloudinary.com/dxfq3iotg/image/upload/v1562074043/234.png" class="card-img img-fluid" width="96" height="350" alt=""> </div>
                </div>
                <div class="card-body bg-light text-center">
                    <div class="mb-2">
                        <h6 class="font-weight-semibold mb-2"> <a href="#" class="text-default mb-2" data-abc="true">Toshiba Notebook with 500GB HDD & 8GB RAM</a> </h6> <a href="#" class="text-muted" data-abc="true">Laptops & Notebooks</a>
                    </div>
                    <h3 class="mb-0 font-weight-semibold">$250.99</h3>
                    <div> <i class="fa fa-star star"></i> <i class="fa fa-star star"></i> <i class="fa fa-star star"></i> <i class="fa fa-star star"></i> </div>
                    <div class="text-muted mb-3">34 reviews</div> <button type="button" class="btn bg-cart"><i class="fa fa-cart-plus mr-2"></i> Add to cart</button>
                </div>
            </div>
        </div>
				<div class="col-md-4 mt-2">
            <div class="card">
                <div class="card-body">
                    <div class="card-img-actions"> <img src="https://res.cloudinary.com/dxfq3iotg/image/upload/v1562074043/234.png" class="card-img img-fluid" width="96" height="350" alt=""> </div>
                </div>
                <div class="card-body bg-light text-center">
                    <div class="mb-2">
                        <h6 class="font-weight-semibold mb-2"> <a href="#" class="text-default mb-2" data-abc="true">Toshiba Notebook with 500GB HDD & 8GB RAM</a> </h6> <a href="#" class="text-muted" data-abc="true">Laptops & Notebooks</a>
                    </div>
                    <h3 class="mb-0 font-weight-semibold">$250.99</h3>
                    <div> <i class="fa fa-star star"></i> <i class="fa fa-star star"></i> <i class="fa fa-star star"></i> <i class="fa fa-star star"></i> </div>
                    <div class="text-muted mb-3">34 reviews</div> <button type="button" class="btn bg-cart"><i class="fa fa-cart-plus mr-2"></i> Add to cart</button>
                </div>
            </div>
        </div>
				<div class="col-md-4 mt-2">
            <div class="card">
                <div class="card-body">
                    <div class="card-img-actions"> <img src="https://res.cloudinary.com/dxfq3iotg/image/upload/v1562074043/234.png" class="card-img img-fluid" width="96" height="350" alt=""> </div>
                </div>
                <div class="card-body bg-light text-center">
                    <div class="mb-2">
                        <h6 class="font-weight-semibold mb-2"> <a href="#" class="text-default mb-2" data-abc="true">Toshiba Notebook with 500GB HDD & 8GB RAM</a> </h6> <a href="#" class="text-muted" data-abc="true">Laptops & Notebooks</a>
                    </div>
                    <h3 class="mb-0 font-weight-semibold">$250.99</h3>
                    <div> <i class="fa fa-star star"></i> <i class="fa fa-star star"></i> <i class="fa fa-star star"></i> <i class="fa fa-star star"></i> </div>
                    <div class="text-muted mb-3">34 reviews</div> <button type="button" class="btn bg-cart"><i class="fa fa-cart-plus mr-2"></i> Add to cart</button>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>
