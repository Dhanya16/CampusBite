window.addEventListener('scroll', function() {
    const heading = document.getElementById('fade-heading');
    const paragraph = document.getElementById('fade-paragraph');
    const scrollY = window.scrollY;
    
    if (scrollY > 50) { // Adjust this value as needed
        heading.classList.remove('fade-in');
        paragraph.classList.remove('fade-in');
        heading.classList.add('fade-out');
        paragraph.classList.add('fade-out');
    } else {
        heading.classList.remove('fade-out');
        paragraph.classList.remove('fade-out');
        heading.classList.add('fade-in');
        paragraph.classList.add('fade-in');
    }
});