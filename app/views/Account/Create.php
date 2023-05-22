<?php
$this->loadModule('Header');
?>

        <h1>Create Account</h1>
        <form class="CreateAccountForm" method="post" action="<?php echo $current_url; ?>">
            <h2>Contact</h2>
            <label>First Name:</label>
            <input type="text" name="customers_firstname" value="<?php echo $customers_firstname; ?>" /><br />
            <label>Last Name:</label>
            <input type="text" name="customers_lastname" value="<?php echo $customers_lastname; ?>" /><br />
            <label>Phone:</label>
            <input type="text" name="customers_telephone" value="<?php echo $customers_telephone; ?>" /><br />
            <h2>Login Information</h2>
            <label>Email:</label>
            <input type="text" name="email_address" value="<?php echo $email_address; ?>" /><br />
            <label>Confirm Email:</label>
            <input type="text" name="confirm_email" value="<?php echo $confirm_email; ?>" /><br />
            <label>Password:</label>
            <input type="password" name="password" value="" /><br />
            <label>Confirm Password:</label>
            <input type="password" name="confirm_password" value="" /><br />
            <h2>Address</h2>
            <label>Country:</label>
            <select name="customers_country" id="customers_country" data-selected="<?php echo $customers_country; ?>">
                <option value="">Select</option>
<?php
foreach ($countries as $country_id => $country_name) {
?>
                <option value="<?php echo $country_id; ?>"><?php echo $country_name; ?></option>
<?php
}
?>
            </select><br />
            <label>Street Address:</label>
            <input type="text" name="customers_street_address" value="<?php echo $customers_street_address; ?>" /><br />
            <label>Address 2:</label>
            <input type="text" name="customers_suburb" value="<?php echo $customers_suburb; ?>" /><br />
            <label>City:</label>
            <input type="text" name="customers_city" value="<?php echo $customers_city; ?>" /><br />
            <label>State:</label>
            <select name="customers_state" id="customers_state" data-selected="<?php echo $customers_state; ?>">
                <option value="" data-key="">Select</option>
<?php
foreach ($zones as $country_id => $zones) {
    foreach ($zones as $zone_id => $zone_name) {
?>
                <option value="<?php echo $zone_id; ?>" data-key="<?php echo $country_id; ?>"><?php echo $zone_name; ?></option>
<?php
    }
}
?>
            </select>
            <input type="text" name="customers_state_fallback" id="customers_state_fallback" value="<?php echo $customers_state_fallback; ?>" />
            <br />
            <label>Zip:</label>
            <input type="text" name="customers_postcode" value="<?php echo $customers_postcode; ?>" /><br />
            <br />
            <button type="submit">Submit</button>
        </form>

<?php
$this->loadModule('Footer');
?>
