### Clipboard

![Example](example.gif)

```shell
git clone git@github.com:denyspetrovskyup/url-shortener.git
cd url-shortener
cp .env.example .env
composer install --ignore-platform-reqs
sail artisan key:generate
sail up -d
sail artisan migrate
sail npm run build
```
Go to: http://localhost
