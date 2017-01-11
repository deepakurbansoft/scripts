<style>
body{ 
    margin-top:40px; 
}

.stepwizard-step p {
    margin-top: 10px;
}

.stepwizard-row {
    display: table-row;
}

.stepwizard {
    display: table;
    width: 100%;
    position: relative;
}

.stepwizard-step button[disabled] {
    opacity: 1 !important;
    filter: alpha(opacity=100) !important;
}

.stepwizard-row:before {
    top: 14px;
    bottom: 0;
    position: absolute;
    content: " ";
    width: 100%;
    height: 1px;
    background-color: #ccc;
    z-order: 0;

}

.stepwizard-step {
    display: table-cell;
    text-align: center;
    position: relative;
}

.btn-circle {
  width: 30px;
  height: 30px;
  text-align: center;
  padding: 6px 0;
  font-size: 12px;
  line-height: 1.428571429;
  border-radius: 15px;
}    

.app_title {
    background-color: #B60050;
    text-align: center;
    color: #fff;
    font-weight: bold;
    margin: 25px 0px;
}
.app_title h3 {
    margin: 12px;
}
.app_title h3 {
    margin: 12px;
}
.btn-primary:hover
{
	    color: #fff;
    background-color: #B60050 !important;
    border-color: #B60050 !important;
}
.btn-primary {
    color: #fff;
    background-color: #626166 !important;
    border-color: #626166 !important;
}
button.btn.btn-default.prevBtn.btn-lg.pull-left {
    background-color: #626166 !important;
    color: #fff;
	 border-color: #626166 !important;	
}
button.btn.btn-default.prevBtn.btn-lg.pull-left:hover {
    background-color: #B60050 !important;
    border: #B60050 !important;
}
.btn-success {
    color: #fff;
    background-color: #B60050 !important;
    border-color: #B60050 !important;
}
.disclaim_data {
    border: 1px solid #B60050;
    border-radius: 12px;
    padding: 10px;
    margin: 20px 0px;
}
.dis_data1 {
    font-size: 25px;
}
.dis_content {
    font-size: 16px;
    padding: 12px;
    line-height: 27px;
    text-align: center;
}

.adq {
    margin: 10px 0px !important;
    padding: 10px !important;
    font-size: 17px !important;
}
</style>

<?php
include("topbar.php");
?>
<br/>
<br/>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Apply online</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  	<!--link href="assets/css/bootstrap-responsive.css" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="tstyle.css"-->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<link rel="shortcut icon" type="image/png" href="images/fav_icon.png"/>
</head>
<body>

<div class="container">
<div class="stepwizard">
    <div class="stepwizard-row setup-panel">
        <div class="stepwizard-step">
            <a href="#step-1" type="button" class="btn btn-primary btn-circle">1</a>
            <p>Step 1</p>
        </div>
        <div class="stepwizard-step">
            <a href="#step-2" type="button" class="btn btn-default btn-circle" disabled="disabled">2</a>
            <p>Step 2</p>
        </div>
        <div class="stepwizard-step">
            <a href="#step-3" type="button" class="btn btn-default btn-circle" disabled="disabled">3</a>
            <p>Step 3</p>
        </div>
         <div class="stepwizard-step">
            <a href="#step-4" type="button" class="btn btn-default btn-circle" disabled="disabled">4</a>
            <p>Step 4</p>
        </div>
		 <div class="stepwizard-step">
            <a href="#step-5" type="button" class="btn btn-default btn-circle" disabled="disabled">5</a>
            <p>Step 5</p>
        </div>
    </div>
