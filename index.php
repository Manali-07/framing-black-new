<!doctype html>
<html class="h-100" lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width,initial-scale=1,shrink-to-fit=no">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="Creativity | Innovation | Speed">
  <link rel="apple-touch-icon" sizes="180x180" href="img/apple-touch-icon.png">
  <link rel="icon" type="image/png" sizes="32x32" href="img/favicon-32x32.png">
  <link rel="icon" type="image/png" sizes="16x16" href="img/favicon-16x16.png">
  <link rel="icon" type="image/png" sizes="96x96" href="img/favicon.png">
  <!-- <link rel="stylesheet" href="css\UIvideoListStyle.css"> -->
  <link rel="stylesheet" href="css\theme.min.css">

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
  <meta name="author" content="Holger Koenemann">
  <meta name="generator" content="Eleventy v2.0.1">
  <meta name="HandheldFriendly" content="true">
  <title>Framing Black</title>
  <link rel="stylesheet" href="css/theme.min.css">
  <script src="js\menuscript.js"></script>
  <style>
    .video-gallery-container {
      display: flex;
      justify-content: center;
      align-items: center;
      position: relative;
      height: 25vh;
      /* Consumes 25% of the screen height */
      overflow: hidden;
      /* Hide overflow on both axes */
      width: 100%;
      /* Full width of the container */
      padding-top: 20px;
      /* Add space between bg-black and gallery */
      padding-bottom: 20px;
      /* Optional: Add space below the gallery as well */
    }

    .video-gallery {
      display: flex;
      gap: 10px;
      /* Spacing between video thumbnails */
      transition: transform 0.3s ease-in-out;
      /* Smooth scroll transition */
      width: max-content;
      /* Allow dynamic width based on video count */
    }

    .video-item {
      flex: 0 0 calc((100vw - 60px) / 3);
      /* Ensure 3 videos are visible */
      position: relative;
      height: 100%;
      /* Full height of the gallery container */
      cursor: pointer;
    }

    .video-thumbnail {
      width: 100%;
      height: 100%;
      object-fit: cover;
      /* Ensure thumbnails fill the video item area */
      border-radius: 8px;
      /* Rounded corners */
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
      /* Subtle shadow */
    }

    .arrow {
      position: absolute;
      top: 50%;
      transform: translateY(-50%);
      font-size: 24px;
      color: white;
      background-color: rgba(0, 0, 0, 0.5);
      padding: 10px;
      cursor: pointer;
      z-index: 1;
    }

    .arrow-left {
      left: 10px;
      /* Left arrow position */
    }

    .arrow-right {
      right: 10px;
      /* Right arrow position */
    }

    .arrow:hover {
      background: rgba(0, 0, 0, 0.8);
    }

    .custom-play-button {
      position: absolute;
      top: 50%;
      left: 50%;
      transform: translate(-50%, -50%);
      width: 50px;
      height: 50px;
      background: rgba(0, 0, 0, 0.6);
      border-radius: 50%;
      display: flex;
      justify-content: center;
      align-items: center;
    }

    .video-gallery::-webkit-scrollbar {
      display: none;
      /* Hides scrollbar in Chrome, Safari, and Opera */
    }

    .video-item {
      flex: 0 0 30%;
      /* Each video item takes 30% of the viewport width minus the gap */
      height: 100%;
      /* Maintain full height of gallery container */
      position: relative;
    }


    .video-item:hover {
      transform: scale(1.05);
      /* Scale effect on hover */
    }

    .video-container {
      position: relative;
      /* Necessary for absolute positioning of the play button */
      height: 100%;
      /* Full height of video item */
      display: flex;
      /* Flexbox for centering */
      justify-content: center;
      /* Center horizontally */
      align-items: center;
      /* Center vertically */
    }

    /* Custom scrollbar styling */
    .video-gallery-container::-webkit-scrollbar {
      height: 8px;
      /* Height of the scrollbar */
    }

    .video-gallery-container::-webkit-scrollbar-thumb {
      background-color: rgba(0, 0, 0, 0.5);
      /* Dark thumb for the scrollbar */
      border-radius: 4px;
      /* Rounded scrollbar thumb */
    }

    .video-gallery-container::-webkit-scrollbar-track {
      background: rgba(0, 0, 0, 0.1);
      /* Light background for the scrollbar track */
    }

    .video-gallery-container {
      -ms-overflow-style: none;
      /* Hides scrollbar in IE and Edge */
      scrollbar-width: thin;
      /* Makes the scrollbar thin in Firefox */
      scrollbar-color: rgba(0, 0, 0, 0.5) rgba(0, 0, 0, 0.1);
      /* Color for Firefox */
    }

    .custom-play-button {
      position: absolute;
      top: 50%;
      left: 50%;
      transform: translate(-50%, -50%);
      width: 50px;
      height: 50px;
      background-color: rgba(0, 0, 0, 0.6);
      border-radius: 50%;
      display: flex;
      justify-content: center;
      align-items: center;
      transition: background-color 0.3s ease;
    }

    .custom-play-button::before {
      content: '';
      width: 0;
      height: 0;
      border-left: 12px solid white;
      /* This is the triangle's color */
      border-top: 8px solid transparent;
      border-bottom: 8px solid transparent;
      display: block;
    }

    .video-item:hover .custom-play-button {
      opacity: 1;
      /* Fully opaque on hover */
    }

    .custom-video-container {
      position: relative;
      width: 100%;
      /* Full width of the parent container */
      height: 0;
      padding-bottom: 56.25%;
      /* Aspect ratio for 16:9 videos (9/16 = 0.5625) */
      background-color: #000;
      /* Placeholder background */
      border-radius: 15px;
      /* Optional: rounded corners */

    }

    .custom-video-container iframe,
    .custom-video-container video,
    .custom-video-container img {
      position: absolute;
      top: 0;
      left: 0;
      width: 100%;
      /* Scale to fill the container */
      height: 100%;
      object-fit: cover;
      /* Ensure content fills the container without distortion */
      border: none;
    }


    .custom-video-container iframe {
      width: 100%;
      height: auto;
      border: none;
    }

    .video-player-section {
      display: none;
      /* Keep it hidden initially */
      width: 100%;
      /* Adjust width as needed for the layout */
      height: auto;
      /* Let the content determine the height */
      padding: 20px 0;
    }

    #videoPlayerIframe {
      width: 80%;
      /* Increase the width of the iframe (80% of its parent) */
      height: 50vh;
      /* Set the height to 50% of the viewport height */
      margin: 0 auto;
      /* Center the iframe horizontally */
      display: block;
      /* Ensure it's treated as a block element */
      border: none;
      /* Remove default iframe border */
    }

    #videoDescription {
      text-align: center;
      /* Center-align the video description */
      padding-top: 10px;
      /* Add some spacing between the iframe and description */
    }

    /* inter-300 - latin */
    @font-face {
      font-family: 'Inter';
      font-style: normal;
      font-weight: 300;
      font-display: swap;
      src: local(''),
        url('fonts/inter-v12-latin-300.woff2') format('woff2'),
        /* Chrome 26+, Opera 23+, Firefox 39+ */
        url('fonts/inter-v12-latin-300.woff') format('woff');
      /* Chrome 6+, Firefox 3.6+, IE 9+, Safari 5.1+ */
    }

    /* inter-400 - latin */
    @font-face {
      font-family: 'Inter';
      font-style: normal;
      font-weight: 400;
      font-display: swap;
      src: local(''),
        url('fonts/inter-v12-latin-regular.woff2') format('woff2'),
        /* Chrome 26+, Opera 23+, Firefox 39+ */
        url('fonts/inter-v12-latin-regular.woff') format('woff');
      /* Chrome 6+, Firefox 3.6+, IE 9+, Safari 5.1+ */
    }

    @font-face {
      font-family: 'Inter';
      font-style: normal;
      font-weight: 500;
      font-display: swap;
      src: local(''),
        url('fonts/inter-v12-latin-500.woff2') format('woff2'),
        /* Chrome 26+, Opera 23+, Firefox 39+ */
        url('fonts/inter-v12-latin-500.woff') format('woff');
      /* Chrome 6+, Firefox 3.6+, IE 9+, Safari 5.1+ */
    }

    @font-face {
      font-family: 'Inter';
      font-style: normal;
      font-weight: 700;
      font-display: swap;
      src: local(''),
        url('fonts/inter-v12-latin-700.woff2') format('woff2'),
        /* Chrome 26+, Opera 23+, Firefox 39+ */
        url('fonts/inter-v12-latin-700.woff') format('woff');
      /* Chrome 6+, Firefox 3.6+, IE 9+, Safari 5.1+ */
    }

    @media (max-width: 992px) {

      /* Adjustments for mobile view */
      .navbar .navbar-toggler {
        margin-left: auto;
        /* Align toggler to the right */
      }

      .navbar-brand {
        position: absolute;
        /* Position brand logo */
        left: 50%;
        /* Center from the left */
        transform: translateX(-50%);
        /* Shift back by half its width */
      }
    }

    @media (max-width: 768px) {
      .video-item {
        flex: 0 0 100%;
        /* Make each video take the full width on smaller screens */
        margin-bottom: 15px;
        /* Add spacing between video items */
      }
    }

    /* Additional tweaks for very small screens */
    @media (max-width: 480px) {
      .video-item {
        flex: 0 0 100%;
        /* Full-width video items on small devices */
        margin-bottom: 10px;
        /* Reduce the margin on smaller devices */
      }
    }
  </style>


