# Fate sdk for laravel
# 安装
```
composer require zm-dev/fate-laravel-sdk
```
将以下数组添加到 config/app.php 中 (laravel5.5+ 跳过此步骤)
```
'providers' => array(
     //...
     ZMDev\FateSDK\ServiceProvider::class,
),
```
# 配置
发布配置文件 php artisan vendor:publish --provider="ZMDev\FateSDK\ServiceProvider"

配置文件保存在 config/fate.php 中

添加以下配置到 .env 文件中

```
// fate web url
FATE_URL=http://fate:8080
// fate rpc host
FATE_RPC_HOSTNAME=fate:9090
FATE_APP_ID=YOUR_FATE_APP_ID
FATE_APP_SECRET=YOUR_FATE_APP_SECRET
```

# 使用
将 `ZMDev\FateSDK\Middleware\FateBaseAuth::class` 中间件添加到需要保护的路由即可！
