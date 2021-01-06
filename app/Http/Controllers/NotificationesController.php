<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NotificationesController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        //cunado el usuario no lee las notificaciones
        $notificaciones= auth()->user()->unreadNotifications;

        $notificaciones->markAsRead();



        return view('notificaciones.index', compact('notificaciones'));
    }
}
