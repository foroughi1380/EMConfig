<?php
namespace Gelim\EMConfig\Database\Models;
use Gelim\EMConfig\Casts\SerialCast;
use Illuminate\Database\Eloquent\Model;

class Config extends Model
{
    protected $table = "emconfig";
    protected $fillable = [
        'scope',
        'key',
        'value',
        'type',
        'extras'
    ];

    protected $casts = [
        "value" => ""
    ];

    /**
     * @return string[]
     */
    public function getCasts(): array
    {
        $casts = parent::getCasts();

        if (empty($this->type)) return $casts;

        switch (strtolower($this->type)) {
            case "array":
            case "any":
                $valueCast = SerialCast::class;
                break;
            case "multiline":
                $valueCast = "string";
                break;
            default:
                $valueCast = $this->type;
        }

        $casts['value'] = $valueCast??$casts['value'];
        return $casts;
    }


    public function scopeScope($query, $scope)
    {
        return $query->where("scope" , $scope);
    }
}
