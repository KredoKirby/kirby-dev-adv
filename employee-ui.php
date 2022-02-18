<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EMPLOYEE</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <div class="card w-50 mx-auto mt-5">
            <div class="card-body">
                <form action="" method="post">
                    <div class="row mb-3">
                        <div class="col">
                            <label for="name" class="form-label">Name:</label>
                            <input type="text" name="name" id="name" class="form-control">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col">
                            <label for="" class="form-label">Position:</label>
                            <div class="form-check form-check-inline">
                                <input type="radio" name="position" id="staff" value="staff">
                                <label for="staff" class="form-check-label">Staff</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input type="radio" name="position" id="admin" value="admin">
                                <label for="admin" class="form-check-label">Admin</label>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col">
                            <label for="" class="form-label">Civil Status:</label>
                            <div class="form-check form-check-inline">
                                <input type="radio" name="civil_status" id="single" value="single">
                                <label for="single" class="form-check-label">Single</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input type="radio" name="civil_status" id="married" value="married">
                                <label for="married" class="form-check-label">Married</label>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col">
                            <label for="employment" class="form-label">Employment Status</label>
                            <select name="employment" id="employment" class="form-select">
                                <option hidden>Choose Employment Status:</option>
                                <option value="contractual">Contractual</option>
                                <option value="probationary">Probationary</option>
                                <option value="regular">Regular</option>
                            </select>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col">
                            <label for="hours">Number of Hours Worked:</label>
                            <input type="text" name="hours" id="hours" class="form-control">
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col">
                            <input type="submit" value="Calculate" name="calculate" class="form-control btn btn-success">
                        </div>
                    </div>
                </form>

                <?php
                    if(isset($_POST['calculate'])){
                        $name = $_POST['name'];
                        $position = $_POST['position'];
                        $civil_status = $_POST['civil_status'];
                        $employment = $_POST['employment'];
                        $hours = $_POST['hours'];

                        processData($name, $position, $civil_status, $employment, $hours);
                    }
                ?>

            </div>
        </div>
    </div>
</body>
</html>

<?php
    function processData($name, $position, $civil_status, $employment, $hours){
        require 'Employee.php';
            // CONSTRUCTOR
            // $employee = new Employee($name, $position, $civil_status, $employment, $hours);
            
            
            $employee = new Employee;
            $employee->setValues($name, $position, $civil_status, $employment, $hours);

            $gross_income = $employee->getGrossIncome();
            echo "Name: $name <br>";
            echo "Position: $position <br>";
            echo "Civil Status: $civil_status <br>";
            echo "Employment Status: $employment <br>";
            echo "Total Hours Worked: $hours <br>";
            echo "Regular Pay: ".$employee->computeRegularPay()."<br>";
            echo "Overtime Pay: ".$employee->computeOvertimePay()."<br>";
            echo "Gross Income: ".$employee->getGrossIncome()."<br>";
            echo "Health Care ($civil_status): ".$employee->getHealthCare()."<br>";
            echo "Tax: ".$employee->getTax($gross_income)."<br>";
            echo "Net Income: ".$employee->getNetIncome()."<br>";
    }

?>