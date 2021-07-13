<?php

$update = '';
$id = '';
$empid = '';
$bonus = '';

/* Insert Employee */
if(isset($_POST['save'])){

  include 'db_conn_inc.php';

  $image = $_FILES['file']['name'];
  $fname = $_POST['fname'];
  $lname = $_POST['lname'];
  $accno = $_POST['accno'];
  $bank = $_POST['bank'];
  $nic = $_POST['nic'];
  $dob = $_POST['date'];
  $designation = $_POST['designation'];
  $number = $_POST['number'];
  $email = $_POST['email'];
  $adr = $_POST['address'];

  //checking empty inputs
  if(empty($image) || empty($fname) || empty($lname) || empty($accno) || empty($bank) || empty($nic) || empty($dob) || empty($designation) || empty($number) || empty($email) || empty($adr)){
    header("Location: ../addEmployee.php?save=empty_invalid&image=$image&fname=$fname&lname=$lname&accno=$accno&bank=$bank&nic=$nic&date=$dob&designation=$designation&number=$number&email=$email&address=$adr");
    exit();
  }else {
    //cheking for valid first name
    if (!preg_match("/^[a-zA-Z ]*$/", $fname)) {
      header("Location: ../addEmployee.php?save=fname_invalid&image=$image&lname=$lname&accno=$accno&bank=$bank&nic=$nic&date=$dob&designation=$designation&number=$number&email=$email&address=$adr");
      exit();
    }else{
      //checking for valid last name
      if(!preg_match("/^[a-zA-Z ]*$/", $lname)){
        header("Location: ../addEmployee.php?save=lname_invalid&image=$image&fname=$fname&accno=$accno&bank=$bank&nic=$nic&date=$dob&designation=$designation&number=$number&email=$email&address=$adr");
        exit();
      }else {
        //checking valid email
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
          header("Location: ../addEmployee.php?save=email_invalid&image=$image&fname=$fname&lname=$lname&accno=$accno&bank=$bank&nic=$nic&date=$dob&designation=$designation&number=$number&address=$adr");
          exit();
        }else{
          $sql = "SELECT * FROM employee WHERE nic=$nic";
          $result = mysqli_query($conn, $sql);
          $checkResult = mysqli_num_rows($result);

          //check existing
          if($checkResult > 0){
            header("Location: ../addEmployee.php?save=user_exists&image=$image&fname=$fname&lname=$lname&accno=$accno&bank=$bank&nic=$nic&date=$dob&designation=$designation&number=$number&email=$email&address=$adr");
            exit();
          }else{
            //check the telephone number
            if(!preg_match("/^[0-9]*$/", $number) || strlen($number) != 10){
              header("Location: ../addEmployee.php?save=mobile_invalid&image=$image&fname=$fname&lname=$lname&accno=$accno&bank=$bank&nic=$nic&date=$dob&designation=$designation&email=$email&address=$adr");
              exit();
            }else {
              $sql=mysqli_query($conn,"INSERT INTO employee (image, first_name, last_name, bank_acc_no, bank, nic, dob, designation, telephone_number, email, address) VALUES('$image', '$fname', '$lname', '$accno', '$bank', '$nic', '$dob', '$designation', '$number', '$email', '$adr')");

              if($sql){
                $path='../images/';
                move_uploaded_file($_FILES["file"]['tmp_name'],$path.$image);
                header("Location: ../addEmployee.php?save=success");
                exit();
              }else {
                header("Location: ../addEmployee.php?save=unsuccess");
                exit();
              }
            }
          }
        }
      }
    }
  }

  /*$sql=mysqli_query($conn,"INSERT INTO employee (image, first_name, last_name, bank_acc_no, bank, nic, dob, designation, telephone_number, email, address) VALUES('$image', '$fname', '$lname', '$accno', '$bank', '$nic', '$dob', '$designation', '$number', '$email', '$adr')");

  if($sql){
    $path='../images/';
    move_uploaded_file($_FILES["file"]['tmp_name'],$path.$image);
    header("Location: ../addEmployee.php?save=success");
    exit();
  }else {
    header("Location: ../addEmployee.php?save=unsuccess");
    exit();
  }*/

  //header("Location: ../addEmployee.php");

}

/* delete GET from list */
if(isset($_GET['delete'])){

  include 'db_conn_inc.php';
  $id = $_GET['delete'];

  $sql=mysqli_query($conn,"DELETE FROM employee WHERE employee_id='$id'");

  if($sql){
    header("Location: ../employeelist.php?delete=success");
    exit();
  }else {
    header("Location: ../employeelist.php?delete=unsuccess");
    exit();
  }

}

/* Delete POST from progile.php */
if (isset($_POST['delete1'])) {

  include 'db_conn_inc.php';

  $id = $_POST['id'];

  $sql = mysqli_query($conn,"DELETE FROM employee WHERE employee_id=$id");

  if($sql){
    header("Location: ../profile.php?delete1=success");
    exit();
  }else {
    header("Location: ../profile.php?delete1=unsuccess");
    exit();
  }

}