</div>
<form role="form" method="POST" action="test.php" enctype="multipart/form-data">
    <div class="row setup-content" id="step-1">
        <div class="col-xs-12">
                        
			<div class="col-md-12 app_title"> <h3>PERSONAL INFORMATIONNNNNNN</h3></div>
            <div class="col-md-6">
               
                <div class="form-group">
                    <label class="control-label">Title</label>
                    <input  maxlength="100" name="title" id="ptitle" type="text"  class="form-control" placeholder=""  />
                </div>
                <div class="form-group">
                    <label class="control-label">Middle Name</label>
                    <input maxlength="100" name="m_name"  id="pm_name" type="text"  class="form-control" placeholder="" />
                </div>
				<div class="form-group">
                    <label class="control-label">Marital Status</label><br/>
					<input type="radio" name="mstatus" id="pm_status" value="Single"> Single
					<input type="radio" name="mstatus" id="pm_status" value="Married">Married<br>
                    <!--input maxlength="100" type="text"  class="form-control" placeholder="Enter Middle Name" /-->
                </div>
				
				<div class="form-group">
                    <label class="control-label">Date of Birth</label>
                    <input  maxlength="100" type="date" name="dob" id="pdob"  class="form-control" placeholder="Enter DOB"  />
                </div>
				
				<div class="form-group">
                    <label class="control-label">Permanent Address</label>
                    <textarea  maxlength="100" name="permenant_addrs" id="paddres"  class="form-control" placeholder=""></textarea>
                </div>
				
				<div class="form-group">
                    <label class="control-label">Phone</label>
                    <input  maxlength="100" name="phone" id="p_phone" type="text"  class="form-control" placeholder=""  />
                </div>
				<div class="form-group">
                    <label class="control-label">Email</label>
                    <input  maxlength="100" name="email" id="p_email" type="text"  class="form-control" placeholder=""  />
                </div>
				<div class="form-group">
                    <label class="control-label">Expiry Date</label>
                    <input  maxlength="100" name="expirydata" id="pedate" type="date"  class="form-control" placeholder=""  />
                </div>
				
                <!--button class="btn btn-primary nextBtn btn-lg pull-right" type="button" >Next</button-->
            </div>
			<div class="col-md-6">
                
                <div class="form-group">
                    <label class="control-label">First Name</label>
                    <input  maxlength="100" name="fname" id="pf_name" type="text"  class="form-control" placeholder=""  />
                </div>
                <div class="form-group">
                    <label class="control-label">Last Name</label>
                    <input maxlength="100" name="lname" id="pl_name" type="text"  class="form-control" placeholder="" />
                </div>
				<div class="form-group">
                    <label class="control-label">Gender</label><br/>
					<input type="radio" id="pgender" name="gender" value="male"> Male
					<input type="radio" id="pgender" name="gender" value="female"> Female<br>
                    <!--input maxlength="100" type="text"  class="form-control" placeholder="Enter Middle Name" /-->
                </div>
				<div class="form-group">
                    <label class="control-label">Nationality</label>
                    <input  maxlength="100" name="nationality" id="pnation" type="text"  class="form-control" placeholder=""  />
                </div>
				<div class="form-group">
                    <label class="control-label">Correspondence Address</label>
                    <textarea  maxlength="100"  name="coresponding_addrs" class="form-control" placeholder=""></textarea>
                </div>
				<div class="form-group">
                    <label class="control-label">Mobile</label>
                 <input  maxlength="100" name="mobile" id="mobile" type="text"  class="form-control" placeholder=""  />
                </div>
				<div class="form-group">
                    <label class="control-label">Passport Number</label>
                   <input  maxlength="100" name="passnumber" id="passnumber" type="text"  class="form-control" placeholder=""  />
                </div>
				<div class="form-group">
                    <label class="control-label">Languages known</label>
                   <input  maxlength="100" name="language" id="language" type="text"  class="form-control" placeholder=""  />
                </div>
                
            </div>
			<div class="form-group">
                    <label class="control-label">Attach Your Photo</label>
                    <input  maxlength="100" name="photo" id="photo" type="file"  class="form-control" placeholder=""  />
            </div>
				<button class="btn btn-primary nextBtn btn-lg pull-right" type="button" >Next</button>
        </div>
    </div>
	
	<!--qualification-->
    <div class="row setup-content" id="step-2">
        <div class="col-xs-12 consultation_wrap">

		<div class="col-md-12 app_title">
            <h3>Qualifications : (Academic / Professional)</h3>
        </div>

            <div class="col-md-12">

                <div class="form-group">

                    <a href="javascript:;" onclick="add_qualification()" class="btn btn-primary pull-right">Add Qualification</a>
