MyNow
=====

Load your own time in order to simulate the current date and time.

Why MyNow?
----------


Installation with Composer
--------------------------

```shell
composer require axiocode/mynow
```

Usage
-----

Create the `.time` file in your directory with the timestamp of desired date and time.

````
245671200
````

You can then load `.time` in your application with:

```php
$mynow = MyNow\MyNow::create(__DIR__);
```

Replace all calls to the default DateTime() constructor by MyNow DateTime.

```php
$now = MyNow\DateTime();
````

If MyNow is not used or no file exists, the default DateTime instance will be used without to break your code.

Loaders
-------

Currently only text loader is supported.

Different loaders may be provided to load date/time from different sources such as a database, YAML, etc.

License
-------

MyNow is licensed under [The BSD 3-Clause License](LICENSE).