$(function(){
    if(!window.base.getLocalStorage('token')){
        window.location.href = 'login.html';
    }
    var pageIndex=1,
        moreDataFlag=true;
    getOrders(pageIndex);

    /*
    * 获取数据 分页
    * params:
    * pageIndex - {int} 分页下表  1开始
    */

    function getOrders(pageIndex){
        var params={
            url:'product/getAllproduct',
            tokenFlag:true,
            sCallback:function(res) {
                var str = getOrderHtmlStr(res);
                $('#order-table').append(str);
            }
        };
        window.base.getData(params);
    }


    /*拼接html字符串*/
    function getOrderHtmlStr(res){
        // console.log(res)
        var data = res;
        if (data){
            var len = data.length,
                str = '', item;
            if(len>0) {
                for (var i = 0; i < len; i++) {
                    item = data[i];
                    str += '<tr>' +
                        '<td>' + item.name + '</td>' +
                        '<td>' + item.price + '</td>' +
                        '<td>' + item.stock + '</td>' +
                        '<td>' +item.category_name + '</td>' +
                        '<td><img src="http://192.168.0.107/zerg/public/images'+item.main_img_url + '" width="50px"></td>' +
                        '<td><a href="javascript:void(0);" onclick=\"delete_one(this,'+item.id+')\">删除</a>&nbsp;&nbsp;<a href="javascript:void(0);" onclick=\"update_one(this,'+item.id+')\">修改</a></td>' +
                        '</tr>';
                }
            }
            return str;
        }
    }
    /*删除商品*/
    delete_one=function (one,id) {
       var message=confirm('温馨提示：您是否确认删除该商品？');
        if(message){
                $(one).parent().parent().remove();
                sql_delelte(id);
            }


      // console.log($(one).parent().parent().find('.product_id').html())
    }
    function sql_delelte(id) {
        console.log(id)
        var params={
            url:'product/deleteOne/'+id,
            tokenFlag:true,

        };
        window.base.getData(params);
    }
    /*商品查询*/
    $('#btnPost').on('click',function () {
        var data=$('#edtSearch').val();

        search(data);
    })
    function search(data) {
        var params={
            url:'search_product/'+data,
            tokenFlag:true,
            dataType:"json",
            sCallback:function(res) {
                $('#order-table').html("");
               var str=getOrderHtmlStr(res)
                $('#order-table').append(str);
            }
        };
        window.base.getData(params);
    }

  //修改商品
   update_one=function(one,id) {
        // console.log(id)
       // localStorage.setItem("name",id);
       window.location.href="product_edit.html"+'?id='+id;
    }
    //新增商品*/
   add_procut=function() {
       window.location.href="product_add.html";
   }
});