<!--                    <button name="addualifications" value="add" class="btn btn-primary add_qualifications pull-right">Add Qualifications</button><br/><br>-->

                </div>

            </div>

            <table style="width: 100%" id="experience">
                <tr>
                    <td>

                        <div class="col-md-12">

                            <div class="col-md-6">


                                <div class="form-group">
                                    <label class="control-label">Certificate/Degree</label>
                                    <input maxlength="200" name="degree[]" id="degree" type="text"  class="form-control" placeholder="" />
                                </div>
                                <div class="form-group">
                                    <label class="control-label">Year of Completion</label>
                                    <input maxlength="200" name="yocomp[]" id="completion" type="text"  class="form-control" placeholder=""  />
                                </div>
                                <div class="form-group">
                                    <label class="control-label">% of Marks</label>
                                    <input maxlength="200" name="mark[]" id="mark" type="text"  class="form-control" placeholder=""  />
                                </div>
                            </div>

                            <div class="col-md-6">

                                <div class="form-group">
                                    <label class="control-label">University/Institution</label>
                                    <input maxlength="200" name="university[]" id="university" type="text"  class="form-control" placeholder="" />
                                </div>
                                <div class="form-group">
                                    <label class="control-label">Duration</label>
                                    <input maxlength="200" name="duration[]" id="duration" type="text"  class="form-control" placeholder=""  />
                                </div>

                                <div class="form-group">
                                    <label class="control-label">Grade</label>
                                    <input maxlength="200" name="grade[]" id="grade" type="text"  class="form-control" placeholder=""  />
                                </div>

                                <input type="hidden" value="" name="row_count" id="row_count">

                            </div>

                        </div>


                    </td>
                </tr>
            </table>



			 <button class="btn btn-default prevBtn btn-lg pull-left" type="button" >Prev</button>
             <button class="btn btn-primary nextBtn btn-lg pull-right" type="button" >Next</button>

        </div>
		
    </div>
	<!--qualification-->
    <div class="row setup-content" id="step-3">
        <div class="col-xs-12">
			<div class="col-md-12 app_title"> <h3>IT Proficiency / Computer Knowledge</h3></div>
            <div class="col-md-12">
                
                <div class="form-group">
                    <label class="control-label">Specialized Training Courses Completed</label>
                    <input maxlength="200" name="training" id="ittraining" type="text"  class="form-control" placeholder="" />
                </div>
              
            </div>
			<div class="col-md-12">
                <div class="col-md-4">
                <div class="form-group">
                    <label class="control-label">1</label>
                    <input maxlength="200" name="itspecialized1" id="itspecialized1" type="text"  class="form-control" placeholder="" />
                </div>
                </div>
				 <div class="col-md-4">
                <div class="form-group">
                    <label class="control-label">2</label>
                    <input maxlength="200" name="idspecialized2" id="idspecialized2" type="text"  class="form-control" placeholder="" />
                </div>
                </div>
				 <div class="col-md-4">
                <div class="form-group">
                    <label class="control-label">3</label>
                    <input maxlength="200" name="idspecialized3" id="idspecialized3" type="text"  class="form-control" placeholder="" />
                </div>
                </div>
              
            </div>
			 <div class="col-md-12">
                
                <div class="form-group">
                    <label class="control-label">Total Work Experience (Years)</label>
                    <input maxlength="200" name="work_exp" id="work_exp" type="text"  class="form-control" placeholder="" />
                </div>
              
            </div>
			
			<div class="col-md-12">
                <div class="col-md-4">
                <div class="form-group">
                    <label class="control-label">Upload your CV</label>
                    <input maxlength="200" name="cv" id="cv" type="file"  class="form-control" placeholder="" />
                </div>
                </div>
				 <div class="col-md-4">
                <div class="form-group">
                    <label class="control-label">Currently Employed</label><br>
                    <input type="radio" name="emp" id="emp" value="Yes1"> Yes
                    <input type="radio" name="emp" id="emp" value="No1"> No<br>
                </div>
                </div>
				 <div class="col-md-4">
                <div class="form-group">
                    <label class="control-label">Currently Bahrain</label><br>
                    <input type="radio" name="bahrain" id="bahrain" value="Yes"> Yes
                    <input type="radio" name="bahrain" id="bahrain" value="No">No<br>
                </div>
                </div>
             
            </div>
			<div class="col-md-12">
			   <button class="btn btn-default prevBtn btn-lg pull-left" type="button" >Prev</button>
               <button class="btn btn-primary nextBtn btn-lg pull-right" type="button" >Next</button>
			</div>
        </div>
    </div>
	
	
	<!-- work experience-->
	
	
	
	
	<div class="row setup-content" id="step-4">
	
	  <div class="col-xs-12">
		<div class="col-md-12 app_title"> <h3>Work Experience 1</h3></div>
		
		 <a href="javascript:;" onclick="add_wprkexp()" class="btn btn-primary pull-right">Add Work Experience</a>
		 
		 <table style="width: 100%" id="addworkexp">
                <tr>
                    <td>
            <div class="col-md-6">
               
                <div class="form-group">
                    <label class="control-label">Company Name</label>
                    <input maxlength="200" name="com_name[]" id="com_name" type="text"  class="form-control" placeholder="" />
                </div>
                <div class="form-group">
                    <label class="control-label">Reporting to</label>
                    <input maxlength="200" name="report_to[]" id="report_to" type="text"  class="form-control" placeholder=""  />
                </div>
                 <div class="form-group">
                    <label class="control-label">From</label>
                    <input maxlength="200" name="report_from[]" id="report_from" type="text"  class="form-control" placeholder=""  />
                </div>
				 <div class="form-group">
                    <label class="control-label">Country</label>
                    <input maxlength="200" name="country[]" id="country" type="text"  class="form-control" placeholder=""  />
                </div>
				
            </div>
			 <div class="col-md-6">
               
                <div class="form-group">
                    <label class="control-label">Job Title</label>
                    <input maxlength="200" name="job_title[]" id="job_title" type="text"  class="form-control" placeholder="" />
                </div>
                <div class="form-group">
                    <label class="control-label">Responsibilities</label>
                    <input maxlength="200" name="responsible[]" id="responsible" type="text"  class="form-control" placeholder=""  />
                </div>
				
				 <div class="form-group">
                    <label class="control-label">To</label>
                    <input maxlength="200" name="respons_to[]" id="respons_to" type="text"  class="form-control" placeholder=""  />
                </div>
				<div class="form-group">
                    <label class="control-label">State/City</label>
                    <input maxlength="200" name="state_city[]" id="state_city" type="text"  class="form-control" placeholder=""  />
                </div>
               
            </div>
			<div class="col-md-12">
               
                <div class="form-group">
                    <label class="control-label">Reason for Leaving</label>
                    <input maxlength="200" name="reason[]" id="reason" type="text"  class="form-control" placeholder="" />
                </div>
			</div>
			 <input type="hidden" value="" name="row_count_work" id="row_count_work">
			</td>
			</tr>
			</table>
			<div class="col-md-12">
			    <button class="btn btn-default prevBtn btn-lg pull-left" type="button" >Prev</button>
                <button class="btn btn-primary nextBtn btn-lg pull-right" type="button" >Next</button>
			</div>
        </div>
       
    </div>
	<div class="row setup-content" id="step-5">
	
	 
        <div class="col-xs-12">
            <div class="col-md-12">
                <div class="col-md-12 app_title"> <h3>PERSONAL TRAITS</h3></div>
				   <div class="col-md-12">
				        <div class="col-md-4">
               
							<div class="form-group">
								<label class="control-label">Your Strengths</label>
								<input maxlength="200" name="strength" id="strength" type="text"  class="form-control" placeholder="" />
							</div>
							
               
                        </div>
						<div class="col-md-4">
               
							<div class="form-group">
								<label class="control-label">Your Weaknesses</label>
								<input maxlength="200" name="weekness" id="weekness" type="text"  class="form-control" placeholder="" />
							</div>
							
               
                        </div>
						<div class="col-md-4">
               
							<div class="form-group">
								<label class="control-label">Career Objectives</label>
								<input maxlength="200" name="cobjective" id="cobjective" type="text"  class="form-control" placeholder="" />
							</div>
							
               
                        </div>
                    </div>

                <div class="col-md-12">
			<div class="col-md-6">
               
                <div class="form-group">
                    <label class="control-label">Any major illness during the last 5 years</label>
                    <input maxlength="200" name="major_illness" id="major_illness" type="text"  class="form-control" placeholder="" />
                </div>       
            </div>
			<div class="col-md-6">
               
                <div class="form-group">
                    <label class="control-label">Professional membership & Affiliations, if any</label>
                    <input maxlength="200" name="pro_membership" id="pro_membership" type="text"  class="form-control" placeholder="" />
                </div>   
            </div>
        </div>

                <div class="col-md-12">
							<div class="col-md-6">
							   
								<div class="form-group">
									<label class="control-label">Enumerate areas of expertise, based on total experience</label>
									<textarea maxlength="200" name="expertise" id="expertise"  class="form-control" placeholder="" /></textarea>
								</div>       
							</div>
						<div class="col-md-6">
						   
							<div class="form-group">
								<label class="control-label">Have you ever been convicted?</label>
								<input type="radio" name="convicted" id="convicted" value="Yes123" checked> Yes
								<input type="radio" name="convicted" id="convicted" value="No123">No<br>
								<textarea maxlength="150"  class="form-control" placeholder="" name="con_exp" /></textarea>
							</div>   
						</div>
            </div>
			
			<div class="col-md-12 disclaim_data">
			<center>
			<p class="dis_data1">Disclaimer</p>
			    <label><input type="checkbox" value=""> I have read and agree to the terms of service</label>
			</center>
			
						<p class="dis_content">
							I certify that the Information submitted are true and complete. I understand that a false statement and/or suppression of material facts, may disqualify me from employment, or cause my dismissal or any penal action as deemed appropriate by the company, currently or in future.
						</p>
					
					
			</div>
                <button class="btn btn-default prevBtn btn-lg pull-left" type="button" >Prev</button>
                <!--button class="btn btn-success btn-lg pull-right sendmail" name="sendemail" type="submit">Submit</button-->
				<input type="submit" name="save" value="Submit" class="btn btn-success btn-lg pull-right sendmail" />
            </div>
        </div>
    </div>
	
	
