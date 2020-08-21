<?php

defined('_ADF') or exit('Restricted Access');

class AccessToken extends Controller {
    public function index() {
        if(isset($_POST["username"]) && !empty($_POST["username"]) && $_SERVER['REQUEST_METHOD'] === 'POST')
        {
            if(!NoCSRF::check('csrf_token', $_POST, 60*10)) return header("Location: ./accessToken");
            $uname = $this->xss->getPostValue("username");
            $userD = User::genToken($uname);
            if(!empty($userD["mail"]))
            {
                $mail = new PHPMailer\PHPMailer\PHPMailer();

                $mail->IsSMTP();
                $mail->SMTPAuth     = true;
                $mail->Host         = 'smtp.mailtrap.io';
                $mail->Port         = 25;
                $mail->Username     = "34aaba8de7dec7";
                $mail->Password     = "af3755445aa54d";
                $mail->setFrom('recaror246@delotti.com');
                $mail->addAddress($userD["mail"]);
                $mail->Subject = 'Cambio de Contraseña';
                $mail->isHTML(true);
          
                $mail->Body = '<html>
                <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
                <head>
                <title>Hyaxe V | Mail</title>
                <style type="text/css">
                .ReadMsgBody {width: 100%;}
                .ExternalClass {width: 100%;}
                .mobile {display: none;overflow: hidden;visibility:hidden;}
                strong{font-weight: bold;}
                
                    @media only screen and (max-width: 479px){
                        
                         td[class="desktop"], table[class="desktop"] {
                             display: none !important;
                         }
                         
                         td[class="mobile_only"], table[class="mobile_only"], img[class="mobile_only"], div[class="mobile_only"], tr[class="mobile_only"] {
                            display: block !important;
                             width: auto !important;
                              overflow: visible !important;
                            height: auto !important;
                            max-height: inherit !important;
                            font-size: 15px !important;
                            line-height: 21px !important;
                            visibility: visible !important;
                         }		 
                         
                         img[class="mobile_header"] { 
                             width: 320px !important;
                            height: 243px !important;
                            display: block !important; 			
                              overflow: visible !important;
                            visibility: visible !important;}
                         
                         td[class="full_width"], table[class="full_width"] {
                              width: 320px !important;
                         }
                        
                         td[class="medium_width"], table[class="medium_width"] {
                              width: 272px !important;
                         }
                              
                         td[class="intro_text"], table[class="intro_text"] {
                             font-size: 14px !important;
                            line-height: 20px !important;
                         }
                        
                    }
                </style>
                
                </head>
                
                <body bgcolor="#f5f5f5" style="background-color:#f5f5f5; margin:0; padding:0;-webkit-font-smoothing: antialiased;width:100% !important;-webkit-text-size-adjust:none;" topmargin="0">
                
                <table align="center" width="100%" border="0" cellpadding="0" cellspacing="0">
                    <tr>  
                       <td height="12" bgcolor="#f5f5f5" style="font-size: 0px; line-height: 0px;">&nbsp;</td>
                    </tr>
                </table>
                
                <table width="100%" bgcolor="#f5f5f5" style="background-color:#f5f5f5;" border="0" cellpadding="0" cellspacing="0">
                  <tr>
                    <td>&nbsp;</td>
                
                    <td class="full_width" width="650" align="center" style="border-left:1px solid #d8d8d8; border-right:1px solid #d8d8d8; border-bottom:1px solid #d8d8d8; border-top:1px solid #d8d8d8;background-color: #ffffff; padding-bottom: 30px;">
                      
                      <table align="center" width="100%" border="0" cellpadding="0" cellspacing="0">
                        <tr>
                          <td class="desktop"><a target="_blank" href="#"><img width="650" vspace="0" hspace="0" border="0" height="400" style="display:block; vertical-align:top;" src="http://placehold.it/1300x800.jpg" alt="Headline here"></a></td>
                          <td class="mobile_only" style="width:0; overflow:hidden; display:none;visibility:hidden;"><a target="_blank" href="#"><img width="320" vspace="0" hspace="0" border="0" height="243" style="width:0; overflow:hidden; display:none;visibility:hidden;" class="mobile_header" src="http://placehold.it/640x486.jpg" alt="Headline Here"></a></td>
                        </tr>
                     </table>
                    
                     <table align="center" width="100%" border="0" cellpadding="0" cellspacing="0">
                        <tr>  
                           <td height="24" style="font-size: 0px; line-height: 0px;">&nbsp;</td>
                        </tr>
                     </table>
                
                      <table align="center" width="100%" border="0" cellpadding="0" cellspacing="0">
                        <tr>  
                           <td height="24" style="font-size: 0px; line-height: 0px;">&nbsp;</td>
                        </tr>
                      </table>  
                           
                        <table class="medium_width" align="center" width="100%" border="0" cellpadding="0" cellspacing="0">
                         <tr>      
                          <td class="desktop" width="67" style="padding-top:18px;">&nbsp;</td>
                          <td style="border-top: 1px solid #d9d9d9; color:#333333; font-family: Helvetica, sans-serif;text-align:left; font-size:14px; line-height:20px; padding-top:18px; padding-bottom:18px;">
                            <strong>Un usuario generó un token de acceso para tu cuenta de Hyaxe V:</strong><br>
                            IP: '.$userD["ip"].'<br/><br/>
                            Token: '.$userD["accessToken"].'<br/><br/>
                            Navegador: '.$userD["userBrowser"].'<br/><br/>
                            Nombre de Usuario: '.$userD["name"].'<br/><br/>
                         </td>          
                         <td class="desktop" width="34" style="border-top: 1px solid #d9d9d9;padding-top:18px;">&nbsp;</td>
                         <td class="desktop" style="border-top: 1px solid #d9d9d9; padding-top:18px; padding-bottom:18px;"><img alt="Image4" src="http://placehold.it/294x166.jpg" width="147" height="83" border="0" hspace="0" vspace="0" style="display:block; vertical-align:top;"></td>
                         <td class="desktop" width="67" style="padding-top:18px;">&nbsp;</td>
                        </tr>
                       </table>   
                           
                      <table class="medium_width" align="center" width="100%" border="0" cellpadding="0" cellspacing="0">
                        <tr>      
                          <td class="desktop" width="67" style="padding-top:12px;">&nbsp;</td> 
                          <td align="right" valign="top" style="border-top:1px solid #d9d9d9; padding-top:12px;">
                                  <table width="200" border="0" cellpadding="0" cellspacing="0">
                                 <tr>
                                    <td style="color:#333333; font-family: Helvetica, sans-serif;text-align:left; font-size:13px; line-height:15px;">Redes Sociales</td>
                                    <td valign="top" style="color:#006699; font-family: Helvetica, sans-serif;text-align:left; font-size:12px; line-height:16px;">
                                        <table width="66" align="right" border="0" cellpadding="0" cellspacing="0">
                                           <tr>
                                              <td width="24"><a href="https://discord.gg/zQxbXKt" target="_blank"><span width="16" height="16" border="0" hspace="0" vspace="0" style="display:block; vertical-align:top;">
                                                <svg aria-hidden="false" width="16" height="16" viewBox="0 0 28 20"><path fill="currentColor" d="M20.6644 20C20.6644 20 19.8014 18.9762 19.0822 18.0714C22.2226 17.1905 23.4212 15.2381 23.4212 15.2381C22.4384 15.881 21.5034 16.3334 20.6644 16.6429C19.4658 17.1429 18.3151 17.4762 17.1884 17.6667C14.887 18.0953 12.7774 17.9762 10.9795 17.6429C9.61301 17.381 8.43836 17 7.45548 16.6191C6.90411 16.4048 6.30479 16.1429 5.70548 15.8096C5.63356 15.7619 5.56164 15.7381 5.48973 15.6905C5.44178 15.6667 5.41781 15.6429 5.39384 15.6191C4.96233 15.381 4.7226 15.2143 4.7226 15.2143C4.7226 15.2143 5.87329 17.1191 8.91781 18.0238C8.19863 18.9286 7.31164 20 7.31164 20C2.0137 19.8333 0 16.381 0 16.381C0 8.7144 3.45205 2.50017 3.45205 2.50017C6.90411 -0.07123 10.1884 0.000197861 10.1884 0.000197861L10.4281 0.285909C6.11301 1.52399 4.12329 3.40493 4.12329 3.40493C4.12329 3.40493 4.65068 3.11921 5.53767 2.71446C8.10274 1.59542 10.1404 1.2859 10.9795 1.21447C11.1233 1.19066 11.2432 1.16685 11.387 1.16685C12.8493 0.976379 14.5034 0.92876 16.2295 1.11923C18.5068 1.38114 20.9521 2.0478 23.4452 3.40493C23.4452 3.40493 21.5514 1.61923 17.476 0.381146L17.8116 0.000197861C17.8116 0.000197861 21.0959 -0.07123 24.5479 2.50017C24.5479 2.50017 28 8.7144 28 16.381C28 16.381 25.9623 19.8333 20.6644 20ZM9.51712 8.88106C8.15068 8.88106 7.07192 10.0715 7.07192 11.5239C7.07192 12.9763 8.17466 14.1667 9.51712 14.1667C10.8836 14.1667 11.9623 12.9763 11.9623 11.5239C11.9863 10.0715 10.8836 8.88106 9.51712 8.88106ZM18.2671 8.88106C16.9007 8.88106 15.8219 10.0715 15.8219 11.5239C15.8219 12.9763 16.9247 14.1667 18.2671 14.1667C19.6336 14.1667 20.7123 12.9763 20.7123 11.5239C20.7123 10.0715 19.6336 8.88106 18.2671 8.88106Z"></path></svg></span></a>
                                            </td>
                                              <td width="16"><a href="https://v.hyaxe.com/foro/index.php" target="_blank"><svg aria-hidden="false" width="16" height="16" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 512 512" style="enable-background:new 0 0 512 512;" xml:space="preserve"><g><g><path d="M437.02,74.98C388.667,26.629,324.38,0,256,0S123.333,26.629,74.98,74.98C26.629,123.333,0,187.62,0,256s26.629,132.667,74.98,181.02C123.333,485.371,187.62,512,256,512s132.667-26.629,181.02-74.98C485.371,388.667,512,324.38,512,256S485.371,123.333,437.02,74.98z M256,70c30.327,0,55,24.673,55,55c0,30.327-24.673,55-55,55c-30.327,0-55-24.673-55-55C201,94.673,225.673,70,256,70z M326,420H186v-30h30V240h-30v-30h110v180h30V420z"/></g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g></svg></i></a></td>
                                           </tr>
                                        </table>
                                   </td>
                                 </tr>
                              </table>
                          </td>
                          <td class="desktop" width="67" style="padding-top:12px;">&nbsp;</td>             
                        </tr>
                      </table>
                    </td>
                    <td>&nbsp;</td>
                  </tr>
                </table>  
                </body>
                </html>';
                $mail->addCustomHeader('Content-Type', 'text/html;charset=utf-8');
                $mail->CharSet = 'UTF-8';
                $mail->send();

                return header("Location: ./login");
            }
            else header("Location: ./accessToken");
        }
        else
        {
            return $this -> view('accessToken', array('csrfToken' => NoCSRF::generate('csrf_token'), 'name' => "Desconocido", 'notification' => "Estás por generar un token de acceso temporal.", 'notificationType' => "info"));
        }
    }
}
