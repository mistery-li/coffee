<?php
declare(strict_types=1);
namespace app\controllers;

use yii\filters\ContentNegotiator;
use yii\rest\Controller;
use Yii\web\Response;

class AppfrontController extends Controller
{
    public function behaviors()
    {
        $behaviors = parent::behaviors();

        $behaviors['contentNegotiator'] = [
            'class' => ContentNegotiator::className(),
            'formats' => [
                'application/json' => Response::FORMAT_JSON
            ]
        ];

        return $behaviors;
    }
    
    protected function responseError(string $error_string): array
    {
        return [
            'status' => 'error',
            /**
             * code,
             * extra,
             * error_msg
             */
            'error_info' => $error_string,
        ];
    }
}