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
                        '<td><img src="http://y.cn/images'+item.main_img_url + '" width="50px"></td>' +
                        '<td><a href="javascript:void(0);" onclick=\"delete_one(this,'+item.id+')\">删除</a></td>' +
                        '</tr>';
                }
            }
            // else{
            //     ctrlLoadMoreBtn();
            //     moreDataFlag=false;
            // }
            return str;
        }
        return '';
    }

    /*删除商品*/
    delete_one=function (one,id) {
       var message=confirm('温馨提示：您是否确认删除该商品？');
        if(message){
                debugger
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
    /*根据订单状态获得标志*/
    function getOrderStatus(status){
        var arr=[{
            cName:'unpay',
            txt:'未付款'
        },{
            cName:'payed',
            txt:'已付款'
        },{
            cName:'done',
            txt:'已发货'
        },{
            cName:'unstock',
            txt:'缺货'
        }];
        return '<span class="order-status-txt '+arr[status-1].cName+'">'+arr[status-1].txt+'</span>';
    }

    /*根据订单状态获得 操作按钮*/
    function getBtns(status){
        var arr=[{
            cName:'done',
            txt:'发货'
        },{
            cName:'unstock',
            txt:'缺货'
        }];
        if(status==2 || status==4){
            var index=0;
            if(status==4){
                index=1;
            }
            return '<span class="order-btn '+arr[index].cName+'">'+arr[index].txt+'</span>';
        }else{
            return '';
        }
    }

    /*控制加载更多按钮的显示*/
    function ctrlLoadMoreBtn(){
        if(moreDataFlag) {
            $('.load-more').hide().next().show();
        }
    }

    /*加载更多*/
    $(document).on('click','.load-more',function(){
        if(moreDataFlag) {
            pageIndex++;
            getOrders(pageIndex);
        }
    });
    /*发货*/
    $(document).on('click','.order-btn.done',function(){
        var $this=$(this),
            $td=$this.closest('td'),
            $tr=$this.closest('tr'),
            id=$td.attr('data-id'),
            $tips=$('.global-tips'),
            $p=$tips.find('p');
        var params={
            url:'order/delivery',
            type:'put',
            data:{id:id},
            tokenFlag:true,
            sCallback:function(res) {
                if(res.code.toString().indexOf('2')==0){
                    $tr.find('.order-status-txt')
                        .removeClass('pay').addClass('done')
                        .text('已发货');
                    $this.remove();
                    $p.text('操作成功');
                }else{
                    $p.text('操作失败');
                }
                $tips.show().delay(1500).hide(0);
            },
            eCallback:function(){
                $p.text('操作失败');
                $tips.show().delay(1500).hide(0);
            }
        };
        window.base.getData(params);
    });

    /*退出*/
    $(document).on('click','#login-out',function(){
        window.base.deleteLocalStorage('token');
        window.location.href = 'login.html';
    });
});