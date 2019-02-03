$(function() {
    $("#websiteSubmit").on('click', function(e){
        e.preventDefault();

        $(function() {
            $("#websiteIframe").load(function() {
                $(".loading-gif").attr("style", "display:none");
                $('#websiteModal').modal('toggle');
            });
            $(".loading-gif").attr("style", "display:block");
            $("#websiteIframe").attr("src", $("#addressInput").val());
        });
    });
});


$(function() {
    $("#htmlSubmit").on('click', function(e){
        e.preventDefault();

        var file_data = $('#htmlInput').prop('files')[0];
        var form_data = new FormData();
        var form_data_array = [file_data, 'yes', 'yes'];
        form_data.append('file', file_data);
        form_data.append('module', 'Conversion');
        form_data.append('method', 'htmlToPDF');
        form_data.append('args', form_data_array);

        if(file_data['name'].split('.').pop() === 'html') {
            $(".loading-gif").attr("style", "display:block");
        
            $.ajax({
                url: '../ajax/ajax-follow.php',
                type: 'post',
                dataType: 'text',
                cache: false,
                contentType: false,
                processData: false,
                data: form_data,

                success: function(data) {
                    $(".loading-gif").attr("style", "display:none");
                    $('#htmlModal').modal('toggle');
                    $("#htmlIframe").attr("src", data);
                }
            });
        }
    });
});

$("#htmlAccept").on("click", function(e) {
    e.preventDefault();

    var form_data = new FormData();
    var form_data_array = $('#htmlIframe').contents().find("html").html();
    form_data.append('module', 'Conversion');
    form_data.append('method', 'generatePDF');
    form_data.append('args', form_data_array);

    $.ajax({
        url: '../ajax/ajax-follow.php',
        type: 'post',
        data: { 'module': 'Conversion', 'method': 'generatePDF', 'args': form_data_array },

        success: function(data) {
            $('#htmlModal').modal('toggle');
            $('#htmlFinishModal').modal('toggle');
            $('#htmlFinishModalDownloadLink').attr('href', data);
        }
    });

    /*$.post("../ajax/ajax-follow.php", { 'module': 'Conversion', 'method': 'generatePDF', 'args': form_data_array }).done(function(data) {
        $('#htmlModal').modal('toggle');
        $('#htmlFinishModal').modal('toggle');
        $('#htmlFinishModalDownloadLink').attr('href', data);
    });*/
});

$("#websiteAccept").on("click", function(e) {
    e.preventDefault();

    var form_data = new FormData();
    var form_data_array = getIframeContent("#websiteIframe");
    form_data.append('module', 'Conversion');
    form_data.append('method', 'generatePDF');
    form_data.append('args', form_data_array);

    $.ajax({
        url: '../ajax/ajax-follow.php',
        type: 'post',
        data: { 'module': 'Conversion', 'method': 'generatePDF', 'args': form_data_array },

        success: function(data) {
            $('#websiteModal').modal('toggle');
            $('#websiteFinishModal').modal('toggle');
            $('#websiteFinishModalDownloadLink').attr('href', data);
        }
    });

    /*$.post("../ajax/ajax-follow.php", { 'module': 'Conversion', 'method': 'generatePDF', 'args': form_data_array }).done(function(data) {
        $('#htmlModal').modal('toggle');
        $('#htmlFinishModal').modal('toggle');
        $('#htmlFinishModalDownloadLink').attr('href', data);
    });*/
});

function getIframeContent(iframe) {
    $.ajax({
        url: $(iframe).attr("src"),
        type: 'GET',
        contentType: 'text/plain',
        xhrFields: {
            withCredientals: false
        }
    }).done(function(html) {
        return html;       
    });
}