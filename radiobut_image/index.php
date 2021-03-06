<style type="text/css">
    .cc-selector input{
        margin:0;padding:0;
        -webkit-appearance:none;
        -moz-appearance:none;
        appearance:none;
    }

    .cc-selector-2 input{
        position:absolute;
        z-index:999;
    }

    .visa{background-image:url(http://i.imgur.com/lXzJ1eB.png);}
    .mastercard{background-image:url(http://i.imgur.com/SJbRQF7.png);}

    .cc-selector-2 input:active +.drinkcard-cc, .cc-selector input:active +.drinkcard-cc{opacity: .9;}
    .cc-selector-2 input:checked +.drinkcard-cc, .cc-selector input:checked +.drinkcard-cc{
        -webkit-filter: none;
        -moz-filter: none;
        filter: none;
    }
    .drinkcard-cc{
        cursor:pointer;
        background-size:contain;
        background-repeat:no-repeat;
        display:inline-block;
        width:100px;height:70px;
        -webkit-transition: all 100ms ease-in;
        -moz-transition: all 100ms ease-in;
        transition: all 100ms ease-in;
        -webkit-filter: brightness(1.8) grayscale(1) opacity(.7);
        -moz-filter: brightness(1.8) grayscale(1) opacity(.7);
        filter: brightness(1.8) grayscale(1) opacity(.7);
    }
    .drinkcard-cc:hover{
        -webkit-filter: brightness(1.2) grayscale(.5) opacity(.9);
        -moz-filter: brightness(1.2) grayscale(.5) opacity(.9);
        filter: brightness(1.2) grayscale(.5) opacity(.9);
    }

    /* Extras */
    a:visited{color:#888}
    a{color:#444;text-decoration:none;}
    p{margin-bottom:.3em;}
    * { font-family:monospace; }
    .cc-selector-2 input{ margin: 5px 0 0 12px; }
    .cc-selector-2 label{ margin-left: 7px; }
    span.cc{ color:#6d84b4 }

</style>

<form>

    <div class="cc-selector-2">
        <input id="visa2" type="radio" name="creditcard" value="visa" />
        <label class="drinkcard-cc visa" for="visa2"></label>
        <input  checked="checked" id="mastercard2" type="radio" name="creditcard" value="mastercard" />
        <label class="drinkcard-cc mastercard"for="mastercard2"></label>
    </div>

</form>
<small><a href="https://github.com/rcotrina94/icons">
        &copy; Icons by <span class="cc">@rcotrina94</span> on <span class="cc">Github </span></a></small>