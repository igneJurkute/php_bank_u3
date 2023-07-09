<div class="w3-container w3-margin" style="display: flex; align-items: center; flex-direction: column">

    <h1 class="w3-card w3-teal w3-padding">Edit balance</h1>

    <p class="w3-margin">Add or withdraw funds from the account:</p>

    <form class="w3-card w3-container" style="width:50%;" action="/accounts/update/<?= $id ?>" method="post">
        <div class="w3-container" style="display: flex; flex-direction: column;">
            <h3><?= $firstName ?> <?= $lastName ?></h3>
        </div>
        <div class="w3-container" style="display: flex; flex-direction: column;">
            <p>Account number</p>
            <p class="w3-input"><?= $iban ?></p>
        </div>
        <div class="w3-container" style="display: flex; flex-direction: column;">
            <p>Balance</p>
            <p class="w3-input"><?= $balance ?> €</p>
        </div>

        <div class="w3-padding" style="display: flex; flex-direction: column;">
            <label for="amount">Edit balance:</label>
            <input class="w3-input w3-border" type="number" name="amount" id="amount" placeholder="Amount" required>
        </div>

        <div class="w3-padding">
            <button class="w3-btn w3-lime" type="submit" name="add" value=1>Add</button>
            <button class="w3-btn w3-red" type="submit" name="withdraw" value=1>Withdraw</button>
        </div>
    </form>

    <div class="w3-margin">
        <button class="w3-btn w3-khaki">
            <a href="/accounts">Return to list of accounts</a>
        </button>
    </div>

</div>