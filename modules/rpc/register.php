<?php

use DntLibrary\Base\DB;
use DntLibrary\Base\Dnt;
use DntLibrary\Base\Frontend;
use DntLibrary\Base\GoogleCaptcha;
use DntLibrary\Base\Mailer;
use DntLibrary\Base\Rest;
use DntLibrary\Base\Upload;
use DntLibrary\Base\Vendor;
use DntLibrary\Base\Voucher;
use DntLibrary\Base\MultyLanguage;

header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');
$rest = new Rest();
$db = new DB();
$dntMailer = new Mailer;

$postId = $rest->webhook(4);
$data = Frontend::get(false, $postId);
$siteKey = $data['meta_settings']['keys']['gc_site_key']['value'];
$secretKey = $data['meta_settings']['keys']['gc_secret_key']['value'];
$gc = new GoogleCaptcha($siteKey, $secretKey);


$form_base_name = $rest->post("form_base_name");
$form_base_surname = $rest->post("form_base_surname");
$form_base_psc = $rest->post("form_base_psc");
$form_base_city = $rest->post("form_base_city");
$form_base_email = $rest->post("form_base_email");
$form_base_tel_c = $rest->post("form_base_tel_c");
$form_base_custom_1 = $rest->post("form_base_custom_1");
$ans = $rest->post("ans");

$podmienky = $rest->post("podmienky");

$newsletter_1 = $rest->post("newsletter_1");
$newsletter_2 = $rest->post("newsletter_2");

$newsletter_embed_1 = $rest->post("newsletter_embed_1");
$newsletter_embed_2 = $rest->post("newsletter_embed_2");
$newsletter_embed_3 = $rest->post("newsletter_embed_3");

if ($data['meta_settings']['keys']['gc_secret_key']['show'] == 1 && $data['meta_settings']['keys']['gc_site_key']['show'] == 1) {
    $NO_CAPTCHA = 0;
    if (isset($_POST['g-recaptcha-response'])) {
        $gcResponse = $_POST['g-recaptcha-response'];
    } else {
        $gcResponse = false;
    }
    $gc->setCheckedOptions($gcResponse);
} else {
    $NO_CAPTCHA = 1;
}

if (isset($_POST['sent'])) {
    if ($gc->getResult() || $NO_CAPTCHA) {
        $attachment = "";

        $filePath = "dnt-view/data/external-uploads/";
        if (isset($_FILES['form_user_image_1'])) {
            $dntUpload = new Upload($_FILES['form_user_image_1']);
            if ($dntUpload->uploaded) {
                // save uploaded image with no changes
                $dntUpload->image_resize = true;
                $dntUpload->image_convert = 'jpg';
                $dntUpload->image_x = 800;
                //$dntUpload->image_max_width = 800;   
                $dntUpload->image_ratio_y = true;
                $dntUpload->Process($filePath);
                if ($dntUpload->processed) {
                    $CUSTOM = json_encode(var_export($_FILES['form_user_image_1'], true));
                    $attachment = "" . WWW_PATH . "" . $filePath . "" . $dntUpload->file_dst_name . "";
                } else {
                    $attachment = "";
                }
            }
        }

        $table = "dnt_registred_users";

        $insertedData["`type`"] = "competitor-user";
        $insertedData["`vendor_id`"] = Vendor::getId();
        $insertedData["`datetime_creat`"] = Dnt::datetime();


        $insertedData["`name`"] = $form_base_name;
        $insertedData["`surname`"] = $form_base_surname;

        $insertedData["`session_id`"] = uniqid();

        $insertedData["`psc`"] = $form_base_psc;
        $insertedData["`mesto`"] = $form_base_city;
        $insertedData["`email`"] = $form_base_email;
        $insertedData["`tel_c`"] = $form_base_tel_c;
        $insertedData["`custom_1`"] = $form_base_custom_1;
        $insertedData["`podmienky`"] = 1;
        $insertedData["`status`"] = 1;


        if ($newsletter_embed_1 || $newsletter_1) {
            $insertedData["`news`"] = 1;
        } else {
            $insertedData["`news`"] = 0;
        }
        if ($newsletter_embed_2 || $newsletter_2) {
            $insertedData["`news_2`"] = 1;
        } else {
            $insertedData["`news_2`"] = 0;
        }
        /* if($newsletter_embed_3){
          $insertedData["`news_3`"] 	= 1;
          }else{
          $insertedData["`news_3`"] 	= 0;
          } */

        $insertedData["`content`"] = $ans;
        $insertedData["`ip_adresa`"] = Dnt::get_ip();
        $insertedData["`img`"] = $attachment;

        $db->dbTransaction();
        $db->insert($table, $insertedData);
        $userId = Dnt::getLastId($table);
        $db->dbcommit();

        if (isset($data['meta_settings']['keys']['automatic_voucher']['show']) && $data['meta_settings']['keys']['automatic_voucher']['show'] == 1) {
            Voucher::assignLastVoucher($userId);
        }


        /*         * *
         * KONFIGURACIA ODOSLANEHO EMAILU 
         *
         *
         */
        $msg = MultyLanguage::translate($data, "dakujeme_za_registraciu", "translate");

        if ($data['meta_tree']['keys']['email_sender']['show'] == 1 && $data['meta_tree']['keys']['email_subject']['show'] == 1) {
            $senderEmail = $data['meta_tree']['keys']['email_sender']['value'];
            $messageTitle = $data['meta_tree']['keys']['email_subject']['value'];
        } else {
            $lang = $data['meta_settings']['keys']['language']['value'];
            switch ($lang) {
                case "sk":
                    $senderEmail = "noreply@fingers-crossed.eu";
                    $messageTitle = "Registracia do suťaže";
                    break;
                case "cs":
                    $senderEmail = "noreply@fingers-crossed.eu";
                    $messageTitle = "Registrace do soutěže";
                    break;
                case "en":
                    $senderEmail = "noreply@fingers-crossed.eu";
                    $messageTitle = "Competition registration";
                    break;
                case "de":
                    $senderEmail = "noreply@fingers-crossed.eu";
                    $messageTitle = "Gewinnspiel registrierung";
                    break;
                default:
                    $senderEmail = "info@vyhrat.com";
                    $messageTitle = "Registrace do soutěže";
            }
        }

        $dntMailer->set_recipient(array($form_base_email));
        $dntMailer->set_msg($msg);
        $dntMailer->set_subject($messageTitle);
        $dntMailer->set_sender_name($senderEmail);
        $dntMailer->set_sender_email($senderEmail);
        $dntMailer->sent_email();


        $RESPONSE = 1;
        $CUSTOM = "done";
        $ATTACHMENT = $attachment;
        //$CUSTOM = "done";
    } else {
        $RESPONSE = 2;
        $CUSTOM = "no captcha";
        $ATTACHMENT = false;
    }
} else {
    $RESPONSE = 0;
    $CUSTOM = "no post";
    $ATTACHMENT = false;
}

echo '
    {
      "success": "' . $RESPONSE . '",
      "request": "POST",
      "response": "' . $RESPONSE . '",
      "custom": "' . $ATTACHMENT . '",
      "imagex": "",
      "protokol": "REST",
      "lang": "",
      "generator": "Designdnt 3",
      "service": "c_dnt-ajax-universal",
      "message": "Silence is golden, speech is gift :)"
    }';
