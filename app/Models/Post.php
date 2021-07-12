<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use SoftDeletes;
    
    public function getByLimit(int $limit_count = 10)
    {
        // updated_atで降順に並べたあと、limitで件数制限をかける
        return $this->orderBy('updated_at', 'DESC')->limit($limit_count)->get();
    }
    
    public function getPaginateByLimit(int $limit_count = 10)
    {
        // updated_atで降順に並べたあと、limitで件数制限をかける
        return $this->orderBy('updated_at', 'DESC')->paginate($limit_count);
    }
    public function getPreviousUpdatetd_atBylimitPaginate($array){
        return $this->whereDate('updated_at', '>=', $array["year"] . "-0" . $array["month"] . "-" . $array["day"])->orderBy('updated_at', 'DESC')->paginate(10);
    }
    
    public function getTitleSearchBylimitPaginate($title){
        return $this->where("title", "LIKE", "%$title%")->orderBy('updated_at', 'DESC')->paginate(10);
    }
    
    protected $table = 'posts';
    
    protected $fillable = [
    'title',
    'body',
    ];
    
}
