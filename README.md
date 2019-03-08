EOS ComView Bundle
======================

The Symfony integration for [enm/com-view-client](https://github.com/eosnewmedia/php-com-view-client).

## Installation

```bash
composer require eos/com-view-client-bundle
```

## Configuration

```yaml
eos_com_view_client:
    clients: # the key, in this example "api", will be your client name
        api:
            base_uri: 'http://example.com/api' # the base uri used with this api client
```

## Usage

To access individual clients you can call `Eos\Bundle\ComView\Client\ComViewClientRegistryInterface::getClient($name)` 
 with`$name` like the configured key given in the configuration above.


`Eos\Bundle\ComView\Client\ComViewClientRegistryInterface` is available as service.


Each client is available as service with the individual id `eos.com_view.client.CONFIGURED_NAME`.


The first configured client will also be available as service `Eos\ComView\Client\ComViewClient` for autowiring.
