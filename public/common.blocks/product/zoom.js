const mainImage = document.querySelector('.product__main-image');
const zoomImages = document.querySelectorAll('.product__additional-image');

for(let i = 0; i < zoomImages.length; i++){
    zoomImages[i].addEventListener("mouseover", function(event) {
        let target = event.target;
        mainImage.src = target.src;
    });
};