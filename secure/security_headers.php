<?php

header("Content-Security-Policy: default-src 'self'; script-src 'self'; style-src 'self'; img-src 'self' data:; object-src 'none'; base-uri 'self'; frame-ancestors 'none'");

header("X-Content-Type-Options: nosniff");

header("X-Frame-Options: DENY");

header("Referrer-Policy: strict-origin-when-cross-origin");

?>