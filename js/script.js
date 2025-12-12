document.getElementById('toggleButton').addEventListener('click', () => {
    const extraImage = document.getElementById('extraImage');
    const btn = document.getElementById('toggleButton');
    if (extraImage.style.display === "none") {
        extraImage.style.display = "block";
        btn.innerText = 'Close';
    } else {
        extraImage.style.display = 'none';
        btn.innerText = 'Open';
    }
})
