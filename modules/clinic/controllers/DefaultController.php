<?php

namespace app\modules\clinic\controllers;

use Yii;
use yii\web\Controller;
use yii\filters\VerbFilter;
use app\modules\clinic\models\Adress;
use app\modules\clinic\models\Workers;
use app\modules\clinic\models\Clinic;

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

        $clinic = Clinic::find()->where(['user_id' => $user_id])->one();

        $adresses = Adress::find()->where(['parent'=>$user_id])->all();
        
        return $this->render('index',[
            'adresses' => $adresses,
            'clinic' => $clinic,
        ]);
    }

    public function actionCreateinfo()
    {

        if(Yii::$app->request->isGET ){
            $query = Yii::$app->request->get();
            
            $id = $query['id'];
            $name = $query['name'];
            $adress = $query['adress'];
            $phone = $query['phone'];
            $email = $query['email'];
            $site = $query['site'];

            $clinic = Clinic::find()->where(['user_id'=>$id])->one();
            if(isset($clinic)){
                $clinic->name = $name;
                $clinic->adress = $adress;
                $clinic->phone = $phone;
                $clinic->email = $email;
                $clinic->site = $site;
                $clinic->user_id = $id;
                if($clinic->save()){
                    echo 'Информация сохранена';
                }else{
                    echo 'Информация не сохранена';
                }    
            }

            $clinic = new Clinic();
            $clinic->name = $name;
            $clinic->adress = $adress;
            $clinic->phone = $phone;
            $clinic->email = $email;
            $clinic->site = $site;
            $clinic->user_id = $id;
            if($clinic->save()){
                echo 'Информация сохранена';
            }else{
                echo 'Информация не сохранена';
            }
        }
    }
}
