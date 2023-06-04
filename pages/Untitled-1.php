<?php
    session_start();

    $_SESSION["A"] = "Some New Value";  // set new value

    // session_reset();  // old session value restored
    echo $_SESSION["A"];

    //Output: Some Value
?>