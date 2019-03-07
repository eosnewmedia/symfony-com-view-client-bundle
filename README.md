EOS ComView Bundle
======================


The Symfony integration for [enm/com-view-client](https://github.com/eosnewmedia/php-com-view-client).


## Installation

```bash
composer require eos/com-view-client-bundle
```

It is recommended to use the Buzz Client, as this will provide the PSR 17 & PSR 18 integrations required for the client. 
```bash
composer require kriswallsmith/buzz
```

## Configuration

```yaml
eos_com_view_client:
    clients: # requires at least one element, the key will be your client name
        api:
            base_uri: 'http://example.com/api' # the base uri used with this api client
```

## Usage

To access individual clients you can access `Eos\Bundle\ComView\Client\ComViewClientRegistryInterface::getClient($name)` where `$name`is the key given in the configuration above.
