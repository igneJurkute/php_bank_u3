<div class="w3-container w3-margin">

    <h1 class="w3-card w3-teal w3-padding" style="text-align: center">Accounts list</h1>

    <table class="w3-table w3-bordered">
        <?php if (empty($accounts)) : ?>
            <p class="w3-margin">Accounts list is empty.</p>

        <?php else : ?>
            <tr>
                <th>Name</th>
                <th>Surname</th>
                <th>ID code</th>
                <th>Account number</th>
                <th>Balance</th>
            </tr>
            <?php foreach ($accounts as $account) : ?>
                <tr>
                    <td style="line-height: 35px;"><?= $account['firstName'] ?></td>
                    <td style="line-height: 35px;"><?= $account['lastName'] ?></td>
                    <td style="line-height: 35px;"><?= $account['personalId'] ?></td>
                    <td style="line-height: 35px;"><?= $account['iban'] ?></td>
                    <td style="line-height: 35px;"><?= $account['balance'] ?><span> €</span></td>
                    <td>
                        <button class="w3-btn w3-lime">
                            <a href="/accounts/edit/<?= $account['id'] ?>">Edit balance</a>
                        </button>
                    </td>
                    <td>
                        <button class="w3-btn w3-red">
                            <a href="/accounts/delete/<?= $account['id'] ?>">Delete account</a>
                        </button>
                    </td>
                </tr>




            <?php endforeach ?>
    </table>
<?php endif ?>


</div>