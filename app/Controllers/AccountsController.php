<?php

namespace Bank\Controllers;

use Bank\App;
use Bank\IbanId;
use Bank\OldData;
use Bank\Messages;


class AccountsController
{
    public function index()
    {
        $data = App::get('accounts');

        return App::view('accounts/index', [
            'pageTitle' => 'Accounts',
            'accounts' => $data->showAll(),
        ]);
    }

    public function create()
    {
        $old = OldData::getFlashData() ?? [];

        $first_name = $old['first_name'] ?? '';
        $last_name = $old['last_name'] ?? '';
        $personal_id = $old['personal_id'] ?? '';
        $iban = $old['iban'] ?? IbanId::generateLithuanianIBAN();

        return App::view('accounts/create', [
            'pageTitle' => 'Add account',
            'first_name' => $first_name,
            'last_name' => $last_name,
            'personal_id' => $personal_id,
            'iban' => $iban
        ]);
    }

    public function store(array $request)
    {
        extract($request);

        $error1 = 0;
        $error2 = 0;
        $error3 = 0;

        if (strlen($first_name) < 3 || strlen($last_name) < 3) {
            Messages::addMessage('danger', 'The first and last name must consist of at least three characters.');
            $error1 = 1;
        }

        if (!ctype_digit($personal_id) || strlen(trim($personal_id)) !== 11) {
            Messages::addMessage('danger', 'ID code must consist of eleven numbers.');
            $error2 = 1;
        }

        foreach ($accounts as $account) {
            if ($account['personal_id'] === $personal_id) {
                Messages::addMessage('danger', '
                A user with this ID code has already been entered.
                ');
                $error3 = 1;
            }
        }

        if ($error1 || $error2 || $error3) {
            OldData::flashData($request);
            header("Location: /accounts/create");
            die;
        }

        $data = App::get('accounts');
        $newAccount = [
            'id' => $id,
            'first_name' => $first_name,
            'last_name' => $last_name,
            'personal_id' => $personal_id,
            'iban' => $iban,
            'balance' => 0
        ];
        $data->create($newAccount);

        Messages::addMessage('success', 'New account successfully added.');
        header('Location: /accounts');
    }

    public function edit(int $id)
    {
        $data = App::get('accounts');
        $account = $data->show($id);

        $id = $account['id'];
        $first_name = $account['first_name'];
        $last_name = $account['last_name'];
        $personal_id = $account['personal_id'];
        $iban = $account['iban'];
        $balance = $account['balance'];

        return App::view('accounts/edit', [
            'pageTitle' => 'Edit account',
            'id' => $id,
            'first_name' => $first_name,
            'last_name' => $last_name,
            'personal_id' => $personal_id,
            'iban' => $iban,
            'balance' => $balance
        ]);
    }

    public function update(int $id, array $request, int $delete = 0)
    {
        $data = App::get('accounts');
        $account = $data->show($id);

        $amount = $request['amount'];

        if (isset($request['add'])) {
            if ($amount <= 0) {
                Messages::addMessage('danger', 'The amount entered must be a positive integer.');
                header('Location: /accounts/edit/' . $id);
                die;
            }

            $account['balance'] += $amount;

            $data->update($id, $account);
            Messages::addMessage('success', 'Funds have been added to the account.');
            header('Location: /accounts/edit/' . $id);
        }

        if (isset($_POST['withdraw'])) {
            if ($amount <= 0) {
                Messages::addMessage('danger', 'The amount entered must be a positive integer.');
                header('Location: /accounts/edit/' . $id);
                die;
            }

            if ($account['balance'] < $amount) {
                Messages::addMessage('danger', 'Insufficient account balance.');
                header('Location: /accounts/edit/' . $id);
                die;
            }

            $account['balance'] -= $amount;

            $data->update($id, $account);
            Messages::addMessage('success', 'Funds have been withdrawn from the account.');

            if ($delete == 0) {
                header('Location: /accounts/edit/' . $id);
            }
        }
    }

    public function delete(int $id)
    {
        $account = (App::get('accounts'))->show($id);

        $id = $account['id'];
        $first_name = $account['first_name'];
        $last_name = $account['last_name'];
        $personal_id = $account['personal_id'];
        $iban = $account['iban'];
        $balance = $account['balance'];

        return App::view('accounts/delete', [
            'pageTitle' => 'Delete account',
            'id' => $id,
            'first_name' => $first_name,
            'last_name' => $last_name,
            'personal_id' => $personal_id,
            'iban' => $iban,
            'balance' => $balance,
        ]);
    }

    public function destroy(int $id)
    {
        $data = App::get('accounts');
        $account = $data->show($id);
        if ($account['balance'] == 0) {
            $data->delete($id);
            Messages::addMessage('success', 'Account deleted successfully.');
            header('Location: /accounts');
        } else {
            Messages::addMessage('danger', 'There are funds in the account. Cannot be deleted.');
            header('Location: /accounts/delete/' . $id);
        }
    }
}