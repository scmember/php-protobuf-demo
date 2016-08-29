Allegro PHP Protobuf demo
=

### Installation


    # git clone https://github.com/allegro/php-protobuf
    # cd php-protobuf
    Build and install the PHP extension (follow instructions at http://php.net/manual/en/install.pecl.phpize.php)
    Install protoc plugin
    # composer install
    Create file.proto
    # php protoc-gen-php.php file.proto
