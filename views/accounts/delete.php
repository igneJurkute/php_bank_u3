<div class="w3-container w3-margin" style="display: flex; align-items: center; flex-direction: column">

    <h1 class="w3-card w3-teal w3-padding">Delete account</h1>

    <p class="w3-margin">Are you sure you want to delete the account??</p>

    <form class="w3-card w3-container" style="width:50%;" action="/accounts/destroy/<?= $id ?>" method="post">

        <div class="w3-container" style="display: flex; flex-direction: column;">
            <h3><?= $first_name ?> <?= $last_name ?></h3>
        </div>
        <div class="w3-container" style="display: flex; flex-direction: column;">
            <p>Account number</p>
            <p class="w3-input"><?= $iban ?></p>
        </div>
        <div class="w3-container" style="display: flex; flex-direction: column;">
            <p>Balance</p>
            <p class="w3-input"><?= $balance ?> €</p>
        </div>

        <div class="w3-padding">
            <button style="border-radius: 20px" class="w3-btn w3-lime" type="submit">Delete</button>
            <button style="border-radius: 20px" class="w3-btn w3-red">
                <a href="/accounts">Cancel</a>
            </button>
        </div>
    </form>

</div>