<!DOCTYPE html>
<html lang="en">
    <head>
        <link rel="stylesheet" type="text/css" href="vendors/css/normalize.css"> 
        <link rel="stylesheet" type="text/css" href="vendors/css/grid.css">
        <link rel="stylesheet" type="text/css" href="vendors/css/ionicons.min.css"> 
        <link rel="stylesheet" type="text/css" href="resources/css/style.css">
        <link href="https://fonts.googleapis.com/css?family=Lato:100,300,300i,400" rel="stylesheet">
        <title> Cheese Co.</title>
    </head>
    <body>
        <header>
        <nav>
            <div class="row">
            <img src="resources/img/cheese_white.png" alt="personal logo" class="logo">
            <ul class="main-nav">
                <li> <a href="#about"> About </a> </li>
                <li> <a href="products.php"> Shop </a> </li>
                <li> <a href="registration.php"> Sign up </a> </li>
                <li> <a href="login.php"> Sign in </a> </li>
                <li> <a href="#contact"> Contact </a> </li>
            </ul>

            </div>
        </nav>
        <div class="hero-text-box">
            <h1> Order your cheese online. <br> Anytime. Any quantity.</h1>
            <a class="btn btn-full" href="products.php"> Order now</a>
            <a class="btn btn-ghost" href="#about"> Show me more</a>
        </div>
        </header>

        <section id="about" class="section-features">
            <div class="row">
                <h2> Get your favorite cheese &mdash; fast </h2>
                <p class="long-copy"> Hello, we’re Cheese Co., your new premium cheese delivery service. We know you’re always busy. No time for buying your favorite chees. So let us take care of that! </p>
            </div>

            <div class="row">

                
                <div class="col span-1-of-3 box">
                    <i class="ion-ios-stopwatch-outline icon-big"></i>
                    <h3> Deliver in 24 hours </h3>
                    <p> You're only twenty minutes away from your delicious cheese delivered right to your home. We work with the best cheese producers to ensure that you're 100% happy. </p>
                </div>

                <div class="col span-1-of-3 box">
                    <i class="ion-ios-nutrition-outline icon-big"></i>
                    <h3> 100% Organic</h3>
                    <p> All our cheese are organic, fresh and authentic. Cows & goat are raised without added hormones or antibiotics. Good for your health, the environment! </p>
                </div>

                <div class="col span-1-of-3 box">
                    <i class="ion-ios-cart-outline icon-big"></i>
                    <h3> Order anything </h3>
                    <p> Our cheese menu increases everyday so that we don't limit your choice. Currently, you can choose from our menu of over 500 delicious types of cheese. It's up to you! </p>
                </div>

             </div>

        </section>


    <section class="section-meals">
        <ul class="meals-showcase clearfix">
            <li>
                <figure class="meals-photo">
                    <img src="resources/img/1.jpg" alt="Korean bibimbap with egg and vegetables">
                </figure>
            </li>

            <li>
                <figure class="meals-photo">
                    <img src="resources/img/2.jpg" alt="Simple italian pizza with cherry tomatoes">
                </figure>
            </li>

            <li>
                <figure class="meals-photo">
                    <img src="resources/img/3.jpg" alt="Chicken breast steak with vegetables">
                </figure>
            </li>

            <li>
                <figure class="meals-photo">
                    <img src="resources/img/4.jpg" alt="Autumn pumpkin soup">
                </figure>
            </li>
        </ul>

        <ul class="meals-showcase clearfix">
            <li>
                <figure class="meals-photo">
                    <img src="resources/img/5.jpg" alt="Paleo beef steak with vegetables">
                </figure>
            </li>

            <li>
                <figure class="meals-photo">
                    <img src="resources/img/6.jpg" alt="Healthy baguette with egg and vegetables">
                </figure>
            </li>

            <li>
                <figure class="meals-photo">
                    <img src="resources/img/7.jpg" alt="Burger with cheddar and bacon">
                </figure>
            </li>

            <li>
                <figure class="meals-photo">
                    <img src="resources/img/8.jpg" alt="Granola with cherries and strawberries">
                </figure>
            </li>
        </ul>
    </section>

    <section class="section-steps" id="how-it-works">
        <div class="row">
            <h2> How it works &mdash; Simple as 1, 2, 3 </h2> 
        </div>

        <div class="row">
            <div class="col span-1-of-2 steps-box-1">
              <img src="resources/img/app-iPhone.png" alt="Omnifood app on iPhone" class="app-screen">  
            </div>

            <div class="col span-1-of-2 steps-box-2">
                <div class="works-step">
                    <div>1</div>
                    <p>Choose the cheese you like and enter quantity.</p>
                </div>

                <div class="works-step">
                    <div>2</div>
                    <p> Order your favourite cheese using our website or mobile app. Or call us directly!</p>
                </div>

                <div class="works-step">
                    <div>3</div>
                    <p>Receive your cheese within 24 hours. See you the next time!</p>
                </div>

                <a href="#" class="btn-app"><img src="resources/img/download-app.svg" alt="App Store Button"></a>

                <a href="#" class="btn-app"><img src="resources/img/download-app-android.png" alt="Play Store Button"></a>
            </div>

        </div>
    </section>

    <section id="contact" class="section-form">
        <div class="row">
            <h2>We're happy to hear from you</h2> 
        </div>
        <div class="row">
            <form method="post" action="#" class="contact-form">
                <div class="row">
                    <div class="col span-1-of-3">
                        <label for="name">Name</label>
                    </div>
                    <div class="col span-2-of-3">
                        <input type="text" name="name" id="name" placeholder="Your name" required>
                    </div>
                </div>

                <div class="row">
                    <div class="col span-1-of-3">
                        <label for="email">Email</label>
                    </div>
                    <div class="col span-2-of-3">
                        <input type="email" name="email" id="email" placeholder="Your email" required>
                    </div>
                </div>

                <div class="row">
                    <div class="col span-1-of-3">
                        <label for="find-us">How did you find us?</label>
                    </div>
                    <div class="col span-2-of-3">
                        <select name="find-us" id="find-us">
                            <option value="friends" selected>Friends</option>
                            <option value="search">Search engine</option>
                            <option value="ad"> Advertisment</option>
                            <option value="other"> Other</option>
                        </select>
                    </div>
                </div>

                <div class="row">
                    <div class="col span-1-of-3">
                        <label for="news">Newsletter</label>
                    </div>
                    <div class="col span-2-of-3">
                        <input type="checkbox" name="news" id="news" checked> Yes, please.
                    </div>
                </div>  

                <div class="row">
                    <div class="col span-1-of-3">
                        <label for="message">Drop us a line </label>
                    </div>
                    <div class="col span-2-of-3">
                        <textarea name="message" placeholder="Your message"></textarea>
                    </div>
                </div> 

                <div class="row">
                    <div class="col span-1-of-3">
                        <label> &nbsp; </label>
                    </div>
                    <div class="col span-2-of-3">
                        <input type="submit" value="Send it!">
                    </div>
                </div> 

            </form>
        </div>
    
    </section>

    <footer>
        <div class="row">
            <div class="col span-1-of-2">
                <ul class="footer-nav">
                    <li><a href="#"> About us </a></li>
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