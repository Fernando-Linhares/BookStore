<?php
namespace Application\Cripto\Features;

use Application\Messages\ShellMessager;

class GeneratorKey
{
    private ShellMessager $message;

    public function __construct()
    {
        $this->message = new ShellMessager;
    }

    public function generate(): void
    {
        $key = random_bytes(SODIUM_CRYPTO_SECRETBOX_KEYBYTES);

        $base64_key = base64_encode($key);

        $inserted = $this->insert_content('../.env', ['KEY', $base64_key]);
     
        if($inserted && nonce_regenerate())
            $this->message->success('key generated successfully');
        else
            $this->message->danger("don't able generate key");
    }

    public function insert_content(string $filename, array $content): bool
    {
        $filecontent = file_get_contents($filename);

        $lines  = explode("\n",$filecontent);

        $index = count($lines) - 1;

        $lines[$index] = implode('=', $content);
        
        return file_put_contents($filename, implode("\n",$lines));   
    }
}