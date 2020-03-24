# [Laravel Sitemap Generator](https://github.com/bringyourownideas/laravel-sitemap)

[![Latest Stable Version](https://poser.pugx.org/bringyourownideas/laravel-sitemap/version.svg)](https://github.com/bringyourownideas/laravel-sitemap/releases) [![Latest Unstable Version](https://poser.pugx.org/bringyourownideas/laravel-sitemap/v/unstable.svg)](https://packagist.org/packages/bringyourownideas/laravel-sitemap) [![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/bringyourownideas/laravel-sitemap/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/bringyourownideas/laravel-sitemap/?branch=master) [![Total Downloads](https://poser.pugx.org/bringyourownideas/laravel-sitemap/downloads.svg)](https://packagist.org/packages/bringyourownideas/laravel-sitemap) [![License](https://poser.pugx.org/bringyourownideas/laravel-sitemap/license.svg)](https://github.com/bringyourownideas/laravel-sitemap/blob/master/LICENSE)

A simple website crawler using [php-spider](https://github.com/mvdbos/php-spider) and SimpleXMLElement to generate a sitemap.xml-file. The file will be stored in the `public/` directory.

The sitemap generator is using the meta tag `article:modified_time` to identify the last modification. `Noindex` in robots meta-tag will be considered. If a canoncial URL is set in the document, this one will be used instead.

## Please note: This package is in active development and might change as it's been developed. Use with care!

## Support

This package supports Laravel 5.5 or newer. Currently, Laravel 7 isn't supported as there are some issues to resolve.


## Installation

The package is managed using composer. You can install it using

```bash
composer require bringyourownideas/laravel-sitemap
```

This ensures you receiving later updates automatically. Alternatively, you can install the package manually (not recommended) using the download functionality on GitHub.

If you aren't using [package discovery](https://laravel.com/docs/5.8/packages#package-discovery) you will need to register the ServiceProvider manually. To do so, please run:

```bash
php artisan vendor:publish --provider="BringYourOwnIdeas\LaravelSitemap\SitemapServiceProvider"
```

## Usage

The package registers a artisan command called `generate:sitemap`. This triggers a crawl of your site and writing out of the sitemap. For convenience, you can add this to your deployment steps.

### Regular updates of the sitemap

If you'd like to update the sitemap.xml regularly, you can add a new line in `app/Console/Kernel.php`, in the schedule function:

```php
$schedule->command('generate:sitemap')->daily();
```

## MISC: [Future ideas/development, issues](https://github.com/bringyourownideas/laravel-sitemap/issues), [Contributing](https://github.com/bringyourownideas/laravel-sitemap/blob/master/CONTRIBUTING), [License](https://github.com/bringyourownideas/laravel-sitemap/blob/master/LICENSE)

This package was developed by [Peter Thaleikis](https://peterthaleikis.com) and is supported by [bring your own ideas Ltd.](https://bringyourownideas.com). Bring Your Own Ideas Ltd. helps you to make your project ideas to reality! Get in touch to discuss your new adventure!

[![bring your own ideas](https://bringyourownideas.com/images/byoi-light-bulb-transparent-background.png)](https://bringyourownideas.com)
