<?php

namespace App\Http\Middleware;

use Closure;

class Role
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public static function role($action)
    {
        // 1. Administrateur -> 1 [*:tous]
        // 2. administrateur DG -> 2 [c][user,agence] || [r][user,startup,agence] || [u][user,agence,journal] || [d][user,agence]
        // 3. Administrateur par Agence/Antenne -> 3 [c][user] || [r][user,startup] || [u][user] || [d][user]
        // 4. Conseiller Animateur -> 4 [c][startup] || [r][startup] || [u][startup] || [d][]
        // 5. Correspondant DG -> 5 [r][startup] || [u][startup,journal] || [d][]
        $c = [ // CREATE 
            "demandes"       => [1,4],
        ];
        $r = [ // READ
            "demandes"       => [1,2,4,5],
        ];
        $u = [ // UPDATE
            "demandes"       => [1,4,5],
        ];
        $d = [ // DELETE
            "demandes"       => [1],
        ];

        switch($action)
        {
            case 'c':
            return $c;
            break;
            case 'r':
            return $r;
            break;
            case 'u':
            return $u;
            break;
            case 'd':
            return $d;
            break;
        }
        
    }
    public function handle($request, Closure $next)
    {
        return $next($request);
    }
}
