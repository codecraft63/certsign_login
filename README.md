# certsign_login

[![Latest Version on Packagist][ico-version]][link-packagist]
[![Software License][ico-license]](LICENSE.md)
[![Build Status][ico-travis]][link-travis]
[![Coverage Status][ico-scrutinizer]][link-scrutinizer]
[![Quality Score][ico-code-quality]][link-code-quality]
[![Total Downloads][ico-downloads]][link-downloads]

O [Certisign Login](https://www.certisign.com.br/solucoes-corporativas/seguranca-e-gerenciamento/certisignlogin) é uma solução gratuita de identificação rápida e segura por
 meio da Certificação Digital.

## Install

Via Composer

``` bash
$ composer require codecraft63/certsign_login
```

## Usage

Para descriptografar os dados retornados pela Certisign Login, use o seguinte
código:

``` php
use Codecraft63\CertsignLogin\{Decryptor, ResponseParse};

$private_key = '__MY_PRIVATE_KEY_STRING__';

$decrypted_string = Decryptor::decrypt($encrypted_data, $private_key);
$decrypted_object = new ResponseParse($decrypted_string);

print $decrypted_objec->nome();
print $decrypted_objec->email();
```
Apesar de não haver necessidade de criptografar informações para usar o Certisign Login, a classe para tal funcionalidade também está disponível.

``` php
use Codecraft63\CertsignLogin\Encryptor;

$private_key = '__MY_PRIVATE_KEY_STRING__';

$encrypted_data = Encryptor::encrypt($plain_text_data, $private_key);
```

## Change log

Please see [CHANGELOG](CHANGELOG.md) for more information what has changed recently.

## Testing

``` bash
$ composer test
```

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) and [CONDUCT](CONDUCT.md) for details.

## Security

If you discover any security related issues, please email ramon@codecraf63.com instead of using the issue tracker.

## Credits

- [Ramon Soares][link-author]
- [All Contributors][link-contributors]

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.

[ico-version]: https://img.shields.io/packagist/v/codecraft63/certsign_login.svg?style=flat-square
[ico-license]: https://img.shields.io/badge/license-MIT-brightgreen.svg?style=flat-square
[ico-travis]: https://img.shields.io/travis/codecraft63/certsign_login/master.svg?style=flat-square
[ico-scrutinizer]: https://img.shields.io/scrutinizer/coverage/g/codecraft63/certsign_login.svg?style=flat-square
[ico-code-quality]: https://img.shields.io/scrutinizer/g/codecraft63/certsign_login.svg?style=flat-square
[ico-downloads]: https://img.shields.io/packagist/dt/codecraft63/certsign_login.svg?style=flat-square

[link-packagist]: https://packagist.org/packages/codecraft63/certsign_login
[link-travis]: https://travis-ci.org/codecraft63/certsign_login
[link-scrutinizer]: https://scrutinizer-ci.com/g/codecraft63/certsign_login/code-structure
[link-code-quality]: https://scrutinizer-ci.com/g/codecraft63/certsign_login
[link-downloads]: https://packagist.org/packages/codecraft63/certsign_login
[link-author]: https://github.com/ramon
[link-contributors]: ../../contributors
