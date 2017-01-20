<?php
require 'db_conn.php';
page_protect();

if (isset($_POST['name'])) {
    $date;
    $memid;
    $age;
    $full_name;
    $sex;
    $height;
    $weight;
    $total;
    $paid;
    $expiry;
    $sub_type_name;
    $invoice = $_POST['name'];
    
    $query1 = "select * from subsciption WHERE invoice='$invoice'";
    
    //echo $query;
    $result1 = mysqli_query($con, $query1);
    
    if (mysqli_affected_rows($con) == 1) {
        while ($row1 = mysqli_fetch_array($result1, MYSQLI_ASSOC)) {
            $memid         = $row1['mem_id'];
            $full_name     = $row1['name'];
            $sub_type_name = $row1['sub_type_name'];
            $total         = $row1['total'];
            $paid          = $row1['paid'];
            $expiry        = $row1['expiry'];
            $date          = $row1['paid_date'];
            $discount          = $row1['discount'];

            $query11  = "select * from user_data WHERE newid='$memid'";
            $result11 = mysqli_query($con, $query11);
            if (mysqli_affected_rows($con) == 1) {
                while ($row11 = mysqli_fetch_array($result11, MYSQLI_ASSOC)) {
                    
                    $age    = $row11['age'];
                    $sex    = $row11['sex'];
                    $height = $row11['height'];
                    $weight = $row11['weight'];
                    $gym_location = $row11['gym_location'];
                }
            }
        }
    }
    $query1 = "select * from mem_types WHERE name='$sub_type_name'";
    
    //echo $query;
    $result1 = mysqli_query($con, $query1);
    
    if (mysqli_affected_rows($con) == 1) {
        while ($row1 = mysqli_fetch_array($result1, MYSQLI_ASSOC)) {
            
            $name_type = $row1['name'];
            $details   = $row1['details'];
            $days      = $row1['days'];
            $sub_planid      = $row1['plan_id'];

            
        }
    }
    
    
    
} else {
    echo "<meta http-equiv='refresh' content='0; url=view_mem.php'>";
    
}
?>

<!doctype html>

	<head>
		<meta charset="utf-8">
		<title>Invoice</title>
		<link rel="stylesheet" href="style.css">

		<script src="script.js"></script>
        <script type="text/javascript" src="jquery-1.3.2.min.js"></script>
        <script type="text/javascript" src="jquery-barcode.js"></script>

    <script type="text/javascript">
  
      function generateBarcode(){
        var value = "<?php
echo $invoice;
?>";
        var btype = "code128";
        var renderer = "css";
        
		var quietZone = false;
        if ($("#quietzone").is(':checked') || $("#quietzone").attr('checked')){
          quietZone = true;
        }
		
        var settings = {
          output:renderer,
          bgColor: $("#bgColor").val(),
          color: $("#color").val(),
         
          moduleSize: $("#moduleSize").val(),
          posX: $("#posX").val(),
          posY: $("#posY").val(),
          addQuietZone: $("#quietZoneSize").val()
        };
        if ($("#rectangular").is(':checked') || $("#rectangular").attr('checked')){
          value = {code:value, rect: true};
        }
        if (renderer == 'canvas'){
          clearCanvas();
          $("#barcodeTarget").hide();
          $("#canvasTarget").show().barcode(value, btype, settings);
        } else {
          $("#canvasTarget").hide();
          $("#barcodeTarget").html("").show().barcode(value, btype, settings);
        }
      }
          
      function showConfig1D(){
        $('.config .barcode1D').show();
        $('.config .barcode2D').hide();
      }
      
      function showConfig2D(){
        $('.config .barcode1D').hide();
        $('.config .barcode2D').show();
      }
      
      function clearCanvas(){
        var canvas = $('#canvasTarget').get(0);
        var ctx = canvas.getContext('2d');
        ctx.lineWidth = 1;
        ctx.lineCap = 'butt';
        ctx.fillStyle = '#FFFFFF';
        ctx.strokeStyle  = '#000000';
        ctx.clearRect (0, 0, canvas.width, canvas.height);
        ctx.strokeRect (0, 0, canvas.width, canvas.height);
      }
      
      $(function(){
        $('input[name=btype]').click(function(){
          if ($(this).attr('id') == 'datamatrix') showConfig2D(); else showConfig1D();
        });
        $('input[name=renderer]').click(function(){
          if ($(this).attr('id') == 'canvas') $('#miscCanvas').show(); else $('#miscCanvas').hide();
        });
        generateBarcode();
      });
  
    </script>
	</head>
	<body>

		<header>

            <img src="img/logo_hospitality.png" width="250" height="80">



