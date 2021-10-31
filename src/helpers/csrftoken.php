<?php

function tokenCSRF()
{
    $name = base64_encode(APPNAME);
    $token = get_token_by($name);
    return "<input type='hidden' value='{$token}' name='token' >";
}

function get_token_by(string $text): string
{
    $criptLib = new Application\Cripto\Crypt;
    return $criptLib->encrypt($text);
}

function verify_token(string $cipher): bool
{
    $criptLib = new Application\Cripto\Crypt;
    return $criptLib->decrypt($cipher) == base64_encode(APPNAME);
}

function generate_key()
{
    $criptLib = new Application\Cripto\Crypt;   
    return $criptLib->generateKey();
}

function make_hash(string $text): string
{
    $criptLib = new Application\Cripto\Crypt;
    return $criptLib->encrypt($text);
}