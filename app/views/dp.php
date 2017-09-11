<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xmlns:og="http://ogp.me/ns#" xmlns:fb="http://www.facebook.com/2008/fbml">
  <head>
    <title>Takshak 2017 DP Change</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="http://takshak.in/2017/public/assets/css/croppie.css" rel="stylesheet" async="async" />
    <link href="http://takshak.in/2017/public/assets/css/style_2.css" rel="stylesheet" async="async" />
    <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
    <script src="http://takshak.in/2017/public/assets/js/croppie.min.js" async="async"></script>
    <script src="http://takshak.in/2017/public/assets/js/app.js" async="async"></script>
    <script src="http://takshak.in/2017/public/assets/js/fb.js" async="async"></script>
    <script src="http://takshak.in/2017/public/assets/js/FileSaver.js"></script>
  </head>
  <body>
    <div id="wrapper">
      <div id="content">
        <h1>Support Takshak 2017!</h1>
        <h4><a href="http://Takshakmace.com">Takshak Home</a></h4>
        <p>Support Takshak by changing your profile picture</p>
        <div id="preview">
          <div id="crop-area">
            <img src="http://demos.subinsb.com/isl-profile-pic/image/person.png" id="profile-pic" />
          </div>
          <img src="frames/frame1.png" id="fg" data-design="0" />
        </div>
        <p>
          <button id="download" disabled>Download Profile Picture</button>
          
        </p>
        <h2>Upload</h2>
        <input type="file" name="file" onchange="onFileChange(this)">
        
        <div id="status"></div>
        <h2>Design</h2>
        <div id="designs">
          <!--<img class="design active" src="frames/frame-0.png" data-design="0" />-->
          <img class="design" src="frames/frame1.png" data-design="1" />
          <!--<img class="design" src="frames/frame-2.png" data-design="2" />-->
        </div>
        <?php
        require_once __DIR__ . "/footer.php";
        ?>
      </div>
    </div>
  </body>
</html>
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-60358056-1', 'auto');
  ga('send', 'pageview');

</script>