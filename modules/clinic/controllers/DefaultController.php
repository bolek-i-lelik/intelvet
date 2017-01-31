<?php

namespace app\modules\clinic\controllers;

use Yii;
use yii\web\Controller;
use yii\filters\VerbFilter;
use app\modules\clinic\models\Adress;
use app\modules\clinic\models\Workers;

/**
 * Default controller for the `clinic` module
 */
class DefaultController extends Controller
{

	public $layout = 'clinic';

	/**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => \yii\filters\AccessControl::className(),
                'rules' => [
                    [
                        'allow' => true,
                        'roles' => ['adminClinic']
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }
    /**
     * Renders the index view for the module
     * @return string
     */
    public function actionIndex()
    {
        $user_id = Yii::$app->user->id;

        $adresses = Adress::find()->where(['parent'=>$user_id])->all();
        
        return $this->render('index',[
            'adresses' => $adresses,
        ]);
    }
}
