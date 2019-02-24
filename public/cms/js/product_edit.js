var id;
$(function () {
    getUrl()
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
         $('#procut-img').attr('src',res.main_img_url);
        },
    });
}
function update() {
    var data={
        id:id,
        name:$('#product-title').val(),
        price:$('#product-price').val(),
        stock: $('#product-stock').val(),
        main_img_url: $('#procut-img').attr('src')
    };
    var url = "http://y.cn/api/v1/product/edit";
    $.ajax({
        url: url,
        type: "put",
        data:data,
        success: function(res) {
            console.log(data)
        },
    });
}