</form>
</div>



</body>
</html>


<?php
include("footer.php");
?>


<script>
$(document).ready(function () {

    var navListItems = $('div.setup-panel div a'),
            allWells = $('.setup-content'),
            allNextBtn = $('.nextBtn'),
            allPrevBtn = $('.prevBtn');

    allWells.hide();

    navListItems.click(function (e) {
        e.preventDefault();
        var $target = $($(this).attr('href')),
                $item = $(this);

        if (!$item.hasClass('disabled')) {
            navListItems.removeClass('btn-primary').addClass('btn-default');
            $item.addClass('btn-primary');
            allWells.hide();
            $target.show();
            $target.find('input:eq(0)').focus();
        }
    });

    allNextBtn.click(function(){
        var curStep = $(this).closest(".setup-content"),
            curStepBtn = curStep.attr("id"),
            nextStepWizard = $('div.setup-panel div a[href="#' + curStepBtn + '"]').parent().next().children("a"),
            curInputs = curStep.find("input[type='text'],input[type='url']"),
            isValid = true;

        $(".form-group").removeClass("has-error");
        for(var i=0; i<curInputs.length; i++){
            if (!curInputs[i].validity.valid){
                isValid = false;
                $(curInputs[i]).closest(".form-group").addClass("has-error");
            }
        }

        if (isValid)
            nextStepWizard.removeAttr('disabled').trigger('click');
    });

    allPrevBtn.click(function(){
        var curStep = $(this).closest(".setup-content"),
            curStepBtn = curStep.attr("id"),
            prevStepWizard = $('div.setup-panel div a[href="#' + curStepBtn + '"]').parent().prev().children("a");

        $(".form-group").removeClass("has-error");
        prevStepWizard.removeAttr('disabled').trigger('click');
    });

    $('div.setup-panel div a.btn-primary').trigger('click');

});

