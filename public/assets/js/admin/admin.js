$(document).ready(function() {
    $('.posts').click(function(e) {
        e.preventDefault();
        $(this).next('.sub_menu').toggle('slow');
    });

    $('.toggle-admin-menu').on('click', function () {
        $('.sidebar').toggleClass('d-none')
    })

    $('#upload_file').on('change', function (event) {
        let data = new FormData();
        data.append('file', event.target.files[0]);
        data.append('_token', $('input[name="_token"]').val());
        $.ajax({
            type:'POST',
            url: $(this).data('action'),
            data:data,
            cache:false,
            contentType: false,
            processData: false,
            success:function(data){
                $('#upload_file').attr('data-value', data.name)
                $('.upload_container').css('background-image', 'url(' + data.link + ')');
                $('#file_name').val(data.name)
            },
            error: function(data){
                console.log("error");
                console.log(data);
            }
        });
    })

    $('.preview').on('click', function () {
        let parent = $(this).closest('.tab-pane');
        let title = parent.find('.title').val()
        let content = parent.find('.ql-editor').html();
        let photo = $('#file_name').val()
        let layout = $('select[name="layout"]').val();
        let country = parent.attr('id')
        let url = $(this).data('action') + '?title=' + title + '&photo=' + photo + '&layout=' + layout + '&country=' + country +'&content=' + content;
        window.open(url, '_blank');
    })

    $('.form-post').on('submit', function(e){
        for (let i = 1; i <= 6; i++) {
            let id = '#editor' + i;
            let html = $(id).find('.ql-editor').html();
            $(id).closest('.country').find('.country_post').val(html)
        }
        $('.form-post')[0].submit();
    });

});
