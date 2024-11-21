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
    .grid-item {
      display: flex;
      flex-direction: column;
      /* Stack iframe and form vertically */
      align-items: stretch;
      /* Ensure form takes full width */
      margin-bottom: 20px;
      /* Space below each grid item */
    }

    .grid-item iframe {
      flex-grow: 1;
      /* Allow the iframe to grow */
      margin-bottom: 15px;
      /* Add space below the iframe */
    }

    form {
      padding: 10px;
      /* Padding inside the form */
      background-color: #f9f9f9;
      /* Light background for the form */
      border: 1px solid #ddd;
      /* Light border for the form */
      border-radius: 5px;
      /* Rounded corners for the form */
      box-shadow: 0 1px 3px rgba(0, 0, 0, 0.2);
      /* Subtle shadow for depth */
      transition: background-color 0.3s;
      /* Smooth transition for hover */
    }

    /* Hover effect for the form */
    .form:hover {
      background-color: #f0f8ff;
      /* Light blue background on form hover */
    }

    form input[type="text"] {
      padding: 8px;
      /* Padding for input */
      margin-bottom: 10px;
      /* Space below input */
      border: 1px solid #ccc;
      /* Light border for input */
      border-radius: 4px;
      /* Rounded corners for input */
      width: 100%;
      /* Full width for the input */
      transition: background-color 0.3s;
      /* Smooth transition */
    }

    /* Hover effect for the input field */
    form input[type="text"]:hover {
      background-color: #e6f7ff;
      /* Light blue background on hover */
    }

    /* Button styles */
    form input[type="submit"] {
      background-color: red;
      /* Red background color for the button */
      color: white;
      /* White text */
      border: none;
      /* No border */
      border-radius: 4px;
      /* Rounded corners */
      padding: 10px;
      /* Padding for button */
      cursor: pointer;
      /* Pointer cursor on hover */
      transition: background-color 0.3s;
      /* Smooth transition */
      width: 100%;
      /* Full width for the button */
    }

    /* Hover effect for the submit button */
    form input[type="submit"]:hover {
      background-color: #0056b3;
      /* Darker shade on hover */
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

      <!-- <form action="" method="post">
        <label for="placeholder1">Cloudinary Image URL or Video URL for Placeholder 1:</label>
        <input type="text" name="placeholder1" required><br><br>

        <label for="placeholder2">Cloudinary Image URL or Video URL for Placeholder 2:</label>
        <input type="text" name="placeholder2" required><br><br>

        <label for="placeholder3">Cloudinary Image URL or Video URL for Placeholder 3:</label>
        <input type="text" name="placeholder3" required><br><br>

        <input type="submit" name="upload" value="Upload Content">
      </form> -->

      <?php
      include 'handlerclass.php';
      $admin_ui3content = new admin_ui3content();
      $message = '';  // Variable to store the message
      
      if (isset($_POST['upload'])) {
        // Collect URLs from the form
        $urls = [$_POST['placeholder1'], $_POST['placeholder2'], $_POST['placeholder3']];
        echo $admin_ui3content->upload3data($urls);
      }

      // Fetch existing URLs from the database
      $fetch_result = $admin_ui3content->fetchContent();

      if ($fetch_result->rowCount() > 0) {
        $row = $fetch_result->fetch(PDO::FETCH_ASSOC);
        echo "<div class='grid-container'>";

        for ($i = 1; $i <= 3; $i++) {
          $image_url = $row["image$i"];

          // Call getEmbedUrl on the instance of the class
          $embed_url = $admin_ui3content->getEmbedUrl($image_url);

          echo "<div class='grid-item' style='width: 250px; height: 250px; position: relative; display: inline-block; margin: 10px;'>";
          echo "<iframe style='width: 100%; height: 100%; object-fit: cover;' src='$embed_url' frameborder='0' allowfullscreen></iframe>";
          echo "<form action='' method='post' class='upload-form' style='margin-top: 10px;'>";
          echo "<input type='hidden' name='image_id' value='$i'>";
          echo "<input type='text' name='new_url' placeholder='New URL' required>";
          echo "<input type='submit' name='update_single' value='Replace'>";
          echo "</form>";
          echo "</div>";
        }

        echo "</div>";
      } else {
        echo "No records found.";
      }

      // Update individual URL
      if (isset($_POST['update_single'])) {
        $image_id = $_POST['image_id'];
        $new_url = $_POST['new_url'];

        //echo $admin_ui3content->updateSingleURL($image_id, $new_url);
        $message = $admin_ui3content->updateSingleURL($image_id, $new_url);
      }

      // Output the message (if any)
      if (!empty($message)) {
        echo "<div class='success-message' id='success-message' style='background-color: #4CAF50; color: white; padding: 10px; margin-bottom: 10px;'>
              $message
            </div>";
      }
      ?>
      <!-- JavaScript to make the success message disappear after a few seconds -->
      <script>
        // Check if the success message exists
        const successMessage = document.getElementById('success-message');
        if (successMessage) {
          // Set the message to disappear after 2 seconds
          setTimeout(() => {
            successMessage.style.display = 'none';
          }, 2000); // 2 seconds
        }
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