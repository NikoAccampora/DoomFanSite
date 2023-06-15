<?php
session_start();

function setSuccess($message) {
    $_SESSION['success'] = $message;
}

function setError($message) {
    $_SESSION['error'] = $message;
}