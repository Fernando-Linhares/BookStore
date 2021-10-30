<?php
namespace Application\Cripto\Features;

class Encryptor
{
    private string $key;

    public function __construct(string $key)
    {
        $this->key = $key;
    }

    public function encode(string $msg, string $nonce)
    {
        $cipher = sodium_crypto_secretbox($msg, $nonce, $this->key);

        return base64_encode($cipher);
    }
}