<header><h1>Juree</h1></header>
<h1>Database Error</h1>
<p>There was an error connecting to the database.</p>
<?php if (isset($error) && $debug) {
    print_r($error);

}; ?>