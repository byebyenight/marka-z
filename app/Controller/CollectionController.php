<?php
require '../PHPMailer-master/PHPMailerAutoload.php';
class CollectionController extends AppController {
 public function add(){
 if(isset($_POST)){  
 //$this->Collection->add($_POST['url'], $_POST['title']);
 $this->Collection->save($_POST);
 }
 $this->autoRender = false; 
}
 public function send() {
    if(isset($_POST)){
        $name = $_POST['name'];
        $problem = $_POST['problem'];
        $this->log("received" . $problem);
        $mail = new PHPMailer(); // create a new object
        $mail->IsSMTP(); // enable SMTP
        $mail->SMTPDebug = 1; // debugging: 1 = errors and messages, 2 = messages only
        $mail->SMTPAuth = true; // authentication enabled
        $mail->SMTPSecure = 'tls'; // secure transfer enabled REQUIRED for GMail
        $mail->Host = "smtp.gmail.com";
        $mail->Port = 587;
        $mail->IsHTML(true);
        $mail->Username = "xin.nju@gmail.com";
        $mail->Password = "fx1989computer";
        $mail->SetFrom("xin.nju@gmail.com");
        $mail->Subject = $name . " has solved a problem!";
        $mail->Body = "The problem is " . $problem . ". Let's do it!";
        $mail->AddAddress("7343559920@txt.att.net");
        $mail->AddAddress("4123541459@txt.att.net");
        $mail->AddAddress("4123541746@txt.att.net");
        if (!$mail->send()) {
            $this->log("not send " . $mail->ErrorInfo);
        }// Send!
        else {
            $this->log("sent");
        } 
    }
 $this->autoRender = false;
}
 public function index(){
 $urls = $this->Collection->find('all',
 array('order' => array('id' =>'desc')));
//print_r($urls);
 $this->set('urls', $urls);
 }
 public function validation(){

}
 public function inremains ($id) {
//$this->set('element', "piece1");
	
    $this->layout = 'inremains';
    if($id!=null){
		$this->set('element', "piece".$id);
	} else{
			
	}		

}
 public function processing ($id) {
    if ($id != null) {
        $this->set('element', 'piece'.$id);
    } else {
    }
 }
public function animation ($id) {
   $this->autoRender = false;
   $this->layout = 'animation';
   if ($id == "leaf") {
    $this->render("leaf");
   } else if ($id == "clock") {
    $this->layout = "animation-clock";
    $this->render("clock");
    
   }
    else {
    $this->render("black");
   }

}
public function saysomething () {

}
public function me() {
    $this->autoRender = false;
    $this->layout = null;
    $this->render('me');
}
}
?>

