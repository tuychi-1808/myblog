<?php
function isAdmin () {
	global $conn ; 
    $q = $_SESSION['session_username'] ; 
	$isAdmin = $conn->prepare('SELECT user_level FROM usertbl WHERE username = :q');
    $isAdmin->execute(array('q' => $q));
    $adminResult = $isAdmin->fetchAll(); 
	foreach ($adminResult as $row):
	$userlevel = $row["user_level"];
    endforeach ; 
    return $userlevel ; 
	}	

	function getUserId () {
		global $conn ; 
		$q = $_SESSION['session_username'] ; 
		$getUserId = $conn->prepare('SELECT id FROM usertbl WHERE username = :q');
		$getUserId->execute(array('q' => $q));
		$userResult = $getUserId->fetchAll(); 
		foreach ($userResult as $row):
		$userid = $row["id"];
		endforeach ; 
		return $userid ; 
		}	

// function fullName () {
// 	global $con ; 
// 	$result365a = mysqli_query($con,"SELECT full_name FROM usertbl WHERE username = '".mysqli_real_escape_string($con,$_SESSION['session_username'])."'")   or die(mysqli_error($con));	
// 	while($row365a = mysqli_fetch_assoc( $result365a )) {
// 	$fullname = $row365a["full_name"];
	
// 			 }
// 			 return $fullname ; 
// 	}		
	
// function userName () {
// 	global $con ; 
// 	$result465 = mysqli_query($con,"SELECT full_name FROM usertbl WHERE username = '$_SESSION[session_username]'")   or die(mysqli_error($con));	
// 	while($row465 = mysqli_fetch_assoc( $result465 )) {
// 	$selectuserfullname = $row465["full_name"];
	
// 			 }
// 			 return $selectuserfullname ; 
// 	}
	
// 	function userorgName () {
// 	global $con ; 
// 	$result565 = mysqli_query($con,"SELECT org_name FROM usertbl WHERE username = '$_SESSION[session_username]'")   or die(mysqli_error($con));	
// 	while($row565 = mysqli_fetch_assoc( $result565 )) {
// 	$selectuserorgname = $row565["org_name"];
	
// 			 }
// 			 return $selectuserorgname ; 
// 	}


function clean($value = "") {
    $value = trim($value);
    $value = stripslashes($value);
    $value = strip_tags($value);
    $value = htmlspecialchars($value);    
    return $value;
}
// function real_escape($str){
// 	global $con;
// 	$escape = mysqli_real_escape_string($con,$str);	
// 	return $escape;
// }
// function incoming_num_rows () {
// 	global $con;
// 	$row_incoming = mysqli_query($con,"SELECT * FROM incoming ") ;
// 	$incoming_num_rows = mysqli_num_rows($row_incoming);
// 	echo $incoming_num_rows ; 
// }
// function outgoing_num_rows () { 
// 	global $con;
// 	$row_outgoing = mysqli_query($con,"SELECT * FROM outgoing ") ;
// 	$outgoing_num_rows = mysqli_num_rows($row_outgoing);
// 	echo $outgoing_num_rows ; 
// }
// function internal_num_rows () { 
// 	global $con;
// 	$row_internal = mysqli_query($con,"SELECT * FROM internal ") ;
// 	$internal_num_rows = mysqli_num_rows($row_internal);
// 	echo $internal_num_rows ; 
// }

// function sevens_num_rows () {
// 	global $con;
// 	$row_sevens = mysqli_query($con,"SELECT * FROM sevens ") ;
// 	$sevens_num_rows = mysqli_num_rows($row_sevens);
// 	echo $sevens_num_rows ; 
// }

function dateformat ($var=""){
	$var = strtotime($var) ; 
	$var = date('Y-m-d', $var);
	return $var ; 
}
function nodateformat ($var=""){
	$var = strtotime($var) ; 
	$var = date('d-m-Y', $var);
	return $var ; 
}

function timeFormatter ($var=""){
	$var = strtotime($var) ; 
	$var = date('d-m-Y H:i:s', $var);
	return $var ; 
}

function setLevel($lvl="") {

    if($lvl==1) {
        $lvl="Администратор" ;
    }
    elseif ($lvl==2) {

        $lvl="Продавец" ;
        
    }
    else {

        $lvl="Зав.склад" ;
        
    }
    return $lvl ; 
}


function setGaz($gaz="") {

    if($gaz==0) {
        $gaz="Не прекращено" ;
    }

    else {

        $gaz="Прекращено" ;
        
    }
    return $gaz ; 
}
function selectform ($sel=""){
	if ($sel=="1") {
	$sel = "Паломнический тур" ;
		}
	elseif ($sel=="2") {
	$sel ="Экскурсионный" ;
	 				}
	elseif ($sel=="3") {
	$sel = "Эко тур" ; 
						}
	elseif ($sel=="4") {
	$sel = "Гастрономический" ; 
						}
	else 				{
										 
	$sel = "Для этого тура не выбрана категория" ;  
						}								
	return $sel ; 
}
function weekday () {
    $weekday = date('w');
    $dateArr = array('', 'Пн', 'Вт','Ср','Чт','Пт','Сб','Вс');

    echo '<ul class="timer-weekdays mb-10">';
    for($i=1; $i<8; $i++){
        if($i == $weekday){
            echo '<li class="active"><a href="#" class="label label-danger">';
        }else{
            echo '<li><a href="#" class="label label-default">';
        }

        echo $dateArr[$i].'</a></li>';
     }
     echo '</ul>';
}

$permitted_chars = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
function generate_string($input, $strength = 16) {
    $input_length = strlen($input);
    $random_string = '';
    for($i = 0; $i < $strength; $i++) {
        $random_character = $input[mt_rand(0, $input_length - 1)];
        $random_string .= $random_character;
    }
    return $random_string;
}

