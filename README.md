# BachiraShop

BachiraShop - online shop written with laravel. This store includes the main functions of an online store. For example, regular authorization, selecting products, adding to cart, placing an order.

https://github.com/JuanCote/BachiraShop/assets/91831744/e8f2e766-3be4-4e28-b037-99d56efba8e2

## Installation

Clone the repository

```bash
  git clone https://github.com/JuanCote/BachiraShop.git
```

Configure your services and environment settings in Laradock.

Start Laradock services:

```bash
  cd laradock
  docker-compose up -d
```
For more information on Laradock setup, refer to the Laradock documentation.

Copy the example env file and make the required configuration changes in the .env file

```bash
  cp .env.example .env
```

Run the database migrations (Set the database connection in .env before migrating)
```bash
  php artisan migrate
```

<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>
