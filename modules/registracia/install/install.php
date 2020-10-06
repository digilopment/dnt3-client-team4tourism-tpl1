<?php

use DntLibrary\Base\Vendor;

function defaultModuleMetaDataConfiguration($postId, $service)
{

    $defaultContent = "Content";
    $insertedData[] = array(
        '`post_id`' => $postId,
        '`service`' => $service,
        '`vendor_id`' => Vendor::getId(),
        '`key`' => "form_base_name",
        '`value`' => $defaultContent,
        '`content_type`' => "text",
        '`cat_id`' => "3",
        '`description`' => "Input Meno",
        '`order`' => "100",
        '`show`' => "1",
    );
    $insertedData[] = array(
        '`post_id`' => $postId,
        '`service`' => $service,
        '`vendor_id`' => Vendor::getId(),
        '`key`' => "form_base_surname",
        '`value`' => $defaultContent,
        '`content_type`' => "text",
        '`cat_id`' => "3",
        '`description`' => "Input Priezvisko",
        '`order`' => "200",
        '`show`' => "1",
    );
    $insertedData[] = array(
        '`post_id`' => $postId,
        '`service`' => $service,
        '`vendor_id`' => Vendor::getId(),
        '`key`' => "form_base_psc",
        '`value`' => $defaultContent,
        '`content_type`' => "text",
        '`cat_id`' => "3",
        '`description`' => "Input PSČ",
        '`order`' => "300",
        '`show`' => "1",
    );
    $insertedData[] = array(
        '`post_id`' => $postId,
        '`service`' => $service,
        '`vendor_id`' => Vendor::getId(),
        '`key`' => "form_base_city",
        '`value`' => $defaultContent,
        '`content_type`' => "text",
        '`cat_id`' => "3",
        '`description`' => "Input Mesto",
        '`order`' => "400",
        '`show`' => "1",
    );
    $insertedData[] = array(
        '`post_id`' => $postId,
        '`service`' => $service,
        '`vendor_id`' => Vendor::getId(),
        '`key`' => "form_base_email",
        '`value`' => $defaultContent,
        '`content_type`' => "text",
        '`cat_id`' => "3",
        '`description`' => "Input Email",
        '`order`' => "500",
        '`show`' => "1",
    );
    $insertedData[] = array(
        '`post_id`' => $postId,
        '`service`' => $service,
        '`vendor_id`' => Vendor::getId(),
        '`key`' => "form_base_tel_c",
        '`value`' => $defaultContent,
        '`content_type`' => "text",
        '`cat_id`' => "3",
        '`description`' => "Input Tel. číslo",
        '`order`' => "600",
        '`show`' => "1",
    );
    $insertedData[] = array(
        '`post_id`' => $postId,
        '`service`' => $service,
        '`vendor_id`' => Vendor::getId(),
        '`key`' => "form_extend_v1_doklad",
        '`value`' => $defaultContent,
        '`content_type`' => "text",
        '`cat_id`' => "3",
        '`description`' => "Input Doklad",
        '`order`' => "700",
        '`show`' => "1",
    );
    $insertedData[] = array(
        '`post_id`' => $postId,
        '`service`' => $service,
        '`vendor_id`' => Vendor::getId(),
        '`key`' => "form_extend_v2_otazka",
        '`value`' => "Napíšte farbu vášho PC",
        '`content_type`' => "text",
        '`cat_id`' => "3",
        '`description`' => "Input otázka",
        '`order`' => "800",
        '`show`' => "1",
    );
    $insertedData[] = array(
        '`post_id`' => $postId,
        '`service`' => $service,
        '`vendor_id`' => Vendor::getId(),
        '`key`' => "form_extend_v3_otazka",
        '`value`' => "Je toto modré?",
        '`content_type`' => "text",
        '`cat_id`' => "3",
        '`description`' => "Input otázka + odpovede",
        '`order`' => "900",
        '`show`' => "1",
    );
    $insertedData[] = array(
        '`post_id`' => $postId,
        '`service`' => $service,
        '`vendor_id`' => Vendor::getId(),
        '`key`' => "form_extend_v3_odpoved_a",
        '`value`' => "áno",
        '`content_type`' => "text",
        '`cat_id`' => "3",
        '`description`' => "Odpoveď A",
        '`order`' => "1000",
        '`show`' => "1",
    );
    $insertedData[] = array(
        '`post_id`' => $postId,
        '`service`' => $service,
        '`vendor_id`' => Vendor::getId(),
        '`key`' => "form_extend_v3_odpoved_b",
        '`value`' => "nie",
        '`content_type`' => "text",
        '`cat_id`' => "3",
        '`description`' => "Odpoveď B",
        '`order`' => "1100",
        '`show`' => "1",
    );
    $insertedData[] = array(
        '`post_id`' => $postId,
        '`service`' => $service,
        '`vendor_id`' => Vendor::getId(),
        '`key`' => "form_extend_v3_odpoved_c",
        '`value`' => "možno",
        '`content_type`' => "text",
        '`cat_id`' => "3",
        '`description`' => "Odpoveď C",
        '`order`' => "1200",
        '`show`' => "1",
    );
    $insertedData[] = array(
        '`post_id`' => $postId,
        '`service`' => $service,
        '`vendor_id`' => Vendor::getId(),
        '`key`' => "form_base_custom_1",
        '`value`' => "Místo nákupu - zadejte",
        '`content_type`' => "text",
        '`cat_id`' => "3",
        '`description`' => "Voliteľný parameter",
        '`order`' => "1300",
        '`show`' => "1",
    );
    $insertedData[] = array(
        '`post_id`' => $postId,
        '`service`' => $service,
        '`vendor_id`' => Vendor::getId(),
        '`key`' => "form_user_image_1",
        '`value`' => "AKO PRÁZDNINY? - foto",
        '`content_type`' => "text",
        '`cat_id`' => "3",
        '`description`' => "Upload obrázku",
        '`order`' => "1400",
        '`show`' => "1",
    );
    $insertedData[] = array(
        '`post_id`' => $postId,
        '`service`' => $service,
        '`vendor_id`' => Vendor::getId(),
        '`key`' => "sent_confirm_mail",
        '`value`' => "1",
        '`content_type`' => "bool",
        '`cat_id`' => "3",
        '`description`' => "Odoslať potvrdzovací email",
        '`order`' => "1500",
        '`show`' => "1",
    );
    $insertedData[] = array(
        '`post_id`' => $postId,
        '`service`' => $service,
        '`vendor_id`' => Vendor::getId(),
        '`key`' => "email_conf_sent_text",
        '`value`' => "odoslané",
        '`content_type`' => "text",
        '`cat_id`' => "3",
        '`description`' => "Hláška súťažiacemu ktorá mu príde na email po registracii.",
        '`order`' => "1600",
        '`show`' => "1",
    );
    $insertedData[] = array(
        '`post_id`' => $postId,
        '`service`' => $service,
        '`vendor_id`' => Vendor::getId(),
        '`key`' => "field_word_povinne_polia",
        '`value`' => "Povinné polia",
        '`content_type`' => "text",
        '`cat_id`' => "3",
        '`description`' => "Hláška za hviezdičkou o povinných poliach",
        '`order`' => "1700",
        '`show`' => "1",
    );
    $insertedData[] = array(
        '`post_id`' => $postId,
        '`service`' => $service,
        '`vendor_id`' => Vendor::getId(),
        '`key`' => "email_conf_char",
        '`value`' => "8",
        '`content_type`' => "text",
        '`cat_id`' => "3",
        '`description`' => "Počet znakov vygenerovaného hashu",
        '`order`' => "1800",
        '`show`' => "1",
    );
    $insertedData[] = array(
        '`post_id`' => $postId,
        '`service`' => $service,
        '`vendor_id`' => Vendor::getId(),
        '`key`' => "form_file_podmienky_1",
        '`value`' => "",
        '`content_type`' => "file",
        '`cat_id`' => "3",
        '`description`' => "Podmienky súťaže - PDF",
        '`order`' => "1900",
        '`show`' => "1",
    );
    $insertedData[] = array(
        '`post_id`' => $postId,
        '`service`' => $service,
        '`vendor_id`' => Vendor::getId(),
        '`key`' => "form_file_newsletter_1",
        '`value`' => "",
        '`content_type`' => "file",
        '`cat_id`' => "3",
        '`description`' => "'Newsletter 1 - PDF",
        '`order`' => "2000",
        '`show`' => "1",
    );
    $insertedData[] = array(
        '`post_id`' => $postId,
        '`service`' => $service,
        '`vendor_id`' => Vendor::getId(),
        '`key`' => "form_file_newsletter_2",
        '`value`' => "",
        '`content_type`' => "file",
        '`cat_id`' => "3",
        '`description`' => "'Newsletter 2 - PDF",
        '`order`' => "2100",
        '`show`' => "1",
    );
    $insertedData[] = array(
        '`post_id`' => $postId,
        '`service`' => $service,
        '`vendor_id`' => Vendor::getId(),
        '`key`' => "form_file_newsletter_3",
        '`value`' => "",
        '`content_type`' => "file",
        '`cat_id`' => "3",
        '`description`' => "'Newsletter 3 - PDF",
        '`order`' => "2200",
        '`show`' => "1",
    );
    $insertedData[] = array(
        '`post_id`' => $postId,
        '`service`' => $service,
        '`vendor_id`' => Vendor::getId(),
        '`key`' => "form_embed_newsletter_1",
        '`value`' => "",
        '`content_type`' => "text",
        '`cat_id`' => "3",
        '`description`' => "Newsletter 1 - Embed",
        '`order`' => "2300",
        '`show`' => "1",
    );
    $insertedData[] = array(
        '`post_id`' => $postId,
        '`service`' => $service,
        '`vendor_id`' => Vendor::getId(),
        '`key`' => "form_embed_newsletter_2",
        '`value`' => "",
        '`content_type`' => "text",
        '`cat_id`' => "3",
        '`description`' => "Newsletter 2 - Embed",
        '`order`' => "2400",
        '`show`' => "1",
    );
    $insertedData[] = array(
        '`post_id`' => $postId,
        '`service`' => $service,
        '`vendor_id`' => Vendor::getId(),
        '`key`' => "form_embed_newsletter_3",
        '`value`' => "",
        '`content_type`' => "text",
        '`cat_id`' => "3",
        '`description`' => "Newsletter 3 - Embed",
        '`order`' => "2500",
        '`show`' => "1",
    );
    $insertedData[] = array(
        '`post_id`' => $postId,
        '`service`' => $service,
        '`vendor_id`' => Vendor::getId(),
        '`key`' => "email_sender",
        '`value`' => "",
        '`content_type`' => "text",
        '`cat_id`' => "3",
        '`description`' => "Email odosielateľa pod ktorým príde thankyou mail",
        '`order`' => "2600",
        '`show`' => "1",
    );
    $insertedData[] = array(
        '`post_id`' => $postId,
        '`service`' => $service,
        '`vendor_id`' => Vendor::getId(),
        '`key`' => "email_subject",
        '`value`' => "",
        '`content_type`' => "text",
        '`cat_id`' => "3",
        '`description`' => "Predmet emailu pod ktorým príde thankyou mail",
        '`order`' => "2700",
        '`show`' => "1",
    );
    $insertedData[] = array(
        '`post_id`' => $postId,
        '`service`' => $service,
        '`vendor_id`' => Vendor::getId(),
        '`key`' => "enable_registration",
        '`value`' => "",
        '`content_type`' => "no_input",
        '`cat_id`' => "3",
        '`description`' => "Povoliť alebo zakázať registráciu",
        '`order`' => "2800",
        '`show`' => "1",
    );
    $insertedData[] = array(
        '`post_id`' => $postId,
        '`service`' => $service,
        '`vendor_id`' => Vendor::getId(),
        '`key`' => "koniec_registracie",
        '`value`' => "",
        '`content_type`' => "content",
        '`cat_id`' => "3",
        '`description`' => "Text po ukončení registrácie",
        '`order`' => "2900",
        '`show`' => "1",
    );


    return $insertedData;
}
