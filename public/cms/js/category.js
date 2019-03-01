function category_name() {
    var url = "http://y.cn/api/v1/category/category_name";
    $.ajax({
        url: url,
        type: "get",
        success: function(res)
        {
            for(var i=0;i<res.length;i++)
           $('#category_identify').append('<option value='+res[i].id+'>'+res[i].name+'</option>')
        }
        ,
    });
}
