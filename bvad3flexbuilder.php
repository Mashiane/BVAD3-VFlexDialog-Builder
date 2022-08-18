<?php header("Access-Control-Allow-Origin: *");$rest_json = file_get_contents("php://input");$_POST = json_decode($rest_json, true);$request='';if(isset($_POST['request'])){$request = $_POST['request'];$params = $_POST['params'];}if (!function_exists($request)) die("invalid request: '" . $request . "'"); 
$key = 'qkwjdiw239&&jdafweihbrhnan&^%$ggdnawhd4njshjwuuO'; 
	 
//ENCRYPT FUNCTION 
function encryptthis($data, $key) { 
	$encryption_key = base64_decode($key); 
	$iv = openssl_random_pseudo_bytes(openssl_cipher_iv_length('aes-256-cbc')); 
	$encrypted = openssl_encrypt($data, 'aes-256-cbc', $encryption_key, 0, $iv); 
	return base64_encode($encrypted . '::' . $iv); 
} 
 
//DECRYPT FUNCTION 
function decryptthis($data, $key) { 
	$encryption_key = base64_decode($key); 
	list($encrypted_data, $iv) = array_pad(explode('::', base64_decode($data), 2),2,null); 
	return openssl_decrypt($encrypted_data, 'aes-256-cbc', $encryption_key, 0, $iv); 
} 
 
function EmailSend($from, $to, $cc, $subject, $msg) { 
$hdr  = 'MIME-Version: 1.0' . "\r\n"; 
$hdr .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n"; 
$hdr .= 'X-Mailer:PHP/' . phpversion() . "\r\n"; 
$hdr .= "From:" . $from . "\r\n"; 
$extra = '-f '. $from; 
$hdr .= "Cc: " . $cc . "\r\n"; 
$response = (mail($to, $subject, $msg, $hdr, $extra)) ? "success" : "failure"; 
$output = json_encode(Array("response" => $response)); 
header('content-type: application/json; charset=utf-8'); 
echo($output); 
} 
 
    function BVAD3GUID($l) { 
    $guid = bin2hex(openssl_random_pseudo_bytes($l)); 
    echo($guid); 
    } 
$values = array_values($params);call_user_func_array($request, $values);?>