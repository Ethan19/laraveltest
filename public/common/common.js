function deleteId(id,url){
	if(!confirm("你确定要删除此项吗？")){
		return false;
	}
	$this = $(this);
	$.ajax({
		url: url,
		type: 'post',
		dataType: 'json',
		data: {id: id},
		success:function(data){
			alert(data.msg);
			if(data.success){
				//$this.parent().parent().remove();
				window.location.reload();
			}
		}
	});
}

//ajax file upload
/**
 * fileId  input file  的id
 * fileName input file 的name
 * showFiledId 要显示图片的id
 * type  区分不同图片的类型
 */
function ajaxFileUpload(fileId,fileName,showFileId,imageShow){
	 $.ajaxFileUpload({
		 url:'/admin/my/upload.html',  //需要链接到服务器地址
         secureuri:false,
         fileElementId:fileId,
         dataType: 'json',
         success: function (data){
         	alert(data.msg)
        	 if(data.success){
        		 $('#'+showFileId).attr('src',data.img);
        		 $('#'+imageShow).attr('value',data.img);
        		 $('#'+showFileId).show(); 
        	 }else{
        		 alert('上传失败');
        	 }
          }
   });
}