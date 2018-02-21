<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="vendors/css/normalize.css"> 
    <link rel="stylesheet" type="text/css" href="vendors/css/grid.css">
    <link rel="stylesheet" type="text/css" href="vendors/css/ionicons.min.css"> 
    <link rel="stylesheet" type="text/css" href="resources/css/style.css">
    <link href="https://fonts.googleapis.com/css?family=Lato:100,300,300i,400" rel="stylesheet">
    <title> User Registration</title>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    
    <script>
    $(document).ready(function(){
    $("input").focus(function(){
        $(this).css('background-color', '#ccffff');
        });
    });
    $(document).ready(function(){
        $("input").blur(function(){
            $(this).css('background-color', 'transparent');
        });
    });
    </script>

</head>

<body>
    <header style="height: auto">
        <nav>
            <div class="row">
                <img src="resources/img/cheese_white.png" alt="personal logo" class="logo">
                <ul class="main-nav">
                    <li> <a href="index.php"> Home </a> </li>
                    <li> <a href="products.php"> Shop </a> </li>
                    <li> <a href="login.php"> Sign in </a> </li>
                </ul>
            </div>
        </nav>

        
        <section class="section-form">
            <div class="row">
                <h2 align ="center" style="color:white  "> User Registration</h2>
                <?php

                //check for errors and show them
                session_start();
                if(isset($_SESSION["registration"])){
                    if($_SESSION["registration"] != "ok"){
                        $tmp = $_SESSION["registration"];
                        echo "<div class=\"row\" align=\"center\" style=\"padding-bottom:15px; margin-bottom:0; font-size: 1.1rem; color: white;\"><p> $tmp </p></div>";
                        $_SESSION["registration"] = "ok";
                    }
                }

                session_unset(); 
                 
                session_destroy(); 
                ?>

            </div>

            <div class="row">
                <form name="user_reg" action="adduser.php" method="post" class="contact-form"> <!--Start Form-->
                    <div class="row">
                        <div class="col span-1-of-4">
                            
                        </div>
                    
                        <div class="col span-1-of-4 login" >
                            <label for="" style="color:white;" > Username </label>
                        </div>
                        <div class="col span-1-of-4">
                            <input type="text" name="username" required>
                        </div>

                        <div class="col span-1-of-4">
                            
                        </div>
                    
                    </div>

                    <div class="row">
                        <div class="col span-1-of-4">
                            
                        </div>
                    
                        <div class="col span-1-of-4 login">
                            <label for="" style="color:white;" > Password </label>
                        </div>
                        <div class="col span-1-of-4">
                            <input type="password" name="password" required>
                        </div>
                            
                        <div class="col span-1-of-4">
                            
                        </div>
                    
                    </div>


                     <div class="row">
                        <div class="col span-1-of-4">
                            
                        </div>
                    
                        <div class="col span-1-of-4 login">
                            <label for="" style="color:white;" > Firstname </label>
                        </div>
                        <div class="col span-1-of-4">
                            <input type="text" name="firstname" required>
                        </div>
                            
                        <div class="col span-1-of-4">
                            
                        </div>
                    
                    </div>

                    <div class="row">
                        <div class="col span-1-of-4">
                            
                        </div>
                    
                        <div class="col span-1-of-4 login">
                            <label for="" style="color:white;" > Lastname </label>
                        </div>
                        <div class="col span-1-of-4">
                            <input type="text" name="lastname">
                        </div>
                            
                        <div class="col span-1-of-4">
                            
                        </div>
                    
                    </div>

                    <div class="row">
                        <div class="col span-1-of-4">
                            
                        </div>
                    
                        <div class="col span-1-of-4 login">
                            <label for="" style="color:white;" > Email </label>
                        </div>
                        <div class="col span-1-of-4">
                            <input type="email" name="email">
                        </div>
                            
                        <div class="col span-1-of-4">
                            
                        </div>
                    
                    </div>

                    <div class="row">
                        <div class="col span-1-of-3 box">
                           
                        </div>
                        <div class="col span-1-of-3 box">
                            <div class="col span-1-of-2 box login_btn">
                                <input type="submit" name="sub_btn" value="OK" align="right">
                            </div>
                            <div class="col span-1-of-2 box">
                                <input type="reset" name="res_btn" value="Cancel">
                            </div>
                        </div>

                        <div class="col span-1-of-3 box">
                            
                        </div>
                        
                    </div>
                </form> <!--End Form--> 
            </div>

        </section>

    </header>

<footer>
    <div class="row">
        <div class="col span-1-of-2">
            <ul class="footer-nav">
                <li><a href="http://localhost/ecommerce/index.php#about"> About us </a></li>
                <li><a href="#"> Blog </a></li>
                <li><a href="#"> Press </a></li>
                <li><a href="#"> iOS App </a></li>
                <li><a href="#"> Android App </a></li>
            </ul>
        </div>

        <div class="col span-1-of-2">
            <ul class="social-links">
                <li><a href="#"> <i class="ion-social-facebook"></i> </a></li>
                <li><a href="#"> <i class="ion-social-twitter"></i> </a></li>
                <li><a href="#"> <i class="ion-social-googleplus"></i> </a></li>
                <li><a href="#"> <i class="ion-social-instagram"></i> </a></li>
                
            </ul>
        </div>
    </div>

    <div class="row">
        <p> Copyright @copy; 2017 by Cheese Co. Group </p>
    </div>
</footer>
        
</body>
</html>