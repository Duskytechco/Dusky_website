<?php
$message = "";
try {
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $message = "";
        // Establish a database connection
        $servername = "srv1103.hstgr.io";
        $username = "u447928304_admin";
        $password = "1XzyxA/>s";
        $dbname = "u447928304_CRM_Signup";
        
        $conn = new mysqli($servername, $username, $password, $dbname);
        
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
        
        // Retrieve data from the form
        $name = $_POST['name'];
        $email = $_POST['email'];
        $phoneNumber = $_POST['phoneNumber'];
        $companyName = $_POST['companyName'];
        $UEN = $_POST['UEN'];
        $dealerships = $_POST['dealerships'];
        
        // Insert data into the database
        $sql = "INSERT INTO Signup (Name, Email, PhoneNumber, CompanyName, UEN, Dealerships,Status) VALUES (?, ?, ?, ?, ?, ?,'PENDING')";
        
        $stmt = $conn->prepare($sql);
        
        $stmt->bind_param("ssssss",$name, $email, $phoneNumber, $companyName, $UEN, $dealerships);
        
        if ($stmt->execute()) {
            // echo "Record added successfully";
        } else {
            // echo "Error: " . $sql . "<br>" . $conn->error;
        }
        $stmt->close();
        $conn->close();
    }
} 
catch(Exception $e){ 
    $message = $e->getMessage();
    echo "exception: " . $e->getMessage();
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Duskyco</title>
    <meta name="keywords" content="" />
    <meta name="description" content="" />
    <link
      rel="stylesheet"
      media="screen"
      href="https://fontlibrary.org//face/glacial-indifference"
      type="text/css"
    />
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.4.1/css/bootstrap.css"
    />
    <link
      rel="stylesheet"
      href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css"
    />
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"
    />

    <script>
      function highlightCurrentPageLink() {
          // Get the current page's filename (e.g., "index.html")
          var currentPage = location.pathname.split("/").slice(-1)[0];

          // Remove the file extension (e.g., ".html")
          currentPage = currentPage.replace(".php", "");

          // Find the corresponding link and add a class to highlight it
          var link = document.getElementById(currentPage + "-link");
          if (link) {
              link.classList.add("current");
          }
      }

      // Call the function when the page loads
      window.onload = highlightCurrentPageLink;
    </script>  

  </head>
  <header class="parallax">
    <!-- include header -->
    <div id="headerContainer"></div>
    <script>
      // Function to fetch and insert the header content
      function includeHeader() {
          fetch('header.html')
              .then(response => response.text())
              .then(data => {
                  document.getElementById('headerContainer').innerHTML = data;
              })
              .catch(error => {
                  console.error('Error fetching header content:', error);
              });
      }

      // Call the function to include the header
      includeHeader();
    </script>
    <!-- End of Header -->
  </header>
  <body>
    <div class="form-container">
        <!--<h3><?php echo $message; ?></h3>-->
      <form method="post">
        <label for="name">Name:</label>
        <input type="text" name="name" placeholder="Name" />

        <label for="email">Email:</label>
        <input type="email" name="email" placeholder="Email" />

        <label for="phoneNumber">Phone Number:</label>
        <input
          type="text"
          name="phoneNumber"
          placeholder="Phone Number"
        />

        <label for="companyName">Company Name:</label>
        <input
          type="text"
          name="companyName"
          placeholder="Company Name"
        />

        <label for="UENNumber">UEN:</label>
        <input
          type="text"
          name="UEN"
          placeholder="UEN"
        />

        <label for="dealerships">Dealerships:</label>
        <input
          type="text"
          name="dealerships"
          placeholder="Dealerships"
        />

        <button type="submit">Sign Up</button>
      </form>
    </div>

    <!-- include Footer -->
    <div id="footerContainer"></div>
      <script>
        // Function to fetch and insert the header content
        function includeHeader() {
            fetch('footer.html')
                .then(response => response.text())
                .then(data => {
                    document.getElementById('footerContainer').innerHTML = data;
                })
                .catch(error => {
                    console.error('Error fetching footer content:', error);
                });
        }

        // Call the function to include the header
        includeHeader();
      </script>
    <!-- End of Footer -->

    <style>
     /* Style the form container */
    .form-container {
        max-width: 50%;
        margin: 0.8rem auto;
      }
  
      /* Style form elements */
      .form-container input, .form-container button {
        width: 100%;
        padding: 15px; /* Increase padding for larger size */
        margin: 10px 0; /* Increase margin for spacing */
        box-sizing: border-box;
        border: 2px solid #007bff; /* Add border for input elements */
        border-radius: 10px; /* Rounded corners */
        outline: none; /* Remove outline on focus */
        font-size: 16px; /* Increase font size */
      }
  
      /* Style the labels */
      .form-container label {
        display: block;
        font-weight: bold;
        color : #fff;
        font-size: 1.5rem;
      }
    
      .form-container input::placeholder {
        font-size: 16px; /* Increase the placeholder font size */
      }

      /* Style the submit button */
      .form-container button {
        background-color: #007bff;
        color: #fff;
        cursor: pointer;
        transition: background-color 0.3s;
        font-size: 24px;
      }
  
      .form-container button:hover {
        background-color: #0056b3; /* Darker color on hover */
      }
  
      /* Add some spacing for readability */
      .form-container .spacing {
        margin-top: 20px;
      }

      .parallax {
        /* The image used */
        background-image: url("images/teams.jpg");
        opacity: 90%;

        /* Set a specific height */
        min-height: 100%;

        /* Create the parallax scrolling effect */
        background-attachment: fixed;
        background-position: center;
        background-repeat: no-repeat;
        background-size: cover;
      }
      .container {
        width: 80%;
        margin: auto;
        overflow: hidden;
      }
      .button_submit {
        height: 68px;
        background: #cdad7d;
        border: 0;
        padding-left: 40px;
        padding-right: 40px;
        margin-bottom: 20px;
        color: #31eaff;
      }

      .dark {
        padding: 15px;
        margin-top: 10px;
        margin-bottom: 10px;
        background: #35424a;
        color: #fff;
      }

      /* Header */
      header {
        background: #090909;
        color: #fff;
        padding-top: 30px;
        min-height: 70px;
      }

      header a {
        color: #fff;
        text-decoration: none;
        text-transform: uppercase;
        font-size: 1.08rem;
      }

      header li {
        display: inline;
        padding: 0 20px;
      }

      header #branding {
        float: left;
      }

      header #branding h1 {
        margin: 0;
      }

      header nav {
        float: right;
        margin-top: 10px;
      }

      header .highlight,
      /* header .current a {
        color: #e8491d;
        font-weight: bold;
      } */

      /* Style for the current link */
      .current {
          color: #e8491d;
          font-weight: bold;
      }

      header a:hover {
        color: #ccc;
        font-weight: bold;
      }
      ul {
        margin: 0;
        padding: 0;
        list-style: none;
      }
      img {
        max-width: 100%;
        height: auto;
      }

      @import url("https://fonts.cdnfonts.com/css/glacial-indifference-2");

      body {
        font: 12px/1.5 "Glacial Indifference", sans-serif;
        padding: 0;
        margin: 0;
        background-color: #000000;
      }

      p,
      h1,
      h2,
      h3 {
        font-family: "GlacialIndifferenceRegular";
        font-weight: normal;
        font-style: normal;
      }
      .row222 {
        display: flex;
        padding: 1rem;
        font-size: 1.4rem;
        background-color: #131e3d;
      }

      .column {
        width: calc(100% / 3);
        padding: 0 0.9375rem;
      }

      .row222 h4 {
        font-size: 1.6rem;
        color: #cdad7d;
      }

      .row222 p {
        color: white;
      }

      .row222 a {
        color: white;
      }
      .row222 ul {
        list-style: none;
        margin: 0;
        padding: 0;
      }

      .row222 ul li {
        margin-bottom: 0.625rem;
      }

      .row222 ul li a {
        color: #ffffff;
        font-size: 1rem;
      }

      .row222 ul li i {
        color: #6faaff;
      }

      .row222 ul li a:hover {
        color: #6faaff;
      }

      .row222 ul.social-icons {
        display: flex;
        column-gap: 0.625rem;
      }

      .social-icons i {
        color: white;
      }

      ul.social-icons li {
        margin-bottom: 0rem;
      }

      ul.social-icons li a {
        display: grid;
        place-content: center;
        width: 0.5rem;
        height: 2.5rem;
        border-radius: 100%;
        background-color: #6fabff00;
      }

      ul.social-icons li:hover a {
        background-color: #cdad7d;
      }

      .copyright {
        text-align: center;
        color: #fff;
        background-color: #cdad7d;
        padding: 0.6rem 0;
      }

      /* Responsive adjustments */

      @media screen and (max-width: 768px) {
        .column {
          margin: 0.4rem 0;
          width: 100%;
          padding: 0;
        }

        .row222 {
          display: flex;
          flex-wrap: wrap;
        }

        .row222 h4 {
          font-size: 1.8rem;
        }

        .row222 p {
          font-size: 1.4rem;
        }

        .row222 ul li a {
          font-size: 1.2rem;
        }

        ul.social-icons li a {
          width: 1.875rem;
          height: 1.875rem;
        }
      }
      .row222 {
        display: flex;
        padding: 1rem;
        font-size: 1.4rem;
        background-color: #131e3d;
      }

      .column {
        width: calc(100% / 3);
        padding: 0 0.9375rem;
      }

      .row222 h4 {
        font-size: 1.6rem;
        color: #cdad7d;
      }

      .row222 p {
        color: white;
      }

      .row222 a {
        color: white;
      }
      .row222 ul {
        list-style: none;
        margin: 0;
        padding: 0;
      }

      .row222 ul li {
        margin-bottom: 0.625rem;
      }

      .row222 ul li a {
        color: #ffffff;
        font-size: 1rem;
      }

      .row222 ul li i {
        color: #6faaff;
      }

      .row222 ul li a:hover {
        color: #6faaff;
      }

      .row222 ul.social-icons {
        display: flex;
        column-gap: 0.625rem;
      }

      .social-icons i {
        color: white;
      }

      ul.social-icons li {
        margin-bottom: 0rem;
      }

      ul.social-icons li a {
        display: grid;
        place-content: center;
        width: 0.5rem;
        height: 2.5rem;
        border-radius: 100%;
        background-color: #6fabff00;
      }

      ul.social-icons li:hover a {
        background-color: #cdad7d;
      }

      .copyright {
        text-align: center;
        color: #fff;
        background-color: #cdad7d;
        padding: 0.6rem 0;
      }

      /* Responsive adjustments */

      @media screen and (max-width: 768px) {
        .column {
          margin: 0.4rem 0;
          width: 100%;
          padding: 0;
        }

        .row222 {
          display: flex;
          flex-wrap: wrap;
        }

        .row222 h4 {
          font-size: 1.8rem;
        }

        .row222 p {
          font-size: 1.4rem;
        }

        .row222 ul li a {
          font-size: 1.2rem;
        }

        ul.social-icons li a {
          width: 1.875rem;
          height: 1.875rem;
        }
      }
      section {
        padding: 50px 0;
        padding-bottom: 200px;
      }

      .height450 {
        height: 290px;
      }

      .badge-info {
        background-color: rgba(23, 160, 184, 0.17);
        color: #17a2b8;
      }

      .section-title .badge {
        margin: 0 0 8px;
      }
      .badge {
        border-radius: 100px;
        font-stretch: normal;
        font-style: normal;
        font-weight: 500;
        letter-spacing: 1px;
        line-height: normal;
        padding: 6px 16px;
        text-transform: uppercase;
      }

      .h1,
      .h2,
      .h3,
      .h4,
      .h5,
      .h6,
      h1,
      h2,
      h3,
      h4,
      h5,
      h6 {
        color: #cdad7d;
      }

      h2 {
        font-size: 56px;
      }

      .social-overlap {
        position: absolute;
        width: 100%;
        transform: translateY(-50%);
      }

      .justify-content-center {
        -ms-flex-pack: center !important;
        justify-content: center !important;
      }
      .justify-content-center {
        -webkit-box-pack: center !important;
        -ms-flex-pack: center !important;
        justify-content: center !important;
      }

      .social-bar {
        display: flex;
        border-radius: 60px;
        box-shadow: 0 0 35px rgba(0, 208, 255, 0.692);
      }
      .iconpad {
        padding: 12px 0;
        width: 100%;
      }
      .mb-3,
      .my-3 {
        margin-bottom: 2rem !important;
      }

      .process-scetion .slider-nav-item {
        position: relative;
        flex-grow: 0;
        flex-shrink: 0;
        border-radius: 50%;
        text-align: center;
        cursor: pointer;
        transition: all 0.4s ease;
      }

      .social-icons a {
        border-radius: 50px;
        color: #3f345f;
        display: inline-block;
        line-height: 52px;
        height: 90px;
        width: 90px;
        box-shadow: 0 5px 25px rgba(93, 70, 232, 0.15);
        margin: 15px 15px;
        font-size: 22px;
      }

      a {
        text-decoration: none !important;
        color: #3f345f;
        transition: all 0.3s ease 0s;
      }

      .slider-nav-item:before {
        position: absolute;
        content: "";
        height: calc(100% + 16px);
        width: calc(100% + 16px);
        top: -8px;
        left: -8px;
        border-radius: 50%;
        border: 1px solid rgba(132, 132, 164, 0.35);
        animation: 1.5s linear 0s normal none infinite focuse;
      }

      /*socil*/
      .slider-nav {
        display: flex;
      }

      .process-scetion .slider-nav-item {
        position: relative;
        flex-grow: 0;
        flex-shrink: 0;
        border-radius: 50%;
        text-align: center;
        cursor: pointer;
        transition: all 0.4s ease;
      }
      .slider-nav-item:before {
        position: absolute;
        content: "";
        height: calc(100% + 16px);
        width: calc(100% + 16px);
        top: -8px;
        left: -8px;
        border-radius: 50%;
        border: 1px solid rgba(132, 132, 164, 0.35);
        animation: 1.5s linear 0s normal none infinite focuse;
      }

      .process-scetion .slider-nav-item:after {
        position: absolute;
        top: 50%;
        left: 100%;
        height: 2px;
        content: "";
        width: 100%;
        z-index: 0;
        animation: slide 1s linear infinite;
      }
      .process-scetion .slider-nav-item:last-child:after {
        display: none;
      }
      .process-scetion .slider-nav-item .ikon {
        font-size: 50px;
        line-height: 80px;
      }

      .process-scetion .slider-nav-item.active:before {
        position: absolute;
        content: "";
        height: calc(100% + 16px);
        width: calc(100% + 16px);
        top: -8px;
        left: -8px;
        border-radius: 50%;
        border: 1px solid rgba(132, 132, 164, 0.35);
        animation: 1.5s linear 0s normal none infinite focuse;
      }

      @keyframes focuse {
        0% {
          transform: scale(0.8);
          opacity: 1;
        }
        75% {
          transform: scale(1.2);
          opacity: 0;
        }
        100% {
          transform: scale(1.2);
          opacity: 0;
        }
      }
      @keyframes slide {
        from {
          background-position: 0 0;
        }
        to {
          background-position: 40px 0;
        }
      }

      .shadow-img1 {
        background-image: url("../img/shadow.png");
        background-repeat: no-repeat;
        background-position: bottom;
      }

      .shadow-img2 {
        background-position: bottom;
        background-image: url("../img/shadow2.png");
        background-size: 100%;
        background-repeat: no-repeat;
      }

      .slider-nav-item:after {
        position: absolute;
        top: 50%;
        left: 100%;
        height: 2px;
        content: "";
        width: 100%;
        z-index: 0;
        animation: slide 1s linear infinite;
      }
      .mt100 {
        margin-top: 100px;
      }

      @-webkit-keyframes jello-horizontal {
        0% {
          -webkit-transform: scale3d(1, 1, 1);
          transform: scale3d(1, 1, 1);
        }
        30% {
          -webkit-transform: scale3d(1.25, 0.75, 1);
          transform: scale3d(1.25, 0.75, 1);
        }
        40% {
          -webkit-transform: scale3d(0.75, 1.25, 1);
          transform: scale3d(0.75, 1.25, 1);
        }
        50% {
          -webkit-transform: scale3d(1.15, 0.85, 1);
          transform: scale3d(1.15, 0.85, 1);
        }
        65% {
          -webkit-transform: scale3d(0.95, 1.05, 1);
          transform: scale3d(0.95, 1.05, 1);
        }
        75% {
          -webkit-transform: scale3d(1.05, 0.95, 1);
          transform: scale3d(1.05, 0.95, 1);
        }
        100% {
          -webkit-transform: scale3d(1, 1, 1);
          transform: scale3d(1, 1, 1);
        }
      }
      @keyframes jello-horizontal {
        0% {
          -webkit-transform: scale3d(1, 1, 1);
          transform: scale3d(1, 1, 1);
        }
        30% {
          -webkit-transform: scale3d(1.25, 0.75, 1);
          transform: scale3d(1.25, 0.75, 1);
        }
        40% {
          -webkit-transform: scale3d(0.75, 1.25, 1);
          transform: scale3d(0.75, 1.25, 1);
        }
        50% {
          -webkit-transform: scale3d(1.15, 0.85, 1);
          transform: scale3d(1.15, 0.85, 1);
        }
        65% {
          -webkit-transform: scale3d(0.95, 1.05, 1);
          transform: scale3d(0.95, 1.05, 1);
        }
        75% {
          -webkit-transform: scale3d(1.05, 0.95, 1);
          transform: scale3d(1.05, 0.95, 1);
        }
        100% {
          -webkit-transform: scale3d(1, 1, 1);
          transform: scale3d(1, 1, 1);
        }
      }

      .jello-horizontal {
        -webkit-animation: jello-horizontal 0.9s both;
        animation: jello-horizontal 0.9s both;
      }

      .social-bar a:hover i {
        -webkit-animation: jello-horizontal 0.9s both;
        animation: jello-horizontal 0.9s both;
      }

      @media only screen and (max-width: 300px) {
        .process-scetion .slider-nav-item {
          height: 30px;
          width: 30px;
          margin: 15px 10px;
          line-height: 28px;
        }
      }
    </style>
  </body>
</html>
