<?php

require_once __DIR__ .'/src/classes/registerError.php';

function redirect(string $location): void
{
  header('Location: ' . $location);
  exit;
}

function getMessageError(int $code): string
{
  switch ($code) {
    case registerError::UNABLE_REGISTER:
      return "Sorry, you can't register an account with this email address.";
      break;
    case registerError::CANNOT_FIND_IMAGES:
      return "can't find images";
      break;
    case registerError:: UNACCEPTED_FORMAT:
      return "this format is not supported";  
      break;
    case registerError::UNKNOWN_ERROR:
      return "the error code is unknown";
      break;
    case registerError:: INCORRET_NAME_PWD:
      return "the username or password isn't right";
      break;
    default:
      return "Please contact the administrator";
  }
}
