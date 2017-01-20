$(document).ready(function()
{

    window.count = 0;


    $('input[type="checkbox"]').change(function(event) {

        window.total_value = $('#total_value').val();
        window.total_amount = $('#total_amount').val();

        window.id=$(this).val();

        $('input[type="checkbox"]').attr('disabled', 'disabled');


        if(id==0){

            if (this.checked) {

                ajax_process(2);




            }else {

                ajax_process(3);
            }


        }else {


        if (this.checked) {
            count++;
            ajax_process(1);

        }
        else {
            count--;
            ajax_process(0);

        }

}
    });   //window.count = 0;
    //
    //$("#sel_coupon").change(function(event) {
    //
    //    alert(1);
    //
    //    window.id=$(this).val();
    //
    //    $(this).attr('disabled', 'disabled');
    //
    //    window.total_value = $('#total_value').val();
    //    window.total_amount = $('#total_amount').val();
    //
    //    if(total_amount == 0){
    //        alert('Shipping Charge $1 is Added.');
    //    }
    //    if (this.checked) {
    //        count++;
    //        ajax_process(1);
    //
    //    }
    //    else {
    //        count--;
    //        ajax_process(0);
    //
    //    }
    //});

    //$("#coupon_book").change(function(event) {
    //
    //    alert(1);
    //
    //    window.id=$(this).val();
    //
    //    $(this).attr('disabled', 'disabled');
    //
    //
    //    window.total_amount = $('#total_amount').val();
    //
    //
    //
    //    $("#totalcost_text").html(total_amount);
    //
    //    $("#total_value").val(total_amount);
    //
    //
    //});


    $("ul.pagination3").quickPagination({pagerLocation:"bottom  ",pageSize:"25"});

});


function ajax_process(type){

    $.ajax({ //Process the form using $.ajax()
        type      : 'POST', //Method type
        url       : 'process_totval.php', //Your form processing file URL
        data: {id:id,total_value:total_value,total_amount:total_amount,type:type,count:count},
        dataType  : 'json',
        success   : function(data) {

            if (data.success) { //If fails

                $("#coupon_count").html(count);

                $("#totalvalue_text").html(data.res_totalvalue);
                $("#totalcost_text").html(data.res_totalprice);

                $("#total_value").val(data.res_totalvalue);
                $("#total_amount").val(data.res_totalprice);
                //$("#cbpc_checkbox"+data.id).removeAttr("disabled");
                $('input[type="checkbox"]').removeAttr("disabled");

            }
            else {

               alert('Something Went Wrong. Contact Admin.  ');
            }
        }
    });
}



//paste this code under the head tag or in a separate js file.
        // Wait for window load
    $(window).load(function() {
        // Animate loader off screen
        $(".se-pre-con").fadeOut("slow");;
    });

