# laravel-wikipedia


> Laravel Package to work with Wikipedia. Very easy to use. Offers the use of Facades and Dependency Injection

## Installation

[PHP](https://php.net) 5.5+ or [HHVM](http://hhvm.com) 3.3+, and [Composer](https://getcomposer.org) are required.

First, pull in the package through Composer.

``` bash
$ composer require sjestadt/laravel-wikipedia
```

Another alternative is to simply add the following line to the require block of your `composer.json` file.

```
"sjestadt/laravel-wikipedia": "1.0.*"
```

Then run `composer install` or `composer update` to download it and have the autoloader updated.

And then include these service providers within `config/app.php`

```php
'providers' => [
    ...
    sjestadt\Larapedia\WikiServiceProvider::class,
    ...
];
```

This package also comes with a Facade

```php
'aliases' => [
    ...
    'Wiki' => sjestadt\Larapedia\WikiFacade::class,
    ...
]
```

Run the following command, it creates a `config/wiki.php` in your laravel app. You can modify the configuration

```php
    php artisan vendor:publish
```

## Usage

Use it like so:

For those that love Facades immensely, I have provided the cake for you :smile: like so:

``` php

{{ Wiki::getFirstSentence() }}  // returns 5321 Jagras è un asteroide della fascia principale.

{{ Wiki::getApiLanguage() }} // returns it

{{ Wiki::getId() }} // returns 812464

{{ Wiki::getTitle() }} // returns 5321 Jagras

{{ Wiki::getLink() }} // returns http://it.wikipedia.org/wiki/5321_Jagras

{{ Wiki::getNChar(25) }} // 5321 Jagras è un asteroide...

{{ Wiki::getCategoriesRelated() }}
// returns
array(3) {
      [0]=> string(42) "Asteroidi della fascia principale centrale"
      [1]=> string(31) "Corpi celesti scoperti nel 1985"
      [2]=> string(16) "Stub - asteroidi"
}

{{ Wiki::getOtherLangLinks() }}
// returns
array(10)
      { [0]=> array(3)
        { ["lang"]=> string(2) "en"
          ["url"]=> string(40) "http://en.wikipedia.org/wiki/5321_Jagras"
          ["*"]=> string(11) "5321 Jagras" }
        [1]=> array(3) {
          ["lang"]=> string(2) "eo"
          ["url"]=> string(41) "http://eo.wikipedia.org/wiki/5321_Jagraso"
          ["*"]=> string(12) "5321 Jagraso" }
        [2]=> array(3) {
          ["lang"]=> string(2) "fa"
          ["url"]=> string(84) "http://fa.wikipedia.org/wiki/%D8%B3%DB%8C%D8%A7%D8%B1%DA%A9_%DB%B5%DB%B3%DB%B2%DB%B1"               ["*"]=> string(19) "سیا" }
        [3]=> array(3) {
          ["lang"]=> string(2) "hu"
          ["url"]=> string(40) "http://hu.wikipedia.org/wiki/5321_Jagras"
          ["*"]=> string(11) "5321 Jagras" }
        [4]=> array(3) {
          ["lang"]=> string(2) "hy"
          ["url"]=> string(72) "http://hy.wikipedia.org/wiki/(5321)_%D5%8B%D5%A1%D5%A3%D6%80%D5%A1%D5%BD"
          ["*"]=> string(19) "(5321) Ջագրաս" }
        [5]=> array(3) {
          ["lang"]=> string(2) "la"
          ["url"]=> string(40) "http://la.wikipedia.org/wiki/5321_Jagras"
          ["*"]=> string(11) "5321 Jagras" }
        [6]=> array(3) {
          ["lang"]=> string(2) "oc"
          ["url"]=> string(40) "http://oc.wikipedia.org/wiki/5321_Jagras"
          ["*"]=> string(11) "5321 Jagras" }
        [7]=> array(3) {
          ["lang"]=> string(2) "pl"
          ["url"]=> string(42) "http://pl.wikipedia.org/wiki/(5321)_Jagras"
          ["*"]=> string(13) "(5321) Jagras" }
        [8]=> array(3) {
          ["lang"]=> string(2) "pt"
          ["url"]=> string(40) "http://pt.wikipedia.org/wiki/5321_Jagras"
          ["*"]=> string(11) "5321 Jagras" }
        [9]=> array(3) {
          ["lang"]=> string(2) "uk"
          ["url"]=> string(64) "http://uk.wikipedia.org/wiki/5321_%D0%AF%D2%91%D1%80%D0%B0%D1%81"
          ["*"]=> string(15) "5321 Яґрас"
        }
}

{{ Wiki::getPlainTextArticle() }}
// returns
5321 Jagras è un asteroide della fascia principale. Scoperto nel 1985, presenta un'orbita caratterizzata da un semiasse maggiore pari a 2,5810209 UA e da un'eccentricità di 0,2213576, inclinata di 13,58746° rispetto all'eclittica. Collegamenti esterni (EN) Jagras - Dati riportati nel database dell'IAU Minor Planet Center (EN) Jagras - Dati riportati nel Jet Propulsion Laboratory - Small-Body Database

{{ Wiki::getArticleImages() }}
// returns
array(2) {
      [0]=> string(63) "http://upload.wikimedia.org/wikipedia/commons/8/83/Celestia.png"
      [1]=> string(76) "http://upload.wikimedia.org/wikipedia/commons/9/9a/Galileo_Gaspra_Mosaic.jpg"
}

```

## Change log

Please see [CHANGELOG](CHANGELOG.md) for more information what has changed recently.

## Testing

You can run the tests with:

```bash
vendor/bin/phpunit run
```

Alternatively, you can run the tests like so:

```bash
composer test
```

## Inspiration

 * [Wiki](https://github.com/ihoru/Wiki)

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

## How can I thank you?

Why not star the github repo? I'd love the attention! Why not share the link for this repository on Twitter or HackerNews? Spread the word!

Don't forget to [follow me on twitter](https://twitter.com/sjestadt)!

Thanks!
Prosper Otemuyiwa.

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.

## Security

If you discover any security related issues, please email [prosperotemuyiwa@gmail.com](prosperotemuyiwa@gmail.com) instead of using the issue tracker.
