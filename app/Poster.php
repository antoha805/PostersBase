<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Poster extends Model
{
    protected $table = 'posters';

    protected $guarded = array(
        'id',
        'created_at',
        'updated_at',
    );

    public static function getValidationRules() {
        $validation = array(
            'name'     => 'required|min:1|max:200',
            'body'      => 'required',
        );
        return $validation;
    }
}
