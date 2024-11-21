let currentImageIndex = 0;
let images = [];
const lightbox = document.getElementById('lightbox');
const lightboxImg = document.getElementById('lightbox-img');
const cancelBtn = document.getElementById('cancel-btn');
const prevBtn = document.getElementById('prev-btn');
const nextBtn = document.getElementById('next-btn');
const zoomInBtn = document.getElementById('zoom-in');
const zoomOutBtn = document.getElementById('zoom-out');
let scale = 1;

// Collect image URLs from the gallery
document.querySelectorAll('.gallery img').forEach((img, index) => {
    img.addEventListener('click', () => {
        currentImageIndex = index;
        images = Array.from(document.querySelectorAll('.gallery img')).map(img => img.src);
        openLightbox(images[currentImageIndex]);
    });
});

function openLightbox(src) {
    lightboxImg.src = src;
    lightbox.style.display = 'flex';
    lightboxImg.style.transform = `scale(${scale})`;
}

function closeLightbox() {
    lightbox.style.display = 'none';
}

function showImage(index) {
    currentImageIndex = (index + images.length) % images.length;
    lightboxImg.src = images[currentImageIndex];
}

function zoomIn() {
    scale += 0.1;
    lightboxImg.style.transform = `scale(${scale})`;
}

function zoomOut() {
    scale = Math.max(1, scale - 0.1);
    lightboxImg.style.transform = `scale(${scale})`;
}

cancelBtn.addEventListener('click', closeLightbox);
prevBtn.addEventListener('click', () => showImage(currentImageIndex - 1));
nextBtn.addEventListener('click', () => showImage(currentImageIndex + 1));
zoomInBtn.addEventListener('click', zoomIn);
zoomOutBtn.addEventListener('click', zoomOut);

// Close lightbox when clicking outside the image
lightbox.addEventListener('click', (event) => {
    if (event.target === lightbox) {
        closeLightbox();
    }
});