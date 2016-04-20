<?php

namespace cozumel\ThemePicker;

use yii\base\BootstrapInterface;
use yii\base\Application;

class Bootstrap implements BootstrapInterface {

    public function bootstrap($app) {
        $app->on(Application::EVENT_BEFORE_REQUEST, function () {

            //get theme value from cookie
            if (\Yii::$app->request->post('theme_picker') !== null && in_array(\Yii::$app->request->post('theme_picker'), $themes, true)) {
                $themeName = \Yii::$app->request->post('theme_picker');
            } else {
                $themeName = \Yii::$app->getRequest()->getCookies()->getValue('theme_picker');
            }
            //check theme still exists
            $themes = ThemePicker::getThemes();

            if (in_array($themeName, $themes, true)) {

                //it exists so set theme

                \Yii::$app->view->theme = new \yii\base\Theme([

                    //change your pathmap if ncessary
                    //'@app/web/themes/' 
                    'pathMap' => [
                        '@app/views' => '@app/themes/' . $themeName,
                        '@app/modules' => '@app/themes/' . $themeName . '/modules',
                    ],
                    'baseUrl' => '@app/themes/' . $themeName
                ]);
            } else {

                //theme doesn't exist so remove cookie

                \Yii::$app->getResponse()->getCookies()->remove('theme_picker');
            }
        });
    }

}
