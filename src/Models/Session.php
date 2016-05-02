<?php

namespace App;

use Illuminate\Database\Eloquent\Model as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Session extends Model
{
    use SoftDeletes;

	public $table = "sessions";
    
	protected $dates = ['deleted_at'];


	public $fillable = [
	    "parent_id",
		"name"
	];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        "parent_id" => "integer",
		"name" => "string"
    ];

	public static $rules = [
	    "name" => "required"
	];

    public function hasChild()
    {
        $s = Session::where('parent_id',$this->id)->get();
        if(count($s) > 0) {
            $teste = true;
        }else{
            $teste = false;
        }
        return $teste;
    }

    public function getChilds(){

        return $this->hasMany('\App\Session','parent_id');

    }

    public function hasPages()
    {
        $s = SessionPage::where('parent_id',$this->id)->get();
        if(count($s) > 0) {
            $teste = true;
        }else{
            $teste = false;
        }
        return $teste;
    }

    public function getPages(){

        return $this->hasMany('\App\SessionPage','parent_id');

    }

    public function printChilds($id)
    {
        $out="";
        $s = Session::where('parent_id',$id)->get();
        if(count($s)>0){
            $out.='<ul class="children">';
            foreach($s as $reg) {
                $out .= '    <li class="">';
                $out .= '        <a href="">'.$reg->name.'</a>';
                $out .= '        <span>
                             <a href="' . route("sessions.pages.index", [$reg->id]) . '"><button type="button" class="btn btn-xs btn-info"><i class="glyphicon glyphicon-edit"></i> Páginas</button> </a>
                             <a href="' . route("sessions.edit", [$reg->id]) . '"><button type="button" class="btn btn-xs btn-warning"><i class="glyphicon glyphicon-edit"></i> Editar</button> </a>
                             <a href="' . route("sessions.delete", [$reg->id]) . '" onclick="return confirm("Are you sure wants to delete this Session?")"><button type="button" class="btn btn-xs btn-danger"><i class="glyphicon glyphicon-remove"></i> Remover</button></a>
                           </span>';
                $out .= '    </li>';
            }
            $out.='</ul>';
        }

        return $out;
    }

    public function printChildsFront($id)
    {
        $out="";
        $s = Session::where('parent_id',$id)->get();
        if(count($s)>0){
            $out.='<ul class="dropdown-menu">';
            foreach($s as $reg) {
                $out .= '    <li class="dropdown-submenu">';
                $out .= '        <a href="">'.$reg->name.'</a>';
                $out .= $this->printPagesFront($reg->id);
                $out .= '    </li>';


            }
            $out .= $this->printPagesFront2($id);
            $out.='</ul>';
        }

        return $out;
    }

    public function printPagesFront($id)
    {
        $out="";
        $s = SessionPage::where('parent_id',$id)->get();
        if(count($s)>0){
            $out.='<ul class="dropdown-menu">';
            foreach($s as $reg) {
                $atag = "";

                if($reg->url){
                    $atag .= ' href="'.$reg->url.'" ';
                }else{
                    $atag .= ' href="/pagina/'.$reg->id.'" ';
                }

                if($reg->newpage){
                    $atag .= ' target="_blank" ';
                }

                $out .= '    <li class="">';
                $out .= '        <a '.$atag.'>'.$reg->name.'</a>';
                $out .= '    </li>';
            }
            $out.='</ul>';
        }

        return $out;
    }

    public function printPagesFront2($id)
    {
        $out="";
        $s = SessionPage::where('parent_id',$id)->get();
        if(count($s)>0){
            foreach($s as $reg) {
                $atag = "";

                if($reg->url){
                    $atag .= ' href="'.$reg->url.'" ';
                }else{
                    $atag .= ' href="/pagina/'.$reg->id.'" ';
                }

                if($reg->newpage){
                    $atag .= ' target="_blank" ';
                }

                $out .= '    <li class="">';
                $out .= '        <a '.$atag.'>'.$reg->name.'</a>';
                $out .= '    </li>';
            }
        }

        return $out;
    }

}
