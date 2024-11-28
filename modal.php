
<?php
// Fetch the latest products from the session
$flowers = $_SESSION['records'] ?? [];
return $flowers;