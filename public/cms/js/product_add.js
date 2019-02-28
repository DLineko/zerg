var img_url;
$(function () {

})
function save() {
    var data={
        // id:id,
        name:$('#product-title').val(),
        price:$('#product-price').val(),
        stock: $('#product-stock').val(),
        main_img_url: img_url
    };
    var url = "http://y.cn/api/v1/product/add";
    $.ajax({
        url: url,
        type: "post",
        data:data,
        success: function(res) {
            alert(res)
            window.location.href='product.html'
        },
    });
}
// var image = '';
// var canvas;
// var base64;//将canvas压缩为base64格式
// function selectImg(file){
//     if(!file.files || !file.files[0]){
//         return;
//     }
//     var reader = new FileReader();//读取文件
//     reader.onload = function(event){//文件读取完成的回调函数
//         debugger
//         image = document.getElementById('showImg');
//         image.src = event.target.result;//读入文件的base64数据(可直接作为src属性来显示图片)
//         //alert(event.target.result);
//         //图片读取完成的回调函数（必须加上否则数据读入不完整导致出错！）
//         image.onload = function(){
//             canvas = convertImageToCanvas(image); //图片转canvas
//             base64 = canvas.toDataURL('image/jpeg'); //将图片数据转为base64.
//             alert(base64);
//             // $.post(
//             //     "/server_interface_url/", //服务器接口(返回图片路径)
//             //     {data:base64},
//             //     function(data) {
//             //         alert(data.target);
//             //         //alert(eval(data));
//             //         //修改上传文件的路径名字(图片完整路径)
//             //         $('#img').val('http://path/'+data.target);
//             //     }, "json");
//         }
//     }
//     //将文件已Data URL的形式读入页面
//     reader.readAsDataURL(file.files[0]);
// }
// // 把image 转换为 canvas对象
// function convertImageToCanvas(image) {
//     // 创建canvas DOM元素，并设置其宽高和图片一样
//     var canvas = document.createElement("canvas");
//     canvas.width = image.width;
//     canvas.height = image.height;
//     // 坐标(0,0) 表示从此处开始绘制，相当于偏移。
//     canvas.getContext("2d").drawImage(image, 0, 0);
//
//     return canvas;
// }
