<?php
const Login_url = "/../pages/auth/login.php";
const HomeUrl = "/../pages/index.php";
const ForbiddenUrl = "/../pages/public/index.php";

function sessionStart(){
    if(session_status() == PHP_SESSION_NONE){
        session_start();
    }
}

function isLoggedIn(){
    sessionStart();
    $isLoggedIn = isset($_SESSION['user']);

    return $isLoggedIn;
}

function getAuthUser(){
    sessionStart();
    $user = $_SESSION['user'] ?? null;
    return $user;
}

function hasRole(array $roles){
    $user = getAuthUser();

    $isUserHasAuthorizeRole = $user != null && in_array($user['role'], $roles);
    return $isUserHasAuthorizeRole;
}

function requireAuth(){
    if(!isLoggedIn()){
        $_SESSION['errors'] = [
            'login' => 'silakan login terlebih dahulu sebelum mengakses halaman ini'
        ];
        header('Location: ' . Login_url);
        exit;
    }
}

function requireRole(array $roles){
    requireAuth();
    if(!hasRole($roles)){
        header('Location: '. ForbiddenUrl);
        exit;
    }
}

function requireGuest(){
    if(isLoggedIn()){
        header('Location: ' . HomeUrl);
        exit;
    }
}