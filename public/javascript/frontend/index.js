// Function to check if an element is in the viewport
function isElementInView(el) {
    const rect = el.getBoundingClientRect();
    return rect.top <= window.innerHeight && rect.bottom >= 0;
}

// Scroll event listener
window.addEventListener('scroll', function() {
    // Select all elements with the class '.fade-in'
    const fadeElements = document.querySelectorAll('.fade-in');
    
    fadeElements.forEach(function(el) {
        if (isElementInView(el)) {
            el.classList.add('fade-in-visible');
        }
    });
});

// Initially trigger the scroll effect on page load
window.dispatchEvent(new Event('scroll'));
