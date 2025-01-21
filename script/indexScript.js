// Main slider section
let slideIndex = 1;
showSlides(slideIndex);

// Auto slide functionality
let autoSlideInterval = setInterval(() => plusSlides(1), 1000); // Change slide every 5 seconds

function showSlides(n) {
    const slides = document.querySelectorAll(".slides");
    const dots = document.querySelectorAll(".dot");

    if (n > slides.length) slideIndex = 1;
    if (n < 1) slideIndex = slides.length;

    slides.forEach(slide => (slide.style.display = "none"));
    dots.forEach(dot => dot.classList.remove("active"));

    slides[slideIndex - 1].style.display = "block";
    dots[slideIndex - 1].classList.add("active");
}

function plusSlides(n) {
    showSlides((slideIndex += n));
    resetAutoSlide();
}

function currentSlide(n) {
    showSlides((slideIndex = n));
    resetAutoSlide();
}

function resetAutoSlide() {
    clearInterval(autoSlideInterval);
    autoSlideInterval = setInterval(() => plusSlides(1), 5000); // Restart auto-slide interval
}

// Event listeners for manual control
document.querySelector(".prev").addEventListener("click", () => plusSlides(-1));
document.querySelector(".next").addEventListener("click", () => plusSlides(1));

// Event listeners for dots
document.querySelectorAll(".dot").forEach((dot, index) => {
    dot.addEventListener("click", () => currentSlide(index + 1));
});
