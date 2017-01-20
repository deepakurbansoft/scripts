<?php

if($_SERVER['SERVER_NAME'] == 'localhost')
{
    define("site_url", "http://localhost/cashbookpickandclick.com");

}
else
{
    define("site_url", "http://demo.cashbookpickandclick.com");
}