document.addEventListener("DOMContentLoaded", function () {
    // Get the file input element
    const input = document.getElementById("path");

    // Get the image preview element
    const imgPreview = document.getElementById("product-img-tag");

    // Listen for changes in the file input
    input.addEventListener("change", function () {
        if (this.files && this.files[0]) {
            const reader = new FileReader();

            reader.onload = function (e) {
                imgPreview.src = e.target.result;
            };

            reader.readAsDataURL(this.files[0]);
        }
    });
});
