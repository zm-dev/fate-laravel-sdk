<?php

namespace ZMDev\FateSDK;


interface IAuth
{
    function needLogin();

    function login();

    function redirectToLogin($callback = '');

    function logout();

    function check();

    function userID();
}