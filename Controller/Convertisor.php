
<?php
class Convertisor {

    /**
     * Convert an array to string
     * @param array $array is the array to convert
     * @return string is the array converted to string
     */
    public static function ArrayToString($array) {
        $rst = "";
        foreach ($array as $field) {
            $rst .= "{$field} VARCHAR(255), ";
        }
        $rst = rtrim($rst, ', '); 

        return $rst;
    }
}

?>