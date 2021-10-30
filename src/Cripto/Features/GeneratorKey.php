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
        $nonce = random_bytes(SODIUM_CRYPTO_SECRETBOX_NONCEBYTES);


        $base64_key = base64_encode($key);
        $base64_nonce = base64_encode($nonce);

        $inserted = $this->insert_content('../.env', ['KEY'=>$base64_key,'NONCE'=> $base64_nonce]);

     
        if($inserted)
            $this->message->success('key generated successfully');
        else
            $this->message->danger("don't able generate key");
    }

    public function insert_content(string $filename, array $content): bool
    {
        $filecontent = file_get_contents($filename);

        $lines  = explode("\n",$filecontent);

        $index = count($lines) - 1;

        $moretwo = 2 + $index;
    
        $count = 0;

        for($i=$index;$i<$moretwo;$i++){
            $lines[$i] = array_keys($content)[$count].'='.array_values($content)[$count];
            $count++;
        }
        return file_put_contents($filename, implode("\n",$lines));
    }
}