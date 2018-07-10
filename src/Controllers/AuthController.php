<?php

namespace ZMDev\FateSDK\Controllers;


use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Cookie;
use Symfony\Component\HttpKernel\Exception\BadRequestHttpException;
use ZMDev\FateSDK\IAuth;

class AuthController
{
    public function callback(Request $request)
    {
        if (!$request->get('ticket_id')) {
            throw new BadRequestHttpException('ticket_id 参数不存在');
        }
        $ticketID = $request->get('ticket_id');
        if (!$request->has('user_id')) {
            throw new BadRequestHttpException('user_id 参数不存在');
        }
        $userID = $request->get('user_id');
        $expiredAt = $request->get('expired_at', function () {
            return time() + 3600 * 24 * 7;
        });
        $callback = $request->get('callback', function () {
            return config('app.url');
        });
        $cookieTicketID = new Cookie(config('fate.ticket_id_cookie_key'), $ticketID, $expiredAt);
        $cookieUserID = new Cookie(config('fate.user_id_cookie_key'), $userID, $expiredAt, '/', null, false, false);
        return (new RedirectResponse($callback))->withCookies([$cookieTicketID, $cookieUserID]);
    }

    public function logout()
    {
        $time = time() - 1;
        $rmCookieTicketID = new Cookie(config('fate.ticket_id_cookie_key'), null, $time);
        $rmCookieUserID = new Cookie(config('fate.user_id_cookie_key'), null, $time);
        app(IAuth::class)->logout();
        return (new RedirectResponse(url()->previous()))->withCookies([$rmCookieTicketID, $rmCookieUserID]);
    }
}
