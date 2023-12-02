<?php
namespace App\Filters;
use App\Filters\ApiFilter;
use Iluminate\Http\Request;

class StudentFilter extends ApiFilter{
    protected $safeParams = [
        'control_number' => ['eq'],
        'student_name' => ['eq'],
        'lastname' => ['eq'],
        'email' => ['eq'],
        'password' => ['eq'],
        'gender' => ['eq'],
        'birthdate' => ['eq'],
        'telephone' => ['eq'],
        'street' =>['eq'],
        'suburb' => ['eq'],
        'status' => ['eq'],
        'street' => ['eq'],
        'semester' => ['eq'],
        'role_id' => ['eq'],
        'town_id' => ['eq'],
        'career_id' => ['eq'],

    ];
    protected $columnMap = [
        'control_number' => 'control_number',
    ];
    protected $operatorMap = [
        'eq' => '=',
        'lt' => '<',
        'lte' => '<=',
        'gt' => '>',
        'gte' => '>=',
    ];


}