<?php
namespace App\Filters;
use Illuminate\Http\Request;

class ApiFilter{
    /*almacena los parámetros seguros*/
    protected $safeParams = [];
    /*almacena el mapeo de columnas*/
    protected $columnMap = [];
    /*almacena el mapeo de operadores*/
    protected $operatorMap = [];

    /*se crea un método para transformar la solicitud del filtro, permitiendo el acceso
    a los parámetros de la URL, datos del formulario,etc*/
    public function transform(Request $request){
        $eloQuery = [];
        foreach($this->safeParams as $parm => $operators){
          $query = $request->query($parm);
          if (!isset($query)){
              continue;
          }
          $column = $this->columnMap[$parm] ?? $parm;
          foreach($operators as $operator){
              if(isset($query[$operator])){
                  $eloQuery[] = [$column, $this->operatorMap[$operator], $query[$operator]];
              }
          }
        }
        return $eloQuery;
    }



}
    



