Front End Theme Selection For Yii2
==================================
This is a simple extension to pick themes. The user chooses a theme from a dropdown box and the theme choice is stored in a cookie, the extension could easily be changed to work with a model too.

Installation
------------

The preferred way to install this extension is through [composer](http://getcomposer.org/download/).

Either run

```
php composer.phar require --prefer-dist cozumel/yii2-themepicker "*"
```

or add

```
"cozumel/yii2-themepicker": "*"
```

to the require section of your `composer.json` file.


Usage
-----

Once the extension is installed, simply use it in your code by  :

```
<?= \cozumel\ThemePicker\ThemePicker::widget(); ?>
```

You will need to place it in each theme where you want to use it.

The default theme path is set as @app/themes. You may need to change this depending where your themes are.

Line 61 ThemePicker.php
 
Lines 30-36 Bootstrap.php

Just change @app/themes to @app/web/themes or wherever your themes are.

Translation
-----

```
Yii::t('theme_picker', 'Choose a theme')
```
Line 22 ThemePicker.php

Cookie
-----

The default cookie length is set to 180 days, this can be changed on line 44 ThemePicker.php

Feedback
-----

Comments and feedback are welcome, and thanks to the Yii community for a great framework.