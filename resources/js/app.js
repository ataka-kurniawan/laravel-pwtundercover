import './bootstrap';
// resources/js/app.js



// View More Button
document.addEventListener("DOMContentLoaded", function () {
    const viewMoreBtn = document.getElementById('view-more-btn');
    if (viewMoreBtn) {
        viewMoreBtn.addEventListener('click', function () {
            const hiddenItems = document.querySelectorAll('#trending-list .hidden');
            let count = 0;
            hiddenItems.forEach(item => {
                if (count < 6) {
                    item.classList.remove('hidden');
                    count++;
                }
            });

            if (document.querySelectorAll('#trending-list .hidden').length === 0) {
                this.style.display = 'none';
            }
        });
    }

    // Carousel
    const slides = document.querySelectorAll('.carousel-slide');
    let index = 0;
    function showSlide(i) {
        slides.forEach((slide, idx) => {
            slide.classList.toggle('hidden', idx !== i);
        });
    }
    const nextBtn = document.getElementById('next');
    const prevBtn = document.getElementById('prev');
    if (nextBtn && prevBtn) {
        nextBtn.addEventListener('click', () => {
            index = (index + 1) % slides.length;
            showSlide(index);
        });
        prevBtn.addEventListener('click', () => {
            index = (index - 1 + slides.length) % slides.length;
            showSlide(index);
        });
    }
    setInterval(() => {
        if (slides.length) {
            index = (index + 1) % slides.length;
            showSlide(index);
        }
    }, 5000);

    // Burger Menu
  const menuBtn = document.getElementById('menu-btn');
    const mobileMenu = document.getElementById('mobile-menu');

    if (menuBtn && mobileMenu) {
        menuBtn.addEventListener('click', () => {
            // Toggle menu dengan animasi
            mobileMenu.classList.toggle('hidden');
            mobileMenu.classList.toggle('animate__fadeInDown');
        });
    }
});


document.addEventListener("DOMContentLoaded", function() {
    const articles = document.querySelectorAll("#none-container .article-item");
    const viewMoreBtn = document.getElementById("view-more-btn");

    let perPage = 10;
    let currentIndex = 0;

    function showArticles() {
        for (let i = currentIndex; i < currentIndex + perPage && i < articles.length; i++) {
            articles[i].style.display = "grid";
        }
        currentIndex += perPage;

        if (currentIndex >= articles.length) {
            viewMoreBtn.style.display = "none";
        }
    }

    // Sembunyikan semua dulu
    articles.forEach(a => a.style.display = "none");

    // Tampilkan awal
    showArticles();

    // Event klik
    viewMoreBtn.addEventListener("click", showArticles);
});




