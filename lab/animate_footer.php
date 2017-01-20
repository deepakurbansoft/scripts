<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>

    <style type="text/css">
        .footer{
          width: 100%;
            position: fixed;
            bottom: 0;
            left: 0;
            right: 0;
            padding: 15px;
            background-color: #CB4C00;
            overflow: hidden;
            animation-duration: 0.8s;
            animation-name: slideUp;
        }




        .cc_banner-wrapper {
            position: relative;
            z-index: 9001;
        }
        .cc_container .cc_btn {
            cursor: pointer;
            font-size: 0.6em;
            line-height: 1em;
            text-align: center;
            transition: font-size 200ms ease 0s;
        }
        .cc_container .cc_message {
            font-size: 0.6em;
            line-height: 1.5em;
            margin: 0;
            padding: 0;
            transition: font-size 200ms ease 0s;
        }
        .cc_container .cc_logo {
            background-image: url("//cdnjs.cloudflare.com/ajax/libs/cookieconsent2/1.0.10/logo.png");
            background-size: cover;
            display: none;
            height: 22px;
            opacity: 0.9;
            overflow: hidden;
            text-indent: -1000px;
            transition: opacity 200ms ease 0s;
            width: 100px;
        }
        .cc_container .cc_logo:hover, .cc_container .cc_logo:active {
            opacity: 1;
        }
        @media screen and (min-width: 500px) {
            .cc_container .cc_btn {
                font-size: 0.8em;
            }
            .cc_container .cc_message {
                font-size: 0.8em;
            }
        }
        @media screen and (min-width: 768px) {
            .cc_container .cc_btn {
                font-size: 1em;
            }
            .cc_container .cc_message {
                font-size: 1em;
                line-height: 1em;
            }
        }
        @media screen and (min-width: 992px) {
            .cc_container .cc_message {
                font-size: 1em;
            }
        }
        @media print {
            .cc_banner-wrapper, .cc_container {
                display: none;
            }
        }
        .cc_container {
            bottom: 0;
            left: 0;
            overflow: hidden;
            padding: 10px;
            position: fixed;
            right: 0;
        }
        .cc_container .cc_btn {
            background-color: #f1d600;
            cursor: pointer;
            display: block;
            float: right;
            font-size: 0.6em;
            margin-left: 10px;
            max-width: 120px;
            padding: 8px 10px;
            text-align: center;
            transition: font-size 200ms ease 0s;
            width: 33%;
        }
        .cc_container .cc_message {
            display: block;
            font-size: 0.6em;
            transition: font-size 200ms ease 0s;
        }
        @media screen and (min-width: 500px) {
            .cc_container .cc_btn {
                font-size: 0.8em;
            }
            .cc_container .cc_message {
                font-size: 0.8em;
                margin-top: 0.5em;
            }
        }
        @media screen and (min-width: 768px) {
            .cc_container {
                padding: 15px 30px;
            }
            .cc_container .cc_btn {
                font-size: 1em;
                padding: 8px 15px;
            }
            .cc_container .cc_message {
                font-size: 1em;
            }
        }
        @media screen and (min-width: 992px) {
            .cc_container .cc_message {
                font-size: 1em;
            }
        }
        .cc_container {
            background: #222 none repeat scroll 0 0;
            box-sizing: border-box;
            color: #fff;
            font-family: "Helvetica Neue Light","HelveticaNeue-Light","Helvetica Neue",Calibri,Helvetica,Arial;
            font-size: 17px;
        }
        .cc_container *::-moz-selection {
            background: #ff5e99 none repeat scroll 0 0;
            color: #fff;
            text-shadow: none;
        }
        .cc_container .cc_btn, .cc_container .cc_btn:visited {
            background-color: #f1d600;
            border-radius: 5px;
            color: #000;
            transition: background 200ms ease-in-out 0s, color 200ms ease-in-out 0s, box-shadow 200ms ease-in-out 0s;
        }
        .cc_container .cc_btn:hover, .cc_container .cc_btn:active {
            background-color: #fff;
            color: #000;
        }
        .cc_container a, .cc_container a:visited {
            color: #31a8f0;
            text-decoration: none;
            transition: color 200ms ease 0s;
        }
        .cc_container a:hover, .cc_container a:active {
            color: #b2f7ff;
        }

        @keyframes slideUp {
            0% {
                transform: translateY(66px);
            }
            100% {
                transform: translateY(0px);
            }
        }
        @keyframes slideUp {
            0% {
                transform: translateY(66px);
            }
            100% {
                transform: translateY(0px);
            }
        }
        .cc_container, .cc_message, .cc_btn {
            animation-duration: 0.8s;
            animation-name: slideUp;
        }

    </style>
</head>
<body>

<div class="cc_banner-wrapper "><div class="cc_banner cc_container "><a href="#null" data-cc-event="click:dismiss" target="_blank" class="cc_btn cc_btn_accept_all">Got it!</a><p class="cc_message">This website uses cookies to ensure you get the best experience on our website <a data-cc-if="options.link" target="_self" class="cc_more_info" href="#">More info</a></p><a class="cc_logo" target="_blank" href="http://silktide.com/cookieconsent">Cookie Consent plugin for the EU cookie law</a></div></div>

</div>
</body>
</html>