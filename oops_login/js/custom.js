/**
 * Created by deepak on 12/8/2015.
 */

$(document).ready(function() {

    $('#login_form').submit(function(event) { //Trigger on form submit


        $.ajax({ //Process the form using $.ajax()
            type      : 'POST', //Method type
            url       : 'login_process.php', //Your form processing file URL
            data      : $('#login_form').serialize(), //Forms name
            dataType  : 'json',
            success   : function(data) {
                if (!data.success) { //If fails
                    if (data.errors.name) { //Returned if any error from process.php
                        //alert('Login Failed')
                        $('#login-alert').fadeIn(1000).html(data.errors.name); //Throw relevant error
                    }
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


$(document).ready(function() {
    var $btnSets = $('#responsive'),
        $btnLinks = $btnSets.find('a');

    $btnLinks.click(function(e) {
        e.preventDefault();
        $(this).siblings('a.active').removeClass("active");
        $(this).addClass("active");
        var index = $(this).index();
        $("div.user-menu>div.user-menu-content").removeClass("active");
        $("div.user-menu>div.user-menu-content").eq(index).addClass("active");
    });
});

$( document ).ready(function() {
    $("[rel='tooltip']").tooltip();

    $('.view').hover(
        function(){
            $(this).find('.caption').slideDown(250); //.fadeIn(250)
        },
        function(){
            $(this).find('.caption').slideUp(250); //.fadeOut(205)
        }
    );
});


$(function(){
    $('.button-checkbox').each(function(){
        var $widget = $(this),
            $button = $widget.find('button'),
            $checkbox = $widget.find('input:checkbox'),
            color = $button.data('color'),
            settings = {
                on: {
                    icon: 'glyphicon glyphicon-check'
                },
                off: {
                    icon: 'glyphicon glyphicon-unchecked'
                }
            };

        $button.on('click', function () {
            $checkbox.prop('checked', !$checkbox.is(':checked'));
            $checkbox.triggerHandler('change');
            updateDisplay();
        });

        $checkbox.on('change', function () {
            updateDisplay();
        });

        function updateDisplay() {
            var isChecked = $checkbox.is(':checked');
            // Set the button's state
            $button.data('state', (isChecked) ? "on" : "off");

            // Set the button's icon
            $button.find('.state-icon')
                .removeClass()
                .addClass('state-icon ' + settings[$button.data('state')].icon);

            // Update the button's color
            if (isChecked) {
                $button
                    .removeClass('btn-default')
                    .addClass('btn-' + color + ' active');
            }
            else
            {
                $button
                    .removeClass('btn-' + color + ' active')
                    .addClass('btn-default');
            }
        }
        function init() {
            updateDisplay();
            // Inject the icon if applicable
            if ($button.find('.state-icon').length == 0) {
                $button.prepend('<i class="state-icon ' + settings[$button.data('state')].icon + '"></i> ');
            }
        }
        init();
    });
});