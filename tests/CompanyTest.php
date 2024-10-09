<?php

use Dsw\Company\Company;
use Dsw\Company\Employee;
use PHPUnit\Framework\TestCase;

class CompanyTest extends TestCase{
  
  public function testCompanyAddEmployee()
  {
    $company = new Company();
    
    $this->assertCount(0, $company->getEmployees());
    
    $employee1 = new Employee("Pedro", 34, 3000);
    $company->addEmployees($employee1);
    $this->assertCount(1, $company->getEmployees());
    $this->assertSame($employee1, $company->getEmployees()[0]);
    
    $employee2 = new Employee("Dylan", 20, 1450);
    $company->addEmployees($employee2);
    $this->assertCount(2, $company->getEmployees());
    $this->assertSame($employee2, $company->getEmployees()[1]);

  }

  public function testCompanyRemoveEmployee(){
    $company = new Company();
    $company->addEmployees(new Employee("Pedro", 34, 3000));
    $dylan = new Employee("Dylan", 20, 5000);
    $company->addEmployees($dylan);
    $this->assertCount(2, $company->getEmployees());
    $this->assertContains($dylan, $company->getEmployees());
    $company->removeEmployee($dylan);
    $this->assertNotContains($dylan, $company->getEmployees(), "Dylan no debería estar en la compañía. ");
    $this->assertCount(1, $company->getEmployees());
    
  }

  public function testCalculateTotalSalary(){
    $company = new Company();
    $company->addEmployees(new Employee("Pedro", 34, 3000));
    $company->addEmployees(new Employee("Dylan", 20, 5000));
    $this->assertEquals(8000, $company->CalculateTotalSalary(), 'Error al calcular el salario Total');
  }
}