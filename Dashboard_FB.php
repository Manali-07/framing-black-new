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
    form {
      margin-bottom: 20px;
    }

    label {
      display: block;
      margin-bottom: 8px;
      font-weight: bold;
    }

    input[type="text"] {
      width: 100%;
      padding: 10px;
      border: 1px solid #ccc;
      border-radius: 4px;
      margin-bottom: 10px;
    }

    button {
      background-color: red;
      color: white;
      padding: 5px 10px;
      border: none;
      border-radius: 4px;
      cursor: pointer;
      display: block;
      width: 100%;
    }

    button:hover {
      background-color: #0056b3;
    }

    .image-gallery {
      display: grid;
      grid-template-columns: repeat(auto-fill, minmax(200px, 1fr));
      gap: 10px;
      /* Gap between images */
      margin-top: 20px;
    }

    .image-item {
      position: relative;
      border: 2px solid white;
      /* White borders */
      overflow: hidden;
      border-radius: 5px;
      /* Optional: rounded corners */
    }

    .image-item img {
      width: 300px;
      /* Fixed width */
      height: 300px;
      /* Fixed height */
      object-fit: cover;
      /* Cover to maintain aspect ratio */
      transition: transform 0.3s ease;
      /* Smooth zoom effect on hover */
      display: block;
    }

    .overlay {
      position: absolute;
      top: 0;
      left: 0;
      right: 0;
      bottom: 0;
      background-color: rgba(0, 0, 0, 0.6);
      /* Semi-transparent overlay */
      color: white;
      display: flex;
      justify-content: center;
      align-items: center;
      opacity: 0;
      /* Hide the overlay by default */
      transition: opacity 0.3s ease;
      /* Smooth transition for the overlay */
    }

    .image-item:hover .overlay {
      opacity: 1;
      /* Show overlay on hover */
    }

    .overlay a {
      color: white;
      /* Link color */
      text-decoration: none;
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
    <?php
    require_once 'db_FB.inc.php'; // Include the Database class
    require_once 'handlerclass.php'; // Include the ImgUploadHandler class
    
    $ImgUploadHandler = new ImgUploadHandler();

    // Insert image URL into the database
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['image_url'])) {
      $image_url = $_POST['image_url'];
      if ($ImgUploadHandler->insertImage($image_url)) {
        echo "Image URL saved successfully!";
      } else {
        echo "Error saving image URL.";
      }
    }

    // Delete image from the database
    if (isset($_GET['delete'])) {
      $image_id = $_GET['delete'];
      if ($ImgUploadHandler->deleteImage($image_id)) {
        echo "Image deleted successfully!";
      } else {
        echo "Error deleting image.";
      }
    }

    // Fetch all images from the database
    $images = $ImgUploadHandler->fetchImages();
    $ImgUploadHandler->close();
    ?>
    <main>
      <div class="container py-vh-4 position-relative mt-5 px-vw-5 text-center">
        <h2>Upload Images</h2>
        <form method="POST" action="">
          <label for="image_url">Image URL:</label>
          <input type="text" id="image_url" name="image_url" required>
          <button type="submit">Save Image</button>
        </form>

        <h2>Image Gallery</h2>
        <div class="image-gallery">
          <?php if (!empty($images)): ?>
            <?php foreach ($images as $row): ?>
              <div class="image-item">
                <img src="<?php echo $row['image_path']; ?>" alt="Image">
                <div class="image-info">
                  <span>Uploaded On: <?php echo $row['uploaded_on']; ?></span>
                  <button
                    onclick="if(confirm('Are you sure you want to delete this image?')) { window.location.href='?delete=<?php echo $row['id']; ?>'; }"
                    class="delete-button">Delete</button>
                </div>
              </div>
            <?php endforeach; ?>
          <?php else: ?>
            <p>No images uploaded yet.</p>
          <?php endif; ?>
        </div>
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

      window.addEventListener('scroll', function () {
        scrollpos = window.scrollY;

        if (scrollpos >= header_height) { add_class_on_scroll() }
        else { remove_class_on_scroll() }

        console.log(scrollpos)
      })
    </script>

</body>

</html>