<?php
//
//declare(strict_types=1);
//
////https://www.codewars.com/kata/58708934a44cfccca60000c4/train/php
//
//function highlight(string $code): string
//{
//    $highlighted = '';
//
//    //$characters = getCharactersAsArray(str_split($code));
//
//    //$characters = array_values(array_filter($characters));
//
//    //print_r($characters);
//
//    foreach ($characters as $character) {
//        if (preg_match('/^[a-zA-Z]+$/', $character)) {
//            $highlighted .= wrapChar($character);
//        } elseif (preg_match('/^[0-9]*$/', $character)) {
//            $highlighted .= wrapDigit($character);
//        } else {
//            $highlighted .= $character;
//        }
//    }
//
//    return $highlighted;
//}
//
//function wrapChar(string $str): string
//{
//    $colors = [
//        'F' => 'pink',
//        'L' => 'red',
//        'R' => 'green',
//    ];
//
//    $key = strlen($str) > 1 ? $str[0] : $str;
//
//
//    if (array_key_exists($key, $colors)) {
//        return sprintf('<span style="color: %s">%s</span>', $colors[$key], $str);
//    }
//
//    return $str;
//}
//
//function wrapDigit(string $digit): string
//{
//    return sprintf('<span style="color: orange">%s</span>', $digit);
//}
//
///**
// * @param string $code
// * @return string[]
// */
//function getCharactersAsArray(string $code): array
//{
//    $strings = [];
//    $tempStr = '';
//    $tempNum = '';
//    for ($i = 1; $i < strlen($code); $i++) {
//
//    }
//
//    return $strings;
//}
//
//
////echo highlight("44FFFR345F2LL(");
////echo highlight("F3RF5LF(7");
//echo highlight("39F(23)196R(2(611LR7F2L487163F47F43F))705");
//
////    if (is_numeric($arr[0])) {
////        $tempStr = '';
////        $tempNum = $arr[0];
////    } else {
////        $tempStr = $arr[0];
////        $tempNum = '';
////    }
//
////
////    if ($i !== 0) {
////        if (is_numeric($arr[$i])) {
////            $tempNum .= $arr[$i];
////        } else {
////            if ($arr[$i - 1] === $arr[$i]) {
////                $tempStr .= $arr[$i];
////            } else {
////                $strings[] = $tempStr;
////                if (strlen($tempNum) !== 0) {
////                    $strings[] = $tempNum;
////                }
////                $tempNum = '';
////                $tempStr = $arr[$i];
////            }
////        }
////    }
////
////    if ($i === count($arr) - 1) {
////        $strings[] = $tempStr;
////        if (is_numeric($arr[$i])) {
////            $strings[] = $arr[$i];
////        }
////    }
////
////}
//
////$strings = [];
////$tempStr = $arr[0];
////for ($i = 0; $i < count($arr); $i++) {
////    if ($i !== 0) {
////        if ($arr[$i - 1] === $arr[$i]) {
////            $tempStr .= $arr[$i];
////        } else {
////            $strings[] = $tempStr;
////            $tempStr = $arr[$i];
////        }
////    }
////
////    if ($i === count($arr) - 1) {
////        $strings[] = $tempStr;
////    }
////
////}
//
////print_r($strings);
//
////Expected: ')<span style="color: red">L</span>(<span style="color: orange">7356</span><span style="color: green">R</span><span style="color: orange">0</span><span style="color: red">L</span><span style="color: orange">3</span>(<span style="color: orange">892</span>(<span style="color: orange">7</span><span style="color: pink">F</span>(<span style="color: red">L</span><span style="color: orange">9</span>)<span style="color: orange">47</span><span style="color: pink">F</span><span style="color: orange">0</span>)<span style="color: orange">6919004</span>)<span style="color: orange">02</span><span style="color: red">L</span><span style="color: orange">80701</span>(<span style="color: orange">3</span>(<span style="color: orange">700</span><span style="color: red">L</span><span style="color: orange">9062</span><span style="color: red">L</span>)<span style="color: orange">246</span><span style="color: red">L</span><span style="color: orange">8</span>))<span style="color: orange">3</span><span style="color: green">RR</span><span style="color: orange">77</span><span style="color: pink">F</span><span style="color: orange">21</span>)<span style="color: orange">5</span><span style="color: red">L</span><span style="color: orange">33</span><span style="color: pink">F</span>(<span style="color: orange">6</span>'
////Actual  : ')<span style="color: red">L</span>(<span style="color: orange">7356</span><span style="color: green">R</span><span style="color: red">L</span><span style="color: orange">3</span>(<span style="color: orange">892</span>(<span style="color: orange">7</span><span style="color: pink">F</span>(<span style="color: red">L</span><span style="color: orange">9</span>)<span style="color: orange">47</span><span style="color: pink">F</span>)<span style="color: orange">6919004</span>)<span style="color: orange">02</span><span style="color: red">L</span><span style="color: orange">80701</span>(<span style="color: orange">3</span>(<span style="color: orange">700</span><span style="color: red">L</span><span style="color: orange">9062</span><span style="color: red">L</span>)<span style="color: orange">246</span><span style="color: red">L</span><span style="color: orange">8</span>))<span style="color: orange">3</span><span style="color: green">RR</span><span style="color: orange">77</span><span style="color: pink">F</span><span style="color: orange">21</span>)<span style="color: orange">5</span><span style="color: red">L</span><span style="color: orange">33</span><span style="color: pink">F</span>(<span style="color: orange">6</span>'
//
