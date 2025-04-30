document.addEventListener('keydown', function(e) {
    if (e.ctrlKey && e.altKey && e.shiftKey && e.key.toLowerCase() === 'm') {
        window.location.href = '/authentication/login.php';
    }
});