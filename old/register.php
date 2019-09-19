<?php

require_once 'head.php';

?>

<form action="register.php">
    <div class="form-group">
        <label for="email">Email address:</label>
        <input type="email" class="form-control" id="email">
    </div>
    <div class="form-group">
        <label for="pword">Password:</label>
        <input type="password" class="form-control" id="pword">
    </div>
    <div class="form-group">
        <label for="cpword">Confirm Password:</label>
        <input type="password" class="form-control" id="cpword">
    </div>
    <button type="submit" class="btn btn-default">Register</button>
</form>

<?php

require_once 'foot.php';

?>
