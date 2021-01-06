<?php

namespace App\Models;

use App\Models\User;
use App\Models\Salario;
use App\Models\Categoria;
use App\Models\Ubicacion;
use App\Models\Experiencia;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Vacante extends Model
{
    //use HasFactory;
    protected $fillable=[

        'titulo', 'imagen','descripcion','skill','categoria_id','experiencia_id','ubicacion_id','salario_id','user_id'

    ];

    //Relacion 1 a 1 Categoria

    public function categoria(){

       return $this->belongsTo(Categoria::class);

    }

    //Relacion 1 a 1 experiencia

    public function experiencia(){

        return $this->belongsTo(Experiencia::class);
    }
    //Relacion 1 a 1 ubicacion

    public function ubicacion(){

        return $this->belongsTo(Ubicacion::class);
    }

    //Relacion 1 a 1 salario

    public function salario(){

        return $this->belongsTo(Salario::class);
    }
    //Relacion 1 a 1 salario

    public function usuario(){

        return $this->belongsTo(User::class, 'user_id');
    }


    //Relacion 1 a n
    public function candidatos(){

        return $this->hasMany(Candidato::class);
    }

}
