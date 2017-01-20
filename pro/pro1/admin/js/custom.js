$(document).ready(function()
{
    $("input[name='featured_coupon']").change(function(event) {

        window.id=$(this).val();
        //$('.loading_label'+id).html('<i class="fa fa-circle-o-notch fa-spin fa-2x fa-fw custom_spin"></i>');


        if (this.checked) {

            ajax_process(1);

        }
        else {

            ajax_process(0);

        }
    });

    $("input[name='firstpage_coupon']").change(function(event) {



        window.id=$(this).val();
        //$('.loading_label'+id).html('<i class="fa fa-circle-o-notch fa-spin fa-2x fa-fw custom_spin"></i>');


        if (this.checked) {

            ajax_fpcoupon(1);

        }
        else {

            ajax_fpcoupon(0);

        }
    });

});


function ajax_process(status){

    $.ajax({ //Process the form using $.ajax()
        type      : 'POST', //Method type
        url       : 'process_featuredhome.php', //Your form processing file URL
        data: {id:id,status:status},
        dataType  : 'json',
        success   : function(data) {

            if (data.success) { //If fails

                location.reload();

            }
            else {

                alert('Something Went Wrong. Contact Admin.  ');
            }
        }
    });
}

function ajax_fpcoupon(status){

    $.ajax({ //Process the form using $.ajax()
        type      : 'POST', //Method type
        url       : 'process_fpcoupon.php', //Your form processing file URL
        data: {id:id,status:status},
        dataType  : 'json',
        success   : function(data) {

            if (data.success) { //If fails

                location.reload();

            }
            else {

                alert(data.msg);
                location.reload();
            }
        }
    });
}