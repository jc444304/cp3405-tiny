<?php

require_once 'head.php';

?>

<form action="login.php">
    <div class="form-group">
        <label for="email">Email address:</label>
        <input type="email" class="form-control" id="email">
    </div>
    <div class="form-group">
        <label for="pword">Password:</label>
        <input type="password" class="form-control" id="pword">
    </div>
    <div class="checkbox">
        <label><input type="checkbox" id="remember"> Remember me</label>
    </div>
    <button type="submit" class="btn btn-default">Sign In</button>
</form>

<?php

require_once 'foot.php';

?>
