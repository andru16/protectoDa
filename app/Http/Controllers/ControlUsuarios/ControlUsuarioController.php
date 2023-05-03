<?php

namespace App\Http\Controllers\ControlUsuarios;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class ControlUsuarioController extends Controller
{
    public function vistaUsuarios(){
        return view('controlUsuarios.lista_usuarios');
    }

    public function listarUsuarios(){   
        $usuarios = User::query();

        return DataTables::eloquent($usuarios)
            ->addColumn('nombre', function (User $usuarios) {
              return $usuarios->name;
            })
            ->addColumn('email', function (User $usuarios) {
               return $usuarios->email;
            })
            ->setRowId(function (User $usuarios) {
                return $usuarios->id;
            })
           
            ->filter( function($query) {

             


            })
            ->order( function( $query ) {
                $query->orderBy('created_at', 'desc');
            })
            ->toJson();
    }
}
