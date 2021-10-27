# EMConfig
<a href="https://github.com/foroughi1380/EMConfig/blob/main/LICENSE"><img alt="GitHub license" src="https://img.shields.io/github/license/foroughi1380/EMConfig"></a>
<a href="https://packagist.org/packages/gelim/emconfig"><img alt="Packagist Version" src="https://img.shields.io/packagist/v/gelim/emconfig"></a>


An eloquent key value configuration for laravel projects

## installation
```shell
$ composer require gelim/emconfig
```
## how to use
comming son

## commands
EMConfig has three main artisan command

- init
```shell
$ php artisan emconfig:init
```  
> this command remove all data in emconfig table and insert new row from ConfigSet.php file
- review
```shell
$ php aritsan emconfig:review
```
> check ConfigSet.php file and create not exists config
- resetValue (or reset value)
```shell
$ php artisan resetvalue {scope}
```
> reset all config in specific scope to default Value (value in configSet.php file)
> 
> scope argument is optional,
> when scope not set "default" scope reset to default value
> 
```shell
$ php artisan resetvalue -a
```
>reset all scope config row to default value
