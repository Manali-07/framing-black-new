<html class="h-100" lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width,initial-scale=1,shrink-to-fit=no">
  <meta name="description" content="A well made and handcrafted Bootstrap 5 template">
  <link rel="apple-touch-icon" sizes="180x180" href="img/apple-touch-icon.png">
  <link rel="icon" type="image/png" sizes="32x32" href="img/favicon-32x32.png">
  <link rel="icon" type="image/png" sizes="16x16" href="img/favicon-16x16.png">
  <link rel="icon" type="image/png" sizes="96x96" href="img/favicon.png">
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

  <!-- Bootstrap JS (for the toggle functionality) -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

  <meta name="author" content="Holger Koenemann">
  <meta name="generator" content="Eleventy v2.0.1">
  <meta name="HandheldFriendly" content="true">
  <title>Framing Black</title>
  <link rel="stylesheet" href="css/theme.min.css">


  <style>
    .image-gallery {
      column-count: 4;
      /* Number of columns */
      column-gap: 10px;
      /* Space between columns */
      width: 100%;
      overflow: hidden;
      transition: transform 0.3s ease-in-out;
    }

    .image-container {
      margin-bottom: 10px;
      /* Space between rows */
      display: inline-block;
      width: 100%;
    }

    .img-fluid {
      width: 100%;
      height: auto;
      object-fit: cover;
      transition: transform 0.3s ease-in-out;
    }

    .image-container:hover .img-fluid {
      transform: scale(1.05);
      /* Slight zoom-in effect */
    }

    .lightbox {
      display: none;
      position: fixed;
      z-index: 10000;
      padding-top: 60px;
      left: 0;
      top: 0;
      width: 100%;
      height: 100%;
      background-color: rgba(0, 0, 0, 0.9);
    }

    .lightbox-content {
      margin: auto;
      display: block;
      max-width: 80%;
      max-height: 80%;
      transition: transform 0.3s ease;
    }

    .close {
      position: absolute;
      top: 15px;
      right: 35px;
      color: #fff;
      font-size: 40px;
      font-weight: bold;
      transition: 0.3s;
      cursor: pointer;
      z-index: 1002;
    }

    .close:hover {
      color: #ccc;
    }

    .lightbox-controls {
      position: absolute;
      bottom: 20px;
      left: 50%;
      transform: translateX(-50%);
      display: flex;
      gap: 10px;
    }

    .lightbox-controls button {
      background-color: #fff;
      border: none;
      font-size: 24px;
      padding: 10px;
      cursor: pointer;
    }

    .lightbox-controls button:hover {
      transform: scale(1.2);
      /* Zoom effect on hover */
      background-color: rgba(255, 255, 255, 1);
      /* Brighter hover background */
    }

    /* Adjust column count for different screen sizes */
    @media (max-width: 1200px) {
      .image-gallery {
        column-count: 3;
        /* 3 columns on medium screens */
      }
    }

    @media (max-width: 768px) {
      .image-gallery {
        column-count: 2;
        /* 2 columns on small screens */
      }
    }

    @media (max-width: 480px) {
      .image-gallery {
        column-count: 1;
        /* 1 column on very small screens */
      }
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

  <?php include 'masterTemplate\navbar.php'; ?> <!-- Include the navbar -->
  <main>
    <div class="container py-vh-4 position-relative mt-5 px-vw-5 text-center">
      <?php
      require_once 'db_FB.inc.php'; // Include the Database class
      require_once 'handlerclass.php'; // Include the PhotoHandler class
      
      $images_per_page = 40;
      $photoHandler = new PhotoHandler();

      // Get the total number of images
      $total_images = $photoHandler->getTotalImages();

      // Calculate total pages needed
      $total_pages = ceil($total_images / $images_per_page);

      // Get the current page or set it to 1 by default
      $page = isset($_GET['page']) ? (int) $_GET['page'] : 1;
      if ($page < 1) {
        $page = 1;
      }
      if ($page > $total_pages) {
        $page = $total_pages;
      }

      // Calculate the starting image for the current page
      $start_image = ($page - 1) * $images_per_page;

      // Fetch the images for the current page
      $images = $photoHandler->fetchImages($start_image, $images_per_page);
      $photoHandler->close();
      ?>


      <div class="image-gallery">
        <?php
        // Loop through the fetched images and display them
        if (!empty($images)) {
          foreach ($images as $image) {
            echo '<div class="image-container">';
            echo '<img src="' . htmlspecialchars($image['image_path']) . '" class="img-fluid lightbox-trigger" alt="Image">';
            echo '</div>';
          }
        } else {
          echo "No images found.";
        }
        ?>
      </div>
    </div>

    <!-- Lightbox Modal -->
    <div id="lightbox" class="lightbox">
      <span class="close">&times;</span>
      <img class="lightbox-content" id="lightbox-img">
      <div class="lightbox-controls">
        <button id="zoom-in">+</button>
        <button id="zoom-out">-</button>
      </div>
    </div>

    <!-- Pagination links -->
    <nav aria-label="Page navigation">
      <ul class="pagination justify-content-center">
        <?php for ($i = 1; $i <= $total_pages; $i++): ?>
          <li class="page-item <?php if ($i == $page)
            echo 'active'; ?>">
            <a class="page-link" href="?page=<?= $i; ?>"><?= $i; ?></a>
          </li>
        <?php endfor; ?>
      </ul>
    </nav>
  </main>

  <?php include 'masterTemplate\footer.php' ?>

  <script src="js/bootstrap.bundle.min.js"></script>
  <script src="js/aos.js"></script>
  <script>
    document.addEventListener('DOMContentLoaded', function () {
      const lightbox = document.getElementById('lightbox');
      const lightboxImg = document.getElementById('lightbox-img');
      const closeBtn = document.querySelector('.close');
      const zoomInBtn = document.getElementById('zoom-in');
      const zoomOutBtn = document.getElementById('zoom-out');

      let scale = 1;

      // Event listener for image click to open lightbox
      document.querySelectorAll('.lightbox-trigger').forEach(item => {
        item.addEventListener('click', function () {
          lightbox.style.display = 'block';
          lightboxImg.src = this.src;
        });
      });

      // Close lightbox
      closeBtn.addEventListener('click', function () {
        lightbox.style.display = 'none';
        scale = 1; // Reset zoom on close
        lightboxImg.style.transform = `scale(${scale})`; // Reset zoom level
      });

      // Zoom in function
      zoomInBtn.addEventListener('click', function () {
        scale += 0.1;
        lightboxImg.style.transform = `scale(${scale})`;
      });

      // Zoom out function
      zoomOutBtn.addEventListener('click', function () {
        if (scale > 1) {
          scale -= 0.1;
          lightboxImg.style.transform = `scale(${scale})`;
        }
      });
    });

  </script>
  <!-- <script>
    $(document).ready(function () {
      var myModal = new bootstrap.Modal(document.getElementById('myModal'), {
        keyboard: false
      })
      $('.img-fluid').click(function () {
        var d = $(this).attr("src");
        $('#modal_image').attr("src", d);
        $('#modal_image').addClass("img-fluid");
        myModal.show();
      });
    });
  </script> -->
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