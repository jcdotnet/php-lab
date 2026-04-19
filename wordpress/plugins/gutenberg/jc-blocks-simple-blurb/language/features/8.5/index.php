<?php
// PHP 8.5 was officialy released on november 20, 2025 and comes with new features!
// https://www.php.net/releases/8.5/en.php 
// https://php.watch/versions/8.5
use Uri\Rfc3986\Uri;

$dummy_email_address    = "JOHNDOE@EXAMPLE.COM ";
$dummy_website          = "https://example.com/johndoe";

// feat :: URI EXTENSION
// The new always-available URI extension provides APIs to securely parse and modify URIs and URLs 
// according to the RFC 3986 and the WHATWG URL standards.
// https://thephp.foundation/blog/2025/10/10/php-85-uri-extension/
$uri = new Uri($dummy_website);
$uri->getHost();    // "example.com" 

// before PHP 8.5
$url = parse_url($dummy_website);
echo $url['host'];  // "example.com" 

// feat :: PIPE OPERATOR
// The pipe operator allows chaining function calls together without dealing with intermediary variables. 
// This enables replacing many "nested calls" with a chain that can be read forwards, rather than inside-out.
// https://php.watch/versions/8.5/pipe-operator
// https://thephp.foundation/blog/2025/07/11/php-85-adds-pipe-operator/
function send_email(string $email) {
  return "Email sent to $email succesfully.";
}

// pipe operator
$result = $dummy_email_address 
    |> strtolower(...)
    |> trim(...)
    |> send_email(...);
echo $result;

// nested calls
$result = send_email(trim(strtolower($dummy_email_address)));
echo $result;

// temporary variables
$email  = trim($dummy_email_address);
$lower  = strtolower($email);
$result = send_email($lower);
echo $result;

// email address length
echo $dummy_email_address |> strlen(...);                 // 20
echo $dummy_email_address |> trim(...) |> strlen(...);    // 19

// feat :: Clone With 
// https://www.php.net/releases/8.5/en.php#clone-with

// feat :: No Discart Attribute. By adding the #[\NoDiscard] attribute to a function, 
// PHP will check whether the returned value is consumed and emit a warning if it is not. 
#[NoDiscard]
function foo(): string {
    return "value";
}
// foo(); // The return value of function foo() should either be used or intentionally ignored by casting it as (void)
$return_value = foo(); // no warning

// feat :: Closures and First-Class Callables in Constant Expressions
// Static closures and first-class callables can now be used in constant expressions. 
// This includes attribute parameters, default values of properties and parameters, and constants.
// https://www.php.net/releases/8.5/en.php#closures-in-const-expr

// feat :: array_first() and array_last() functions
// The array_first() and array_last() functions return the first or last value of an array, respectively. 
// And without moving the internal array pointer as in the reset and the end functions!
// If the array is empty, null is returned (making it easy to compose with the ?? operator).
// https://php.watch/versions/8.5/array_first-array_last

$people = ["John", "Jane", "Alice", "Peter"];
echo array_first($people);   // John
echo array_last($people);    // Peter