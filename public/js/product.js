const image_viewer = document.querySelector(".product .image");
const image = document.querySelector(".product .image img");
const image_selector = document.querySelector(".product .image-selector");
const stars = document.querySelector(".review-input .stars");

const review_input = document.querySelector(".review-input .first-row");
image_selector.childNodes.forEach((child) => {
    child.addEventListener("click", () => {
        image.src = child.src;
    });
});

for (const child of stars.children) {
    child.addEventListener("click", () => {
        review_input.style.display = "flex";
        let nextSibling = stars.children[0];
        let unmark = false;
        while (nextSibling) {
            if (unmark) nextSibling.src = "/icons/star_outline.svg";
            else nextSibling.src = "/icons/star.svg";
            if (nextSibling === child) unmark = true;
            nextSibling = nextSibling.nextElementSibling;
        }
    });
}
