<?php

namespace ZMDev\FateSDK;


interface IAuth
{
    function needLogin();
    function login();
    function redirectToLogin();
    function logout();
    function check();
    function userID();
}