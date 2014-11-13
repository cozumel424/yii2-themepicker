<?php

namespace cozumel\ThemePicker;

use yii\widgets\ActiveForm;

use yii\base\BootstrapInterface;
use yii\base\Application;

class ThemePicker extends \yii\base\Widget
{
    public function run()
    {
		//theme path - adjust as necessary
		//$themePath = \Yii::$app->basePath . DIRECTORY_SEPARATOR . 'web' . DIRECTORY_SEPARATOR . 'themes'; 
		$themePath = \Yii::$app->basePath . DIRECTORY_SEPARATOR . 'themes'; 
		
		$themes = self::getThemes($themePath);
		
		//create theme dropdown, probably a better way, let me know
		$dropdown= '<select id="theme_picker" class="form-control" name="theme_picker">';
		foreach($themes as $theme)
		{
			$dropdown .= '<option value="' . $theme .'">'. $theme . '</option>';
		}
		
		$dropdown .= '</select>';
		
		
		ActiveForm::begin();
		echo $dropdown;
		ActiveForm::end();
				
    }
	
	
	private static function getThemes($themePath){
    	$themes = array();
    	$directoryIterator = new \DirectoryIterator($themePath);
    	foreach($directoryIterator as $item)
      	if($item->isDir() && !$item->isDot())
      		$themes[$item->getFilename()] = $item->getFilename(); 
      	return $themes;
    }
}


	class Bootstrap implements BootstrapInterface
	{
	
	  public function bootstrap($app)
	  {
		  $app->on(Application::EVENT_BEFORE_REQUEST, function () {
			  
	  			\Yii::$app->view->theme = new \yii\base\Theme([
					'pathMap' => ['@app/modules' => '@app/themes/pianos/modules'],
					'baseUrl' => '@app/themes/pianos',
				]);
			  
		  });
             
		  
	  }
	  
	}