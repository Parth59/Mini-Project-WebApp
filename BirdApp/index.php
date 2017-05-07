<?php
include('login.php'); // Includes Login Script

if(isset($_SESSION['login_user'])){
header("location: profile.php");
}
?>


<head>
    


     <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="http://birds.thenatureweb.net/css/templatemo_style.css" />

<style>
.login-page {
  width: 360px;
  padding: 8% 0 0;
  margin: auto;
}
</style>


</head>
<body>

<header>
        <div id="top-header">
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <div class="home-account">
                            <a href="advancedlogin.php">Sign In</a>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="cart-info">
                            <span id="lblUserName"></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div id="main-header">
            <div class="container">
                <div class="row">
                    <div class="col-md-3">
                        <div class="logo">
                            <img src="icon.png" title="DA-IICT BIRD APP" alt="DA-IICT BIRD APP">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="main-menu">
                            <ul>
                                <li><a href="Default.aspx">Home</a></li>
                                <li><a href="hotspots.aspx">Hotspots</a></li>
                                <li><a href="aboutus.aspx">About</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="search-box">
                          
                        </div>
                    </div>
                </div>
            </div>
        </div>
</header>




<div id="heading">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="heading-content">
                        <h2>MY ACCOUNT</h2>
                        <span></span>
                    </div>
                </div>
            </div>
        </div>
    
</div>


<div class="login-page">

        <span id="body_lblMessage" style="color:Red;font-size:Small;"></span>
        <div class="form">
            
                    
                        <form action="" method="post">


                       <label>UserName :</label> <input id="name" name="username" placeholder="username" type="text">
                       </br>
                       <label>Password :</label> <input id="password" name="password" placeholder="**********" type="password">            
                        <input name="submit" type="submit" value=" Login ">
                        <span><?php echo $error; ?></span>

                        </form>
                    
                
        </div>
    


</div>




    </body>
