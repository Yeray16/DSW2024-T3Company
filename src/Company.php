<?php

namespace Dsw\Company;

class Company {
  
  private array $employees = [];
  
  public function getEmployees(): array
  {
    return $this->employees;
  }
  
  public function addEmployees(Employee $employee): void
  {
    array_push($this->employees, $employee);
  }

  public function removeEmployee(Employee $employee): void
  {
    $pos = array_search($employee, $this->employees);
    if($pos !== false){
      array_splice($this->employees, $pos, 1);
    }
  }
  public function calculateTotalSalary(): int{
    // $total = 0;
    // foreach($this->employees as $employee){
    //   $total += $employee->getSalary();
    // }
    // return $total;
    return array_reduce($this->employees, function($total, $employee){
      return $total +$employee->getSalary();
    }, 0);
  }
}