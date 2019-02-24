$(function () {

})
function save() {
    var data={
        // id:id,
        name:$('#product-title').val(),
        price:$('#product-price').val(),
        stock: $('#product-stock').val(),
        // main_img_url: $('#procut-img').attr('src')
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