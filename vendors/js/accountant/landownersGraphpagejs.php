<script>
    function getTeaDetailsforBarchart() {
        var lid = '<?php echo $data[0]['user_id'] ?>';
        console.log(lid);
        var url = "<?php echo URL ?>accountant/getTeaDeatilsforBarchart/" + lid + "";
        // months

        // var d = new Date();
        // var month=d.setMonth(d.getMonth() - 1);
        // console.log(month);
        var d = Date('Y-m-d');
       
var makeDate = new Date(d);
var m6 = new Date(d);
var m5 = new Date(d);
var m4 = new Date(d);

m6.setMonth(m6.getMonth());
m5.setMonth(m5.getMonth() - 1);
m4.setMonth(m4.getMonth() - 2);
// console.log('After subtracting a month: ', makeDate.toString());
m6=m6.getMonth()+1;
m5=m5.getMonth()+1;
m4=m4.getMonth()+1;
// console.log(m6);

        // console.log(m6);

        //tea values of each month
        var tea6 = 0.0;
        var tea5 = 0.0;
        var tea4 = 0.0;
        var tea3 = 0.0;
        var tea2 = 0.0;
        var tea1 = 0.0;
        $.ajax({
            url: url,
            type: "GET",
            dataType: "JSON",
            success: function(data) {
                console.log(data);
                var len = data.length;
                for (var i = 0; i < len; i++) {
                    if (data[i].date) {
                        var d=data[i].date;
                        var loopDate=new Date(d);
                        var loopMonth=loopDate.getMonth()+1;
                        if(loopMonth==m6){
                            tea6=tea6+ parseInt(data[i].net_weight);
                        }
                        else if(loopMonth==m5){
                            tea5=tea5+ parseInt(data[i].net_weight);
                        }
                        else if(loopMonth==m4){
                            tea5=tea5+ parseInt(data[i].net_weight);
                        }
                        else if(loopMonth==m3){
                            tea5=tea5+ parseInt(data[i].net_weight);
                        }
                        // console.log(loopMonth);
                        // console.log(m6);

                        // totTea = totTea + parseFloat(data[i].sold_amount);
                    }
                    //tot=tot+(data[i].sold_amount*data[i].sold_price)
                }
                // console.log("tea5 "+tea5);    
                document.getElementById("tea6").value = tea6;

            }
        })
    }
</script>