function selectstatus ($status=""){
	if ($status=="1") {
	$status = "Активный" ;
					}	
	else				{
										 
	$status = "Закрыт" ;  
						}								
	return $status ; 
}


function deleteArticle($dataTable, $id) //Функция удаления из БД
{
	global $con;
	$query = "delete from $dataTable where id = '$id'";
	$result = mysqli_query($con, $query);
		
}
function showTitle() //Функция title
{
	$title = "Блог" ;
	echo  $title; 	
		
}

function showHead() //Функция title
{
	$title = "Блог ни о чем" ;
	echo  $title; 	
		
}

function showLink() //Функция link
{
	$url = "http://iproger.uz/ticket/insert_category.php" ;
	echo  $url; 	
		
}

function paystatusDetect ($pst=""){
	if ($pst=="onhold") {
	$pst = "<span class='badge bg-orange'>Тулов амалга оширилмаган</span>" ;
				  }
	elseif ($pst=="active") {
	$pst ="<span class='badge bg-teal'>Активлаштирилган</span>" ;
	 				}

	return $pst ; 
}

function ticketStatus ($ts=""){
	if ($ts=="0") {
	$pst = "<span class='badge bg-orange'>Очик тикет</span>" ;
				  }
	elseif ($ts=="1") {
	$pst ="<span class='badge bg-teal'>Ёпик тикет</span>" ;
	 				}

	return $pst ; 
}

function balance_transaction ($client_id="") {
	global $con ; 
	$result10000 = mysqli_query($con,"SELECT SUM(sum) AS totaltrans,client_id FROM transactions WHERE client_id = '".mysqli_real_escape_string($con,$client_id)."'")   or die(mysqli_error($con));	
	while($row10000 = mysqli_fetch_assoc( $result10000 )) {
	$balance_transaction = $row10000["totaltrans"];
	
			 }
			 return $balance_transaction ; 
	}
	
	function balance_expenses ($client_id="") {
	global $con ; 
	$result10001 = mysqli_query($con,"SELECT SUM(expenses_sum) AS totalexpe ,client_id FROM expenses WHERE client_id = '".mysqli_real_escape_string($con,$client_id)."'")   or die(mysqli_error($con));	
	while($row10001 = mysqli_fetch_assoc( $result10001 )) {
	$balance_expenses = $row10001["totalexpe"];
	
			 }
			 return $balance_expenses ; 
	}
	function generatePassword($length = 10){
	$chars =  'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz'.
            '0123456789!?';

	$str = '';
	$max = strlen($chars) - 1;

	for ($i=0; $i < $length; $i++)
    $str .= $chars[mt_rand(0, $max)];

			return $str;
}

function ticketStatusD ($ts=""){
	if ($ts=="0") {
	$ts = "<span class='badge bg-orange'>Очик турган тикет</span>" ;
				  }
	elseif ($ts=="1") {
	$ts ="<span class='badge bg-teal'>Ёпик тикет</span>" ;
	 				}

	return $ts ; 
}

function clientCloseTicket ($clclti=""){
	if ($clclti=="0") {
	$clclti = "" ;
				  }
	elseif ($clclti=="1") {
	$clclti ="<span class='badge bg-teal'>Тикет ёпилсин</span>" ;
	 				}

	return $clclti ; 
}

function empCloseTicket ($emclti=""){
	if ($emclti=="0") {
	$emclti = "" ;
				  }
	elseif ($emclti=="1") {
	$emclti ="<span class='badge bg-teal'>Тикет ёпилсин</span>" ;
	 				}

	return $emclti ; 
}


 // *********************************************************************


//*********************************************************************

//*********************************************************************

//*********************************************************************
function sendDetect ($sendstat=""){
	if ($sendstat=="0") {
$sendstat = "<button type='button' class='btn btn-warning btn-rounded waves-effect waves-light'>
                                                   <span class='btn-label'><i class='fa fa-warning'></i>
                                                   </span>Юборилмаган</button>" ;
	}	
	elseif ($sendstat=="1") {
$sendstat ="<button type='button' class='btn btn-success btn-rounded waves-effect waves-light'>
                                                   <span class='btn-label'><i class='fa fa-check'></i></span>
                                                   Юборилган
                                                </button>" ;
	}
	elseif ($sendstat=="2") {
$sendstat ="<button type='button' class='btn btn-info btn-rounded waves-effect waves-light'>
                                                   <span class='btn-label'><i class='fa fa-exclamation'></i>
                                                   </span>Ижроси таъминланган</button>" ;
	}
return $sendstat ; 
}


function gendetStatus ($gstatus=""){
	if ($gstatus=="male") {
	$gstatus = "Мужской" ;
					}	
	else				{
										 
	$gstatus = "Женский" ;  
						}								
	return $gstatus ; 
}

function roleDetect ($role=""){
	if ($role=="1") {
	$role = "Администратор" ;
					}	
	elseif	($role=="2")			{
										 
	$role = "МКМ работник" ;  
						}
	elseif	($role=="3")			{
										 
	$role = "Бухгалтер" ;  
						}
	else				{
										 
	$role = "Зав.склад" ;  
						}						
	return $role ; 
}
function paytype ($pm=""){
    if ($pm=="1") {
        $pm = "Накд тулов" ;
    }
    elseif($pm=="2")			{

        $pm = "Банк картаси" ;
    }
    else{

    $pm = "Перечисление" ;

}
    return $pm ;
}


function clienttype ($ct=""){
    if ($ct=="fizlico") {
        $ct = "Жисмоний шахс" ;
    }
    elseif ($ct=="yurlico") {
        $ct = "Юридик шахс" ;
    }
    return $ct ;
}
?>