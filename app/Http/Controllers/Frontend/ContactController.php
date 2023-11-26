<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Contact;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

class ContactController extends Controller
{
    //get Contact Data
    public function getContactData($id, $title){
		$contact_id = $id;
		
 		$datalist = Contact::where('id', '=', $id)->get();
		$data['title'] = '';
		$data['contact_info'] = '';
		$data['contact_form'] = '';
		$data['contact_map'] = '';
		$data['contact_map'] = '';
		$data['is_recaptcha'] = '';
		$data['is_publish'] = '';

		foreach($datalist as $row){
			$data['title'] = $row->title;
			$data['contact_info'] = json_decode($row->contact_info);
			$data['contact_form'] = json_decode($row->contact_form);
			$data['contact_map'] = json_decode($row->contact_map);
			$data['is_recaptcha'] = $row->is_recaptcha;
			$data['is_publish'] = $row->is_publish;
		}
		
        return view('frontend.contact', compact('contact_id', 'data'));
    }

	//Sent Message
    public function sentMessage(Request $request){
		$gtext = gtext();
		$res = array();

		$is_captcha = $request->input('is_captcha');
		
		if($is_captcha == 1){
			$secretkey = $gtext['secretkey'];
			$recaptcha = $gtext['is_recaptcha'];
			
			if($recaptcha == 1){
				$captcha = $request->input('g-recaptcha-response');
				if(!$captcha){
					$res['msgType'] = 'error';
					$res['msg'] = __('Please check the captcha');
					return response()->json($res);
				}

				$ip = $_SERVER['REMOTE_ADDR'];
				$url = 'https://www.google.com/recaptcha/api/siteverify?secret='.urlencode($secretkey).'&response='.urlencode($captcha).'&remoteip'.$ip;
				$response = file_get_contents($url);
				$responseKeys = json_decode($response, true);
				if($responseKeys["success"] == false) {
					$res['msgType'] = 'error';
					$res['msg'] = __('reCAPTCHA is not valid. Please try again!');
					return response()->json($res);
				}
			}
		}
		
		$contact_id = $request->input('contact_id');
		$contact_data = Contact::where('id', $contact_id)->first();
		$mailSubject = $contact_data->mail_subject;
		$title = $contact_data->title;
		$mail_subject = $request->input($mailSubject);

		$datalist = $request->input();

		$SendData = '';
		foreach($datalist as $key => $row){
			
			if($key == 'g-recaptcha-response'){
				continue;
			}
			
			if($key == 'contact_id'){
				continue;
			}
			
			if($key == 'is_captcha'){
				continue;
			}
			
			$key_replace = str_replace('-',' ', $key);
			$Name = ucwords($key_replace);
			$Value = $row;
			
			$SendData .= "<tr><td style='padding-bottom:7px;'><strong>".$Name.": </strong>".$Value."</td></tr>";
		}

		$base_url = route('frontend.contact', [$contact_id, str_slug($title)]);
		$site_name = $gtext['site_name'];
		$site_title = $gtext['site_title'];
		
		if($gtext['ismail'] == 1){
			try {

				require 'vendor/autoload.php';
				$mail = new PHPMailer(true);
				$mail->CharSet = "UTF-8";

				if($gtext['mailer'] == 'smtp'){
					$mail->SMTPDebug = 0; //0 = off (for production use), 1 = client messages, 2 = client and server messages
					$mail->isSMTP();
					$mail->Host       = $gtext['smtp_host'];
					$mail->SMTPAuth   = true;
					$mail->Username   = $gtext['smtp_username'];
					$mail->Password   = $gtext['smtp_password'];
					$mail->SMTPSecure = $gtext['smtp_security'];
					$mail->Port       = $gtext['smtp_port'];
				}

				//Get mail
				$mail->setFrom($gtext['from_mail'], $gtext['from_name']);
				$mail->addAddress($gtext['to_mail'], $gtext['to_name']);
				$mail->isHTML(true);
				$mail->CharSet = "utf-8";
				$mail->Subject = $mail_subject;
				$mail->Body = "<table style='background-color:#edf2f7;color:#111111;padding:40px 0px;line-height:24px;font-size:14px;' border='0' cellpadding='0' cellspacing='0' width='100%'>	
								<tr>
									<td>
										<table style='background-color:#fff;max-width:600px;margin:0 auto;padding:30px;' border='0' cellpadding='0' cellspacing='0' width='100%'>
											".$SendData."
											<tr><td style='padding-top:50px;'>Thank you!</td></tr>
											<tr><td style='padding-top:5px;padding-bottom:40px;'><strong>".$site_name." - ".$site_title."</strong></td></tr>
											<tr><td style='padding-top:10px;border-top:1px solid #ddd;'>This e-mail was sent from a contact form on ".$base_url."</td></tr>
										</table>
									</td>
								</tr>
							</table>";
				$mail->send();
				
				$res['msgType'] = 'success';
				$res['msg'] = __('Your message has been delivered');
				return response()->json($res);
				
			} catch (Exception $e) {
				$res['msgType'] = 'error';
				$res['msg'] = __('Oops! Message could not be sent. Please try again.');
				return response()->json($res);
			}
		}else{
			$res['msgType'] = 'error';
			$res['msg'] = __('Oops! Message could not be sent. Please try again.');
			return response()->json($res);
		}
    }
}
