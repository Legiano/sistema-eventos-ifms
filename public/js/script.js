
document.addEventListener('DOMContentLoaded', () => {
    const urlParams = new URLSearchParams(window.location.search);
    if (urlParams.has('search')) {
        const eventsContainer = document.getElementById('events-container');
        if (eventsContainer) {
            eventsContainer.scrollIntoView({ behavior: 'smooth', block: 'start' });
        }
    }
});

console.log('está funcionando!');
