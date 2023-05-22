<?php
$this->loadModule('Header');
?>

        <h1>Login</h1>
        <h2>Create New Account</h2>
        <a href="<?php echo URL_BASE . $url_parts[0]; ?>/create">Create Account</a>

        <h2>Login To My Account</h2>
        <form class="LoginForm">
            <input type="text" name="email_address" placeholder="Email Address" />
            <input type="password" name="password" placeholder="Password" />
            <button type="submit">Login</button>
        </form>

<?php
$this->loadModule('Footer');
?>
