<?php

namespace app\controllers;

use app\controllers\AppfrontController;
use yii\data\Pagination;
use app\models\Country;
use Yii;

class CountryController extends AppfrontController
{
    public function actionIndex()
    {
        // var_dump(phpinfo(), 'query');
        $query = Country::find();
        $redis = Yii::$app->redis;
        $pagination = new Pagination([
            'defaultPageSize' => 5,
            'totalCount' => $query->count(),
        ]);

        $countries = $query->orderBy('name')
            ->offset($pagination->offset)
            ->limit($pagination->limit)
            ->all();
        return $this->responseError('1234');
        // return [
        //     'status' => 'success',
        //     'code' => 200,
        //     'respond' => $countries
        // ];
    }
}