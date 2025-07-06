<?php

/*
 * For more details about the configuration, see:
 * https://sweetalert2.github.io/#configuration
 */

use Jantinnerezo\LivewireAlert\Enums\Position;

return [
    'position' => Position::Center,
    'timer' => 5000,
    'toast' => false,
    'text' => null,
    'confirmButtonText' => 'Ya',
    'cancelButtonText' => 'Batal',
    'denyButtonText' => 'Tidak',
    'showCancelButton' => true,
    'showConfirmButton' => true,
    'backdrop' => false,
];
