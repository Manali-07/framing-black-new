let isVideoPlaying = false; // To track if the video is playing

function changeVideo(videoUrl) {
    const videoFrame = document.getElementById('main-video-frame');
    videoFrame.src = videoUrl + '?autoplay=1'; // Set video URL with autoplay parameter
    document.getElementById('main-video-section').style.display = 'block'; // Show the main video section
    isVideoPlaying = true; // Update the video playing state
}

// Function to handle video end event
function onVideoEnd() {
    const videoFrame = document.getElementById('main-video-frame');
    videoFrame.src = ''; // Reset video source
    alert('Thank you!'); // Display thank you message
    isVideoPlaying = false; // Update the video playing state

    // Restart the video after a short delay
    setTimeout(() => {
        changeVideo(videoFrame.src.split('?')[0]); // Restart the video without autoplay parameter
    }, 2000); // Delay for 2 seconds before restarting the video
}

// Close video section and reset the iframe
function closeVideo() {
    document.getElementById('main-video-section').style.display = 'none'; // Hide the main video section
    const videoFrame = document.getElementById('main-video-frame');
    videoFrame.src = ''; // Reset the video URL
    isVideoPlaying = false; // Update the video playing state
}

// Ensure that the DOM is fully loaded before executing the script
document.addEventListener('DOMContentLoaded', function() {
    const videoFrame = document.getElementById('main-video-frame');
    
    // Check if the video frame exists
    if (videoFrame) {
        // Event listener for when the video ends
        videoFrame.addEventListener('load', function() {
            const iframe = this;
            const videoUrl = iframe.src.split('?')[0]; // Get the video URL without parameters

            // Check if video has ended (only for YouTube videos)
            const checkEnd = setInterval(function() {
                const player = new YT.Player(iframe);
                player.getPlayerState().then(function(state) {
                    if (state === YT.PlayerState.ENDED) {
                        onVideoEnd(); // Call function to handle video end
                        clearInterval(checkEnd); // Stop checking
                    }
                });
            }, 1000); // Check every second
        });
    } else {
        console.error('The video frame element does not exist.'); // Log error if element is not found
    }
});
