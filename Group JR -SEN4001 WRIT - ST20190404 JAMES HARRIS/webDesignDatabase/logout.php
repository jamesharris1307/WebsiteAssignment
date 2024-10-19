<?php

//Start Session
session_start();

//End Session
session_destroy();

//Redirect
header('location:login.html');
