<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="google-signin-client_id" content="497865222618-652kut248h5dm8fmhtgo3l2g6dra8upb.apps.googleusercontent.com">
    <title>Title</title>
    <script src="https://apis.google.com/js/platform.js" async defer></script>
</head>
<body>
<div class="g-signin2" data-longtitle="true" data-onsuccess="Google_signIn" data-theme="light" data-width="200"></div>

<script type="application/javascript">
    function Google_signIn(googleUser) {
        alert(1);

        var profile = googleUser.getBasicProfile();
        console.log('ID: ' + profile.getId());
        console.log('Name: ' + profile.getName());
        console.log('Image URL: ' + profile.getImageUrl());
        console.log('Email: ' + profile.getEmail());

        //pass information to server to insert or update the user record
        update_user_data(profile);
    }

</script>
</body>
</html>