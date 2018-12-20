# Magento 1.x plugin

To prepare *.tgz file for this integration please use [MagentoTarToConnect](https://github.com/astorm/MagentoTarToConnect) tool.
It will make creating archive as painless as possible.

To use aforementioned tool you need config file. In main directory there is `config.php` file that is mostly ready just fill two parameters: `path_output`, `base_dir`, and update third - `archive_files`.
After that, just do 
```php
$ ./magento-tar-to-connect.php config.php
```
and upload newly created `*.tgz`.



