const aboutMeImage = document.querySelector('.about-me-main-img.edit');
const aboutMeInput = document.querySelector('input[name=about-me-main-img]');

aboutMeImage.addEventListener('click', () => {
        aboutMeInput.click();
})

aboutMeInput.addEventListener('change', (event) => {
        aboutMeImage.src = window.URL.createObjectURL(aboutMeInput.files[0]);
        aboutMeInput.hidden = true;
})