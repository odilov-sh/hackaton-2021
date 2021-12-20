<?php


namespace frontend\controllers;


use backend\models\UserBot;
use common\models\Reception;
use common\models\User;
use yii\helpers\Json;
use yii\web\Controller;

class TelegramController extends Controller
{
    public $user;


    public function beforeAction($action)
    {
        if ($action->id == 'index') {
            $this->enableCsrfValidation = false;
        }

        return parent::beforeAction($action);
    }

    public function actionIndex()
    {

        try {

            $token = '5053722822:AAGil14nsTtk7f1kb8IE98TK6lzJGxMwIhs';
            $data = json_decode(file_get_contents("php://input"), true);
            $message = $data['message'];
            $from = $message['from'];
            $user_id = $from['id'];
            $text = $message['text'];
            $name = $from['first_name'] ?? '';
            $username = $from['username'] ?? '';
            $this->setMainVars($user_id, $name, $username);
            $this->messageHandler($message);
        } catch (\Exception $e) {
            // $this->debug($e->getMessage());
        }

    }

    public function messageHandler($message)
    {

        if (isset($message['text']) && ($message['text'] == '/start') || ($message['text'] == '❌ Bekor qilish') || ($message['text'] == '🏠 Bosh sahifa')) {

            $keyboard = json_encode([
                'keyboard' => [
                    [
                        ['text' => '📄 Mening karta natijalarim'],
                    ],
                ],
                'resize_keyboard' => true,
            ]);

            $this->bot('sendMessage', [
                'chat_id' => $this->user->user_id,
                'text' => "💡 Assalomu alaykum {$this->user->name}!<br> O'zingizni karta ma'lumotlaringizni bilmoqchimsizi?<br>U holda pasport raqamingizni kiriting!",
                'reply_markup' => $keyboard,
                'parse_mode' => 'html'
            ]);

            $this->user->step = "";
            $this->user->save();
        }

        if ($this->user->step != "") {
            $this->setHandler($message);
            return true;
        }
        if (isset($message['text'])) {

            if ($message['text'] == '📄 Mening karta natijalarim') {
                $this->setStep('get_carta');
                $this->stepHander($message);
                return true;
            }
        }


    }

    public function stepHander($message)
    {
        if ($this->user->step == 'get_carta') {
            $keyboard = json_encode([
                'keyboard' =>
                    [
                        [
                            ['text' => '❌ Bekor qilish']
                        ]
                    ],
                'resize_keyboard' => true,
            ]);
            $this->bot('sendMessage', [
                'chat_id' => $this->user->user_id,
                'text' => '<b>Pasport seriya</b> raqamini kiriting: AA0000000',
                'reply_markup' => $keyboard,
                'parse_mode' => 'html'
            ]);
        }
        if ($this->user->step == 'client_carta') {

            $client = User::find()
                ->andWhere(['passport' => $message['text']])
                ->one();

            if ($client) {

                $message = "Ma'lumot topildi";

            } else {

                $message = "❌ Passport ma'lumotingizni noto'g'ri kiritdingiz!";
            }

            $keyboard = json_encode([
                'keyboard' =>
                    [
                        [
                            ['text' => '🏠 Bosh sahifa']
                        ]
                    ],
                'resize_keyboard' => true,
            ]);
            $this->bot('sendMessage', [
                'chat_id' => $this->user->user_id,
                'text' => '<b>Pasport seriya</b> raqamini kiriting: AA0000000',
                'reply_markup' => $keyboard,
                'parse_mode' => 'html'
            ]);
        }
    }

    public function setHandler($message)
    {
        if ($this->user->step == 'get_carta') {
            $this->setStep('client_carta');
            $this->stepHander($message);
            return 1;
        }

    }


    // public function debug($data)
    // {
    //     $this->bot('sendMessage',
    //         [
    //             'chat_id' => $this->user->user_id,
    //             'text' => json_encode($data),
    //         ]);
    // }

    public function setMainVars($user_id, $name, $username)
    {
        $user = UserBot::find()
            ->andWhere(['user_id' => $user_id])
            ->one();


        if (!$user) {
            $user = new UserBot();
            $user->user_id = $user_id;
            $user->first_name = $name;
            $user->username = $username;
            $user->save();
        }


        $this->user = $user;
    }

    public function setStep($step)
    {
        $this->user->step = $step;
        $this->user->save();
    }


    public function bot($method, $data = [], $token = '5053722822:AAGil14nsTtk7f1kb8IE98TK6lzJGxMwIhs')
    {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, 'https://api.telegram.org/bot' . $token . '/' . $method);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $res = curl_exec($ch);
        return json_decode($res);

    }
}