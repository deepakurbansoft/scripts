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
    <a href="new_entry.php"><h1>Invoice (New Registration)</h1></a>
    <address>
        <p>Galaxy The Gym</p>
        <p>M-21, Lane 2 ,Khalilullah Masjid</p><p>Jamia Nagar Oklha New Delhi 110025</p>
        <p>Mobile:-9873712786</p><p>www.galaxythegym.com (galaxythegym@gmail.com)</p><br><p><div id="barcodeTarget" class="barcodeTarget"></div>
        <canvas id="canvasTarget"></canvas> </span>
    </address>
			<span><img alt="" src="logo.png">
</header>
<article>
    <table class="meta">
        <img alt="" src="pic1.jpg" width="100" height="100">	<tr>
            <th><span  >Invoice #</span></th>
            <td><span  ><?php
                    echo $invoice;
                    ?></span></td>
        </tr>
        <tr>
            <th><span  >Date</span></th>
            <td><span  ><?php
                    echo $date;
                    ?></span></td>
        </tr>
        <tr>
            <th><span  >Member ID / Reg ID</span></th>


            <td><?php
                $regid = substr($p_id, 6, 10);
                echo $p_id . " / " . $regid;
                ?></span></td>
        </tr>
    </table>
    <table class="meta">
        <tr>
            <th><span  >Name</span></th>
            <td><span  ><?php
                    echo $full_name;
                    ?></span></td>
        </tr>
        <tr>
            <th><span  >Age, Sex</span></th>
            <td><span  ><?php
                    echo $age . " / " . $sex;
                    ?></span></td>
        </tr>
        <tr>
            <th><span  >Height / Weight</span></th>
            <td><?php
                echo $height . "  FEET / " . $weight . " Kg";
                ?></span></td>
        </tr>
    </table>
    <table class="inventory">
        <thead>
        <tr>
            <th><span  >Membership Type</span></th>
            <th><span  >Details</span></th>
            <th><span  >Subscription Expiry</span></th>

        </tr>
        </thead>

        <tbody>
        <tr>
            <td><span  ><?php
                    echo $name_type;
                    ?></span></td>
            <td><span  ><?php
                    echo $details . " For " . $days;
                    ?></span></td>
            <td><span  ><?php
                    echo $expiry;
                    ?></span></td>
        </tr>
        </tbody>
    </table>



    <table class="balance">
        <tr>
            <th><span  >Total</span></th>
            <td><span data-prefix>INR</span><span><?php
                    echo $total;
                    ?></span></td>
        </tr><tr>
            <th><span  >Paid</span></th>
            <td><span data-prefix>INR</span><span><?php
                    echo $paid;
                    ?></span></td>
        </tr><tr>
            <th><span  >Due</span></th>
            <td><span data-prefix>INR</span><span><?php
                    echo $total - $paid;
                    ?></span></td>
        </tr>

    </table>
</article>
<aside>
    <h1><span  >Additional Notes</span></h1>
    <div  >
        <p>1). All members must abide our TnC / rules otherwise membership may be withdrawn. </br></br>2). The payment is not transferable and non-refundable.</br></br>3).Fee Should be submitted within 5 business days before subjected to expiration, otherwise 50 INR/Day will be charged.</br></br>4).All users should dress appropriately Or as per advised.</br></br>5).Smoking is NOT permitted at the Gym site.</br></br>6). A 1000 INR for breaking/scracthing glasses belonging to "Galaxy the gym" will be imposed.
    </div>
</aside><center><br><br><a href="view_mem.php">Fitness Management System ( techdynamics.org)</center>
</body>
</html>
