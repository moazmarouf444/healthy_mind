<script>
    $(document).ready(function(){
        $('.files_uploader_delete_file.update').on('click',function(e){
            e.preventDefault();
            if (confirm("{{awtTrans('هل تريد حذف العنصر؟')}}")) {
                $.ajax({
                    url: $(this).data('url'),
                    method: 'post',
                    data: {
                        '_token' : "{{csrf_token()}}",
                        'id'     : $(this).data('id')
                    },
                    success: (response) => {
                        $(this).parent().remove();
                        Swal.fire({
                            position: 'top-start',
                            type: 'success',
                            title: '{{awtTrans('تم حذف العنصر بنجاح')}}',
                            timer: 1500,
                        });
                    },
                    error: function (xhr) {
                        Swal.fire({
                            position: 'top-start',
                            type: 'error',
                            title: '{{awtTrans('حدث خطأ')}}',
                            timer: 1500,
                        })
                    },
                });
            }
        });
    });
</script>