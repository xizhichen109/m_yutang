$(function(){

    // 1 价格保存
    $(".save_price").click(function(){

        // 1 获取价格id和价格
        let  $tr = $(this).parents("tr");
        let  $tds = $tr.children();
        let params = {};

        params.id = $tds[0].innerHTML;
        params.price = $tr.find("input").val();


        // 2 设置请求头
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }

        })

        // 3 发起ajax请求
         $.ajax({
              url:"http://www.yutang.test/price/save_price",
              type:"post",
              data:params,
              success:(res)=>{
                   console.log(res);
              }
         })


    });


    // 2 日期切换

    $(".order_header dl").click(function () {

         // 日期切换
         $(".order_header dl").removeClass("active");
         $(this).addClass("active");

         // 当前dl在所有dl中的索引值
         let  index = $(".order_header dl").index(this);

         // 日期列表切换
         $(".day_list").removeClass("show");
         $(".day_list").eq(index).addClass("show");

         // 订单日期设置
         $date = $(this).find("dt").html();
         $(".order_detail .order_date").html($date);


    })


    var items = [];  // [{"field_no":2,"order_time":9},{"field_no":3,"order_time":10}]


    // 获取对象在对象数组中的索引值;
    function get_index(cur_item,items){

        let cur_item_str = JSON.stringify(cur_item);

        for(var i=0;i<items.length;i++){

            let item_str = JSON.stringify(items[i]);
            if(cur_item_str==item_str){
                 return i;
            }

        }

        return -1;
    }


    // 3 场地预定
    $(".day_list li").click(function () {

        $time = $(this).attr("data-time");
        $field_no = $(this).attr("data-field_no");
        let cur_item = {};
        cur_item.field_no = $field_no;
        cur_item.order_time = $time;

        // 判断当前元素是否被选中

        if($(this).hasClass("selected")){

            // 删除对应的dom结构
            $(this).removeClass("selected");
            let mark = $field_no+"_"+$time; // 3_14
            $(".item[mark='"+mark+"']").remove();

            // 删除对应的数据

            let index = get_index(cur_item,items);
            items.splice(index,1);
            //console.log(items);

        }else{

            // 往items 里存数据;

            items.push(cur_item);
           // console.log(items);
            if(items.length==5){
                alert("最多选择四个时段");
                return false;
            }



            // 右侧添加item的dom结构;
            $(this).addClass("selected");

            // 创建item对象
            let item = $(".item_template").html();
            let $item = $(item);

            // 增加自定义属性
            $item.attr("mark",$field_no+"_"+$time);

            // 对item对象进行数据组装
            $item.find("dt").html($time+":00");
            $item.find("dd").html("B"+$field_no+"号场地");

            // 追加到订单容器
            $item.appendTo(".detail_wrap");


        }


        
    });

    // 4 保存订单

    $("#save_order").click(function () {

        let order_data={};
        order_data.venue_id = $(".venue_id").val();
        order_data.order_date = $(".order_date").html();
        order_data.items = items;

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        })

        $.ajax({
            url:"http://www.yutang.test/order/save",
            type:"post",
            data:order_data,
            success:(res)=>{
                if(res.status == 200){
                    $('#myModal').modal('show');
                }

            }
        })



    });



})