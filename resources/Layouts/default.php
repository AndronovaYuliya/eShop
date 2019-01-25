<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <?php echo $this->getMeta() ?>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
          integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="/css/page/style.css">        <!-- Custom CSS -->
    <link rel="stylesheet" href="/css/page/bootstrap.css">
</head>
<body>
<!--Start header-area-->
<div class="header-area">
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#headNavbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="headNavbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">
                        <a class="nav-link" href="#"><i class="fa fa-sign-in"></i>My Account</a>
                    </button>
                </li>
                <li class="nav-item">
                    <button class="btn btn-outline-success my-2 my-sm-0" data-toggle="modal" data-target="#exampleModal"
                            type="submit">
                        <a class="nav-link" href=""><i class="fa fa-sign-in"></i>Login</a>
                    </button>
                </li>
                <li class="nav-item">
                    <button class="btn btn-outline-success my-2 my-sm-0" data-toggle="modal" data-target="#signupModal"
                            type="submit">
                        <a class="nav-link" href=""><i class="fa fa-sign-in"></i>Signup</a>
                    </button>
                </li>
                <li class="nav-item">
                    <button class="btn btn-outline-success my-2 my-sm-0" data-toggle="modal" data-target="#letterModal"
                            type="submit">
                        <a class="nav-link" href=""><i class="fa fa-sign-in"></i>Subscribe</a>
                    </button>
                </li>
            </ul>
            <form class="form-inline my-2 my-lg-0" action="/search" method="post">
                <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search"
                       name="search">
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
            </form>
        </div>
    </nav>
</div>
<!-- End header-area -->
<!-- Start site-branding-area -->
<div class="site-branding-area">
    <div class="container">
        <div class="row">
            <div class="col-sm-6">
                <div class="logo">
                    <h1><a href="/"><?php echo $this->getName() ?></a></h1>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="shopping-item">
                    <a href="/Cart/index">Cart - <span class="cart-amunt">$000</span>
                        <i class="fa fa-shopping-cart"></i> <span class="product-count">5</span></a>
                </div>
            </div>
        </div>
    </div>
</div><!-- End site-branding-area -->





<!-- Start mainmenu-area-->
<div class="mainmenu-area">
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="/">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/shop">Shop page</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                       data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Category
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <?php if ($categories > 0): ?>
                            <?php foreach ($categories as $category): ?>
                                <a class="dropdown-item"
                                   href="/category?<?php echo $category['alias'] ?>"><?php echo $category['title']; ?></a>
                            <?php endforeach; ?>
                        <?php endif; ?>

                        <div class="dropdown-divider"></div>
                    </div>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                       data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Brand
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">

                        <?php if (count($brands) > 0): ?>
                            <?php foreach ($brands as $brand): ?>
                                <a class="dropdown-item"
                                   href="/brand?<?php echo $brand['brand'] ?>"><?php echo $brand['brand']; ?></a>
                            <?php endforeach; ?>
                        <?php endif; ?>

                        <div class="dropdown-divider"></div>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/cart">Cart</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Contact</a>
                </li>
            </ul>
        </div>
    </nav>
</div><!-- End mainmenu-area -->
<!-- Start Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="post" action="/user/login">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Email address</label>
                        <input type="email" required class="form-control" id="exampleInputEmail1"
                               aria-describedby="emailHelp" placeholder="Enter email">
                        <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone
                            else.
                        </small>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Password</label>
                        <input type="password" required class="form-control" id="exampleInputPassword1"
                               placeholder="Password">
                    </div>
                    <div class="form-check">
                        <input type="checkbox" class="form-check-input" id="exampleCheck1">
                        <label class="form-check-label" for="exampleCheck1">Check me out</label>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>
<!--End Modal-->
<!-- Start Modal -->
<div class="modal fade" id="letterModal" tabindex="-1" role="dialog" aria-labelledby="letterModalLabel"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="letterModalLabel">Subscribe</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="post" action="/sender/letter">
                    <div class="form-group">
                        <label for="letterInputName">Name</label>
                        <input type="text" required class="form-control" id="letterInputName"
                               aria-describedby="nameHelp" name="name" placeholder="James Bond">
                    </div>
                    <div class="form-group">
                        <label for="letterInputEmail">email</label>
                        <input type="email" required class="form-control" id="letterInputEmail" name="email"
                               placeholder="james@bond.com">
                    </div>
                    <button type="submit" name="subscribe" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>
