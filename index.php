<?php 

	session_start();

	if(isset($_SESSION["user_id"]))
	{
		$mysqli = require __DIR__ . "/database.php";

		$sql = "SELECT * FROM user 
				WHERE id = {$_SESSION["user_id"]}";


		$result = $mysqli->query($sql);

		$user = $result->fetch_assoc();

	}

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://unpkg.com/mvp.css@1.12/mvp.css"> 
	<link rel="stylesheet" href="style.css" type="text/css"
        media="screen">
        <link
        href="https://fonts.googleapis.com/icon?family=Material+Icons"
        rel="stylesheet">
	<title>Home</title>
</head>
<body>

	<h1>Supernatural Supplements</h1>

	<?php if(isset($user)): ?>

		<p>Hello <?= htmlspecialchars($user["name"]) ?></p>

		<p><a href="logout.php">Log out</a></p>

	<?php else: ?>

		<p><a href="login.php">Log in</a> or <a href="signup.html">Sign up</a></p>

	<?php endif; ?>
<div id="header">
            <div>
                <img id="header-img" src="https://nida.nih.gov/sites/default/files/2020-05/steroids-rr-promo.jpg">
            </div>
            <nav id="nav-bar">
                <a class="nav-link" href="#features">Features</a>
                <a class="nav-link" href="#video">How it works</a>
                <a class="nav-link" href="#pricing">Pricing</a>
            </nav>
        </div>

        <div id="content">
            <div id="form-space">
                <h2>
                    Handcrafted, home-made 
                </h2>
            </div>
    
            <div id="features">
                <div class="features-box">
                    <span
                    class="material-icons md-48">local_fire_department</span>
                    <div class="feature-text">
                        <h4 class="feature-title">
                            Premium Materials
                        </h4>
                        <p class="feature-description">
                            Our supplements use the highest quality produce which is
                            sourcered locally. 
                        </p>
                    </div>
                </div>
                <div class="features-box">
                    <span class="material-icons md-48">local_shipping</span>
                    <div class="feature-text">
                        <h4 class="feature-title">
                            Fast Shipping
                        </h4>
                        <p class="feature-description">
                            We make sure you recieve your supplements as soon
                            as we have finished making it. We also provide
                            free returns if you are not satisfied.  
                        </p>
                    </div>                
                </div>
                <div class="features-box">
                    <span class="material-icons md-48">search</span>
                    <div class="feature-text">
                        <h4 class="feature-title">
                            Quality Assurance
                        </h4>
                        <p class="feature-description">
                            For every purchase you make, we will ensure
                            that you get only highest quality supplement, 100% money back guarantee if customer is not . 
                        </p>
                    </div>                
                </div>
            </div>
    
            <div>
                <iframe id="video" width="450" height="300"
                src="https://www.youtube-nocookie.com/embed/ieejNOESjrY?rel=0&controls=0&showinfo=0">
                </iframe>
            </div>
    
            <div id="pricing">
                <div class="pricing-detail">
                    <h4 class="pricing-title">
                        Trenbolone acetate
                    </h4>
                    <h2>
                        $599
                    </h2>
                    <ul>
                        <li>Trenbolone acetate, sold under brand names such as Finajet and Finaplix among others, is an androgen and anabolic steroid medication which is used in veterinary medicine, specifically to increase the profitability of livestock by promoting muscle growth in cattle.</li>
                    </ul>
                  <a href="cart.php">
                    <button>SELECT</button>
                  </a>
                </div>
                <div class="pricing-detail">
                    <h4 class="pricing-title">
                        Stanozolol
                    </h4>
                    <h2>
                        $499
                    </h2>
                    <ul>
                        <li>Stanozolol, sold under many brand names, is an androgen and anabolic steroid medication derived from dihydrotestosterone. It is used to treat hereditary angioedema.</li>
                    </ul>
                    <a href="cart.php">
                    	<button>SELECT</button>
                	</a>
                </div>
                <div class="pricing-detail">
                    <h4 class="pricing-title">
                        Oxandrolone
                    </h4>
                    <h2>
                        $699
                    </h2>
                    <ul>
                        <li>Oxandrolone, sold under the brand names Oxandrin and Anavar, among others, is an androgen and anabolic steroid (AAS) medication which is used to help promote weight gain in various situations, to help offset protein catabolism caused by long-term corticosteroid therapy, to support recovery from severe burns, to treat bone pain associated with osteoporosis, to aid in the development of girls with Turner syndrome, and for other indications. It is taken by mouth.</li>
                    </ul>
                    <a href="cart.php">
                    	<button>SELECT</button>
                	</a>
                </div>
            </div>

            <footer>
                <div class="footerlinks">
                    <a class="foot-link" href="https://nida.nih.gov/publications/research-reports/steroids-other-appearance-performance-enhancing-drugs-apeds/what-are-side-effects-anabolic-steroid-misuse">Get help</a>
                    <a class="foot-link" href="http://procatinator.com">Click me</a>
                </div>
                <p>Copyright 2042, Certified Anabolic Moment</p>
            </footer>

        </div>
        
        
</body>
</html>