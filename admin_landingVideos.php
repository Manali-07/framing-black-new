<!doctype html>
<html class="h-100" lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width,initial-scale=1.0,shrink-to-fit=no">
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
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

  <!-- Bootstrap JS (for the toggle functionality) -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>


  <script src="https://www.youtube.com/iframe_api"></script>
  <style>
    form {
      max-width: 500px;
      /* Set a maximum width for the form */
      margin: 20px auto;
      /* Center the form */
      padding: 20px;
      /* Add padding around the form */
      border: 1px solid #ddd;
      /* Light border around the form */
      border-radius: 8px;
      /* Rounded corners */
      box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
      /* Subtle shadow */
    }

    label {
      display: block;
      /* Make labels block elements */
      margin-bottom: 5px;
      /* Space between label and input */
      font-weight: bold;
      /* Bold text for labels */
    }

    input[type="text"],
    textarea {
      width: 100%;
      /* Full width for input and textarea */
      padding: 10px;
      /* Padding for better spacing */
      margin-bottom: 15px;
      /* Space below input fields */
      border: 1px solid #ccc;
      /* Light border for inputs */
      border-radius: 4px;
      /* Rounded corners for inputs */
      font-size: 16px;
      /* Font size for inputs */
    }

    input[type="text"]:focus,
    textarea:focus {
      border-color: #007bff;
      /* Change border color on focus */
      outline: none;
      /* Remove default outline */
    }

    button {
      width: 100%;
      /* Full width for button */
      padding: 10px;
      /* Padding for button */
      background-color: red;
      /* Primary color for button */
      color: white;
      /* White text color */
      border: none;
      /* No border */
      border-radius: 4px;
      /* Rounded corners for button */
      font-size: 16px;
      /* Font size for button */
      cursor: pointer;
      /* Pointer cursor on hover */
      transition: background-color 0.3s;
      /* Smooth transition for background color */
    }

    button:hover {
      background-color: #0056b3;
      /* Darker shade on hover */
    }

    /* Video gallery container */
    .video-gallery {
      margin-top: 90px;
      display: grid;
      grid-template-columns: repeat(auto-fill, minmax(400px, 1fr));
      /* Auto-fill columns based on screen size */
      grid-gap: 20px;
      /* Space between grid items */
      padding: 20px;
    }

    /* Each video item */
    .video-item {
      position: relative;
      overflow: hidden;
      padding-top: 56.25%;
      /* This maintains the 16:9 aspect ratio (56.25% is 9/16) */
    }

    .video-container {
      position: absolute;
      top: 0;
      left: 0;
      width: 100%;
      /* Make iframe take full width */
      height: 100%;
      /* Maintain aspect ratio */
    }

    /* Increase video height and width */
    .video-container iframe {
      width: 100%;
      /* Full width of the container */
      height: 100%;
      /* Full height of the container */
      border: none;
      /* Remove default border */
    }

    /* You can set the aspect ratio by adjusting the padding-top of .video-item */
    .video-item {
      padding-top: 60%;
      /* Adjust to change aspect ratio, e.g., 60% for 16:10 */
    }

    /* Optionally add styles for the thumbnail */
    .video-thumbnail {
      width: 100%;
      /* Full width of the container */
      height: auto;
      /* Maintain aspect ratio */
    }

    .video-overlay {
      position: absolute;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      background: rgba(0, 0, 0, 0.5);
      /* Dark transparent overlay */
      display: flex;
      justify-content: center;
      align-items: center;
      cursor: pointer;
    }

    .custom-play-button {
      width: 50px;
      /* Set the width */
      height: 50px;
      /* Set the height to be the same as the width for a circle */
      background-color: black;
      /* Color of the button */
      border-radius: 50%;
      /* This makes the button circular */
      display: flex;
      align-items: center;
      justify-content: center;
      cursor: pointer;
      position: relative;
      transition: transform 0.3s, background-color 0.3s;
      /* Smooth transition */
    }

    .custom-play-button::before {
      content: "";
      display: block;
      width: 0;
      height: 0;
      border-left: 14px solid white;
      /* Play triangle */
      border-top: 8px solid transparent;
      border-bottom: 8px solid transparent;
      position: absolute;
      /* Make sure it's centered inside the button */
    }

    /* Hover state: change background to white and triangle to black */
    .custom-play-button:hover {
      background-color: white;
      /* Change background to white */
      transform: scale(1.1);
      /* Optional: slightly enlarge the button */
    }

    .custom-play-button:hover::before {
      border-left-color: black;
      /* Change triangle color to black */
      transform: scale(1.2);
      /* Slightly enlarge the triangle */
    }

    .video-thumbnail {
      width: 100%;
      /* Ensure the thumbnail fits the container */
      height: 100%;
      /* Ensure the thumbnail fits the container */
      object-fit: cover;
      /* Maintain aspect ratio */
    }

    .thank-you-message {
      position: absolute;
      top: 50%;
      left: 50%;
      transform: translate(-50%, -50%);
      font-size: 24px;
      /* Font size */
      color: white;
      /* Text color */
      background-color: rgba(0, 0, 0, 0.7);
      /* Semi-transparent background */
      padding: 20px;
      /* Padding around the text */
      border-radius: 10px;
      /* Rounded corners */
      text-align: center;
      /* Center text */
      z-index: 100;
      /* Make sure it's above other elements */
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
  </style>


</head>

<body class="bg-black text-white mt-0" data-bs-spy="scroll" data-bs-target="#navScroll">

  <?php include 'masterTemplate\admin_navbar.php'; ?> <!-- Include the navbar -->

  <main>
    <div class="container py-vh-4 position-relative mt-5 px-vw-5 text-center">
      <h2>Admin Video Upload</h2>

      <!-- Form for uploading videos -->
      <form action="" method="POST">
        <div>
          <label for="video_url">Video URL:</label>
          <input type="text" id="video_url" name="video_url" required>
        </div>
        <div>
          <label for="video_description">Description:</label>
          <textarea id="video_description" name="video_description" required></textarea>
        </div>
        <div>
          <button type="submit" name="action" value="save">Save Video</button>
        </div>
      </form>

      <?php
      require_once 'handlerclass.php';

      // Function to extract the video ID from a YouTube URL
      function extractVideoId($url)
      {
        if (preg_match('/youtube\.com\/.*v=([^&]+)/', $url, $matches)) {
          return $matches[1]; // Matches full YouTube URL
        } elseif (preg_match('/youtu\.be\/([^?]+)/', $url, $matches)) {
          return $matches[1]; // Matches shortened YouTube URL
        } elseif (preg_match('/youtube\.com\/embed\/([^?]+)/', $url, $matches)) {
          return $matches[1]; // Matches embedded YouTube URL
        } else {
          return ''; // Return empty if no match
        }
      }

      // Handle POST requests for saving or deleting videos
      if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $admin_Uivideos = new admin_Uivideos();

        if (isset($_POST['action'])) {
          if ($_POST['action'] === 'save') {
            // Save video to the database
            $videoUrl = $_POST['video_url'];
            $videoDescription = $_POST['video_description'];

            if ($admin_Uivideos->saveVideo($videoUrl, $videoDescription)) {
              echo "<p id='success-message'>Video saved successfully!</p>";
            } else {
              echo "<p>Error saving video.</p>";
            }
          } elseif ($_POST['action'] === 'delete') {
            // Delete video from the database
            $videoId = $_POST['video_id'];

            if ($admin_Uivideos->deleteVideo($videoId)) {
              echo "<p>Video deleted successfully!</p>";
            } else {
              echo "<p>Error deleting video.</p>";
            }
          }
        }
      }

      // Fetch and display videos
      try {
        $admin_Uivideos = new admin_Uivideos();
        $videos = $admin_Uivideos->fetchVideos();

        if (count($videos) > 0) {
          echo "<table class='video-table'>";
          echo "<tr>
                <th>Video Thumbnail</th>
                <th>Description</th>
                <th>Action</th>
              </tr>";
          foreach ($videos as $video) {
            $videoUrl = htmlspecialchars($video['video_url']);
            $videoId = extractVideoId($videoUrl);
            $thumbnailUrl = "https://img.youtube.com/vi/" . $videoId . "/hqdefault.jpg";
            $description = htmlspecialchars($video['video_description']);

            echo "<tr>
                    <td><a href='$videoUrl' target='_blank'><img src='$thumbnailUrl' alt='Video Thumbnail'></a></td>
                    <td>$description</td>
                    <td>
                        <form method='POST' action=''>
                            <input type='hidden' name='action' value='delete'>
                            <input type='hidden' name='video_id' value='" . htmlspecialchars($video['id']) . "'>
                            <button type='submit' onclick=\"return confirm('Are you sure you want to delete this video?');\">Delete</button>
                        </form>
                    </td>
                  </tr>";
          }
          echo "</table>";
        } else {
          echo "<p>No videos found.</p>";
        }
      } catch (Exception $e) {
        echo "<p>Error: " . $e->getMessage() . "</p>";
      }
      ?>
      </script>
      <style>
        .grid-container {
          display: grid;
          grid-template-columns: repeat(3, 1fr);
          gap: 20px;
        }

        .grid-item {
          border: 1px solid #ccc;
          padding: 10px;
          text-align: center;
        }
      </style>
    </div>
  </main>

  <script src="js/lightbox.js"></script>
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

</body>

</html>