<!--End Modal-->
<!-- Start Modal -->
<div class="modal fade" id="signupModal" tabindex="-1" role="dialog" aria-labelledby="signupModalLabel"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="signupModalLabel">Signup</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="post" action="/user/signup" name="signupUser">
                    <div class="form-group">
                        <label for="SignupInputName">Name</label>
                        <input type="text" class="form-control" id="signupInputName" aria-describedby="nameHelp"
                               name="name" placeholder="James Bond">
                    </div>
                    <div class="form-group">
                        <label for="SignupInputPhone">Phone</label>
                        <input type="text" class="form-control" required id="signupInputPhone"
                               aria-describedby="nameHelp" name="lastName" placeholder="123-456-789">
                    </div>
                    <div class="form-group">
                        <label for="SignupInputLogin">Login</label>
                        <input type="text" class="form-control" required id="signupInputLogin"
                               aria-describedby="nameHelp" name="Login" placeholder="Agent007">
                    </div>
                    <div class="form-group">
                        <label for="SignupInputEmail">email</label>
                        <input type="email" class="form-control" required id="signupInputEmail" name="email"
                               placeholder="james@bond.com">
                    </div>
                    <div class="form-group">
                        <label for="SignupInputCity">city</label>
                        <input type="text" class="form-control" id="signupInputCity" aria-describedby="nameHelp"
                               name="City" placeholder="London">
                    </div>
                    <div class="form-group">
                        <label for="SignupInputAdress">adress</label>
                        <input type="text" class="form-control" id="signupInputAdress" aria-describedby="nameHelp"
                               name="Adress" placeholder="Vauxhall Cross - 85">
                    </div>
                    <div class="form-group">
                        <label for="SignupInputBorn">born</label>
                        <input type="date" class="form-control" id="signupInputBorn" aria-describedby="nameHelp"
                               name="Born">
                    </div>
                    <div class="form-group">
                        <label for="SignupInputPassword">password</label>
                        <input type="password" required class="form-control" id="signupInputPassword"
                               aria-describedby="nameHelp" name="Password">
                    </div>
                    <div class="form-group">
                        <label for="SignupInputConfirmPassword">confirm password</label>
                        <input type="password" required class="form-control" id="signupInputConfirmPassword"
                               aria-describedby="nameHelp" name="ConfirmPassword">
                    </div>
                    <button type="submit" name="subscribe" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>
<!--End Modal-->


<?php echo($content)?>

<!-- Start footer-top-area -->
<div class="footer-top-area">
    <div class="zigzag-bottom"></div>
    <div class="container">
        <div class="row">
            <div class="col-md-3 col-sm-6">
                <div class="footer-about-us">
                    <h2>e<span>Electronics</span></h2>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Perferendis sunt id doloribus vero quam
                        laborum quas alias dolores blanditiis iusto consequatur, modi aliquid eveniet eligendi iure
                        eaque ipsam iste, pariatur omnis sint! Suscipit, debitis, quisquam. Laborum commodi veritatis
                        magni at?</p>
                    <div class="footer-social">
                        <a href="#" target="_blank"><i class="fa fa-facebook"></i></a>
                        <a href="#" target="_blank"><i class="fa fa-twitter"></i></a>
                        <a href="#" target="_blank"><i class="fa fa-youtube"></i></a>
                        <a href="#" target="_blank"><i class="fa fa-linkedin"></i></a>
                        <a href="#" target="_blank"><i class="fa fa-pinterest"></i></a>
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-sm-6">
                <div class="footer-menu">
                    <h2 class="footer-wid-title">User Navigation </h2>
                    <ul>
                        <li><a href="#">My account</a></li>
                        <li><a href="#">Order history</a></li>
                        <li><a href="#">Front page</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-md-3 col-sm-6">
                <div class="footer-menu">
                    <h2 class="footer-wid-title">Categories</h2>
                    <ul>

                        <?php if (count($categories) > 0): ?>
                            <?php for ($i = 0; $i < 6; $i++): ?>
                                <li><a href="/category?<?php echo $categories[$i]['alias'] ?>">
                                        <?php echo $categories[$i]['title']; ?></a></li>
                            <?php endfor; ?>
                        <?php endif; ?>

                    </ul>
                </div>
            </div>
            <div class="col-md-3 col-sm-6">
                <div class="footer-newsletter">
                    <h2 class="footer-wid-title">Newsletter</h2>
                    <p>Sign up to our newsletter and get exclusive deals you wont find anywhere else straight to your
                        inbox!</p>
                    <div class="newsletter-form">
                        <form method="post" action="/sender/letter">
                            <input type="text" required id="letterInputName" name="name" placeholder="James Bond">
                            <input type="email" required id="letterInputEmail" name="email" placeholder="Type your email">
                            <button type="submit" name="subscribe" class="btn btn-primary">Subscribe</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div><!-- End footer-top-area -->
<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"
        integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49"
        crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"
        integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy"
        crossorigin="anonymous"></script>
</body>
</html>
