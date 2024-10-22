document.addEventListener("DOMContentLoaded", function() {
    const favoriteIcons = document.querySelectorAll(".favorite-icon");

    favoriteIcons.forEach(function(icon) {
        icon.addEventListener("click", function(event) {
            event.stopPropagation();
            this.classList.toggle("selected");
        });
    });
});