/* Update Employee fromprofil.php */
if(isset($_POST['update'])){
  include 'db_conn_inc.php';
  $id = $_POST['id'];

  $image = $_FILES['file']['name'];
  $fname = $_POST['fname'];
  $lname = $_POST['lname'];
  $accno = $_POST['accno'];
  $bank = $_POST['bank'];
  $nic = $_POST['nic'];
  $dob = $_POST['date'];
  $designation = $_POST['designation'];
  $number = $_POST['number'];
  $email = $_POST['email'];
  $adr = $_POST['address'];

  //checking empty inputs
  if(empty($image) || empty($fname) || empty($lname) || empty($accno) || empty($bank) || empty($nic) || empty($dob) || empty($designation) || empty($number) || empty($email) || empty($adr)){
    header("Location: ../profile.php?update=empty&id=$id&image=$image&fname=$fname&lname=$lname&accno=$accno&bank=$bank&nic=$nic&date=$dob&designation=$designation&number=$number&email=$email&address=$adr");
    exit();
  }else {
    //cheking for valid first name
    if (!preg_match("/^[a-zA-Z ]*$/", $fname)) {
      header("Location: ../profile.php?update=fname_invalid&id=$id&image=$image&lname=$lname&accno=$accno&bank=$bank&nic=$nic&date=$dob&designation=$designation&number=$number&email=$email&address=$adr");
      exit();
    }else{
      //checking for valid last name
      if(!preg_match("/^[a-zA-Z ]*$/", $lname)){
        header("Location: ../profile.php?update=lname_invalid&id=$id&image=$image&fname=$fname&accno=$accno&bank=$bank&nic=$nic&date=$dob&designation=$designation&number=$number&email=$email&address=$adr");
        exit();
      }else {
        //checking valid email
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
          header("Location: ../profile.php?update=email_invalid&id=$id&image=$image&fname=$fname&lname=$lname&accno=$accno&bank=$bank&nic=$nic&date=$dob&designation=$designation&number=$number&address=$adr");
          exit();
        }else{
          $sql = "SELECT * FROM employee WHERE fname='$fname' AND lname='$lname'";
          $result = mysqli_query($conn, $sql);
          $checkResult = mysqli_num_rows($result);

          //check existing
          if($checkResult > 0){
            header("Location: ../profile.php?update=user_exists&id=$id&image=$image&fname=$fname&lname=$lname&accno=$accno&bank=$bank&nic=$nic&date=$dob&designation=$designation&number=$number&email=$email&address=$adr");
            exit();
          }else{
            //check the telephone number
            if(!preg_match("/^[0-9]*$/", $number) || strlen($number) != 10){
              header("Location: ../profile.php?update=mobile_invalid&id=$id&image=$image&fname=$fname&lname=$lname&accno=$accno&bank=$bank&nic=$nic&date=$dob&designation=$designation&email=$email&address=$adr");
              exit();
            }else {
              $query="UPDATE employee SET image='$image', first_name='$fname', last_name='$lname', bank_acc_no='$accno', bank='$bank', nic='$nic', dob='$dob', designation='$designation', telephone_number='$number', email='$email', address='$adr' WHERE employee_id = $id";

              $result = mysqli_query($conn,$query);

              if($result){
                $path='../images/';
                move_uploaded_file($_FILES["file"]['tmp_name'],$path.$image);
                header("Location: ../profile.php?update=success");
                exit();
              }else {
                header("Location: ../profile.php?update=unsuccess");
                exit();
              }
            }
          }
        }
      }
    }
  }





  /*$query="UPDATE employee SET image='$image', first_name='$fname', last_name='$lname', bank_acc_no='$accno', bank='$bank', nic='$nic', dob='$dob', designation='$designation', telephone_number='$number', email='$email', address='$adr' WHERE employee_id = '$id'";

  $result = mysqli_query($conn,$query);

  if($result){
    $path='../images/';
    move_uploaded_file($_FILES["file"]['tmp_name'],$path.$image);
    header("Location: ../profile.php?update=success");
    exit();
  }else {
    header("Location: ../profile.php?update=unsuccess");
    exit();
  }*/

}

//Insert driver
if(isset($_POST['add'])){
  include 'db_conn_inc.php';

  $did = $_POST['did'];
  $nodelivery = $_POST['num'];

  $query ="INSERT INTO driver (driver_id, no_of_delivery) VALUES ('$did', '$nodelivery')";

  $result = mysqli_query($conn,$query);

  if($result){
    header("Location: ../driver.php?add=success");
    exit();
  }else {
    header("Location: ../driver.php?add=unsuccess");
    exit();
  }

}