<!--            <address>-->
<!--				<p>Galaxy The Gym</p>-->
<!--				<p>M-21, Lane 2 ,Khalilullah Masjid</p><p>Jamia Nagar Oklha New Delhi 110025</p>-->
<!--				<p>Mobile:-9873712786</p><p>www.galaxythegym.com (galaxythegym@gmail.com)</p><br><p><div id="barcodeTarget" class="barcodeTarget"></div>-->
<!--                <canvas id="canvasTarget"></canvas>-->
<!--			</address>-->
<!--			<span><img alt="" src="logo.png">-->
		</header>

		<article>
<!--            <img alt="" src="pic1.jpg" width="100" height="100">-->

        <table class="invoice_table" cellpadding="0" cellspacing="0">
				<tr>
					<th><span><?php echo $full_name?></span></th>
					<td class="table_padding">
                        <div style="width: 45%; float: left;padding: 0px !important;">
                        <div class="table_padding">Room No <span style="float:right;">:</span></div>
                        <div class="table_padding">Arrival <span style="float:right;">:</span></div>
                        <div class="table_padding">Departure <span style="float:right;">:</span></div>
                        <div class="table_padding">Adult/Child <span style="float:right;">:</span></div>
                        </div>

                        <div style="width: 49%; float: right;">
                            <div></div>
                            <div></div>
                            <div></div>
                            <div></div>
                        </div>
                    </td>
				</tr>

                <tr>
					<th><span  ><?php echo $full_name?></span></th>
					<td class="table_padding">
                        <div style="width: 45%; float: left;padding: 0px !important;">
                            <div>Folio No. <span style="float:right;">:</span></div>

                        </div>

                        <div style="width: 49%; float: right;">
                            <div></div>

                        </div>

                    </td>
				</tr>

				<tr>
					<th>

                        <div style="width: 45%; float: left;padding: 0px !important;">
                            <div>COPY OF INVOICE <span style="float:right;">:</span></div>

                        </div>

                        <div style="width: 49%; float: right;">
                            <div><?php echo get_field('gym_location',$gym_location ,'id','invoice_letter').'-'.$invoice ?></div>

                        </div>



                    </th>

					<td class="table_padding">

                        <div style="width: 45%; float: left;padding: 0px !important;">
                            <div>Conf. No. <span style="float:right;">:</span></div>

                        </div>

                        <div style="width: 49%; float: right;">
                            <div></div>

                        </div>

                    </td>
				</tr>

				<tr>
					<th class="table_padding">



                        <div style="width: 45%; float: left;padding: 0px !important;">
                            <div>Conf. No. <span style="float:right;">:</span></div>

                        </div>

                        <div style="width: 49%; float: right;">
                            <div></div>

                        </div>

                       </th>

					<td class="table_padding">

                        <div style="width: 45%; float: left;padding: 0px !important;">
                            <div>Cashier No. <span style="float:right;">:</span></div>

                        </div>

                        <div style="width: 49%; float: right;">
                            <div></div>

                        </div>


                    </td>
				</tr>

				<tr>
					<th class="table_padding">

                        <div style="width: 45%; float: left;padding: 0px !important;">
                            <div>Group Code <span style="float:right;">:</span></div>

                        </div>

                        <div style="width: 49%; float: right;">
                            <div></div>

                        </div>

                    </th>

					<td class="table_padding">

                        <div style="width: 45%; float: left;padding: 0px !important;">
                            <div>Page No.<span style="float:right;">:</span></div>

                        </div>

                        <div style="width: 49%; float: right;">
                            <div></div>

                        </div>

                    </td>
				</tr>

				<tr>
					<th class="table_padding">


                        <div style="width: 45%; float: left;padding: 0px !important;">
                            <div>Company Name <span style="float:right;">:</span></div>

                        </div>

                        <div style="width: 49%; float: right;">
                            <div><?php echo get_field('gym_location',$gym_location ,'id','name') ?></div>

                        </div>

                    </th>

					<td><span></span></td>
				</tr>
			</table>
