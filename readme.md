## Laravel Package Boilerplate.

[![Build Status](https://travis-ci.org/mtvbrianking/laravel-package-boilerplate.svg?branch=master)](https://travis-ci.org/mtvbrianking/laravel-package-boilerplate)
[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/mtvbrianking/laravel-package-boilerplate/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/mtvbrianking/laravel-package-boilerplate/?branch=master)
[![Code Coverage](https://scrutinizer-ci.com/g/mtvbrianking/laravel-package-boilerplate/badges/coverage.png?b=master)](https://scrutinizer-ci.com/g/mtvbrianking/laravel-package-boilerplate/?branch=master)
[![StyleCI](https://github.styleci.io/repos/230607368/shield?branch=master)](https://github.styleci.io/repos/230607368)
[![Documentation](https://img.shields.io/badge/Documentation-Blue)](https://mtvbrianking.github.io/laravel-package-boilerplate)

### [Installation](https://packagist.org/packages/bmatovu/laravel-package-boilerplate)

Install via Composer package manager:

```bash
composer create-project --prefer-dist bmatovu/laravel-package-boilerplate hello-world
```

### Step #1: Own the package

Update the `composer.json` file to match your credentials.

Change the namespaces to match those you're using in `src`.

Change the type from `project` to `library`

```bash
composer dump-autoload
```

### Step #2: Source code documentation

You need to download [Sami](https://github.com/FriendsOfPHP/Sami) for source code documentation.

```bash
curl -O http://get.sensiolabs.org/sami.phar
```

To auto deploy documentation; be sure to add a [`Github token`](https://github.com/settings/tokens) for authorization.

### Step #3: Code Style & Quality

We've added [StyleCI](https://styleci.io) configurations with the Laravel present to get you started.

Also added [ScrutinizerCI](https://scrutinizer-ci.com) configurations for code quality, test coverage inspection.

Locally, you can restort to [PHP-CS-Fixer](https://github.com/FriendsOfPHP/PHP-CS-Fixer).

```bash
php-cs-fixer fix
```

### Step #4: Sharing the package

You may publish your package via [Packagist](#)

Remember to update `.gitattributes` to exempt some files from releases.

## Testing

We've defaulted to [Orchestra's testbench](https://github.com/orchestral/testbench)

## Useful resource

- [Laravel Package Development](https://laravel.com/docs/master/packages)

- [Travis CI + GitHub Pages - Automated deployment](https://www.youtube.com/watch?v=BFpSD2eoXUk)
