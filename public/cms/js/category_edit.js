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
    var url = "http://y.cn/api/v1/category/category_one/"+id;
    $.ajax({
        url: url,
        type: "get",
        success: function(res) {
            var url='http://y.cn/images/'+res.topic_img_url;
            $('#category-title').val(res.name);
            $('#img').attr('src',url);
        },
    });
}
function update() {
    var url=$('#img').attr('src');
    var imgUrl=Rex_img_src(url);
    var data={
        id:id,
        name:$('#category-title').val(),
        topic_img_name: imgUrl
    };
    var url = "http://y.cn/api/v1/category/edit";
    $.ajax({
        url: url,
        type: "put",
        data:data,
        success: function(res) {
            alert("修改成功！")
            window.location.href='category_list.html'
        },
    });
}