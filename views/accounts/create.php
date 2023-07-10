<div class="w3-container w3-margin" style="display: flex; align-items: center; flex-direction: column">

    <h1 class="w3-card w3-teal w3-padding">Add new account</h1>

    <p class="w3-margin">Enter correct information:</p>

    <form class="w3-card w3-padding" style="width: 50%" action="/accounts/store" method="post">
        <div class="w3-padding" style="display: flex; flex-direction: column;">
            <label for="first_name">Name</label>
            <input input class="w3-input w3-border" type="text" name="first_name" id="first_name" value="<?= $first_name ?>" placeholder="Name" required>
        </div>
        <div class="w3-padding" style="display: flex; flex-direction: column;">
            <label for="last_name">Surname</label>
            <input input class="w3-input w3-border" type="text" name="last_name" id="last_name" value="<?= $last_name ?>" placeholder="Surname" required>
        </div>
        <div class="w3-padding" style="display: flex; flex-direction: column;">
            <label for="personal_id">ID code</label>
            <input input class="w3-input w3-border" type="text" name="personal_id" id="personal_id" value="<?= $personal_id ?>" placeholder="ID code" required>
        </div>
        <div class="w3-padding" style="display: flex; flex-direction: column;">
            <label for="iban">Account number</label>
            <input input class="w3-input w3-border" type="text" name="iban" id="iban" value="<?= $iban ?>" readonly>
        </div>
        <div class="w3-padding" style="display: flex; flex-direction: column;">
            <label for="balance">Balance</label>
            <input input class="w3-input w3-border" type="number" name="balance" id="balance" value=0 placeholder="0 €" readonly>
        </div>
        <div class="w3-padding">
            <button style="border-radius: 20px" class="w3-btn w3-lime" type="submit">Save</button>
            <button style="border-radius: 20px" class="w3-btn w3-red">
                <a href="/accounts">Cancel</a>
            </button>
        </div>
    </form>

</div>