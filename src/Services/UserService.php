<?php

namespace App\Services;

use App\Models\User;
use Rakit\Validation\Validator;

class UserService
{
    public static function create(array $data)
    {
        try {
            $validator = new Validator();
            $validation = $validator->validate($data, [
                'userDocument'          => 'required|max:11',
                'creditCardToken'       => 'required',
                'value'                 => 'required|integer',
            ]);

            if ($validation->fails()) {
                $errors = $validation->errors();
                print_r($errors->firstOfAll());
                exit;
            }
            $userValidated = $validation->getValidatedData();
            $userValidated['userDocument']     = base64_encode($data['userDocument']);
            $userValidated['creditCardToken']  = base64_encode($data['creditCardToken']);

            $user = User::save($userValidated);
            if (!$user) return ['error' => 'We could not create your account.'];

            return "User created successfully";
        } catch (\PDOException $e) {
            if ($e->errorInfo[0] === '08006') return ['error' => 'We could not connect to the database.'];
            if ($e->errorInfo[0] === '23505') return ['error' => 'User already exists.'];

            return ['error' => $e->getMessage()];
        } catch (\Exception $e) {
            return ['error' => $e->getMessage()];
        }
    }

    public static function fetch()
    {
        try {
            $users = User::fetch();

            if (!$users) return ['error' => 'Unable to find users'];

            return $users;
        } catch (\PDOException $e) {
            if ($e->errorInfo[0] === '08006') return ['error' => 'We could not connect to the database.'];
            if ($e->errorInfo[0] === '23505') return ['error' => 'User already exists.'];

            return ['error' => $e->getMessage()];
        } catch (\Exception $e) {
            return ['error' => $e->getMessage()];
        }
    }

    public static function findById(string|int $id)
    {
        try {
            $user = User::findById($id);

            if (!$user) return ['error' => 'We could not find your account.'];

            return $user;
        } catch (\PDOException $e) {
            if ($e->errorInfo[0] === '08006') return ['error' => 'We could not connect to the database.'];
            if ($e->errorInfo[0] === '23505') return ['error' => 'User already exists.'];

            return ['error' => $e->getMessage()];
        } catch (\Exception $e) {
            return ['error' => $e->getMessage()];
        }
    }

    public static function update(int|string $id, array $data)
    {
        try {
            $validator = new Validator();
            $validation = $validator->validate($data, [
                'userDocument'          => 'required|max:11',
                'creditCardToken'       => 'required',
                'value'                 => 'required|integer',
            ]);

            if ($validation->fails()) {
                $errors = $validation->errors();
                print_r($errors->firstOfAll());
                exit;
            }
            $userValidated = $validation->getValidatedData();
            $userValidated['userDocument']     = base64_encode($data['userDocument']);
            $userValidated['creditCardToken']  = base64_encode($data['creditCardToken']);

            $user = User::update($id, $userValidated);

            if (!$user) return ['error' => 'We could not update your account.'];

            return "User updated successfully!";
        } catch (\PDOException $e) {
            if ($e->errorInfo[0] === '08006') return ['error' => 'We could not connect to the database.'];
            if ($e->errorInfo[0] === '23505') return ['error' => 'User already exists.'];

            return ['error' => $e->getMessage()];
        } catch (\Exception $e) {
            return ['error' => $e->getMessage()];
        }
    }

    public static function delete(string|int $id)
    {
        try {
            $user = User::delete($id);

            if (!$user) return ['error' => 'We could not delete your account.'];

            return "User deleted successfully!";
        } catch (\PDOException $e) {
            if ($e->errorInfo[0] === '08006') return ['error' => 'We could not connect to the database.'];
            if ($e->errorInfo[0] === '23505') return ['error' => 'User already exists.'];

            return ['error' => $e->getMessage()];
        } catch (\Exception $e) {
            return ['error' => $e->getMessage()];
        }
    }
}
