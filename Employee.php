<?php
    class Employee{
        private $name;
        private $position;
        private $civil_status;
        private $employment;
        private $total_hours;

        public function setValues($name, $position, $civil_status, $employment, $hours){
            $this->name = $name;
            $this->position = $position;
            $this->civil_status = $civil_status;
            $this->employment = $employment;
            $this->total_hours = $hours;
        }

        // CONSTRUCTOR
        // public function __construct($name, $position, $civil_status, $employment, $hours){
        //     $this->name = $name;
        //     $this->position = $position;
        //     $this->civil_status = $civil_status;
        //     $this->employment = $employment;
        //     $this->total_hours = $hours;
        // }

        public function computeRegularPay(){
            if($this->total_hours > 40){
                if($this->position == "staff"){
                    if($this->employment == "contractual"){
                        return (300/8) * 40;
                    }elseif($this->employment == "probationary"){
                        return (350/8) * 40;
                    }elseif($this->employment == "regular"){
                        return (400/8) * 40;
                    }
                }elseif($this->position == "admin"){
                    if($this->employment == "contractual"){
                        return (350/8) * 40;
                    }elseif($this->employment == "probationary"){
                        return (400/8) * 40;
                    }elseif($this->employment == "regular"){
                        return (500/8) * 40;
                    }
                }
            }else{
                if($this->position == "staff"){
                    if($this->employment == "contractual"){
                        return (300/8) * $this->total_hours;
                    }elseif($this->employment == "probationary"){
                        return (350/8) * $this->total_hours;
                    }elseif($this->employment == "regular"){
                        return (400/8) * $this->total_hours;
                    }
                }elseif($this->position == "admin"){
                    if($this->employment == "contractual"){
                        return (350/8) * $this->total_hours;
                    }elseif($this->employment == "probationary"){
                        return (400/8) * $this->total_hours;
                    }elseif($this->employment == "regular"){
                        return (500/8) * $this->total_hours;
                    }
                }
            }
        }

        public function computeOvertimePay(){
            if($this->total_hours > 40){
                $overtime = $this->total_hours - 40;
            }else{
                $overtime = 0;
            }

            if($this->position == "staff"){
                if($this->employment == "contractual"){
                    return $overtime * 10;
                }elseif($this->employment == "probationary"){
                    return $overtime * 25;
                }elseif($this->employment == "regular"){
                    return $overtime * 30;
                }
            }elseif($this->position == "admin"){
                if($this->employment == "contractual"){
                    return $overtime * 15;
                }elseif($this->employment == "probationary"){
                    return $overtime * 30;
                }elseif($this->employment == "regular"){
                    return $overtime * 40;
                }
            }
        }

        public function getHealthcare(){
            if($this->civil_status == "single"){
                return 200;
            }elseif($this->civil_status == "married"){
                return 75;
            }
        }


        public function getTax($gross_income){
            if($this->civil_status == "single"){
                if($gross_income <= 1000){
                    return 0;
                }else{
                    return $gross_income * 0.05;
                }
            }elseif($this->civil_status == "married"){
                if($gross_income <= 1500){
                    return 0;
                }else{
                    return $gross_income * 0.03;
                }
            }
        }

        // SIDE TOPIC
        public function getGrossIncome(){
            return $this->computeRegularPay() + $this->computeOvertimePay();
        }

        public function getNetIncome(){
            $regular_pay = $this->computeRegularPay();
            $overtime_pay = $this->computeOvertimePay();

            $gross_income = $regular_pay + $overtime_pay;

            $healthcare = $this->getHealthcare();
            $tax = $this->getTax($gross_income);
            // $net_income = $gross_income - ($healthcare + $tax);

            // return $net_income;

            return $gross_income - ($healthcare + $tax);
        }


    }
?>