function add_qualification(){

    var table = document.getElementById('experience');

    var rowCount = table.rows.length;
    var row = table.insertRow(rowCount);


    var cell1 = row.insertCell(0);
    cell1.innerHTML = "<div class='col-md-12' style='border-top: 1px solid #ccc'>    <div class='col-md-6' style='margin-top: 20px;'>        <div class='form-group'>           <label class='control-label'>Certificate/Degree 1</label>  <input maxlength='200' name='degree[]' id='qdegree1' type='text'  class='form-control' placeholder='' />  </div> <div class='form-group'> <label class='control-label'>Year of Completion</label>        <input maxlength='200' name='yocomp[]' id='qcompletion1' type='text'  class='form-control' placeholder=''  />    </div>     <div class='form-group'>         <label class='control-label'>% of Marks</label>         <input maxlength='200' name='mark[]' id='qmark1' type='text'  class='form-control' placeholder=''  />      </div>   </div>    <div class='col-md-6' style='margin-top: 20px;'>        <div class='form-group'>           <label class='control-label'>University/Institution</label>           <input maxlength='200' name='university[]' id='quniversity1' type='text'  class='form-control' placeholder='' />       </div>       <div class='form-group'>           <label class='control-label'>Duration</label>          <input maxlength='200' name='duration[]' id='qduration1' type='text'  class='form-control' placeholder=''  />      </div>       <div class='form-group'>          <label class='control-label'>Grade</label>          <input maxlength='200' name='grade[]' id='qgrade1' type='text'  class='form-control' placeholder=''  />      </div>   </div></div>";


//    var cell3 = row.insertCell(2);
//    cell3.innerHTML =  "<a href='javascript:;' onclick='del_product("+rowCount+")'><span style='margin-left: 46px;'>Remove</span>";

    $('#row_count').val(rowCount);

    var data_id = $(this).attr('data-id');

}






