<?php

class ArrayUtil {

    static function array_slice_assoc($array, $keys) {
        return array_intersect_key($array, array_flip($keys));
    }

}