<?php

const DB_HOST = '127.0.0.1';
const DATABASE = 'DONER';
const DB_USER = 'vitaliy';
const DB_PASSWORD = '1319';
const DSN = "mysql:host=" . DB_HOST . ";dbname=" . DATABASE;
const DB_OPTS = [
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
];

const VIEW_DIR = ROOT_DIR . '/views';
const PAGES_DIR = VIEW_DIR . '/pages';
const ADMIN_PAGES_DIR = PAGES_DIR . '/admin';
const PARTS_DIR = VIEW_DIR . '/parts';
const ADMIN_PARTS_DIR = ADMIN_PAGES_DIR . '/parts';
const APP_DIR = ROOT_DIR . '/app';

define("DOMAIN", $_SERVER['REQUEST_SCHEME'] . '://' . $_SERVER['HTTP_HOST']);

const ASSETS_URI = DOMAIN . '/assets';
const ASSETS_DIR = ROOT_DIR . '/assets';
const IMAGES_URI = ASSETS_URI . '/images';
const IMAGES_DIR = ASSETS_DIR . '/images/';

enum Tables: string
{
    case Content = 'content';
    case Users = 'users';
    case Products = 'products';
    case Orders = 'orders';
    case OrderProducts = 'order_products';
}
