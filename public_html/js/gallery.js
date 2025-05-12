document.addEventListener('DOMContentLoaded', function () {
    document.querySelectorAll('.save-scroll-btn')
    .forEach(function (button) {
        button.addEventListener('click', function (e) {
            e.preventDefault();
            const scrollPosition = window.scrollY;
            localStorage.setItem('lastScrollPosition', scrollPosition);
            window.location.href = this.dataset.url;
        });
    });

    const savedScroll = localStorage.getItem('lastScrollPosition');
    if (savedScroll !== null) {
        setTimeout(function() {
            window.scrollTo(0, parseInt(savedScroll));
        }, 700);
        
        localStorage.removeItem('lastScrollPosition');
    }
});



