<?php
/**
 * *****************************************************************
 * @author Miller Juma
 * @date 20,April 2020
 * @time 12:28:34pm
 * @ide Vscode
 * ******************************************************************
 */

 /*
 |  ******************************************************************
 |  Mpesa API for LIPA NA MPESA
 |
 |********************************************************************
 */

/**
 * *******************************************************************
 * 
 * 
 * 
 * @var $consumer_key
 * @var $consumer_secret
 * @var $auth_url
 * @var $register_url
 * @var $stkpush_url
 * @var $credentials ----base64 token
 * 
 * *********************************************************************
 */



 $phone=$_POST['phone'];
 $amount=$_POST['amount'];
   



 $auth_url          ='https://sandbox.safaricom.co.ke/oauth/v1/generate?grant_type=client_credentials';
 $stkpush_url       ='https://sandbox.safaricom.co.ke/mpesa/stkpush/v1/processrequest';

 $consumer_key      ='kxoUQBE0sqwcuAfCDcsoWo1AD1ZEHmfk';
 $consumer_secret   ='uAKVTceQGLIYzWgA';
 $credentials       =base64_encode($consumer_key.':'.$consumer_secret);

 /**
  * using the PHP curl library
  * initialise the curl then set options
  * @var $header
  */
  $header=[
    'Authorization: Basic '.$credentials
  ];

  $ch=curl_init();
  curl_setopt($ch,CURLOPT_URL,$auth_url);
  curl_setopt($ch,CURLOPT_HTTPHEADER,$header);
  curl_setopt($ch,CURLOPT_HEADER,false);
  curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
  curl_setopt($ch,CURLOPT_SSL_VERIFYPEER,false);

  $curl_response=curl_exec($ch);
  /**
   * remember access_token and 3599 are the output
   * our main interest is token,so get the token only
   */
  $access_token =json_decode($curl_response)->access_token;

  /**
   * ****************************************************************
   * 
   * Now implement the stk push api
   * get the url stk push defined above
   * 
   * ****************************************************************
   */
  curl_setopt($ch,CURLOPT_URL,$stkpush_url);
  curl_setopt($ch,CURLOPT_HTTPHEADER,array('Content-Type:application/json','Authorization:Bearer '.$access_token));
  /**
   * post data
   */
  $timestamp=date('YmdHis');
  $passkey='bfb279f9aa9bdbcf158e97dd71a467cd2e0c893059b10f78e6b72ada1ed2c919';
  $shortCode=174379;
  $password=$shortCode.$passkey.$timestamp;
  $password=base64_encode($password);

  $curl_post_data=[
    'BusinessShortCode'=>'174379',
    'Password'      =>$password,
    'Timestamp'     =>$timestamp,
    'TransactionType'=>'CustomerPayBillOnline',
    'Amount'        => $amount,
    'PartyA'         =>$phone,
    'PartyB'        =>'174379',
    'PhoneNumber'   =>$phone,
    'CallBackURL'   =>'https://d4c7c1d3.ngrok.io/confirmation.php',
    'AccountReference'=>'Kajiado Tax',
    'TransactionDesc'=>'Testings'
  ];

  $data_string=json_encode($curl_post_data);
  curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
  curl_setopt($ch,CURLOPT_POST,true);
  curl_setopt($ch,CURLOPT_POSTFIELDS,$data_string);

  $curl_response=curl_exec($ch);
  print_r($curl_response);

  include('db.php');
  $sql = "INSERT INTO mpesa (Timestamp, Amount, PhoneNumber)
  VALUES ('$timestamp', '$amount', '$phone')";
  $result = mysqli_query($mysqli, $sql);
  ?>

<script language="javascript">
function Clickheretoprint()
{ 
  var disp_setting="toolbar=yes,location=no,directories=yes,menubar=yes,"; 
      disp_setting+="scrollbars=yes,widtd=900, height=400, left=100, top=25"; 
  var content_vlue = document.getElementById("print_content").innerHTML; 
  
  var docprint=window.open("","",disp_setting); 
   docprint.document.open(); 
   docprint.document.write('<html><head><title>List of Passer</title>'); 
   docprint.document.write('</head><body onLoad="self.print()" style="widtd: 900px; font-size:16px; font-family:arial;">');          
   docprint.document.write(content_vlue);          
   docprint.document.write('</body></html>'); 
   docprint.document.close(); 
   docprint.focus(); 
}
</script>
<a href="javascript:Clickheretoprint()">Print</a>
<div id="print_content">
<?php
include('db.php');
  $sql = "SELECT * FROM mpesa ";
		$result = mysqli_query($mysqli, $sql);
	while($row = mysqli_fetch_array($result))
	{

	echo 'Land ID: '.$row['id'].'<br>';
	echo 'Time: '.$row['Timestamp'].'<br>';
	echo 'Amount: '.$row['Amount'].'<br>';
	echo 'Paid By: '.$row['PhoneNumber'].'<br>';
	}
?>
</div>