const dropArea = document.getElementById('drop-zone');

dropArea.addEventListener('dragover', (event) => {
    event.currentTarget.style.borderColor = 'oklch(70.7% 0.022 261.325)';
});

dropArea.addEventListener('dragleave', (event) => {
    event.currentTarget.style.border = '';
});