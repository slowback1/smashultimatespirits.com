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
    <h4>Registration Form</h4>
    <p>If you don't know the Secret Answer, you're not supposed to.</p>
</div>

<form id="register" action="../actions/register.php" method="post" accept-charset="UTF-8">
    <fieldset>
    <label for="email">Email Address:</label><input type="text" name="email" id="email" maxlength="255" required placeholder="email"> </input>
    <label for="username">Username:</label><input type="text" name="username" id="username" maxlength="255" required placeholder="username"></input>
    <label for="password">Password:</label><input type="password" name="password" id="password" placeholder="password"></input>
    <label for="password2">Re-Type Password:</label><input type="password" name="password2" id="password2"  placeholder="password" required></input>
    <label for="secretQuestion">Secret Answer:</label><input type="text" name="secretQuestion" id="secretQuestion" placeholder="secretQuestion" required></input>
    <input type="submit" name="register" value="Register"></input>
    </fieldset>
</form>

</div>