$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

function removeRow(id,url){
    console.log(id);
    if(confirm('xóa mà không thể khôi phục, bạn có chắc ? ')){
        $.ajax({
            type: 'DELETE',
            dataType: 'JSON',
            data: {id},
            url: url,
            success: function (result){
                if(result.error === true){
                    alert(result.message);
                    location.reload();
                }else{
                    alert(result.message);
                }
            }
        })
    }
}

/*upload*/
$('#upload').change(function (){
    const form = new FormData();
    form.append('file',$(this)[0].files[0]);
    $.ajax({
       processData: false,
       contentType: false,
       type: 'POST',
       dataType: 'JSON',
       data: form,
       url:'/admin/upload/services',
       success: function (result){
           if(result.error == false){
               $("#image_show").html('' +
                   '<a href="'+result.url+'" target="_blank">'+
                   '<img src="'+result.url+'" width="100px"></a>'
               );
               $('#thumb').val(result.url);
           }else{
               alert('upload File lỗi')
           }
       }
    });
});
