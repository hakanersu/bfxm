<?php
include "Bfxm.php";


$json = new Bfxm();

header('Content-Type: application/json');
echo $json->build();

/**
 *  $bfxm->step()->action('play','http://ara.com/test.mp3')->action('gather',[
 *      'min_digits'=>1,
 *      'max_digits'=>1,
 *      'max_attempts'=>3,
 *      'ask'=>'http://bfxmdemo.bulutfon.com/demosesler/numara-tuslayiniz.mp3',
 *      'play_on_error'=>'http://bfxmdemo.bulutfon.com/demosesler/hatali-giris.mp3',
*       'variable_name'=>'returnvar'
 *  ])->hangup()
 *
 *
 *
 */

$bfxm->play('http://ara.com/test.mp3')->gather([
      'min_digits'=>1,
      'max_digits'=>1,
      'max_attempts'=>3,
        'ask'=>'http://bfxmdemo.bulutfon.com/demosesler/numara-tuslayiniz.mp3',
       'play_on_error'=>'http://bfxmdemo.bulutfon.com/demosesler/hatali-giris.mp3',
       'variable_name'=>'returnvar'
  ])->step()->play('baska.mp3')->hangup();