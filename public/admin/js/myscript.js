
$(document).ready(function() {
	$("div.alert").delay(3000).slideUp();// thêm thành công -> 3s sau sẽ mất
});

// thêm app images uploads
$(document).ready(function(){
    $("#addImages").click(function(){
        $("#insert").append('<div id="uploadFile"><input type="file" name="list_fImages[]"></div>')
    });
});

$(document).ready(function(){
	$("a#del_img_demo").on('click',function(){
		var url = window.location.origin + "/admin/product/delete_img/";
		var _token = $("form[name='frmEdit_Product']").find("input[name='_token']").val();
		var idHinh = $(this).parent().find("img").attr("idHinh");
		var img = $(this).parent().find("img").attr("src");
		var rid = $(this).parent().find("img").attr("id");
		// alert(rid);
		$.ajax({
			url: url + idHinh,
			type: 'GET',
			cache: false,
			data: {"_token":_token,"idHinh":idHinh,"urlHinh":img},
			success: function(data){
				if(data == "oke"){
					$("#"+rid).remove();
				}else{
					alert("Lỗi! Vui lòng liên hệ với Admin");
				}
			},
			   error: function (xhr, ajaxOptions, thrownError) {
               alert(xhr.status);
               alert(thrownError);
           }
		});
	});
});



