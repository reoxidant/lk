<?php

namespace app\components;

use yii\base\Widget;


class HelloWidget extends Widget{

    public $access;

    public $message;

    public function init(){
        if($this->access === null){
            $this->message = "Вам запрещен доступ!";
        }else{
            $this->message = 'Доступ разрешен!';
        }
        ob_start(); // все что между begin widget и end
    }

    public function run(){
        $content = ob_get_clean();
        $content = strip_tags($content);

        return $this->render('hello', [
            'access' => $this->message,
            'content' => $content
        ]);
    }
}

?>