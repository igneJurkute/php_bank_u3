<div class="w3-container w3-margin">

    <h1 class="w3-card w3-teal w3-padding" style="text-align: center">Login</h1>

    <p class="w3-margin" style="text-align: center; font-size: 30px">Enter your e-mail and password:</p>

    <form class="w3-container" style="text-align: center; display: flex; align-items: center; flex-direction: column; gap: 30px" action="<?= '/login' ?>" method="post">
        <input class="w3-border" type="email" name="email" placeholder="E-mail" value="<?= $old['email'] ?? '' ?>">
        <input class="w3-border" type="password" name="password" placeholder="Password">
        <button class="w3-btn w3-teal" type="submit">Login</button>
    </form>

</div>