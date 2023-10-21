function showLoader() {
    const loaderContainer = document.querySelector('.loader-container');
    loaderContainer.style.display = 'block';

    const displayDuration = 4000;

    setTimeout(function() {
        
        loaderContainer.style.transform = 'translateY(-100%)';
        loaderContainer.style.transition = 'all 2s ease';
        
        const mainContent = document.querySelector('.main-content');
        mainContent.style.display = 'block';
        mainContent.classList.add('show');
    }, displayDuration);
}

showLoader();
