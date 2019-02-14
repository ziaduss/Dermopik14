<?php

function prompt($prompt_msg)
{
  echo("<script type='text/javascript'> var answer = prompt('".$prompt_msg."'); </script>");

  $answer = "<script type='text/javascript'> document.write(answer); </script>";
  return($answer);
}

$prompt_msg = "Password ?";
$name = prompt($prompt_msg);

$output_msg = password_hash($name, PASSWORD_DEFAULT);
echo $name . PHP_EOL;
echo $output_msg . PHP_EOL;
