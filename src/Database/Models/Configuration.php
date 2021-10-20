<?php
namespace Gelim\EMConfig\Database\Models;
use Illuminate\Database\Eloquent\Model;

class Configuration extends Model
{
    protected $table = "emconfig";
    protected $fillable = [
        'scope',
        'key',
        'title',
        'description',
        'type',
        'extras'
    ];

    protected $casts = [
        "extras" => "array"
    ];

    protected function getCastType($key)
    {
        if ($key === "extras"){
            return $this->type;
        }
        return parent::getCastType($key);
    }
}
