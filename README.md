# [Laravel Sitemap Generator](https://github.com/bringyourownideas/laravel-sitemap)

[![Latest Stable Version](https://poser.pugx.org/bringyourownideas/laravel-sitemap/version.svg)](https://github.com/bringyourownideas/laravel-sitemap/releases) [![Latest Unstable Version](https://poser.pugx.org/bringyourownideas/laravel-sitemap/v/unstable.svg)](https://packagist.org/packages/bringyourownideas/laravel-sitemap) [![Total Downloads](https://poser.pugx.org/bringyourownideas/laravel-sitemap/downloads.svg)](https://packagist.org/packages/bringyourownideas/laravel-sitemap) [![License](https://poser.pugx.org/bringyourownideas/laravel-sitemap/license.svg)](https://github.com/bringyourownideas/laravel-sitemap/blob/master/LICENSE)

A simple website crawler using [php-spider](https://github.com/mvdbos/php-spider) and SimpleXMLElement to generate a sitemap.xml-file. The file will be stored in the `public/`-directory. It is commonly used with the [SEO-friendly CommonMark Blog Package](https://github.com/spekulatius/laravel-commonmark-blog) at [bring your own ideas](https://bringyourownideas.com).

The sitemap generator is using the meta tag `article:modified_time` to identify the last modification. `Noindex` in robots meta-tag will be considered and the page will be left out. If a canonical URL is set in the document, this one will be used instead. Priorities are guessed based on the depth of the page in the website.


## Why a Sitemap.xml?

Sitemaps are crawled by several search engines in the aim to identify changed pages on a website quicker and reduce crawling effort. While a sitemap technically isn't required, it can greatly support your efforts to [rank higher](https://github.com/Awesome-SEO).


## Support

This package supports Laravel 6.21 or newer. Tested and used up to Laravel 8.


## Installation

The package is managed using composer. You can install it using:

```bash
composer require bringyourownideas/laravel-sitemap
```

This ensures you receiving later updates automatically. Alternatively, you can install the package manually (not recommended) using the download functionality on GitHub.

## Usage

The package registers a artisan command called `sitemap:generate`. This triggers a crawl of your site and writing out of the sitemap. For convenience, you can add this to your deployment steps.

### Regular Updates of the sitemap

If you'd like to update the sitemap.xml regularly, you can add a new line in `app/Console/Kernel.php`, in the schedule function:

```php
/**
 * Define the application's command schedule.
 *
 * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
 * @return void
 */
protected function schedule(Schedule $schedule)
{
    $schedule->command('sitemap:generate')->daily();

    // ...or with a defined time...

    $schedule->command('sitemap:generate')->daily()->at('02:50');
}
```

## MISC: [Future ideas/development, issues](https://github.com/bringyourownideas/laravel-sitemap/issues), [Contributing](https://github.com/bringyourownideas/laravel-sitemap/blob/master/CONTRIBUTING), [License](https://github.com/bringyourownideas/laravel-sitemap/blob/master/LICENSE)

This package was developed by [Peter Thaleikis](https://github.com/spekulatius) and is supported by [bring your own ideas Ltd.](https://bringyourownideas.com). Bring Your Own Ideas Ltd. helps you to make your project ideas to reality! Get in touch to discuss your new adventure!

[![bring your own ideas](https://bringyourownideas.com/images/byoi-light-bulb-transparent-background.png)](https://bringyourownideas.com)
