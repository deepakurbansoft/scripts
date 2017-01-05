<?php

$cars = array("Volvo", "BMW", "Toyota", "Audi", "Suzuki", "VolksWagon");

$check = array("Volvo", "BMW");

?>
<form name="login_form" id="login_form">
<select>

<?php
foreach($cars as $car){
    ?>
    <option <?php if (in_array($car, $check)){?> style="color: red;" <?php } ?>><?php echo $car;?></option>
    <?php

}
?>

</select>

    <input type="submit" value="Submit">
</form>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>


<script>


    $(document).ready(function() {

        $('#login_form').submit(function(event) { //Trigger on form submit


            $.ajax({ //Process the form using $.ajax()
                type      : 'POST', //Method type
                url       : 'process.php', //Your form processing file URL
                data      : $('#login_form').serialize(), //Forms name
                dataType  : 'json',
                success   : function(data) {
                    if (data.success) { //If fails

                        alert(1);
                    }
                    else {

                        window.location='profile.php';
                    }
                }
            });

            $(document).ajaxStart(function(){
                $(".signin").val("Loading...");
            });

            $(document).ajaxComplete(function(){
                $(".signin").val("Sign in");
            });

            event.preventDefault(); //Prevent the default submit
        });
    });
</script>