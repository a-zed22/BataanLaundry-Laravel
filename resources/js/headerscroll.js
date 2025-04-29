import "../css/headerfooter.css";

let lastScrollTop = 0;
const header = document.querySelector(".header");

window.addEventListener("scroll", () => {
    let scrollTop = window.scrollY || document.documentElement.scrollTop;

    if (scrollTop > lastScrollTop) {
        // Scrolling down
        if (scrollTop > header.offsetHeight) {
            // If the header is no longer visible, hide it
            header.classList.add("hidden");
        }
    } else {
        // Scrolling up
        header.classList.remove("hidden");
    }

    lastScrollTop = scrollTop;
});
