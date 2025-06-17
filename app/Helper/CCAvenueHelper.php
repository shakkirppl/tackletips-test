<?php
namespace App\Helper;

class CCAvenueHelper
{
    // Encrypt Request Data
    public static function encrypt($plainText, $workingKey)
    {
        $secretKey = pack("H*", $workingKey);
        $initVector = pack("C*", ...array_fill(0, 16, 0));
        $encryptedText = openssl_encrypt($plainText, 'AES-128-CBC', $secretKey, OPENSSL_RAW_DATA, $initVector);
        return bin2hex($encryptedText);
    }

    // Decrypt Response Data
    public static function decrypt($encryptedText, $workingKey)
    {
        $secretKey = pack("H*", $workingKey);
        $initVector = pack("C*", ...array_fill(0, 16, 0));
        $encryptedText = hex2bin($encryptedText);
        return openssl_decrypt($encryptedText, 'AES-128-CBC', $secretKey, OPENSSL_RAW_DATA, $initVector);
    }
}
