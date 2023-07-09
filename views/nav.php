<div class="w3-bar w3-sand">
    <a href="<?= URL ?>" class="w3-bar-item w3-button w3-mobile w3-teal" style="width:30%">Home</a>

    <a href="<?= URL . 'accounts' ?>" class="w3-bar-item w3-button w3-mobile" style="width:20%">Accounts</a>
    <a href="<?= URL . 'accounts/create/' ?>" class="w3-bar-item w3-button w3-mobile" style="width:20%">Add account</a>

    <?php if (isset($_SESSION['email'])) : ?>
        <form action="<?= URL . 'logout' ?>" method="post" style="display: inline;">
            <button type="submit" class="w3-bar-item w3-button w3-sand" style="width:20%">Log out</button>
        </form>
    <?php else: ?>
        <a href="<?= URL . 'login' ?>" class="w3-bar-item w3-button" style="width:20%">Login</a>
    <?php endif ?>
</div>

<!-- <div class="w3-bar w3-dark-grey">
  <a href="#" class="w3-bar-item w3-button w3-mobile w3-green" style="width:33%">Home</a>
  <a href="#" class="w3-bar-item w3-button w3-mobile" style="width:33%">Link 1</a>
  <a href="#" class="w3-bar-item w3-button w3-mobile" style="width:33%">Link 2</a>
</div> -->