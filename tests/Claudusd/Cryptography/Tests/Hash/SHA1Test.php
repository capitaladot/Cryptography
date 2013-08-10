<?php

namespace Claudusd\Cryptography\Tests\Encryption;

use Claudusd\Cryptography\Tests\CryptographyTest;

use Claudusd\Cryptography\Hash\Implementation\SHA1;

class SHA1Test extends CryptographyTest
{
    public function testHashSHA1()
    {
        $hash = new SHA1();

        $this->assertInstanceOf('Claudusd\Cryptography\Hash\HashInterface', $hash);

        $message = 'my message';
        $salt = 'salt';

        $hashWithSalt = $hash->hash($message, $salt);
        $hashWithoutSalt = $hash->hash($message);

        $this->assertNotNull($hashWithSalt);
        $this->assertNotNull($hashWithoutSalt);

        $this->assertNotEquals($message, $hashWithSalt);
        $this->assertNotEquals($message, $hashWithoutSalt);

        $this->assertNotEquals($hashWithSalt, $hashWithoutSalt);
    }
}