//work exp
function add_wprkexp(){

    var table = document.getElementById('addworkexp');

    var rowCount = table.rows.length;
    var row = table.insertRow(rowCount);


    var cell1 = row.insertCell(0);
    cell1.innerHTML = "<div style='border-top: 1px solid #ccc; margin:10px;'><div class='col-md-6'><div class='form-group'><label class='control-label'>Company Name</label><input maxlength='200' name='com_name[]' id='com_name' type='text'  class='form-control' placeholder='' /></div><div class='form-group'><label class='control-label'>Reporting to</label><input maxlength='200' name='report_to[]' id='report_to' type='text'  class='form-control' placeholder=''  /></div><div class='form-group'><label class='control-label'>From</label><input maxlength='200' name='report_from[]' id='report_from' type='text'  class='form-control' placeholder=''  /></div><div class='form-group'><label class='control-label'>Country</label><input maxlength='200' name='country[]' id='country' type='text'  class='form-control' placeholder=''  /></div></div><div class='col-md-6'><div class='form-group'><label class='control-label'>Job Title</label><input maxlength='200' name='job_title[]' id='job_title' type='text'  class='form-control' placeholder='' /></div><div class='form-group'><label class='control-label'>Responsibilities</label><input maxlength='200' name='responsible[]' id='responsible' type='text'  class='form-control' placeholder=''  /></div><div class='form-group'><label class='control-label'>To</label><input maxlength='200' name='respons_to[]' id='respons_to' type='text'  class='form-control' placeholder=''  /></div><div class='form-group'><label class='control-label'>State/City</label><input maxlength='200' name='state_city[]' id='state_city' type='text'  class='form-control' placeholder=''  /></div></div><div class='col-md-12'><div class='form-group'><label class='control-label'>Reason for Leaving</label><input maxlength='200' name='reason[]' id='reason' type='text'  class='form-control' placeholder='' /></div></div></div>";



    $('#row_count_work').val(rowCount);

    var data_id = $(this).attr('data-id');

}
//work exp
</script>
<script src="js/jquery-1.9.1.min.js"></script>
        <script src="js/bootstrap-datepicker.js"></script>
        <script type="text/javascript">
            // When the document is ready
            $(document).ready(function () {
                
                $('#example1').datepicker({
                    format: "dd/mm/yyyy"
                });  
            
            });
        </script>
