// JavaScript to handle the state of the stars
const stars = document.querySelectorAll('.star');

stars.forEach((star) => {
    star.addEventListener('click', () => {
        // Remove 'checked' class from all stars
        stars.forEach((s) => s.classList.remove('checked'));
        
        // Add 'checked' class to the clicked star and previous stars
        star.classList.add('checked');
        let previousStars = star.nextElementSibling;
        while (previousStars) {
            previousStars.classList.add('checked');
            previousStars = previousStars.nextElementSibling;
        }
    });
});
