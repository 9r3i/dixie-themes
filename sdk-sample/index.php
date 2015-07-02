<?php
/* load header theme */
include_once('header.php');

/* get index posts */
$gip = dt_index();

/* print the posts */
echo $gip?$gip:'Doesn\'t have a post yet';

/* load footer theme */
include_once('footer.php');