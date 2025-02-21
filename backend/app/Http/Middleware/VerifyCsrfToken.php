<?php

namespace App\Http\Middleware;

use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken as Middleware;

class VerifyCsrfToken extends Middleware
{
    /**
     * The URIs that should be excluded from CSRF verification.
     *
     * @var array<int, string>
     */
    protected $except = [
        'sacardisponibles', // Agrega aquí las rutas que deben ser excluidas
        'registro',
        'login',
        'usuarios',
        'tiendas',
        'buscartienda',
        'creartienda',
        'creardiseño',
        'disenoma/*',
        'creardiseñocli/*',
        'disenocli/*',
        'eliminardisenocli/*',
        
        
    ];
}
