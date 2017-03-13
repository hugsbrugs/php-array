<?php

namespace Hug\HArray;

/**
 *
 */
class HArray
{
    /**
     * Shuffle an array while preserving keys 
     * http://php.net/manual/fr/function.shuffle.php
     */
    public static function shuffle_assoc(&$array)
    {
        $keys = array_keys($array);
        shuffle($keys);

        $new = [];

        foreach($keys as $key)
        {
            $new[$key] = $array[$key];
        }

        $array = $new;

        return true;
    }

    /**
     *
     */
    public static function array_sort_by_column(&$arr, $col, $dir = SORT_ASC)
    {
        $sort_col = array();
        foreach ($arr as $key => $row)
        {
            $sort_col[$key] = $row[$col];
        }

        array_multisort($sort_col, $dir, $arr);
    }


    /**
     * Sort a 2 dimensional array based on 1 or more indexes.
     * 
     * msort() can be used to sort a rowset like array on one or more
     * 'headers' (keys in the 2th array).
     * 
     * @param array        $array      The array to sort.
     * @param string|array $key        The index(es) to sort the array on.
     * @param int          $sort_flags The optional parameter to modify the sorting 
     *                                 behavior. This parameter does not work when 
     *                                 supplying an array in the $key parameter. 
     * 
     * @return array The sorted array.
     */
    public static function msort($array, $key, $sort_flags = SORT_REGULAR)
    {
        if (is_array($array) && count($array) > 0)
        {
            if (!empty($key))
            {
                $mapping = array();
                foreach ($array as $k => $v)
                {
                    $sort_key = '';
                    if (!is_array($key))
                    {
                        $sort_key = $v[$key];
                    }
                    else
                    {
                        // @TODO This should be fixed, now it will be sorted as string
                        foreach ($key as $key_key)
                        {
                            $sort_key .= $v[$key_key];
                        }
                        $sort_flags = SORT_STRING;
                    }
                    $mapping[$k] = $sort_key;
                }
                asort($mapping, $sort_flags);
                $sorted = array();
                foreach ($mapping as $k => $v)
                {
                    //$sorted[] = $array[$k];
                    $sorted[$k]=$array[$k];
                }
                return $sorted;
            }
        }
        return $array;
    }

    /**
     * Recursively implodes an array with optional key inclusion
     * 
     * https://gist.github.com/jimmygle/2564610
     *
     * Example of $include_keys output: key, value, key, value, key, value
     * 
     * @access  public
     * @param   string  $glue          value that glues elements together   
     * @param   array   $array         multi-dimensional array to recursively implode
     * @param   bool    $include_keys  include keys before their values
     * @param   bool    $trim_all      trim ALL whitespace from string
     * @return  string  imploded array
     */ 
    public static function recursive_implode($glue, array $array, $include_keys = false, $trim_all = true)
    {
        $glued_string = '';
        // Recursively iterates array and adds key/value to glued string
        array_walk_recursive($array, function($value, $key) use ($glue, $include_keys, &$glued_string)
        {
            $include_keys and $glued_string .= $key.$glue;
            $glued_string .= $value.$glue;
        });
        // Removes last $glue from string
        strlen($glue) > 0 and $glued_string = substr($glued_string, 0, -strlen($glue));
        // Trim ALL whitespace
        $trim_all and $glued_string = preg_replace("/(\s)/ixsm", '', $glued_string);
        return (string) $glued_string;
    }

    /**
     * Transforms an object into an array
     *
     * @param object $obj
     *
     * @return array 
     *
     * @link http://ben.lobaugh.net/blog/567/php-recursively-convert-an-object-to-an-array
     */
    public static function object_to_array($obj)
    {
        if(is_object($obj))
        {
            $obj = (array) $obj;
        }

        if(is_array($obj))
        {
            $new = array();
            foreach($obj as $key => $val)
            {
                $new[$key] = HArray::object_to_array($val);
            }
        }
        else
        {
            $new = $obj;
        }
        
        return $new;
    }

    /**
     * Count in 2 dimensions arrays, number of rows in sub arrays
     *
     * @param array $array
     *
     * @return int $sub_count
     *
     */
    public static function sub_count($array)
    {
        $sub_count = 0;
        if(is_array($array))
        {
            foreach($array as $key => $value)
            {
                if(is_array($value))
                {
                    $sub_count += count($value);
                }
            }
        }
        
        return $sub_count;       
    }

    /**
     * Cuts a string into an array of strings depending of word count
     *
     * @param string $text
     * @param int $word_count
     *
     * @return array $phrases;
     *
     */
    public static function string_to_array($text, $word_count)
    {
        $phrases = [];
        $strings = explode(' ', $text);
        $i = 0;
        $phrase = '';
        foreach ($strings as $string)
        {
            $i++;
            $phrase .= $string . ' ';
            if($i===$word_count)
            {
                /*$phrase = substr($phrase, 0, -1)===' ' ? substr($phrase, 0, strlen($phrase)-1) : $phrase;*/
                $phrases[] = $phrase;
                $i = 0;
                $phrase = '';
            }
        }
        if(strlen($phrase)>0)
        {
            /*$phrase = substr($phrase, 0, -1)===' ' ? substr($phrase, 0, strlen($phrase)-1) : $phrase;*/
            $phrases[] = $phrase;
        }
        return $phrases;
    }
}
