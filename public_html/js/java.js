$('.menu').on('click', function() {
    $('.menu__line').toggleClass('active');
    $('.gnav').fadeToggle();
});

function slideSwitch() {
    var $active = $('#slideshow img.active');

    if ($active.length == 0) $active = $('#slideshow img:last');

    var $next = $active.next().length? $active.next()
        :$('#slideshow img:first');

    $active.addClass('last-active');

    $next.css({opacity: 0.0})
        .addClass('active')
        .animate({opacity: 1.0}, 1000, function() {
            $active.removeClass('active last-active');
        });
}

$(function() {
    $('.slide-items').slick({
        autoplay: true,
        autoplaySpeed: 3000,
        dots: true,
        centerMode: true,
        centerPadding: '30%',        
    });
});



$(".alet").click(function(){
    if(confirm("櫻坂46公式サイトに移動しますがよろしいですか?")){
    //OK
    }else{
        //キャンセル
        return false;
    }
})

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

$(".delete_users").click(function(){
    var id = this.dataset.id;
    if(confirm("ID:"+id+"番のアカウントを本当に削除していいですか？")) {               
        //OK
        $("#delete_form_"+id).submit();
    }else{
           //キャンセル
           return false;
       }
   })
   



// 画像切り替え時にプレビュー表示
$('#form').on('change', function (e) {
    var reader = new FileReader();
    reader.onload = function (e) {
        $("#img").attr('src', e.target.result);
    }
    reader.readAsDataURL(e.target.files[0]);
});

// 削除ボタンクリック時にフォームとプレビューを初期化
$('#delete').on('click', function (e) {
  $("#img").attr('src', 'https://tool-engineer.work/wp-content/uploads/2022/06/default.png');
  $("#form").val('');
});


    $(".like_button").on('click', function(e){
      e.preventDefault();
      var post_id = $(this).data('post_id');
      var por_id = $(this).data('por_id');
      console.log(post_id);
      console.log(por_id);

      $.ajax({
        url: '../../system/tweetController/like.php', // 送信先のURLを指定してください
        type: 'post',
        data: { 'post_id': post_id, 
                'por_id': por_id
        },
        success: function(response){
          // レスポンスを受け取った後の処理をここに書く
          console.log(response);

          $('#like_count_' + post_id).text(response);
          if($('.like_button').hasClass('clicked')){
            $('.like_button').removeClass('clicked');
        }else{
            $('.like_button').addClass('clicked');
        }
        }
      });
    });

    $(document).ready(function() {
        // すべての「いいね」ボタンに対して処理を行う
        $('.like_button').each(function() {
            var $this = $(this);
            var post_id = $this.data('post_id');
    
            // サーバーに投稿IDを送信し、「いいね」の数を取得する
            $.ajax({
                url: '../../system/tweetController/like.php', // 「いいね」の数を取得するPHPスクリプトのURL
                type: 'post',
                data: { 'post_id': post_id },
                success: function(response) {
                    // 取得した「いいね」の数を表示する
                    $('#like_count_' + post_id).text(response);
                }
            });
        });
    });
               

document.addEventListener('DOMContentLoaded', function() {
    var likeButtons = document.getElementsByClassName('like_button');
    Array.from(likeButtons).forEach(function(likeButton, index) {
        // ボタンに一意の識別子を割り当てる
        var buttonId = 'like_button' + index;
    
        // ページ読み込み時にローカルストレージから状態を取得し、ボタンの状態を設定
        var liked = localStorage.getItem(buttonId);
        if (liked === 'true') {
        likeButton.classList.add('liked');
        }
    
        likeButton.addEventListener('click', function() {
        likeButton.classList.toggle('liked');
        // クリック時に状態をローカルストレージに保存
        localStorage.setItem(buttonId, likeButton.classList.contains('liked'));
        });
    });
    }, false);
   


//     $(".foller_button").on('click', function(e){
//         e.preventDefault();
//         var por_id = $(this).data('por_id');
//         var user_name = $(this).data('user_name');
//         console.log(por_id);
//         console.log(user_name);
  
//         $.ajax({
//           url: '../../system/tweetController/foller.php', // 送信先のURLを指定してください
//           type: 'post',
//           data: { 'por_id': por_id, 
//                   'user_name': user_name
//           },
//           success: function(response){
//             // レスポンスを受け取った後の処理をここに書く
//             console.log(response);
  
//             $('#foller_count_' + user_name).text(response);
//             if($('.foller_button').hasClass('clicked')){
//               $('.foller_button').removeClass('clicked');
//           }else{
//               $('.foller_button').addClass('clicked');
//           }
//           }
//         });
//       });
                

      
// $(document).ready(function() {
//     $(".foller_button").on("click", function () {
//         var $this = $(this);
//         var $accountItem = $this.closest("th");
//         var $thisData = $accountItem.data();
      
//         if ($thisData.user_name) {
//             // ajax
//             $this.removeClass("isFollow");
//             $this.text("フォロー");
//             $accountItem.data("user_name", false);
//         } else {
//             // ajax
//             $this.addClass("isFollow");
//             $this.text("フォロー中");
//             $accountItem.data("user_name", true);
//         }
//     });
// });