<br>
<br>
<table class="details_table" cellpadding="0" cellspacing="0">
    <div style="border-bottom: 3px solid;">
				<thead>
					<tr >
						<th><span  >Date</span></th>
						<th><span  >Text</span></th>
						<th><span  ></span></th>
						<th style="width: 100px;"><span  style="float: right;">Charges<br>BHD</span></th>
						<th style="width: 100px;"><span  style="float: right;">Credits<br>BHD</span></th>

					</tr>
				</thead>
    </div>



				<tbody>

					<tr class="content_table">
						<td><span  ><?php echo $date; ?></span></td>
						<td><span  ><?php echo $sub_type_name; ?></span></td>
						<td><span  ><?php  ?></span></td>
						<td style="width: 100px;"><span  style="float: right;"><?php echo $total_mainamount = get_field('mem_types',$sub_type_name,'name','rate') ?></span></td>
						<td style="width: 100px;"><span  style="float: right;"><?php echo $credit = $total-$paid; ?></span></td>
					</tr>

                    <?php

                    $query_invoicesub = "select * from subsciption_sub WHERE invoice='$invoice'";


                    $invoicesub_result = mysqli_query($con, $query_invoicesub);


                    if (mysqli_affected_rows($con) >= 1) {
                        while ($invoicesub_row = mysqli_fetch_array($invoicesub_result, MYSQLI_ASSOC)) {
?>
                    <tr class="contenttable_sub">
                        <td><span><?php echo $date ?></span></td>
                        <td><span><?php echo  get_field('mem_types_sub',$invoicesub_row['plan_id'],'mem_type_id','name'); ?></span></td>
                        <td><span><?php  ?></span></td>
                        <td style="width: 100px;"><span style="float: right;"><?php echo $total_temp = get_field('mem_types_sub',$invoicesub_row['plan_id'],'mem_type_id','rate') ?></span></td>
                        <td style="width: 100px;"><span style="float: right;">0</span></td>
                    </tr>
                    <?php

                            $total_amount_sub = $total_temp+$total_amount_sub;
                        }
                    }

                    ?>

				</tbody>


</table>
			
			

            <div style="width: 100%; height: 5px; border-top: 3px solid"></div>

		<table class="balance" cellspacing="0" cellpadding="0">

            <tr class="">
                <th><span  >Amount</span></th>
                <td><span><?php echo $total_amount=$total_mainamount+$total_amount_sub ?></span></td>
                <td><span><?php echo $credit; ?></span></td>
            </tr>

            <tr class="">
                <th><span  >Discount</span></th>
                <td><span><?php echo ($discount/100)*$total_amount; ?></span></td>
                <td><span><?php ?></span></td>
            </tr>

				<tr>
					<th><span  >Total</span></th>
					<td><span><?php echo $total; ?></span></td>
					<td><span><?php  ?></span></td>
				</tr>



                <tr class="paid_tr">
					<th><span  >Paid</span></th>
					<td><span><?php echo $paid; ?></span></td>
					<td><span></span></td>
				</tr>

                <tr>
					<th><span  >Due</span></th>
<!--					<td></td>-->
					<td colspan="2" style="text-align: center"><span><?php echo $total - $paid;?></span> <span data-prefix>BHD</span></td>
				</tr>
				
			</table>

		</article>


		<aside style="top: 170px; position:relative; font-size: 12px;">
			<h1 style="margin: 0px;"><span  ></span></h1>
			<div>

                <p>A member of</p>
			</div>

            <br>
            <br>

            <div class="footer">
                <img src="img/logo_hospitality.png" width="120" height="40">
                <p>
                    P O Box 11180, Kingdom Of Bahrain, Tel (973) 17 360333, Fax (+973) 17 360333<br>
                    Email: ech@elitegroup4u.com, Website: www.elitegroup4u.com
                </p>
            </div>

		</aside>

<!--        <center><br><br><a href="view_mem.php">Fitness Management System ( techdynamics.org)</center>-->
	</body>
</html>
