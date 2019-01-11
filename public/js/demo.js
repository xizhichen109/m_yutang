$(function () {
    /*
    var arr=[{"name":"张三"},{"name":"李四"},{"name":"王五"}];
    alert($.inArray({"name":"张三"}, arr));
    */
    let item = {name:"tom"};
    console.log(item.name);
    let item_str = JSON.stringify(item);
    console.log(item_str.name);


});