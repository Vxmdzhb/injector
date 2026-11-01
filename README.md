# astrx/injector

Constructor injection with explicit shared instances and config-driven setters.

A component of [AstrX](https://github.com/Vxmdzhb/astrx), the PHP framework for server-rendered sites
that work without JavaScript. It used to live in
[`astrx/framework`](https://github.com/Vxmdzhb/framework); this repository carries its history over.

Depends on: [`astrx/config`](https://github.com/Vxmdzhb/config), [`astrx/result`](https://github.com/Vxmdzhb/result).

`resources/` holds its diagnostic messages (en, it).

AstrX isn't on Packagist and doesn't tag versions: you install from each
repository's `main`, and your `composer.lock` pins the exact commit. Tell
Composer where to find the package and the AstrX packages it depends on:

```json
{
    "minimum-stability": "dev",
    "prefer-stable": true,
    "repositories": [
        { "type": "vcs", "url": "https://github.com/Vxmdzhb/injector" },
        { "type": "vcs", "url": "https://github.com/Vxmdzhb/result" },
        { "type": "vcs", "url": "https://github.com/Vxmdzhb/support" },
        { "type": "vcs", "url": "https://github.com/Vxmdzhb/config" }
    ]
}
```

Then:

```sh
composer require astrx/injector:dev-main
```

Issues and pull requests are welcome here. [AstrX](https://github.com/Vxmdzhb/astrx) is the site
that puts all the packages together.

## License

Released under the [Do Whatever License](LICENSE), with a code of conduct
in the same spirit: [CODE_OF_CONDUCT](CODE_OF_CONDUCT).
