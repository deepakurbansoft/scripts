<!DOCTYPE html>
<html>
     <head>
     <meta charset="utf-8">
     <meta http-equiv="X-UA-Compatible" content="IE=edge">
     <title></title>
     <link rel="stylesheet" type="text/css" href="">
</head>
<body>
  <script>



  window.fbAsyncInit = function() {
        FB.init({
            appId      : '1886059274946712',
            xfbml      : true,
            version    : 'v2.8'
        });
//        FB.getLoginStatus(function(response){
//            if(response.status === 'connected'){
//                document.getElementById('status').innerHTML = 'we are connected';
//            } else if(response.status === 'not_authorized') {
//                 document.getElementById('status').innerHTML = 'we are not logged in.'
//            } else {
//                document.getElementById('status').innerHTML = 'you are not logged in to Facebook';
//            }
//        });
    // FB.AppEvents.logPageView();
    };

    (function(d, s, id){
         var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) {return;}
        js = d.createElement(s); js.id = id;
        js.src = "//connect.facebook.net/en_US/sdk.js";
        fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));

    function login(){
        FB.login(function(response){

            if(response.status === 'connected'){
                document.getElementById('status').innerHTML = 'we are connected';

                FB.api('/me', 'GET', {fields: 'first_name,last_name,name,id,email'}, function(response) {
                    alert(response.email);
//                    var uinf = document.getElementById('status').innerHTML = response.id;
//                    alert(uinf);
                    //  document.getElementById('status').innerHTML = response.first_name;
                });

            } else if(response.status === 'not_authorized') {
                 document.getElementById('status').innerHTML = 'we are not logged in.'
            } else {
                document.getElementById('status').innerHTML = 'you are not logged in to Facebook';
            }

        });
    }
    // get user basic info

    function getInfo() {

        FB.api('/me', 'GET', {fields: 'first_name,last_name,name,id,email'}, function(response) {
           var uinf = document.getElementById('status').innerHTML = response.id;
           document.getElementById('email').innerHTML = response.email;
        });
	
	
        FB.api('/me', function(response) {
            //document.getElementById('login').style.display = "block";
            document.getElementById('profileImage').innerHTML = '<img src="http://graph.facebook.com/' + response.id + '/picture" />';
        });


        FB.api('/me', function(response) {
            //document.getElementById('login').style.display = "block";
             var uinf = document.getElementById('displayName').innerHTML = response.name;
        });

    }

    function logout(){
        FB.logout(function(response) {
            document.location.reload();
        });
    }


</script>
<img></img>
<div id="info"></div>
<div id="status"></div>
<div id="profileImage">dfgdfg</div>
<div id="profileImage1"></div>
<div id="photos_header"></div>
<div id="album_imgs"></div>
<div id="album_imgs"></div>
<div id="email"></div>
<button onclick="getInfo()">Get Info</button>
<button onclick="login()">login</button>
<button onclick="logout()">logout</button>


<ul id="albumss">
</ul>


<div id="displayName"></div>
<div id="userName"></div>
<div id="userID"></div>
<div id="userEmail"></div>
<div id="profileImage"></div>



</body>
</html>