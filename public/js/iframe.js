$("#htmlPreviewSaveImagesCheckbox").change(function() {
    if(this.checked) {
        $("#htmlIframe").contents().find("img").each(function (index, element) {
            $(this).attr('style', 'display:block;');
        });
    } else {
        $("#htmlIframe").contents().find("img").each(function (index, element) {
            $(this).attr('style', 'display:none;');
        });
    }
});

$("#htmlPreviewLoadJavaScriptCheckbox").change(function() {
    if(this.checked) {
        $("#htmlIframe").removeAttr("sandbox");
    } else {
        $("#htmlIframe").attr("sandbox", "");
    }
});