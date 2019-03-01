var id;
$(function () {
    getUrl()
    category_name()
})
function getUrl() {
  var url=window.location.search.split('?');
  id=url[1].split('=')[1];
  getProduct_detail(id);
}
function getProduct_detail(id) {
    var url = "http://y.cn/api/v1/product/"+id;
    $.ajax({
        url: url,
        type: "get",
        success: function(res) {
         $('#product-title').val(res.name);
         $('#product-price').val(res.price);
         $('#product-stock').val(res.stock);
         $('#category_identify').val(res.category_id),
         $('#img').attr('src',res.main_img_url);
        },
    });
}
function update() {
    var url=$('#img').attr('src');
    var imgUrl=Rex_img_src(url);
    var data={
        id:id,
        name:$('#product-title').val(),
        price:$('#product-price').val(),
        stock: $('#product-stock').val(),
        category_id: $('#category_identify').val(),
        main_img_url: imgUrl
    };
    var url = "http://y.cn/api/v1/product/edit";
    $.ajax({
        url: url,
        type: "put",
        data:data,
        success: function(res) {
            alert(res)
            window.location.href='product.html'
        },
    });
}