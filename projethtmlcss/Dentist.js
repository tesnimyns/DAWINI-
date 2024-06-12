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


//  function hide(){
//      document.querySelectorAll(".popup").forEach(entry => entry.style.display = "none");


//  }

//  function show(){
//      document.querySelectorAll(".popup").forEach(entry => entry.style.display = "flex");

//  }


function hide() {
    // Cacher tous les popups
    document.querySelectorAll(".popup").forEach(entry => entry.style.display = "none");
}

function showPopup(index) {
    // Cacher tous les popups
    hide();
    // Afficher le popup spécifique
    const popup = document.querySelector(`.popup.popup-${index}`);
    if (popup) {
        popup.style.display = "flex";
    }
}

