$(document).ready(function () {

    var json= $.ajax({
        type: 'get',
        dataType: "json",
        url: window.location+'/get-notification',
        success: function (data) {
            $('#badge').text(data.count+'');
            if (data.isExpired != null) {
                $('#li-room').show();
                var time = new Date(data.expire.date);
                var month= ("0" + (time.getMonth() + 1)).slice(-2);
                var year = time.getFullYear();
                var day= ("0" + (time.getDay() )).slice(-2);
                if(data.isExpired == '0')
                    $('#noti-room').text("Bạn đã hết hạn phòng, cần gia hạn ngay. Hạn cuối là: "+ day+'/'+month+'/'+year);
                if(data.isExpired == '1')
                    $('#noti-room').text("Bạn sắp hết hạn phòng, cần gia hạn ngay. Hạn cuối là: "+ day+'/'+month+'/'+year);
            }
            if(data.money){
                $('#li-bill').show();
                var now = new Date();
                var month= ("0" + (now.getMonth() + 1)).slice(-2);
                var year =now.getFullYear();
                $('#noti-bill').text('Tiền điện tháng này là: '+ data.money.total+' VNĐ bạn vẫn chưa nộp. Hạn cuối là 25/'+month+'/'+year);
            }


        }
    });

});
