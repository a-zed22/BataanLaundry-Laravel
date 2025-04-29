document.addEventListener("DOMContentLoaded", function () {
    document.querySelectorAll(".view-image-btn").forEach(function (btn) {
        btn.addEventListener("click", function (event) {
            event.preventDefault();
            let imgSrc = this.getAttribute("data-img-src"); // Get image URL from clicked button
            document.getElementById("modalImage").setAttribute("src", imgSrc); // Set modal image
            let modal = new bootstrap.Modal(
                document.getElementById("imageModal")
            ); // Open modal
            modal.show();
        });
    });
});
