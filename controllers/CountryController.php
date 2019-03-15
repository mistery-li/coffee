<?php

namespace app\controllers;

use yii\web\Controller;
use yii\data\Pagination;
use app\models\Country;
use Yii;

class CountryController extends Controller
{
    public function actionIndex()
    {
        // var_dump(phpinfo(), 'query');
        $query = Country::find();
        $redis = Yii::$app->redis;
        var_dump($redis, 'ress');
        $pagination = new Pagination([
            'defaultPageSize' => 5,
            'totalCount' => $query->count(),
        ]);

        $countries = $query->orderBy('name')
            ->offset($pagination->offset)
            ->limit($pagination->limit)
            ->all();

        return $this->render('index', [
            'countries' => $countries,
            'pagination' => $pagination
        ]);
    }
}