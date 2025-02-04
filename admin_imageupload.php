<!doctype html>
<html class="h-100" lang="en">

  <head>
      <meta charset="utf-8">
  <meta name="viewport" content="width=device-width,initial-scale=1,shrink-to-fit=no">
  <meta name="description" content="A well made and handcrafted Bootstrap 5 template">
  <link rel="apple-touch-icon" sizes="180x180" href="img/apple-touch-icon.png">
  <link rel="icon" type="image/png" sizes="32x32" href="img/favicon-32x32.png">
  <link rel="icon" type="image/png" sizes="16x16" href="img/favicon-16x16.png">
  <link rel="icon" type="image/png" sizes="96x96" href="img/favicon.png">
  <meta name="author" content="Holger Koenemann">
  <meta name="generator" content="Eleventy v2.0.1">
  <meta name="HandheldFriendly" content="true">
  <title>Framing Black</title>
  <link rel="stylesheet" href="css/theme.min.css">
  <link rel="stylesheet" href="css/style.css">
  <style>
        /* Basic grid styling */
        .gallery {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(200px, 1fr));
            gap: 20px;
        }
        .gallery-item {
            position: relative;
            border: 1px solid #ddd;
            padding: 10px;
            text-align: center;
        }
        .gallery-item img {
            max-width: 100%;
            height: auto;
        }
        .delete-btn {
            display: inline-block;
            margin-top: 10px;
            padding: 8px 16px;
            background-color: red;
            color: white;
            border: none;
            cursor: pointer;
        }
        .delete-btn:hover {
            background-color: darkred;
        }

/* inter-300 - latin */
@font-face {
  font-family: 'Inter';
  font-style: normal;
  font-weight: 300;
  font-display: swap;
  src: local(''),
       url('fonts/inter-v12-latin-300.woff2') format('woff2'), /* Chrome 26+, Opera 23+, Firefox 39+ */
       url('fonts/inter-v12-latin-300.woff') format('woff'); /* Chrome 6+, Firefox 3.6+, IE 9+, Safari 5.1+ */
}

/* inter-400 - latin */
@font-face {
  font-family: 'Inter';
  font-style: normal;
  font-weight: 400;
  font-display: swap;
  src: local(''),
       url('fonts/inter-v12-latin-regular.woff2') format('woff2'), /* Chrome 26+, Opera 23+, Firefox 39+ */
       url('fonts/inter-v12-latin-regular.woff') format('woff'); /* Chrome 6+, Firefox 3.6+, IE 9+, Safari 5.1+ */
}

@font-face {
  font-family: 'Inter';
  font-style: normal;
  font-weight: 500;
  font-display: swap;
  src: local(''),
       url('fonts/inter-v12-latin-500.woff2') format('woff2'), /* Chrome 26+, Opera 23+, Firefox 39+ */
       url('fonts/inter-v12-latin-500.woff') format('woff'); /* Chrome 6+, Firefox 3.6+, IE 9+, Safari 5.1+ */
}
@font-face {
  font-family: 'Inter';
  font-style: normal;
  font-weight: 700;
  font-display: swap;
  src: local(''),
       url('fonts/inter-v12-latin-700.woff2') format('woff2'), /* Chrome 26+, Opera 23+, Firefox 39+ */
       url('fonts/inter-v12-latin-700.woff') format('woff'); /* Chrome 6+, Firefox 3.6+, IE 9+, Safari 5.1+ */
}

</style>


  </head>

  <body class="bg-black text-white mt-0" data-bs-spy="scroll" data-bs-target="#navScroll">

    <nav id="navScroll" class="navbar navbar-dark bg-black fixed-top px-vw-5" tabindex="0">
  <div class="container">
    <a class="navbar-brand pe-md-4 fs-4 col-12 col-md-auto text-center" href="index.html">
      <img src="img/Business Logo/framing black logo.png" alt="Framing Black Logo" fill="currentColor" class="bi bi-stack" viewBox="0 0 16 16" width="150" height="50" style="opacity: 1;">
      <path d="m14.12 10.163 1.715.858c.22.11.22.424 0 .534L8.267 15.34a.598.598 0 0 1-.534 0L.165 11.555a.299.299 0 0 1 0-.534l1.716-.858 5.317 2.659c.505.252 1.1.252 1.604 0l5.317-2.66zM7.733.063a.598.598 0 0 1 .534 0l7.568 3.784a.3.3 0 0 1 0 .535L8.267 8.165a.598.598 0 0 1-.534 0L.165 4.382a.299.299 0 0 1 0-.535L7.733.063z"/>
      <path d="m14.12 6.576 1.715.858c.22.11.22.424 0 .534l-7.568 3.784a.598.598 0 0 1-.534 0L.165 7.968a.299.299 0 0 1 0-.534l1.716-.858 5.317 2.659c.505.252 1.1.252 1.604 0l5.317-2.659z"/>
    </img>
  <span class="ms-md-1 mt-1 fw-bolder me-md-5"></span>
</a>

      <ul class="navbar-nav mx-auto mb-2 mb-lg-0 list-group list-group-horizontal">
      <li class="nav-item">
  <a class="nav-link fs-5" href="adminDashboard.php" aria-label="Homepage">
    Upload Photos
  </a>
</li>
<li class="nav-item">
  <a class="nav-link fs-5" href="admin_videoupload.php" aria-label="A sample content page">
    Upload Video
  </a>
</li>
    </ul>
</div>
</nav>

    <main>
    <?php
    require_once 'db_FB.inc.php'; // Include the Database class
    require_once 'handlerclass.php'; // Include the ImgUploadHandler class
    
    $message = '';

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['video_url'])) {
    $video_url = $_POST['video_url'];
    
    $VideoUploadHandler = new VideoUploadHandler();
   // $message = $VideoUploadHandler->uploadVideo($video_url);
}
?>
<main>
<?php
require_once 'handlerclass.php'; // Include the VideoHandler class

$message = '';

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['video_url'])) {
    $video_url = $_POST['video_url'];
    
    $VideoUploadHandler = new VideoUploadHandler();
   // $message = $VideoUploadHandler->uploadVideo($video_url);
}
?>

<div class="container" style="padding: 150px;">
<form method="POST" action="">
    <label for="video_url">YouTube Video URL:</label><br>
    <input type="text" name="video_url" required><br>
    <input type="submit" value="Upload Video">
</form>
</div>
    </main>


<script src="js/bootstrap.bundle.min.js"></script>
<script src="js/aos.js"></script>
<script src="js/server.js"></script>
<script>
AOS.init({
 duration: 800, // values from 0 to 3000, with step 50ms
});
</script>
<script>
  let scrollpos = window.scrollY
  const header = document.querySelector(".navbar")
  const header_height = header.offsetHeight

  const add_class_on_scroll = () => header.classList.add("scrolled", "shadow-sm")
  const remove_class_on_scroll = () => header.classList.remove("scrolled", "shadow-sm")

  window.addEventListener('scroll', function() {
    scrollpos = window.scrollY;

    if (scrollpos >= header_height) { add_class_on_scroll() }
    else { remove_class_on_scroll() }

    console.log(scrollpos)
  })
</script>

  </body>
  </html>