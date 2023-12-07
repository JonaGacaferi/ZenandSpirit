<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" >
    <title>Zen & Spirit</title>
    <link rel="stylesheet" href="meditation.css" >
    <link rel="icon" href="yogalogo.png" type="image/x-icon" >
  </head>  
  <header>
    <div class="menu">
      <nav class="navbar">
        <img src="yogalogo.png" height="50px" class="logo1">        
        
       <p class="logo">Zen & Spirit</p>
        <ul>
        <li><a href="homepage.html">Home</a></li>
        <li><a href="loginform.html">Log In</a></li>
        <li><a href="YogaClasses.html">Yoga Classes</a></li>
        <li><a href="Meditation.html">Meditation Classes</a></li>
        </ul>
     </nav>
    </div>
  </header>

  <body>
  <div class="slider">
    <h2>lckjsncsc</h2>
     <img name="mySlide" id="slideshow"/>
     <button onclick="nextImg()">Next</button>
     <button onclick="prevImg()">Previous</button>

  </div>





  </body>
    <footer>
      <div class="f">
          <h2>About Our Page</h2>
          <h2>Our Links</h2>
          <div class="ff">
              <a href="https://www.facebook.com/" ><img src="facebook.png" alt="" ></a>
              <a href="https://www.instagram.com/"><img src="instagram.png" alt=""></a>
              <a href="https://www.youtube.com/"><img src="youtube.png" alt=""></a>
          </div>
      </div>

     <div class="footermain">
          <div class="footerleft">
              <p>Harmonize Your Existence: Immerse Yourself in Tranquility with our Guided Yoga and Meditation Experiences.</p>
          </div>
          <div class="footercenter">
              <p>Help</p>
              <p>Support</p>
              <p>Contact</p>
          </div>
          <div class="footerright">
              <p>Terms of use</p>
              <p>Privacy Policy</p>
          </div>
      </div>
      <div class="fundi">
          <p>© 2023 Zen & Spirit. All rights reserved.</p>
          <p>Designed by B&J</p>
      </div>
  </footer>

    <script>
      var i = 0;
      var imgArray = [
      "imgS/foto0.png",
      "imgS/foto1.png",
      "imgS/foto2.png",
      "imgS/foto3.png",
      "imgS/foto4.png"
      ];
      function nextImg() {
          document.getElementById('slideshow').src = imgArray[i];
            if (i < imgArray.length - 1) {
              i++;
              } else {
               i = 0;
              }
      
       }
      document.body.addEventListener('load', ndrroImg());
  </script>


  </html>