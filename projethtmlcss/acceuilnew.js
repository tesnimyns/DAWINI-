
const counters = document.querySelectorAll(".counters span");
const container = document.querySelector(".counters"); // Sélectionner le premier élément .counters

let activated = false;

window.addEventListener("scroll", () => {
    // Vérifie si l'élément .counters est visible sur la page
    const containerTop = container.getBoundingClientRect().top;
    const containerHeight = container.offsetHeight;
    const windowScroll = window.scrollY || window.pageYOffset;
    
    if (containerTop < window.innerHeight && containerTop + containerHeight > 0 && !activated) {
        counters.forEach(counter => {
            counter.innerText = 0;
            let count = 0;

            function updateCount() {
                const target = parseInt(counter.dataset.count);
                if (count < target) {
                    count++;
                    counter.innerText = count;
                    setTimeout(updateCount, 10);
                } else {
                    counter.innerText = target;
                }
            }
            updateCount();
            activated = true;
        });
    } else if ((containerTop + containerHeight < 0 || containerTop > window.innerHeight) && activated) {
        counters.forEach(counter => {
            counter.innerText = 0;
        });
        activated = false;
    }
});



//animation 
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
document.querySelectorAll('.reveal').forEach(function(r){
    observer.observe(r)
})
