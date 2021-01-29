<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    protected $table = 'city';

    public function getName() {
        return $this->name;
    }

    public function getId() {
        return $this->id;
    }
}