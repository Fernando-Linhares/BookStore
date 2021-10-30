<?php
/**
 * Component for encryption and decryption of application
 * used for compares and create tokens like csrf and more.
 */
namespace Application\Cripto;

use Application\Cripto\Features\Decryptor;
use Application\Cripto\Features\Encryptor;
use Application\Cripto\Features\GeneratorKey;

class Crypt
{
    private Encryptor $encryptor;
    private Decryptor $decryptor;
    private GeneratorKey $generatorKey;

    public function __construct()
    {
        $this->encryptor = new Encryptor($this->getKey());
        $this->decryptor = new Decryptor($this->getKey());
        $this->generatorKey = new GeneratorKey;
    }

    public function decrypt(string $hash): string
    {
        return $this->decryptor->decode($hash, $this->getNonce());
    }

    public function encrypt(string $bytes): string
    {
        return $this->encryptor->encode($bytes, $this->getNonce());
    }

    public function getKey(): string
    {
        return base64_decode(KEY);
    }

    public function getNonce(): string
    {
        return base64_decode(NONCE);
    }

    public function generateKey(): void
    {
       $this->generatorKey->generate();
    }
}