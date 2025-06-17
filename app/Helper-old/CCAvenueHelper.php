<?php
namespace App\Helper;

class CCAvenueHelper
{
    // Encrypt Request Data
    // public static function encrypt($plainText, $workingKey)
    // {
    //     $secretKey = pack("H*", $workingKey);
    //     $initVector = pack("C*", ...array_fill(0, 16, 0));
    //     $encryptedText = openssl_encrypt($plainText, 'AES-128-CBC', $secretKey, OPENSSL_RAW_DATA, $initVector);
    //     return bin2hex($encryptedText);
    // }

    // // Decrypt Response Data
    // public static function decrypt($encryptedText, $workingKey)
    // {
    //     $secretKey = pack("H*", $workingKey);
    //     $initVector = pack("C*", ...array_fill(0, 16, 0));
    //     $encryptedText = hex2bin($encryptedText);
    //     return openssl_decrypt($encryptedText, 'AES-128-CBC', $secretKey, OPENSSL_RAW_DATA, $initVector);
    // }
   public static function encrypt($plainText, $workingKey)
{
    $secretKey = self::hextobin(md5($workingKey));
    $initVector = pack("C*", 0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15);
    $encryptedText = openssl_encrypt($plainText, 'AES-128-CBC', $secretKey, OPENSSL_RAW_DATA, $initVector);
    return bin2hex($encryptedText); // Fix here: use bin2hex
}

    public static function decrypt($encryptedText, $workingKey)
{
    $secretKey = self::hextobin(md5($workingKey));
    $initVector = pack("C*", 0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15);
    $encryptedText = hex2bin($encryptedText);
    return openssl_decrypt($encryptedText, 'AES-128-CBC', $secretKey, OPENSSL_RAW_DATA, $initVector);
}

    private static function hextobin($hexString)
    {
        $length = strlen($hexString);
        $binString = "";
        for ($i = 0; $i < $length; $i += 2) {
            $binString .= chr(hexdec(substr($hexString, $i, 2)));
        }
        return $binString;
    }
}
