<?php

class Hash
{
    /**
     * This function creates a hash for a password
     * 
     * @param string $data - The string to hash
     * 
     * @return hashstring
     */
    public static function create($data)
    {
        $context = hash_init(HASH_MODE, HASH_HMAC, HASH_KEY);
        hash_update($context, $data);

        return hash_final($context);
    }
}