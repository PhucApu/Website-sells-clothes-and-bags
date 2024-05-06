
$(document).ready(function () {
    $('#inputFile').change(function () {
        const files = $(this)[0].files;
        if (files.length > 0) {
            const imagePreview = $('#imagePreview');
            imagePreview.empty();

            for (let i = 0; i < files.length; i++) {
                const file = files[i];
                const reader = new FileReader();

                reader.onload = function (e) {
                    const img = $('<img>').attr('src', e.target.result).addClass('img-thumbnail');
                    imagePreview.append(img);
                };
                reader.readAsDataURL(file);
            }
        }
    });
});