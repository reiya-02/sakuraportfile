// document.querySelector('input[type="file"]').addEventListener('change', function(event) {
//     var file = event.target.files[0];
//     var formData = new FormData();
//     formData.append('image', file);

//     fetch('mypage.php', {
//         method: 'POST',
//         body: formData
//     })
//     .then(response => response.json())
//     .then(data => console.log(data))
// });

$(document).ready(function (e) {
    $("#uploadForm").on('submit',(function(e) {
        e.preventDefault();
        $.ajax({
            url: "fountDB.php",
            type: "POST",
            data:  new FormData(this),
            contentType: false,
            cache: false,
            processData:false,
            success: function(data)
            {
                // アップロードした画像を表示
                $("#uploadedImage").attr('src', data);
            },
            error: function() 
            {
            }           
       });
    }));

    // ページロード時に画像を表示
    $.ajax({
        url: "fountDB.php",
        type: "GET",
        success: function(data)
        {
            if (data) {
                // アップロードした画像を表示
                $("#uploadedImage").attr('src', data);
            }
        },
        error: function() 
        {
        }           
   });
});

$(".delete").click(function(){
    var id = this.dataset.id;
    if(confirm("ID:"+id+"番の記事を本当に削除していいですか？")) {               
        //OK
        $("#delete_form_"+id).submit();
    }else{
           //キャンセル
           return false;
       }
   })
   