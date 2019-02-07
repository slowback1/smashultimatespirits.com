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
    .registerPage a {
        color: #ddd;
        text-decoration: none;
        margin-top: 10px;
        transition: 0.5s;
    }
    .registerPage a:hover {
        color: #eee;
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
        <h4>Login</h4>
    </div>
    <form id="login" action="../actions/login.php" method="post" accept-charset="UTF-8">
        <fieldset>
            <label for="email">Email Address:</label><input type="text" name="email" id="email" maxlength="255" required placeholder="email" />
            <label for="password">Password:</label><input type="password" name="password" id="password" maxlength="255" required placeholder="password" />
            <input type="submit" name="login" value="Login" />
        </fieldset>
    </form>
    <a href="./forgotPassword.php">Forgot Password?</a>
</div>