</head>

<body class="bg-black text-white mt-0" data-bs-spy="scroll" data-bs-target="#navScroll">

  <!--<?php include '__DIR__.\navbar.php'; ?> -->
  <nav id="navScroll" class="navbar navbar-dark fixed-top navbar-expand-lg" tabindex="0">
    <div class="container">
      <div class="container-fluid d-flex justify-content-between align-items-center">
        <!-- Logo aligned to the left -->
        <a class="navbar-brand fs-4" href="index.php">
          <img src="img/Business Logo/framing black logo.png" alt="Framing Black Logo" width="100" height="45"
            style="opacity: 1;">
        </a>

        <!-- Hamburger button for mobile view, aligned to the left -->
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
          aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
      </div>


      <!-- Collapsible part of the navbar -->
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav mx-auto mb-2 mb-lg-0 list-group list-group-horizontal-lg">
          <li class="nav-item">
            <a class="nav-link fs-5" href="index.php" aria-label="Homepage">
              Home
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link fs-5" href="gallery.php" aria-label="photo gallery">
              Photo Gallery
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link fs-5" href="videogallery.php" aria-label="Video Gallery">
              Video Gallery
            </a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
  <main>
    <div class="w-100 overflow-hidden position-relative bg-black text-white" data-aos="fade">
      <!-- Background video -->
      <video autoplay loop muted class="position-absolute w-100 h-100 object-fit-cover" style="opacity: 1;">
        <source src="https://res.cloudinary.com/dpnkp8aqd/video/upload/v1730095898/WEBSITE_BG_fxdt3z.mp4"
          type="video/mp4">
        Your browser does not support the video tag.
      </video>

      <!-- Overlay and content -->
      <div class="position-absolute w-100 h-100 bg-black opacity-75 top-0 start-0"></div>
      <div class="container py-vh-4 position-relative mt-5 px-vw-5 text-center">
        <div class="row d-flex align-items-center justify-content-center py-vh-5">
          <div class="col-12 col-xl-10">
            <span class="h5 text-secondary fw-lighter">Our Mission</span>
            <h1 class="display-huge mt-3 mb-3 lh-1">Creativity. Innovation. Speed.</h1>
          </div>
          <div class="col-12 col-xl-8">
            <p class="lead text-secondary">We team up human talent with AI speed to <br>craft high-quality
              campaign ads and
              music videos at <br>2x speed.</p>
          </div>
          <div class="col-12 text-center">
            <a href="#contact-us" class="btn btn-xl btn-light">Contact us
              <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                class="bi bi-arrow-right" viewBox="0 0 16 16">
                <path fill-rule="evenodd"
                  d="M1 8a.5.5 0 0 1 .5-.5h11.793l-3.147-3.146a.5.5 0 0 1 .708-.708l4 4a.5.5 0 0 1 0 .708l-4 4a.5.5 0 0 1-.708-.708L13.293 8.5H1.5A.5.5 0 0 1 1 8z" />
              </svg>
            </a>
          </div>
        </div>
      </div>
    </div>

    <?php
    // Include the necessary files
    require_once 'db_FB.inc.php'; // Your database connection class
    require_once 'handlerclass.php'; // Your image handler class
    
    // Create an instance of ImageHandler
    $imageHandler = new ui3Img();

    // Fetch the current image/video URLs
    $sql = "SELECT * FROM tbl_ui3images WHERE id = 1";
    $conn = $imageHandler->getConnection(); // Use the inherited method to get the connection
    $result = $conn->query($sql);

    // Ensure there is data to fetch
    if ($result && $result->rowCount() > 0) {
      $row = $result->fetch(PDO::FETCH_ASSOC);
    } else {
      echo "No content found.";
      exit; // Exit if no data is found
    }

    // Function to determine the type of content
    function get_content_type($url)
    {
      if (strpos($url, 'youtube.com') !== false || strpos($url, 'youtu.be') !== false) {
        return 'youtube';
      } elseif (strpos($url, 'vimeo.com') !== false) {
        return 'vimeo';
      } elseif (strpos($url, 'cloudinary.com') !== false && strpos($url, 'video') !== false) {
        return 'cloudinary_video';
      } elseif (strpos($url, 'cloudinary.com') !== false) {
        return 'cloudinary_image';
      } else {
        return 'image';
      }
    }
    ?>

    <div class="w-100 position-relative bg-dark text-white bg-cover d-flex align-items-center">
      <div class="container-fluid px-vw-5">
        <div class="row d-flex align-items-center position-relative justify-content-center px-0 g-5">
          <div></div>
          <!-- Placeholder 1 -->
          <div class="col-12 col-lg-6 d-flex justify-content-center">
            <?php
            $type1 = get_content_type($row['image1']);
            if ($type1 == 'youtube'): ?>
              <div class="custom-video-container" style="width: 440px; height: 440px;">
                <iframe
                  src="<?php echo str_replace('watch?v=', 'embed/', $row['image1']) . '?controls=0&autoplay=1&enablejsapi=1'; ?>"
                  allowfullscreen></iframe>
              </div>
            <?php elseif ($type1 == 'vimeo'): ?>
              <div class="custom-video-container" style="width: 440px; height: 440px;">
                <iframe src="<?php echo str_replace('vimeo.com', 'player.vimeo.com/video', $row['image1']); ?>?autoplay=1"
                  allowfullscreen></iframe>
              </div>
            <?php elseif ($type1 == 'cloudinary_video'): ?>
              <div class="custom-video-container" style="width: 440px; height: 440px;">
                <video autoplay loop>
                  <source src="<?php echo $row['image1']; ?>" type="video/mp4">
                  Your browser does not support the video tag.
                </video>
              </div>
            <?php elseif ($type1 == 'cloudinary_image' || $type1 == 'image'): ?>
              <div class="custom-video-container" style="width: 440px; height: 440px;">
                <img src="<?php echo $row['image1']; ?>" alt="Placeholder 1">
              </div>
            <?php endif; ?>
          </div>

          <!-- Placeholder 2 -->
          <div class="col-12 col-md-6 col-lg-3 d-flex justify-content-center">
            <?php
            $type2 = get_content_type($row['image2']);
            if ($type2 == 'youtube'): ?>
              <div class="custom-video-container" style="width: 350px; height: 350px;">
                <iframe
                  src="<?php echo str_replace('watch?v=', 'embed/', $row['image2']) . '?controls=0&autoplay=1&enablejsapi=1'; ?>"
                  allowfullscreen></iframe>
              </div>
            <?php elseif ($type2 == 'vimeo'): ?>
              <div class="custom-video-container" style="width: 350px; height: 350px;">
                <iframe src="<?php echo str_replace('vimeo.com', 'player.vimeo.com/video', $row['image2']); ?>?autoplay=1"
                  allowfullscreen></iframe>
              </div>
            <?php elseif ($type2 == 'cloudinary_video'): ?>
              <div class="custom-video-container" style="width: 350px; height: 350px;">
                <video autoplay loop>
                  <source src="<?php echo $row['image2']; ?>" type="video/mp4">
                  Your browser does not support the video tag.
                </video>
              </div>
            <?php elseif ($type2 == 'cloudinary_image' || $type2 == 'image'): ?>
              <div class="custom-video-container" style="width: 350px; height: 350px;">
                <img src="<?php echo $row['image2']; ?>" alt="Placeholder 2">
              </div>
            <?php endif; ?>
          </div>

          <!-- Placeholder 3 -->
          <div class="col-12 col-md-6 col-lg-3 d-flex justify-content-center">
            <?php
            $type3 = get_content_type($row['image3']);
            if ($type3 == 'youtube'): ?>
              <div class="custom-video-container" style="width: 200px; height: 200px;">
                <iframe
                  src="<?php echo str_replace('watch?v=', 'embed/', $row['image3']) . '?controls=0&autoplay=1&enablejsapi=1'; ?>"
                  allowfullscreen></iframe>
              </div>
            <?php elseif ($type3 == 'vimeo'): ?>
              <div class="custom-video-container" style="width: 200px; height: 200px;">
                <iframe src="<?php echo str_replace('vimeo.com', 'player.vimeo.com/video', $row['image3']); ?>?autoplay=1"
                  allowfullscreen></iframe>
              </div>
            <?php elseif ($type3 == 'cloudinary_video'): ?>
              <div class="custom-video-container" style="width: 200px; height: 200px;">
                <video autoplay loop>
                  <source src="<?php echo $row['image3']; ?>" type="video/mp4">
                  Your browser does not support the video tag.
                </video>
              </div>
            <?php elseif ($type3 == 'cloudinary_image' || $type3 == 'image'): ?>
              <div class="custom-video-container" style="width: 200px; height: 200px;">
                <img src="<?php echo $row['image3']; ?>" alt="Placeholder 3">
              </div>
            <?php endif; ?>
          </div>

        </div>
      </div>
    </div>


    <script>
      var tag = document.createElement('script');
      tag.src = "https://www.youtube.com/iframe_api";
      var firstScriptTag = document.getElementsByTagName('script')[0];
      firstScriptTag.parentNode.insertBefore(tag, firstScriptTag);

      var player1, player2, player3;

      function onYouTubeIframeAPIReady() {
        player1 = new YT.Player('video1', {
          playerVars: {
            'autoplay': 1,
            'controls': 0,
            'enablejsapi': 1,
            'loop': 1, // Loop the video
            'playlist': '<?php echo str_replace('watch?v=', '', $row['image1']); ?>' // Required for looping
          },
          events: {
            'onReady': onPlayerReady,
            'onStateChange': onPlayerStateChange
          }
        });

        player2 = new YT.Player('video2', {
          playerVars: {
            'autoplay': 1,
            'controls': 0,
            'enablejsapi': 1,
            'loop': 1,
            'playlist': '<?php echo str_replace('watch?v=', '', $row['image2']); ?>'
          },
          events: {
            'onReady': onPlayerReady,
            'onStateChange': onPlayerStateChange
          }
        });

        player3 = new YT.Player('video3', {
          playerVars: {
            'autoplay': 1,
            'controls': 0,
            'enablejsapi': 1,
            'loop': 1,
            'playlist': '<?php echo str_replace('watch?v=', '', $row['image3']); ?>'
          },
          events: {
            'onReady': onPlayerReady,
            'onStateChange': onPlayerStateChange
          }
        });
      }

      function onPlayerReady(event) {
        event.target.mute();
        event.target.playVideo(); // Start playing the video on player ready
      }

      function onPlayerStateChange(event) {
        if (event.data == YT.PlayerState.ENDED) {
          event.target.seekTo(0); // Reset to the start
          event.target.playVideo(); // Replay the video
        }
      }
    </script>


    <div class="bg-dark">
      <div class="container px-vw-5 py-vh-5">
        <div class="row d-flex align-items-center">
          <div class="col-12 col-lg-7 text-lg-end" data-aos="fade-right">
            <span class="h5 text-secondary fw-lighter">Problem we are solving</span>
            <h2 class="h3">
              <p>With over 7 years in campaign ads, we’ve seen clients struggle to get high-quality
                videos due to time and budget constraints.</p>
              <p>We bridge that gap
                by delivering premium ads quickly,</p>
              <p>
                offering high-end results without
                the usual production
                challenges.</p>
            </h2>
          </div>
          <div class="col-12 col-lg-5" data-aos="fade-left">
            <h3 class="pt-5">Planning & <br>Pre-Production</h3>
            <p class="text-secondary">We start with thorough planning, <br>from conceptualization <br>to
              storyboarding, <br>ensuring
              a structured approach <br>that aligns with your vision.<br>

            </p>
            <h3 class="border-top border-secondary pt-5 mt-5">AI-Enhanced Production &
              Post-Production</h3>
            <p class="text-secondary">Following pre-production, <br>we leverage AI to refine ideas and<br>
              explore creative
              alternatives. <br>Our post-production process includes: <br>generate images and videos, <br>editing, color
              grading, <br>VFX,
              sound
              design, and more,<br>
              resulting in a polished final product.

            </p>
          </div>
        </div>
      </div>
    </div>

    <div class="w-100 position-relative bg-black text-white bg-cover d-flex align-items-center"
      style="height: auto; padding: 40px 20px;">
      <div class="container-fluid px-vw-5">
        <h4 class="h3 px-vw-5 py-vh-5" style="text-align: center;" data-aos="fade-right">Highlights</h4>

        <!-- Hidden video player section (initially hidden) -->
        <div class="video-player-section" id="videoPlayerSection" style="display: none;">
          <iframe id="videoPlayerIframe" src="" allow="autoplay; encrypted-media" allowfullscreen></iframe>
          <h6 class="border-top border-secondary pt-5 mt-5" id="videoDescription"></h6>
        </div>

        <div class="container">
          <div class="video-gallery-container position-relative" data-aos="zoom-in-up">
            <!-- Arrows for navigation (left and right) -->
            <div class="arrow arrow-left" onclick="scrollGallery(-1)">&#9664;</div>
            <div class="arrow arrow-right" onclick="scrollGallery(1)">&#9654;</div>

            <?php
            $uivideos = new Uivideos();

            try {
              $videoslist = $uivideos->fetchVideos(); // Fetch video list
              echo "<div class='video-gallery d-flex' id='videoGallery' style='overflow: hidden;'>";

              foreach ($videoslist as $video) {
                $video_url = $video['video_url'];
                $description = $video['video_description'];

                if (preg_match("/(?:youtube\.com\/(?:[^\/]+\/.+\/|(?:v|e(?:mbed)?)\/|.*[?&]v=)|youtu\.be\/)([^\"&?\/\s]{11})/", $video_url, $matches)) {
                  $video_id = $matches[1];
                  $thumbnail_url = "https://img.youtube.com/vi/$video_id/hqdefault.jpg";
                  $video_url_with_rel = "https://www.youtube.com/embed/" . $video_id . "?rel=0&enablejsapi=1";
                  $escaped_description = addslashes($description);

                  echo "<div class='video-item' onclick=\"playVideo('$video_url_with_rel', '$escaped_description')\">";
                  echo "<div class='video-container'>";
                  echo "<img src='$thumbnail_url' class='video-thumbnail' alt='Video Thumbnail'>";
                  echo "<div class='custom-play-button'><i class='fas fa-play'></i></div>";
                  echo "</div>";
                  echo "</div>";
                } else {
                  echo "<p>Invalid video URL: {$video_url}</p>";
                }
              }
              echo "</div>";
            } catch (Exception $e) {
              echo "Error: " . $e->getMessage();
            }
            ?>
          </div>
        </div>
      </div>
    </div>

    <div id="contact-us" class="bg-dark">
      <div class="container px-vw-5 py-vh-5">
        <div class="row d-flex align-items-center">
          <div class="col-12 col-lg-5 text-center text-lg-end" data-aos="zoom-in-right">
            <h2 class="display-6">Take the First step Get in touch! </h2>
          </div>
          <div class="col-12 col-lg-7 bg-black rounded-5 py-vh-3 text-center my-5" data-aos="zoom-in-up">
            <h2 class="display-huge mb-5">
              <span class="border-bottom border-5">Contact Us</span>
            </h2>
            <p class="lead text-secondary">
            <h6>Email Id : contact@framingblack.com</h6>
            <h6><a href="https://forms.gle/NazB5QxnHjngXV6t7">to send Enquiry Click here</a></h6>
            </p>
          </div>
        </div>
      </div>

    </div>

  </main>

  <div class="container my-5">

    <footer class="bg-black border-top border-dark text-center text-lg-start text-white">
      <!-- Grid container -->
      <div class="container p-4 text-secondary fw-lighter">
        <!--Grid row-->
        <div class="row my-4">
          <!--Grid column-->
          <div class="col-lg-3 col-md-6 mb-4 mb-md-0">

            <div class="bg-black shadow-1-strong d-flex align-items-center justify-content-center mb-4 mx-auto"
              style="width: 150px; height: 150px;">
              <a href="index.php">
                <img src="img/Business Logo/framing black logo.png" alt="Framing Black Logo" height="70" alt=""
                  loading="lazy" /></a>
            </div>

          </div>
          <!--Grid column-->

          <!--Grid column-->
          <div class="col-lg-3 col-md-6 mb-4 mb-md-0 border-end-lg border-dark">
            <h6 class="text-uppercase mb-4">Company</h6>

            <ul class="list-unstyled">
              <li class="mb-2">
                <b><a
                    href="https://docs.google.com/forms/d/e/1FAIpQLSdv7qiNvV46bMbB9Zi8Ifh4wN85x1Z2wAPdYKOwfEM57_050g/viewform?embedded=true"
                    class="link-fancy link-fancy-light text-white"><i
                      class="link-fancy link-fancy-light"></i>Career</a></b>
              </li>
              <li class="mb-2">
                <b><a href="https://forms.gle/NazB5QxnHjngXV6t7" class="link-fancy link-fancy-light text-white"><i
                      class="link-fancy link-fancy-light"></i>Contact</a></b>
              </li>
            </ul>
          </div>
          <!--Grid column-->

          <!--Grid column-->
          <div class="col-lg-3 col-md-6 mb-4 mb-md-0  border-end-lg border-dark">
            <h5 class="text-uppercase mb-4">Services</h5>

            <ul class="list-unstyled">
              <li class="mb-2">
                <b><a href="videogallery.php" class="text-white link-fancy link-fancy-light"><i
                      class="link-fancy link-fancy-light"></i>Video Work</a></b>
              </li>
              <li class="mb-2">
                <b><a href="gallery.php" class="text-white link-fancy link-fancy-light"><i
                      class="link-fancy link-fancy-light"></i>Photo Work</a></b>
              </li>
            </ul>
          </div>
          <!--Grid column-->

          <!--Grid column-->
          <div class="col-lg-3 col-md-6 mb-4 mb-md-0  border-end-lg border-dark">
            <h5 class="text-uppercase mb-4">Social Media</h5>

            <ul class="list-unstyled">
              <li>
                <b><a href="https://www.instagram.com/framing_black/" class="link-fancy link-fancy-light">
                    <i class="bi bi-instagram"></i> Instagram
                  </a></b>
              </li>
              <li>
                <b><a href="https://www.linkedin.com/company/104844501/admin/dashboard/"
                    class="link-fancy link-fancy-light">
                    <i class="bi bi-linkedin"></i> LinkedIn
                  </a></b>
              </li>
              <li>
                <b><a href="https://www.youtube.com/@FramingBlack" class="link-fancy link-fancy-light">
                    <i class="bi bi-youtube"></i> YouTube
                  </a></b>
              </li>
            </ul>
          </div>
          <!--Grid column-->
        </div>
        <!--Grid row-->
      </div>
    </footer>

  </div>
  <!-- End of .container -->
  <script>
    function playVideo(videoUrl, description) {
      // Toggle the visibility of the video player section
      const playerSection = document.getElementById('videoPlayerSection');
      if (!playerSection.classList.contains('active')) {
        playerSection.style.display = 'block'; // Show video player section if hidden
        playerSection.classList.add('active'); // Add 'active' class to track state
      }

      // Get the iframe and description elements
      const playerIframe = document.getElementById('videoPlayerIframe');
      const descriptionContainer = document.getElementById('videoDescription');

      // Reset iframe source to trigger a reload
      playerIframe.src = ""; // Resetting the source
      setTimeout(() => {
        playerIframe.src = videoUrl + "&autoplay=1&rel=0"; // Set new source after reset
      }, 100); // A short timeout to ensure reload

      // Set the video description
      descriptionContainer.innerHTML = description;
    }

    function scrollGallery(direction) {
      const gallery = document.getElementById('videoGallery');
      const videoItem = document.querySelector('.video-item');
      const videoWidth = videoItem.offsetWidth + 20; // Video width + margin
      const scrollAmount = videoWidth * direction;
      gallery.scrollBy({
        top: 0,
        left: scrollAmount,
        behavior: 'smooth'
      });
    }
  </script>


  <script src="js/bootstrap.bundle.min.js"></script>
  <script src="js/aos.js"></script>
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

    window.addEventListener('scroll', function () {
      scrollpos = window.scrollY;

      if (scrollpos >= header_height) { add_class_on_scroll() }
      else { remove_class_on_scroll() }

      console.log(scrollpos)
    })
  </script>
  <!-- Bootstrap JS (for the toggle functionality) -->
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>

</body>

</html>