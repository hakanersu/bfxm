# BulutfonXM Json Builder

```shell
composer require xuma/bfxm dev-master
```

###Usage

```php
use Xuma\Bfxm\Builder;

$bfxm = new Builder;

$bfxm->play('http://bfxmdemo.bulutfon.com/demosesler/demo-hosgeldiniz.mp3')
	->dial(10)
	->build();
```
By default build() will return below code if you want to set json header and output below code just use build(true)

```json
{
    "bfxm": {
        "version": 1
    },
    "seq": [
        {
            "action": "play",
            "args": {
                "url": "http://google.com/test.mp3"
            }
        },
        {
            "action": "dial",
            "args": {
                "destination": 10
            }
        }
    ]
}

```


