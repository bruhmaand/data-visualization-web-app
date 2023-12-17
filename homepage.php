<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HOMEPAGE</title>
    
    <link rel="stylesheet" type="text/css" href="./MYsrc/MYhome.css">
    <link rel="stylesheet" type="text/css" href="./MYsrc/footer.css">
    <link rel="stylesheet" type="text/css" href="./MYsrc/admin.css">

    <style>
            section {
            padding: 50px;
            margin: 20px 0;
            background-color: #f9f9f9;
            border-bottom: 1px solid #ddd;
        }

        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        .head {
            background-color: #f1f1f1;
            padding: 15px;
            text-align: center;
        }

        .navigatiom {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .logo {
            color: blueviolet;
            margin: 0;
        }

        .nav-list {
            list-style: none;
            display: flex;
            margin: 0;
        }

        .nav-list li {
            margin-right: 20px;
        }
    </style>

    <!-- sign up form -->


    
</head>
<body>
    
    <div class="head">


        <nav class="navigatiom">
            <h2 class="logo" style="color: blueviolet;">scoreWall</h2>
            <ul class="nav-list">
                <li ><a href="#home">Home</a></li>
                <li ><a href="#about">About</a></li>
                <li ><a href="#contact">Contact</a></li>
                <li class="logged-in" style="display: none;" ><a href="student.php">View result</a></li>

            </ul>
            <div class="rightBTN">

            <button type="button" class="navBTN-signUP logged-out" data-target="modal-signUP" style="display: none;" >Sign up</button>
            <button type="button" class="navBTN-login logged-out" data-target="modal-login" style="display: none;" >Login</button>
            <button type="button" class="navBTN-logout logged-in" data-target="modal-logout" style="display: none;" >Logout</button>
            <button type="button" class="adBTN logged-in adminBTN" id="teacher_panel" style="display: none;">Teacher Panel</button>
            </div>
        </nav>

<script>
    document.getElementById("teacher_panel").addEventListener("click", function() {
        window.location.href = "teacher-login.php";
    });

</script>
    </div>

    <div class="grand-wrapper" style="background:lightgreen">
    
    <p class="body-text" 
    style="font-family: Arial, sans-serif;
    font-size: 6em;
    padding: 20px;">
    Hi! Welcome To My SEM V Project<br>
    <span style="font-size: 0.5em;color: #800020;">Sachin Verma</span>
    </p>

    <!-- signup -->
        <div class="wrapper-parent" id="modal-signUP" >


            <div class="Swrapper" style="background:#bcc8fc">
                <span class="Sicon-close">X</span>
                <div class="form-box signUP">
                    <h2>Sign UP!</h2>
                    
                    <form id="signUP-form">
                        <div class="input-box">
                            <label>Email:</label><br>
                            <input type="email" id="signUP-email" required>
                        </div>

                        <div class="input-box">
                            <label>Password:</label><br>
                            <input type="password" id="signUP-password" required> 
                        </div><br>

                        <button type="submit" class="signUP-btn">sign UP</button>                  
                    </form>
                </div>
            </div>
        </div>

        <!-- login -->
        <div class="wrapper-parent" id="modal-login">
            <div class="wrapper" style="background:#bcc8fc">
                <span class="icon-close">X</span>
                <div class="form-box login">
                    <h2>login!</h2>

                    <form id="login-form">
                        <div class="input-box">
                            <label>Email:</label><br>
                            <input type="email" id="login-email" required>
                        </div>

                        <div class="input-box">
                            <label>Password:</label><br>
                            <input type="password" id="login-password" required> 
                        </div>
                        <br>
                       
                        <button type="submit" class="btn">login</button>
                        <div class="login-learn">
                            <p>dont have an account?
                            <a href="#about" class="learn-link">learn more</a></p>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    
    <div style="margin-top: 100px; margin-left: 50px">
            <!-- Sections -->
    <section id="home">
        <h1>Welcome to scoreWall</h1>
        <p>Student results can be hard to understand and comprehend because not every college or
university provides clean, useful, data-driven visualizations of the results.
<br>
Many students face this problem - they get the results, but it is hard to understand. 
<br>A "Student
result data visualization" can be a great way of solving this problem, which is faced by many
students and teachers.</p>
        
    </section>

    <section id="about">
        <h2>About Us</h2>
        <p>Hii there! my name is Sachin Verma </p>
        <p>
            I am in my 3rd year of Bsc. Computer Science course.<br>
            This is my semster 5 project website.<br>
            I hope you find this website usefull.
        </p>
    </section>

    <section id="contact">
        <h2>Contact Us</h2>
        <p>Email ID: sachinverma2476120[@]gmail[.]com <br>
            <a href="https://drive.google.com/file/d/126zi5723sy78VRjo5_-0PxqIDEfeLSMt/view?usp=sharing">My Resume</a>
        </p>
    </section>
</div>

    <!-- footer -->
    <footer class="footer">
        <div class="container">
            <div class="row">
                <div class="footer-col">
                    <h4>About Me</h4>
                    <ul>
                        <li><a href="#about">About Us</a></li>
                        <li><a href="#contact">Contact</a></li>
                        <li><a href="#">Help</a></li>
                    </ul>
                </div>

                <div class="footer-col">
                    <h4>Follow Us</h4>
                    <div class="social-links">
                        <li><a href="https://www.linkedin.com/in/sver/">LinkedIn</a></li>
                        <li><a href="https://github.com/bruhmaand/">Github</a></li>
                    </div>
                    
                </div>
            </div>
        </div>
    </footer>

    <script src="popUP.js"></script>
    <script type="module" src="auth.js"></script>

</body>
</html>