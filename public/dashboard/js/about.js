

var imageGalleryBrowseUrl = "{{ route('dashboard.imageGallery.browser') }}";
var imageGalleryUploadUrl = "{{ route('dashboard.imageGallery.uploader') }}";
$(function() {
    // Loop through each textarea and apply CKEditor
    $("textarea").each(function() {
        CKEDITOR.replace(this.id, {
            filebrowserBrowseUrl: imageGalleryBrowseUrl,
            filebrowserUploadUrl:
                imageGalleryUploadUrl +
                "?_token=" +
                $("meta[name=csrf-token]").attr("content"),
            removeButtons: "About",
            contentsLangDirection: $(this).attr('dir') || 'rtl' // Set direction based on the textarea's dir attribute or default to 'rtl'
        });
    });
});
