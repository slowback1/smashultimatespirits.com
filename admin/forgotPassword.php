<style>
    * {
        margin: 0;
        padding: 0;
    }
    .registerPage {
        display: flex;
        flex-direction: column;
        width: 100vw;
        height: 100vh;
        align-items: center;
        background-color: #222;
        background-size: cover;
    }
    .adminHead {
        width: 100%;
        height: 52px;
        
    }
    .adminHead h4 {
        text-align: center;
        margin-top: 10px;
        color: #ccc;
    }
    .adminHead p {
        text-align: center;
        color: #ddd;
    }
    label {
        color: #ccc;
    }
    input[type='text'], input[type="password"] {
        padding: 10px;
    }
    input[type="submit"] {
        background-color: #e0181c;
        border-color: #e0181c;
        padding-top: 10px;
        padding-bottom: 10px;
        cursor: pointer;
        
    }
    input[type="submit"]:hover {
        background-color: #e2282b;
        border-color: #e2282b;
        transition: 0.2s;
    }
    fieldset {
        display: flex;
        flex-direction: column;
    }
</style>

<div class="registerPage">
    <div class="adminHead">
        <h4>Forgot Password</h4>
        <?php
            if($_GET['ecode' == 'bademail']) {
                echo "<p>Email address not found in our records.  Please try again. </p>";
            }
        ?>
    </div>
    <form id="forgotPW" action="../actions/resetPassword.php" method="post" accept-charset="UTF-8">
        <fieldset>
            <label for="email">Email Address:</label><input type="text" name="email" id="email" maxlength="255" required placeholder="email">
            <input type="submit" name="requestNuPW" value="Request New Password" />
        </fieldset>
    </form>
</div>