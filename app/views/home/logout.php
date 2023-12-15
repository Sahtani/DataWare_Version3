<?php

if (session_destroy()) {
    redirect('home/signup');
}
?>