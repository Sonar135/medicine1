<?php
    include 'connect.php';


    
    function create_patient($conn, $email, $fname, $phone, $password, $confirm, $nationality, $dob, $gender, $records, $prefix){

        $user_type="patient";
  
        $insert= "INSERT INTO patients (name,  phone,  email,  password, user_type, prefix, medical_history, nationality, gender, date_birth) VALUES 
        (?,?,?,?,?,?,?,?,?,?)";   
        
      


        $stmt2=mysqli_stmt_init($conn);

        if(!mysqli_stmt_prepare($stmt2, $insert)){
            header("location: patient_auth.php?error=stmtfailed");
            exit();
        }
    
        
        $hashed_pwd=password_hash($password, PASSWORD_DEFAULT);

        mysqli_stmt_bind_param($stmt2, 'ssssssssss', $fname, $phone,  $email, $hashed_pwd, $user_type, $prefix, $records, $nationality, $gender, $dob );
        mysqli_stmt_execute($stmt2);
        mysqli_stmt_close($stmt2);
        
        header("location: patient_auth.php?error=success");
        exit();
    }



    function emptysignup($email, $fname,  $phone, $password, $confirm ){
        $result;
        if($email=="" or $fname==""  or $phone=="" or $password=="" or $confirm=="" ){
            $result= true;
        }
        else {
            $result=false;
        } 

        return $result;
    }

    function emptylogin($email, $password){
        $result;
        if($email=="" or $password==""){
            $result= true;
        }
        else {
            $result=false;
        } 

        return $result;
    }


    function invalid_password($password){
        // Check if password contains at least one uppercase letter, one lowercase letter, and one special character
        if (!preg_match('/[A-Z]/', $password) || // Check for at least one uppercase letter
            !preg_match('/[a-z]/', $password) || // Check for at least one lowercase letter
            !preg_match('/[^a-zA-Z0-9]/', $password)) { // Check for at least one special character
            return true; // Password does not meet the criteria
        } else {
            return false; // Password meets the criteria
        }
    }

    function invalid_email($email){
        $result;
        if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
            $result= true;
        }

        else{
            $result= false;
        }

        return $result;
    
    }


    function pwd_match($password, $confirm){
        $result;
        if($password !== $confirm){
            $result= true;
        }
        
        else{
            $result=false;
        }
        return $result;
    }

    function email_exists($conn, $email){
        $result;
    
        $query="SELECT * FROM patients WHERE email=?";
    
        $stmt=mysqli_stmt_init($conn);

        if(!mysqli_stmt_prepare($stmt, $query)){
            header("location: patient_auth.php?error=stmtfailed");
            exit();
        }
    
        
        mysqli_stmt_bind_param($stmt, "s", $email);
        mysqli_stmt_execute($stmt);
        $result= mysqli_stmt_get_result($stmt);
    
        if($row=mysqli_fetch_assoc($result)){
            return $row;
        }

        else{
            $result= false;
            return $result;
        }

        mysqli_stmt_close($stmt);
    }






    function matric_exists($conn, $matric){
        $result;
    
        $query="SELECT * FROM students WHERE matric=?";
    
        $stmt=mysqli_stmt_init($conn);

        if(!mysqli_stmt_prepare($stmt, $query)){
            header("location: patient_auth.php?error=stmtfailed");
            exit();
        }
    
        
        mysqli_stmt_bind_param($stmt, "s", $matric);
        mysqli_stmt_execute($stmt);
        $result= mysqli_stmt_get_result($stmt);
    
        if($row=mysqli_fetch_assoc($result)){
            return $row;
        }

        else{
            $result= false;
            return $result;
        }

        mysqli_stmt_close($stmt);
    }

    

    function login($conn, $matric, $password){
        $uidexist= email_exists($conn, $matric);

        if($uidexist===false){
            header("location: patient_auth.php?error=wrongLogin");
            exit();
        }

        $pwdHashed=$uidexist["password"];
        $checkedpwd=password_verify($password, $pwdHashed);

        if($checkedpwd===false){
            header("location: patient_auth.php?error=wrongLogin");
            exit();
        }

        else if($checkedpwd===true){
            session_start();

            $_SESSION["id"]=$uidexist["id"];
            $_SESSION["email"]=$uidexist["email"];
            $_SESSION["name"]=$uidexist["name"];
            $_SESSION['phone']=$uidexist['phone'];
            $_SESSION['user_type']=$uidexist['user_type'];
            $_SESSION['patient_id']=$uidexist['patient_id'];
 
          
     
   
         

            header("location: main.php");
            exit();
        }
    }

















    // creating the admin...............................................................................................................//////////////////////////




    function admin_email_exists($conn, $email){
        $result;
    
        $query="SELECT * FROM admins WHERE email=?";
    
        $stmt=mysqli_stmt_init($conn);

        if(!mysqli_stmt_prepare($stmt, $query)){
            header("location: admin_auth.php?error=stmtfailed");
            exit();
        }
    
        
        mysqli_stmt_bind_param($stmt, "s", $email);
        mysqli_stmt_execute($stmt);
        $result= mysqli_stmt_get_result($stmt);
    
        if($row=mysqli_fetch_assoc($result)){
            return $row;
        }

        else{
            $result= false;
            return $result;
        }

        mysqli_stmt_close($stmt);
    }


    function create_admin($conn, $email, $fname,  $phone, $password, $confirm){
        $user_type="admin";
  
        $insert= "INSERT INTO admins (name,  phone, email,  password, user_type) VALUES (?,?,?,?,?)";

        $stmt2=mysqli_stmt_init($conn);

        if(!mysqli_stmt_prepare($stmt2, $insert)){
            header("location: admin_auth.php?error=stmtfailed");
            exit();
        }
    
        
        $hashed_pwd=password_hash($password, PASSWORD_DEFAULT);

        mysqli_stmt_bind_param($stmt2, 'sssss', $fname, $phone,  $email, $hashed_pwd, $user_type);
        mysqli_stmt_execute($stmt2);
        mysqli_stmt_close($stmt2);
        
        header("location: admin_auth.php?error=success");
        exit();
    }


    function empty_ad_signup($email, $fname, $phone, $password, $confirm ){
        $result;
        if($email=="" or $fname=="" or  $phone=="" or $password=="" or $confirm=="" ){
            $result= true;
        }
        else {
            $result=false;
        } 

        return $result;
    }



    function admin_login($conn, $email, $password){
        $uidexist= admin_email_exists($conn, $email);

        if($uidexist===false){
            header("location: admin_auth.php?error=wrongLogin");
            exit();
        }

        $pwdHashed=$uidexist["password"];
        $checkedpwd=password_verify($password, $pwdHashed);

        if($checkedpwd===false){
            header("location: admin_auth.php?error=wrongLogin");
            exit();
        }

        else if($checkedpwd===true){
            session_start();

            $_SESSION["id"]=$uidexist["id"];
            $_SESSION["email"]=$uidexist["email"];
            $_SESSION['phone']=$uidexist['phone'];
            $_SESSION['user_type']=$uidexist['user_type'];
            $_SESSION["name"]=$uidexist["name"];
     
   
         

            header("location: doctors.php");
            exit();
        }
    }
















    // creating the coordinators...............................................................................................................//////////////////////////








    function doc_email_exists($conn, $email){
        $result;
    
        $query="SELECT * FROM doctors WHERE email=?";
    
        $stmt=mysqli_stmt_init($conn);

        if(!mysqli_stmt_prepare($stmt, $query)){
            header("location: add_doc.php?error=stmtfailed");
            exit();
        }
    
        
        mysqli_stmt_bind_param($stmt, "s", $email);
        mysqli_stmt_execute($stmt);
        $result= mysqli_stmt_get_result($stmt);
    
        if($row=mysqli_fetch_assoc($result)){
            return $row;
        }

        else{
            $result= false;
            return $result;
        }

        mysqli_stmt_close($stmt);
    }


    function create_doctor($conn, $email, $fname, $phone, $password, $confirm, $nationality, $dob, $gender, $prefix ){
        $user_type="doctor";
  
        $insert= "INSERT INTO doctors (name,  phone,  email,  password, user_type, prefix,  nationality, gender, date_birth) VALUES 
        (?,?,?,?,?,?,?,?,?)";   
        

        $stmt2=mysqli_stmt_init($conn);

        if(!mysqli_stmt_prepare($stmt2, $insert)){
            header("location: add_doc.php?error=stmtfailed");
            exit();
        }
    
        
        $hashed_pwd=password_hash($password, PASSWORD_DEFAULT);

        mysqli_stmt_bind_param($stmt2, 'sssssssss', $fname, $phone,  $email, $hashed_pwd, $user_type, $prefix, $nationality, $gender, $dob );
        mysqli_stmt_execute($stmt2);
        mysqli_stmt_close($stmt2);
        
        header("location: add_doc.php?error=success");
        exit();
    }


    function empty_doc_signup($email, $fname, $phone, $password, $confirm ){
        $result;
        if($email=="" or $fname=="" or  $phone=="" or $password=="" or $confirm=="" ){
            $result= true;
        }
        else {
            $result=false;
        } 

        return $result;
    }



    function doc_login($conn, $email, $password){
        $uidexist= doc_email_exists($conn, $email);

        if($uidexist===false){
            header("location: add_doc.php?error=wrongLogin");
            exit();
        }

        $pwdHashed=$uidexist["password"];
        $checkedpwd=password_verify($password, $pwdHashed);

        if($checkedpwd===false){
            header("location: add_doc.php?error=wrongLogin");
            exit();
        }

        else if($checkedpwd===true){
            session_start();

            $_SESSION["id"]=$uidexist["id"];
            $_SESSION["email"]=$uidexist["email"];
            $_SESSION['phone']=$uidexist['phone'];
            $_SESSION['user_type']=$uidexist['user_type'];
            $_SESSION["name"]=$uidexist["name"];
            $_SESSION["doctor_id"]=$uidexist["doctor_id"];
          
     
   
         

            header("location: doctor_appointments.php");
            exit();
        }
    }
?>