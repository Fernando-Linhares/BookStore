<?php
namespace Application\Cripto\Features;

class Decryptor
{
    private string $key;

    public function __construct(string $key)
    {
        $this->key = $key;
    }

    public function decode(string $cipher, string $nonce)
    {
        $text = base64_decode($cipher);

        return sodium_crypto_secretbox_open($text, $nonce, $this->key);
    }
}