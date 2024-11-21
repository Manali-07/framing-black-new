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

        input[type="submit"] {
            background-color: red;
            color: white;
            padding: 10px 15px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #0056b3;
        }

        .video-gallery {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
            gap: 15px;
            margin-top: 20px;
        }

        .video-item {
            background: #fff;
            border-radius: 8px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            transition: transform 0.3s;
        }

        .video-item:hover {
            transform: scale(1.05);
        }

        .video-item iframe {
            width: 100%;
            height: 200px;
            /* Set a fixed height for the iframes */
            border: none;
        }

        .delete-button {
            background-color: red;
            color: white;
            padding: 5px 10px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            margin: 10px;
        }

        .delete-button:hover {
            background-color: #0056b3;
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
            <?php
            require_once 'handlerclass.php';

            $VideoUploadHandler = new VideoUploadHandler();
            ?>
            <div class="container py-vh-4 position-relative mt-5 px-vw-5 text-center">
                <h1>Upload a File</h1>
                <form action="" method="POST">
                    <label for="video_url">Enter YouTube Video URL:</label>
                    <input type="text" id="video_url" name="video_url" required>
                    <input type="submit" value="Upload Video">
                </form>

                <?php
                // Handle video upload
                if (isset($_POST['video_url'])) {
                    $iframe_code = $_POST['video_url'];

                    // Use regex to extract the src URL from the iframe
                    preg_match('/src="([^"]+)"/', $iframe_code, $matches);

                    if (isset($matches[1])) {
                        $video_url = $matches[1]; // This is the URL inside the iframe's src attribute
                
                        // Add the video to the database
                        if ($VideoUploadHandler->insertVideo($video_url)) {
                            echo "Video URL saved successfully!";
                        } else {
                            echo "Error saving video URL.";
                        }
                    } else {
                        echo "Error: No valid YouTube embed URL found in the iframe.";
                    }
                }

                // Fetch and display videos
                $videos = $VideoUploadHandler->fetchVideos();
                echo "<div class='video-gallery'>";

                foreach ($videos as $video) {
                    // Append the ?rel=0 parameter to the video URL to prevent related videos from showing after playback
                    $video_url_with_rel = $video['video_url'] . "?rel=0";

                    // Display the video using an iframe
                    echo "<div class='video-item'>";
                    echo "<iframe width='560' height='315' src='" . $video_url_with_rel . "' frameborder='0' allowfullscreen></iframe>";

                    // Add a delete button with data-id attribute
                    echo "<button class='delete-button' data-id='" . $video['id'] . "'>Delete</button>";
                    echo "</div>";
                }

                echo "</div>";
                ?>

                <script>
                    document.querySelectorAll('.delete-button').forEach(button => {
                        button.addEventListener('click', function () {
                            const videoId = this.getAttribute('data-id');

                            if (confirm('Are you sure you want to delete this video?')) {
                                fetch('delete_video.php', {
                                    method: 'POST',
                                    headers: {
                                        'Content-Type': 'application/json'
                                    },
                                    body: JSON.stringify({ id: videoId })
                                })
                                    .then(response => response.json())
                                    .then(data => {
                                        if (data.success) {
                                            alert('Video deleted successfully');
                                            // Optionally remove the video item from the DOM
                                            this.closest('.video-item').remove();
                                        } else {
                                            alert(data.message);
                                        }
                                    })
                                    .catch(error => {
                                        console.error('Error:', error);
                                        alert('Error deleting video');
                                    });
                            }
                        });
                    });
                </script>
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