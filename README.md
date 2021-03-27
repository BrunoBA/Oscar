
# Get Started

```php
use Oscar;

$oscar = new Oscar;
$categories = $oscar->getCategories();

$category = $categories[0]; 
echo $category->getName(); //"Best Picture"

echo $category->getNominees()[0]; //"The Father"
```


# PHP Phan issue with PHP 8.0.3

```sh
$ phpcbf --standard=PSR12 --colors src/ 

Fix: https://github.com/squizlabs/PHP_CodeSniffer/issues/3182
```