//Insert Helper
if(isset($_POST['add2'])){
  include 'db_conn_inc.php';

  $sid = $_POST['did'];
  $attendance = $_POST['num'];

  $query ="INSERT INTO helper (helper_id, attendance) VALUES ('$sid', '$attendance')";

  $result = mysqli_query($conn,$query);

  if($result){
    header("Location: ../helper.php?add2=success");
    exit();
  }else {
    header("Location: ../helper.php?add2=unsuccess");
    exit();
  }

}

//Insert Salary
if (isset($_POST['add3'])) {
include 'db_conn_inc.php';


$bonus = $_POST['bonus'];
$empid = $_POST['empid'];
$designation = $_POST['designation'];

if($designation == 'Admin'){
  $frequency = 'Monthly';
  $basicsalary = 70000;

  $netsalary = $basicsalary + $bonus;
}elseif ($designation == 'Helper') {
  $frequency = 'Daily';
  $basicsalary = 1000;
  $attendance = 0;

  $query = "SELECT attendance FROM helper WHERE helper_id = $empid";
  $res = mysqli_query($conn,$query);
  while($num = mysqli_fetch_assoc($res)){
    $attendance = $num['attendance'];
  }

  $netsalary = ($basicsalary * $attendance) + $bonus;

}else if($designation == 'Driver'){
  $frequency = 'Daily';
  $basicsalary = 1500;
  $nodelivery = 0;

  $query = "SELECT no_of_delivery FROM driver WHERE driver_id = $empid";
  $res = mysqli_query($conn,$query);
  while($number = mysqli_fetch_array($res)){
      $nodelivery = $number['no_of_delivery'];
  }


  $netsalary = ($basicsalary * $nodelivery) + $bonus;
}



$query1 = "INSERT INTO salary (basic_salary, salary_frequency, bonus, net_salary, employee_id) VALUES ($basicsalary, '$frequency', $bonus, $netsalary, $empid)";

$result = mysqli_query($conn,$query1);

if($result){
  header("Location: ../salary.php?add3=success");
  exit();
}else {
  header("Location: ../salary.php?add3=unsuccess");
  exit();
}


}

//salary table delete salary_table.php
if(isset($_GET['delete2'])){

  include 'db_conn_inc.php';

  $id = $_GET['delete2'];

  $sql = "DELETE FROM salary WHERE salary_id=$id";
  $result = mysqli_query($conn,$sql);

  if($result){
    header("Location: ../salary_table.php?delete2=success");
    exit();
  }else{
    header("Location: ../salary_table.php?delete2=unsuccess");
  }

}

//Salary details sent to the salary.php
if(isset($_GET['edit2'])){
  include 'db_conn_inc.php';

  $id = $_GET['edit2'];
  $update = true;

  $sql = "SELECT* FROM salary WHERE salary_id=$id";
  $result = mysqli_query($conn,$sql);


    $row = mysqli_fetch_array($result);
    $id = $row['salary_id'];
    $basic = $row['basic_salary'];
    $frequency = $row['salary_frequency'];
    $bonus = $row['bonus'];
    $netsalary = $row['net_salary'];
    $empid = $row['employee_id'];

}

//update salary records
if (isset($_POST['update2'])) {
  include 'db_conn_inc.php';
  $id = $_POST['id'];
  $bonus = $_POST['bonus'];
  $empid = $_POST['empid'];
  $designation = $_POST['designation'];

  if($designation == 'Admin'){
    $frequency = 'Monthly';
    $basicsalary = 70000;

    $netsalary = $basicsalary + $bonus;
  }elseif ($designation == 'Helper') {
    $frequency = 'Daily';
    $basicsalary = 1000;
    $attendance = 0;

    $query = "SELECT attendance FROM helper WHERE helper_id = $empid";
    $res = mysqli_query($conn,$query);
    while($num = mysqli_fetch_assoc($res)){
      $attendance = $num['attendance'];
    }

    $netsalary = ($basicsalary * $attendance) + $bonus;

  }else if($designation == 'Driver'){
    $frequency = 'Daily';
    $basicsalary = 1500;
    $nodelivery = 0;

    $query = "SELECT no_of_delivery FROM driver WHERE driver_id = $empid";
    $res = mysqli_query($conn,$query);
    while($number = mysqli_fetch_array($res)){
        $nodelivery = $number['no_of_delivery'];
    }


    $netsalary = ($basicsalary * $nodelivery) + $bonus;
  }

  $sql = "UPDATE salary SET basic_salary=$basicsalary, salary_frequency='$frequency', bonus='$bonus', net_salary='$netsalary', employee_id='$empid' WHERE salary_id=$id ";

  $result = mysqli_query($conn,$sql);

  if($result){
    header("Location: ../salary.php?add3=update");
    exit();
  }else {
    header("Location: ../salary.php?add3=not_updated");
    exit();
  }
}

?>
