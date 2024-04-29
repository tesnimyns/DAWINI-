function animateCount(element, targetCount, duration) {
    let count = 0;
    const step = Math.ceil(targetCount / (duration / 10)); // Adjust step based on duration

    // Interval function to increment count
    const interval = setInterval(() => {
        count += step;
        if (count >= targetCount) {
            clearInterval(interval);
            count = targetCount;
        }
        element.innerText = count;
    }, 10);
}

// Function to check if an element is in the viewport
function isInViewport(element) {
    const rect = element.getBoundingClientRect();
    return (
        rect.top >= 0 &&
        rect.left >= 0 &&
        rect.bottom <= (window.innerHeight || document.documentElement.clientHeight) &&
        rect.right <= (window.innerWidth || document.documentElement.clientWidth)
    );
}
    
// Function to handle scrolling and trigger animation when the section is in the viewport
function handleScroll() {
    const doctorCountElement = document.getElementById('doctorCountValue');
    const patientCountElement = document.getElementById('patientCountValue');

    if (isInViewport(doctorCountElement)) {
        const doctorTargetCount = parseInt(doctorCountElement.dataset.count);
        animateCount(doctorCountElement, doctorTargetCount, 2000); // Adjust duration as needed
        const patientTargetCount = parseInt(patientCountElement.dataset.count);
        animateCount(patientCountElement, patientTargetCount, 2000); // Adjust duration as needed
        window.removeEventListener('scroll', handleScroll); // Remove listener once animation is triggered
    }

}

// Add event listener for scroll
window.addEventListener('scroll', handleScroll);



// Find the desc element
const descElement = document.getElementById('desc');

// Add event listener for mouseover
descElement.addEventListener('mouseover', () => {
    // Scale the element
    descElement.style.transform = 'scale(1.15)';
});

// Add event listener for mouseout to revert the scaling
descElement.addEventListener('mouseout', () => {
    // Revert the scaling
    descElement.style.transform = 'scale(1)';
});




const ratio =0.1
const options = {
    root: null,
    rootMargin: '0px',
    threshold: ratio
}

const handleIntersect = function(entries , observer){
    entries.forEach(function (entry){
        if (entry.intersectionRatio > ratio){
            entry.target.classList.add('reveal-visible')
            observer.unobserve(entry.target)
        }
    })
}
const observer = new IntersectionObserver(handleIntersect,options)
document.querySelectorAll('[class*="reveal-"]').forEach(function(r){
    observer.observe(r)
})