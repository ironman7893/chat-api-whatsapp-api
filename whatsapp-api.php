<?php

// This is the code for chat-api.com // 

function send_whatsapp_apiA($arrPOST){

    if($arrPOST['media']!=""){  
                        
        // IMAGE / VIDEO / IMAGE / VIDEO / IMAGE / VIDEO / IMAGE / VIDEO /IMAGE / VIDEO
        // IMAGE / VIDEO / IMAGE / VIDEO / IMAGE / VIDEO / IMAGE / VIDEO /IMAGE / VIDEO
        $data = [
            'chatId' => $arrPOST['to'],
            'body' => $arrPOST['media'],
            'filename' => md5('Ymdhis').".jpg",
            'caption' => $arrPOST['content']
        ];
        $json = json_encode($data);

        $actionURL = "https://".$arrPOST['whatsapp_server'].".chat-api.com/instance".$arrPOST['whatsapp_instance']."/sendFile?token=".$arrPOST['whatsapp_token'];
        $options = stream_context_create(
        ['http' => 
            [
            'method'  => 'POST',
            'header'  => 'Content-type: application/json',
            'content' => $json
            ]
        ]);
    
    } else if($infoPost->post_media==""){
        
        // TEXT / TEXT / TEXT / TEXT / TEXT / TEXT / TEXT / TEXT / TEXT / TEXT / TEXT / 
        // TEXT / TEXT / TEXT / TEXT / TEXT / TEXT / TEXT / TEXT / TEXT / TEXT / TEXT / 
        $data = [
            'chatId' => $arrPOST['to'],
            'body' => $arrPOST['content']
        ];
        $json = json_encode($data);

        $actionURL = "https://".$arrPOST['whatsapp_server'].".chat-api.com/instance".$arrPOST['whatsapp_instance']."/sendMessage?token=".$arrPOST['whatsapp_token'];
        $options = stream_context_create(
        ['http' => [
            'method'  => 'POST',
            'header'  => 'Content-type: application/json',
            'content' => $json
            ]
        ]);

    }

    $result = file_get_contents($actionURL, false, $options);
    return $result;
}

function whatsappHistory($arrPOST){
    
    $resultId = explode(",",$arrPOST['result'])[2];
    $resultMessageId = rtrim(explode(':"',$resultId)[1],'"');

    if($resultMessageId!=""){
        $status = "Y";
    } else {
        $status = "N";
    }

    $splitPhone = ltrim(explode("@",$resultMessageId)[0],"true_");

    ################################################################
    ################################################################
    ############# INSERT THE LOG INTO YOUR DATABASE ################
    ################################################################
    ################################################################
   
}

function whatsappReFormat($arrPOST){
    $value = ltrim($arrPOST['phone']."@c.us","+");
    return $value;
}

?>
