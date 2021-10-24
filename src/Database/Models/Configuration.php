<?php
namespace Gelim\EMConfig\Database\Models;
use Gelim\EMConfig\Casts\SerialCast;
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
        "extras" => ""
    ];

    /**
     * @return string[]
     */
    public function getCasts(): array
    {
        $casts = parent::getCasts();

        if (empty($this->type)) return $casts;

        switch ($this->type) {
            case "array":
            case "any":
                $extraCast = SerialCast::class;
                break;

            default:
                $extraCast = $this->type;
        }

        $casts['extras'] = $extraCast??$casts['extras'];
        return $casts;
    }


    public function scopeScope($query, $scope)
    {
        return $query->where("scope" , $scope);
    }
}
