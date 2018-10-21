<?php

session_start();
unset ($SESSION['username']);
session_destroy();

?>