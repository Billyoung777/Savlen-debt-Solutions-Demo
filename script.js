document.addEventListener('DOMContentLoaded', function() {
    const carousel = document.getElementById('serviceCarousel');
    const serviceSection = document.getElementById('service');

    function updateBackgroundImage() {
        const activeItem = carousel.querySelector('.carousel-item.active');
        const bgImage = activeItem.getAttribute('data-bg');
        serviceSection.style.setProperty('--service-bg-image', `url(${bgImage})`);
    }

    $('#serviceCarousel').on('slide.bs.carousel', function() {
        updateBackgroundImage();
    });

    // Set initial background image
    updateBackgroundImage();
});
