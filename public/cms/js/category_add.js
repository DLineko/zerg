$(function () {

})
function save() {
    var data={
        // id:id,
        name:$('#category-title').val(),
        topic_img_name: img_url
    };
    var url = "http://120.79.28.19/zerg/public/index.php/api/v1/category/add";
    $.ajax({
        url: url,
        type: "post",
        data:data,
        success: function(res) {
            alert("新增成功！")
            window.location.href='category_list.html'
        },
    });
}
