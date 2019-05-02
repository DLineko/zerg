function upload() {
    var files=$("#fileSelectInput").prop('files');
    // console.log(files)
    var url="http://120.79.28.19/zerg/public/index.php/api/v1/upImage/upload";
    $("#attributeForm").attr("enctype", "multipart/form-data");
    $('#attributeForm').ajaxSubmit({
        url:url,
        type: "post",
        dataType:'json',
        success: function(res) {
            if(res.error!='0') alert(res.error)
            else {
                Rex_img_src(res.pic)
                $('#img').show().attr('src',"http://120.79.28.19/zerg/public/images"+img_url);
            }
        },
        fail:function () {
            alert('上传失败！')
        }
    })
}
function Rex_img_src(src) {
    src =src.replace(/(.*\/)*([^.]+)/i,"$2")
    // var  p = reg.test(src);
    // var  m = p.matcher(str);
    // if (!m.find()) {
    //     alert("文件路径格式错误!");
    //     return;
    // }
    img_url='/'+src;
    return img_url;

}
