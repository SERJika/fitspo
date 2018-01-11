<?php

class MailController
{
    public function actionSendQuestionnaire($id)
    {
    	$params = $_POST;

        Mail::sendQuestionnaire($id, $params);
        
        return true;
    }
}