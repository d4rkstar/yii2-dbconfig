# yii2-dbconfig

This widget will integrate quickly a backend and frontend for application settings.

## Installation

The preferred way to install this extension is through [composer](http://getcomposer.org/download/). 

### Install

Either run

```
$ php composer.phar require d4rkstar/yii2-dbconfig "dev-master"
```

or add

```
"d4rkstar/yii2-dbconfig": "dev-master"
```

to the ```require``` section of your `composer.json` file.

You'll need to apply database migration from the CLI:

```
./yii migrate --migrationPath=@vendor/d4rkstar/yii2-dbconfig/migrations
```


### Sample Usage

In the parameter ```bootstrap``` of your `app/config/web.php`, add:

```
'bootstrap' => ['log','dbconfig'],
```

In the section ```components``` of your `app/config/web.php`, add:

```
'components' => [
    ...
    'dbconfig' => [
        'class'=>'d4rkstar\dbconfig\components\ConfigurationUtils',
    ],
]
```

In the section ```modules``` of your `app/config/web.php`, add:

```
'modules' => [
    ...
    'dbconfig' => [
        'class' => 'd4rkstar\dbconfig\Module',
    ],
]
```

Anywhere in your code, you can read settings easyly:

```
...

$myValue = Yii::$app->dbconfig->section->parameter->value;

...
```

You can administer the settings from the url dbconfig/settings/index. You can add new settings from the url dbconfig/settings/manage.

