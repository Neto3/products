<?php
/**
 * Fuel is a fast, lightweight, community driven PHP 5.4+ framework.
 *
 * @package    Fuel
 * @version    1.8.2
 * @author     Fuel Development Team
 * @license    MIT License
 * @copyright  2010 - 2019 Fuel Development Team
 * @link       https://fuelphp.com
 */

/**
 * NOTICE:
 *
 * If you need to make modifications to the default configuration, copy
 * this file to your app/config folder, and make them in there.
 *
 * This will allow you to upgrade fuel without losing your custom config.
 */

return array(
    'driver'                 => 'Simpleauth',
    'verify_multiple_logins' => false,
    'salt'                   => 'E1IUEL0#4!o7Vr!¨OUFDT&fs6O!sMfs#Tys&N&6TTxN*o!*Z9YCY21i59Z)p#hEFa9mWtCe0*5tW)$3yVEZ@3rf67aa2qQQORKfm',
    'iterations'             => 10000,
);
