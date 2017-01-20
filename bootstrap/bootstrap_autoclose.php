<!DOCTYPE html>
<html>

<head>
    <script data-require="jquery@*" data-semver="2.0.3" src="http://code.jquery.com/jquery-2.0.3.min.js"></script>
    <script data-require="bootstrap@*" data-semver="3.1.1" src="//netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>
    <link data-require="bootstrap-css@3.1.1" data-semver="3.1.1" rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css" />
<!--    <link rel="stylesheet" href="style.css" />-->

</head>

<body>

<div class="alert alert-success" id="success-alert">
    <button type="button" class="close" data-dismiss="alert">x</button>
    <strong>Success! </strong>
    message.
</div>


<script>

    $("#success-alert").fadeTo(3000, 500).slideUp(500, function(){
        $("#success-alert").alert('close');
    });
</script>

</body>

</html>
