const carouselSlide = document.querySelector('.carousel-slide');
const carouselItems = document.querySelectorAll('.carousel-item');

let counter = 1;
const size = carouselItems[0].clientWidth;

carouselSlide.style.transform = `translateX(-${size * counter}px)`;


function moveToNextSlide() {
  if (counter >= carouselItems.length - 1) return;
  carouselSlide.style.transition = 'transform 0.5s ease-in-out';
  counter++;
  carouselSlide.style.transform = 'translateX(' + (-size * counter) + 'px)';
}

function moveToPrevSlide() {
  if (counter <= 0) return;
  carouselSlide.style.transition = 'transform 0.5s ease-in-out';
  counter--;
  carouselSlide.style.transform = 'translateX(' + (-size * counter) + 'px)';
}

carouselSlide.addEventListener('transitionend', () => {
  if (carouselItems[counter].alt === 'All-Inclusive Hotels' && counter === carouselItems.length - 1) {
    carouselSlide.style.transition = 'none';
    counter = carouselItems.length - 6;
    carouselSlide.style.transform = 'translateX(' + (-size * counter) + 'px)';
  }
  if (carouselItems[counter].alt === 'Beach Resorts' && counter === 0) {
    carouselSlide.style.transition = 'none';
    counter = carouselItems.length - 2;
    carouselSlide.style.transform = 'translateX(' + (-size * counter) + 'px)';
  }
});

// Automatic sliding (optional)
setInterval(() => {
  moveToNextSlide();
}, 1000);
