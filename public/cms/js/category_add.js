$(function () {

})
function save() {
    var data={
        // id:id,
        name:$('#category-title').val(),
        topic_img_name: img_url
    };
    var url = "http://y.cn/api/v1/category/add";
    $.ajax({
        url: url,
        type: "post",
        data:data,
        success: function(res) {
            alert(res)
            // window.location.href='category_list.html'
        },
    });
}
