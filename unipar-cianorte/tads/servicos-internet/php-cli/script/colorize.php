<?php



/**
 * @example php colorize.php
 * @link http://softkube.com/blog/generating-command-line-colors-with-php
 */

function colorize($text, $status) {
 $out = "";
 switch($status) {
  case "SUCCESS":
   $out = "[42m"; //Green background
   break;
  case "FAILURE":
   $out = "[41m"; //Red background
   break;
  case "WARNING":
   $out = "[43m"; //Yellow background
   break;
  case "NOTE":
   $out = "[44m"; //Blue background
   break;
  default:
   throw new Exception("Invalid status: " . $status);
 }
 return chr(27) . "$out" . "$text" . chr(27) . "[0m";
}

echo colorize("Your command was successfully executed...", "SUCCESS");
echo PHP_EOL;