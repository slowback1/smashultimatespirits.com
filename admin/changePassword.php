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
        <h4>Change Password</h4>
        <?php
            if($_GET['ecode'] == "resetPW") {
                echo "<p>Your temporary password is 'test', please reset it to something you will remember.</p>";
            }
        ?>
    </div>
    <form id="changePassword" action="../actions/changePassword.php" method="post" accept-charset="UTF-8">
        <fieldset>
            <label for="email">Email Address:</label><input type="text" name="email" id="email" maxlength="255" required placeholder="email" />
            <label for="opassword">Old Password:</label><input type="password" name="opassword" id="opassword" maxlength="255" required placeholder="password" />
            <label for="npassword1">New Password:</label><input type="password" name="npassword1" id="npassword1" maxlength="255" required placeholder="new password" />
            <label for="npassword2">Re-Type New Password:</label><input type="password" name="npassword2" id="npassword2" maxlength="255" required placeholder="retype new password" />
            <input type="submit" name="changepw" value="Change Password" />
        </fieldset>
    </form>
</div>