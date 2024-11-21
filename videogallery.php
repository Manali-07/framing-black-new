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
    <style>
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

    <?php include 'masterTemplate\navbar.php'; ?> <!-- Include the navbar -->
    <main>
        <div class="container" style="padding: 30px;">
            <?php
            require_once 'handlerclass.php';

            $videoHandler = new VideoHandler();

            try {
                // Fetch video URLs from the database
                $videos = $videoHandler->fetchVideos();

                echo "<div class='video-gallery'>";
                // Display videos
                foreach ($videos as $video) {
                    // Extract the video ID from the full YouTube URL
                    if (preg_match("/(?:youtube\.com\/(?:[^\/]+\/.+\/|(?:v|e(?:mbed)?)\/|.*[?&]v=)|youtu\.be\/)([^\"&?\/\s]{11})/", $video['video_url'], $matches)) {
                        $video_id = $matches[1]; // Get the video ID
            
                        // Append '?rel=0' to the video URL to disable related videos
                        $video_url_with_rel = "https://www.youtube.com/embed/" . $video_id . "?rel=0&enablejsapi=1";

                        // Display the video thumbnail with a custom play button overlay
                        echo "<div class='video-item'>";

                        // Custom play button overlay (replace the image with iframe on click)
                        echo "<div class='video-container'>";
                        echo "<div class='video-overlay' onclick=\"playVideo('$video_url_with_rel', this)\">";
                        echo "<div class='custom-play-button'>&#9658;</div>"; // Black play button
                        echo "</div>";

                        // Get the YouTube thumbnail URL
                        $thumbnail_url = "https://img.youtube.com/vi/$video_id/hqdefault.jpg";

                        // Display the YouTube thumbnail
                        echo "<img src='$thumbnail_url' alt='Video Thumbnail' class='video-thumbnail'>";

                        echo "</div>"; // Close video-container
                        echo "</div>"; // Close video-item
                    } else {
                        // Handle invalid or non-YouTube URLs
                        echo "<p>Invalid video URL: {$video['video_url']}</p>";
                    }
                }
                echo "</div>";

            } catch (Exception $e) {
                echo "Error: " . $e->getMessage();
            }

            $videoHandler->close();
            ?>
        </div>
        <script>
            let player;

            function onYouTubeIframeAPIReady() {
                // YouTube API is ready
            }

            function playVideo(videoUrl, element) {
                const videoContainer = element.closest('.video-container');

                // Construct the iframe with autoplay enabled
                const iframe = document.createElement('iframe');
                iframe.width = "560";
                iframe.height = "315";
                iframe.src = videoUrl + "&autoplay=1";  // Autoplay enabled
                iframe.frameBorder = "0";
                iframe.allow = "autoplay; encrypted-media";
                iframe.allowFullscreen = true;

                // Clear existing content and append the iframe
                videoContainer.innerHTML = ""; // Clear existing content
                videoContainer.appendChild(iframe);

                // Create a player instance
                player = new YT.Player(iframe, {
                    events: {
                        'onStateChange': (event) => onPlayerStateChange(event, videoUrl)
                    }
                });
            }

            function onPlayerStateChange(event, videoUrl) {
                // Check if the video has ended
                if (event.data == YT.PlayerState.ENDED) {
                    // Display the thank you message and refresh link
                    const videoContainer = event.target.getIframe().parentNode;
                    videoContainer.innerHTML = `
            <div class='thank-you-message'>
                Thanks for watching! 
                <span class='refresh-link' onclick='refreshVideo("${videoUrl}", this)'>Click here to play again</span>
            </div>
        `;
                }
            }

            function refreshVideo(videoUrl, element) {
                const videoContainer = element.closest('.video-container'); // Get the specific video container

                // Refresh the iframe to start the video again
                const iframe = document.createElement('iframe');
                iframe.width = "560";
                iframe.height = "315";
                iframe.src = videoUrl + "&autoplay=1"; // Autoplay enabled
                iframe.frameBorder = "0";
                iframe.allow = "autoplay; encrypted-media";
                iframe.allowFullscreen = true;

                // Clear existing content and append the iframe
                videoContainer.innerHTML = ""; // Clear existing content
                videoContainer.appendChild(iframe);

                // Create a new player instance for the replay
                player = new YT.Player(iframe, {
                    events: {
                        'onStateChange': (event) => onPlayerStateChange(event, videoUrl)
                    }
                });
            }
        </script>
    </main>

    <?php include 'masterTemplate\footer.php' ?>

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
    <!-- Bootstrap JS (for the toggle functionality) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>


    <script src="https://www.youtube.com/iframe_api"></script>
</body>

</html>