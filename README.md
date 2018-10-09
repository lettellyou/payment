# payment
集成三方银联支付的sdk,目前版本包括环讯网关和快捷、杉德网关和快捷、银联网关和快捷、银盛网关、易宝网关、银生宝网关支付，提供了统一支付入口和回调入口，使开发者快速的接入
Payment 需要 PHP &gt;= 5.6以上的版本，并且同时需要PHP安装以下扩展

# 当前支持的接口
当前sdk仅接入了环讯支付、杉德支付、银联支付、银盛支付、易宝支付、银生宝支付，后期将添加更多的三方支付

## 安装

通过composer，这是推荐的方式，可以使用composer.json 声明依赖，或者直接运行下面的命令。

composer require lettellyou/payment
### 如果安装失败，可以运行composer config -g --unset repos.packagist，取消国内镜像
### 也可以带上版本号，如：composer require lettellyou/payment:1.1.0

## 环讯支付接口

* **web网关支付**
* **web快捷支付**
* **wap快捷支付**

## 杉德支付接口

* **web网关支付**
* **web快捷支付**
* **wap快捷支付**

## 银联支付接口

* **web网关支付**
* **web快捷支付**

## 银盛支付接口

* **web网关支付**

## 易宝支付接口

* **web网关支付**

## 银生宝支付接口

* **web网关支付**

## 使用方法
参考demo见example

<p align="center">
    <p align="center">联系邮箱：1215220786@qq.com</p>
</p>
