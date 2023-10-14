$(function() {
    CKEDITOR.replace("description", {
        filebrowserBrowseUrl: imageGalleryBrowseUrl,
        filebrowserUploadUrl:
            imageGalleryUploadUrl +
            "?_token=" +
            $("meta[name=csrf-token]").attr("content"),
        removeButtons: "About",
        contentsLangDirection: 'rtl'
    });

    CKEDITOR.replace("introduction", {
        removeButtons: "About",
        contentsLangDirection: 'rtl'
    });


    CKEDITOR.replace("content_table", {
        removeButtons: "About",
        contentsLangDirection: 'rtl'
    });

    CKEDITOR.replace("first_paragraph", {
        removeButtons: "About",
        contentsLangDirection: 'rtl'
    });

});
