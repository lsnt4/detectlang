# DetectLang
Detect the language name by the given string

### Usage

```
composer require buddhika/detectlang
```

```php
require_once './vendor/autoload.php';

$detectlang = new \DetectLang\DetectLang();
$detectlang->set_text('Is මේක a sample text?');
```

```php
print_r($detectlang->get_language());
```
```
Array
(
    [en] => 0.66666666666667
)
```

```php
print_r($detectlang->get_scores());
```
```
Array
(
    [en] => 0.66666666666667
    [si] => 0.33333333333333
)
```

### Aditional Language Support
Language support can be extended by adding them to the `$languages` array in `DetectLang.php`.


### Disclaimer
This is a fun project! Don't use this either in production environments or in places where the reliability of the results must be much important.