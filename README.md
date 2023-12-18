# Laravel Nova Detached Actions

This package is no longer necessarily required. Since Laravel Nova [v4.24.0](https://nova.laravel.com/releases/4.24.0), 
there are
now also standalone actions:  
[Registering Actions: Standalone Actions](https://nova.laravel.com/docs/4.0/actions/registering-actions.html#standalone-actions)

The idea based on [jeffersonsimaogoncalves/nova-detached-actions](https://github.com/jeffersonsimaogoncalves) by
Jefferson Simão Gonçalves.

## Install

```shell
composer require norman-huth/nova-detached-actions
```

## Usage

### Create A Action And Extend DetachedAction Class

```shell
php artisan nova:action MyDetachedAction
```

```php
use NormanHuth\NovaDetachedActions\DetachedAction;

class MyDetachedAction extends DetachedAction
```

### Options

#### Destructive Action

```php
public function actions(NovaRequest $request): array
{
    return [
        (new MyDetachedAction)->isDestructive()
    ];
}
```

#### Add Heroicon Icon

```php
public function actions(NovaRequest $request): array
{
    return [
        (new MyDetachedAction)->icon('users')
    ];
}
```

#### Add FontAwesome Icon

FontAwesome is **NOT** included!

You can optional install Font Awesome free with `php artisan nova-package:font-awesome`.

```php
public function actions(NovaRequest $request): array
{
    return [
        (new MyDetachedAction)->faIcon('fa-solid fa-user')
    ];
}
```

#### Add SVG Icon

```php
public function actions(NovaRequest $request): array
{
    return [
        (new MyDetachedAction)->svgIcon('<svg xmlns="...')
    ];
}
```

#### Add Image Icon

```php
public function actions(NovaRequest $request): array
{
    return [
        (new MyDetachedAction)->imageIcon(asset('images/users.png'))
    ];
}
```

#### Add HTML Code Icon

```php
public function actions(NovaRequest $request): array
{
    return [
        (new MyDetachedAction)->htmlIcon('YOUR-HTML-CODE')
    ];
}
```

#### Add Classes To Button

```php
(new MyDetachedAction)->addButtonClasses(['text-center'])
```

#### Set Button Classes

```php
(new MyDetachedAction)->setButtonClasses(['text-center'])
```

#### Use Button Style

```php
(new MyDetachedAction)->setButtonStyle('primary')
```

The default style ist `primary`. Available are `primary`, `danger`, `success` and `warning`.

You can publish the
[config file](https://github.com/Muetze42/nova-detached-actions/blob/main/config/nova-detached-actions.php) and
change themes:

```shell
php artisan vendor:publish --provider=NormanHuth\NovaDetachedActions\ToolServiceProvider
```
