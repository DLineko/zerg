function category_name() {
    var url = "http://192.168.0.107/zerg/public/index.php/api/v1/category/category_name";
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
