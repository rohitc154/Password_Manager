<?php
session_start();
?>
<html lang="en">

<head>
    <title>Password Manager</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="aboutUsstyle.css">
    <link rel="stylesheet" href="generatestyle.css">
    <link rel="stylesheet" href="footer.css">
    <script src="randomPwd.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js">
    </script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function () {
            $('#formbox').submit(function (e) { // Changed from $('#formbox')
                e.preventDefault();
                var website = $('#website').val();
                var username = $('#username').val();
                var password = $('#password').val();
                $.ajax({
                    url: 'savepwd.php',
                    type: 'POST',
                    data: { website: website, username: username, password: password },
                    success: function (response) {
                        alert("Record Saved Successfully!");
                        $('#website').val('');
                        $('#username').val('');
                        $('#password').val('');
                        // Optionally, you can perform additional actions here after successful insertion
                    },
                    error: function (xhr, status, error) {
                        console.error(xhr.responseText);
                        alert('An error occurred while processing your request.');
                    }
                });
            });
        });
    </script>
</head>

<body>

    <!-- Home -->
    <header class="navbar">
        <div class="topbanner">
            Generate and Secure your Password <img src="Assets/like.png" alt="thumbs-up">
        </div>

        <div class="nav-links flex">
            <a href="index.php" class="company-logo">
                <img src="Assets/logo3.jpg" alt="Company Logo">
                <ul class="flex">
            </a>
            <li><a href="index.php" class="hover-links">Home</a></li>
            <li><a href="aboutUs.html" class="hover-links">About Us</a></li>
            <li><a href="Services.php" class="hover-links">Services</a></li>
            <li><a href="loginfinal.html" class="primary-button">Login</a></li>
            </ul>
        </div>
    </header>

    <div class="container">
        <section>
            <div class="intro flex">
                <div class="introtag intro flex">
                    <h1>Password Confidentiality</h1>
                    <p>At <b>SecurePass</b>, we take your online security seriously. Our mission is to provide you with
                        strong, unique
                        passwords that protect your accounts from unauthorized access.</p>

                    <a href="Services.php" class="primary-button flex">Get Started</a>

                </div>

                <img src="Assets/GridArt_20240417_012614628.png" alt="">
            </div>
        </section>

        <!-- Service Section -->

        <h2>Services</h2>
        <!-- Generating Password -->

        <div class="formcontainer">
            <form action="#" method="post" class="formbox">

                <h2>Generate Password</h2>
                <label for="noOfCharacter">Enter Number of Charcter :
                </label>
                <input type="number" name="noOfCharacter" id="noOfCharacter" value="5" onblur="getChar()">

                <label for="typeOfChar">Select The Type of Password you want to generate : </label>
                <select id="typeOfChar" onchange="typeChar()">
                    <option value="">Select type of Charcter</option>
                    <option value="numeric">Numeric</option>
                    <option value="alphanumeric">Alphanumeric</option>
                    <option value="specialchar">Alphanumeric with Special Character</option>
                </select>

                <label for="">Your Password is : </label>
                <p id="genpwwd" style="text-align: center;"></p>

                <!-- <button class="btn" onclick="typeChar()">Generate</button> -->

            </form>
            <div class="servimg">
                <img src="Assets/16img.jpg" alt="">
            </div>
        </div>


        <!-- Password Adding -->

        <div class="formcontainer">
            <div class="servimg">
                <img src="Assets/14img.jpg" alt="">
            </div>
            <form id="formbox">
                <!-- header("Location: index.html"); -->

                <h2>Add Your Password</h2>

                <label for="website">Website : </label>
                <input type="text" name="website" id="website" required>
                <br>
                <label for="username">Username : </label>
                <input type="text" name="username" id="username" required>
                <br>
                <label for="password">Password : </label>
                <input type="password" name="password" id="password" required>
                <br>
                <button class="btn">Submit</button>
            </form>
        </div>

        <!-- ------------------------------------------------------------------------------------------------------ -->
        <!-- Retrive Your Password -->

        <div class="formcontainer">
            <form action="#" method="post" class="formbox">

                <h2>Retrive Your Password</h2>
                <label for="website">Enter Website Name : </label>
                <input type="text" name="website" id="website" placeholder="Enter Your Website"
                    value='Enter Website Name'>

                <label for="">Your Username : </label>
                <p id="uname"></p>

                <label for="">Your Password : </label>
                <p id="pwd"></p>

                <div>
                    <button class="btn" type="submit">Retrive</button>
                </div>
            </form>
            <div class="servimg">
                <img src="Assets/13.jpg" alt="">
            </div>
        </div>
    </div>
    <?php
    if (isset($_POST['website'])) {
        $website = $_POST['website'];

        $server = "localhost";
        $username = "root";
        $password = "";
        $database = "project";

        $conn = mysqli_connect($server, $username, $password, $database);


        $sql1 = "SELECT * FROM `pwddetail` WHERE website='$website';";
        $result = $conn->query($sql1);

        $row = $result->fetch_assoc();

        //Showing the Output
        $json_data = json_encode(array('un' => $row['username'], 'pw' => $row['password']));


        // Output JSON data
        echo '<script>';
        echo 'var jsonData = ' . $json_data . ';';
        // JavaScript variable holding JSON data
// echo 'console.log(jsonData);';
    
        echo '</script>';
    }
    ?>

    <script>
        // JavaScript code to write PHP variable value into HTML element
        document.getElementById("uname").innerText = jsonData.un;
        document.getElementById("pwd").innerText = jsonData.pw;
    </script>
    <!-- ------------------------------------------------------------------------------------------------------------------------ -->

    <!-- About Us -->

    <div class="aboutus">
        <div>
            <h1>About Us</h1>
            <p class="intropara"><b>Welcome to SecurePass!</b>
                At <b>SecurePass</b>, we take your online security seriously. Our mission is to provide you with strong,
                unique
                passwords that protect your accounts from unauthorized access. Our password generator creates random,
                complex
                passwords that are virtually impossible to guess. But that's not all. we also ensure that your passwords
                are
                stored securely.
            </p>

            <div class="workpara">
                <div>
                    <h3>How it Works : </h3>
                    <p>
                        <b>Password Generation:</b> Click the <b>"Generate Password"</b> button, and our algorithm will
                        create a
                        robust
                        password foryou. You can customize the length, character types.
                        <br>
                        <b> Encryption and Salting:</b> Once generated, your password undergoes encryption and is
                        salted to
                        prevent
                        rainbow table attacks.
                        <br>
                        <b>Secure Storage:</b> We store your encrypted passwords in a dedicated, isolated database.
                        Our
                        servers are
                        protected
                        by multiple layers of security, including firewalls, intrusion detection systems, and
                        regular
                        security
                        audits.
                        <br>
                        <b>Zero-Knowledge Policy :</b> We follow a strict zero-knowledge policy. This means that
                        even our
                        team
                        members
                        cannot
                        access your actual passwords. Only you hold the decryption key work.
                    </p>
                </div>
                <div>
                    <img src="Assets/7125363.jpg" alt="">
                </div>

            </div>
        </div>

        <div class="workpara">
            <div>
                <img src="Assets/whyimg.jpg" alt="">
            </div>

            <div>
                <h3>Why Choose SecurePass?</h3>
                <p>
                    <b>Peace of Mind:</b> Rest easy knowing that your passwords are strong and well-protected.
                    <br>
                    <b>Convenience:</b> Access your passwords securely from any device.
                    <br>
                    <b>Privacy:</b> We don't track or sell your data. Your privacy is our priority.
                </p>
            </div>

        </div>
        <div class="lastpara intropara">
            Join thousands of satisfied users who trust SecurePass for their password needs.
            <br>
            <b>Secure passwords today!</b>
        </div>
        <h2 class="intropara  team">Our Shinning Stars!</h2>
        <div class="usContainer">

            <div class="personal">
                <img src="Assets/ujjwalimg.jpg" alt="">
                <h3>Ujjwal Kumar</h3>
                <p>Hii! I'm ujjwal, currently pursuing my bachelors degree in Computer Application and front-end
                    developer.</p>
                <a href="https://www.linkedin.com/in/ujjwal-kumar-5a4126231?utm_source=share&utm_campaign=share_via&utm_content=profile&utm_medium=android_app"
                    target="_blank"><img class="logo mail" src="Assets/linkedin.png" alt="mail"></a>
                <a href="https://github.com/Ujjwalkr01-Tech/" target="_blank"><img class="logo github"
                        src="Assets/github.png" alt=""></a>
            </div>
            <div class="personal">
                <img src="Assets/picKalyani.jpg" alt="">
                <h3>Komal Kalyani</h3>
                <p>Hii! I'm Komal Kalyani, currently pursuing my bachelors degree in Computer Application and front-end
                    developer.</p>
                <a href="https://www.linkedin.com/" target="_blank"><img class="logo mail" src="Assets/linkedin.png"
                        alt="mail"></a>
                <a href="https://github.com/" target="_blank"><img class="logo github" src="Assets/github.png"
                        alt=""></a>
            </div>
            <div class="personal">
                <img src="Assets/pawanimg.jpg" alt="">
                <h3>Pawan Priy</h3>
                <p>Hii! I'm Pawan, currently pursuing my bachelors degree in Computer Application and front-end
                    developer.</p>
                <a href="https://www.linkedin.com/ " target="_blank"><img class="logo mail" src="Assets/linkedin.png"
                        alt="mail"></a>
                <a href="https://github.com/" target="_blank"><img class="logo github" src="Assets/github.png"
                        alt=""></a>
            </div>
            <div class="personal">
                <img src="Assets/rohitimg.jpg" alt="">
                <h3><a href=" https://rohitc154.github.io/Portfolio/" target="_blank" style="color: black;">Rohit
                        Kumar</a></h3>
                <p>Hii! I'm Rohit, currently pursuing my bachelors degree in Computer Application and can develop full
                    stack Web
                    Application.</p>
                <a href="https://www.linkedin.com/in/rohit-kumar-a1b41720a?utm_source=share&utm_campaign=share_via&utm_content=profile&utm_medium=android_app"
                    target="_blank"><img class="logo mail" src="Assets/linkedin.png" alt="mail"></a>
                <a href="https://github.com/rohitc154" target="_blank"><img class="logo github" src="Assets/github.png"
                        alt=""></a>
            </div>
        </div>
    </div>
    </div>

    <footer>
        <div class="footer_container">
            <div class="footer-content">
                <div class="footer-logo">
                    <img src="Assets/logo3.jpg" alt="Password Manager Logo">
                </div>
                <div class="footer-links">
                    <ul>
                        <li><a href="index.html">Home</a></li>
                        <li><a href="aboutUs.html">About Us</a></li>
                        <li><a href="Services.php">Services</a></li>
                        <!-- <li><a href="#">FAQ</a></li> -->
                        <!-- <li><a href="cards.html">Contact Us</a></li> -->
                    </ul>
                </div>
                <div class="footer-contact">
                    <p>Contact Us:</p>
                    <p>Email: info.besecureaz@gmail.com</p>
                    <p>Phone: 123-456-7890</p>
                </div>
            </div>
            <hr>
            <div class="footer-bottom">
                <p>&copy; 2024 Password Manager. All rights reserved.</p>
            </div>
        </div>
    </footer>

    <!-- <script src="randomPwd.js"></script> -->
</body>

</html>