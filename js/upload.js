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
