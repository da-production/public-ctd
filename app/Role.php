<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{

    /*

     * Roles
     * @param String
     * return ARRAY
     */
    public static function action($action)
    {
        // 1. Administrateur -> 1 [*:tous]
        // 2. Administrateur Agence
        // 4. Cellule
        // 5. Client
        // 6. vérificateur

        $c = [ // CREATE 
            "demande"           => [1,5],
            "wilaya"            => [1],
            "user"              => [1,2],
            "commune"           => [1],
            "antenne"           => [1]
        ];
        $r = [ // READ
            "demande"           => [1,4,5],
            "wilaya"            => [1],
            "user"              => [1,2],
            "commune"           => [1],
            "antenne"           => [1]
        ];
        $u = [ // UPDATE
            "demande"           => [1],
            "wilaya"            => [1],
            "user"              => [1,3],
            "commune"           => [1],
            "antenne"           => [1]
        ];
        $d = [ // DELETE
            "demande"           => [1],
            "wilaya"            => [1],
            "user"              => [1,2],
            "commune"           => [1],
            "antenne"           => [1]
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
}
