# BulutfonXM Json Builder

```shell
composer require xuma/bfxm dev-master
```

###Usage

You can chain methods.

```php
use Xuma\Bfxm\Builder;

$bfxm = new Builder;

$bfxm->play('http://bfxmdemo.bulutfon.com/demosesler/demo-hosgeldiniz.mp3')
	->dial(10)
	->build();
```
By default build() will return below code if you want to set json header and output below code just use build(true).

```json
{
    "bfxm": {
        "version": 1
    },
    "seq": [
        {
            "action": "play",
            "args": {
                "url": "http://test.com/test.mp3"
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


###Methods

####play($url)

Play sound from given url.

```php
$bfxm->play('http://test.com/test.mp3');
```
```json
{
    "action": "play",
    "args": {
        "url": "http://google.com/test.mp3"
    }
}

```
####gather

Gather input from user.

```php
$bfxm->gather([
	"action" => "gather",
	"args" => [
        "min_digits"  => 1,
        "max_digits"  => 1,
        "max_attempts"  => 3,
        "ask"  => "http://bfxmdemo.bulutfon.com/demosesler/numara-tuslayiniz.mp3",
        "play_on_error"  => "http://bfxmdemo.bulutfon.com/demosesler/hatali-giris.mp3",
        "variable_name"  => "returnvar",
]);
```
####hangup

####reject

####set_caller

####say

####dial