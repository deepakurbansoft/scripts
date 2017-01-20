
<?php
include('db_conn.php');
if ($_POST['id']) {
    $id = $_POST['id'];
    
    $query = "select * from mem_types WHERE mem_type_id='$id'";
    
    //echo $query;
    $result = mysqli_query($con, $query);
    
    if (mysqli_affected_rows($con) != 0) {
        while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {

            $expiry = $row['days'];

            $date = strtotime($expiry." day", time());

            $result_date =  date('m/d/Y', $date);


            echo "<p>Amount : <input type='text' readonly name='amount' id='textfield' class='input-small amount' data-rule-required='true' data-rule-minlength='1'  value='" . $row['rate'] . "' maxlength='2'> <br> <br></p><p>Discount : <input type='text' name='discount' id='textfield' class='input-small discount' data-rule-required='true' data-rule-minlength='1'  onkeyup='calculate_discount()' maxlength='2' value='0'> % <br> <br></p>Total Cost : <input type='text' name='total' id='textfield' class='input-small total' data-rule-required='true' data-rule-minlength='1'value='" . $row['rate'] . "' maxlength='10' readonly><br><br><p>Total Paid : <span id='sprytextfield_paid'><input type='text' name='paid' id='textfield' class='input-small paid_amount' data-rule-required='true' data-rule-minlength='1'  onKeyPress='return checkIt(event)' maxlength='10'> <span class='textfieldRequiredMsg'>Please select an item.</span></span><br> ";
            
        }
    }
}


?>