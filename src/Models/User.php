<?php

namespace App\Models;

class User extends Database
{
    public static function save(array $data)
    {
        $pdo = self::getConnection();

        $stmt = $pdo->prepare(
            "
            INSERT INTO users (userDocument, creditCardToken, value)
            VALUES (?, ?, ?)"
        );
        $stmt->execute([
            $data['userDocument'],
            $data['creditCardToken'],
            $data['value'],
        ]);

        return $pdo->lastInsertId() > 0 ? true : false;
    }

    public static function fetch()
    {
        $pdo = self::getConnection();

        $stmt = $pdo->prepare("
            SELECT * FROM users
        ");
        $stmt->execute();

        return $stmt->fetchAll();
    }

    public static function findById(int|string $id)
    {
        $pdo = self::getConnection();

        $stmt = $pdo->prepare("
            SELECT id, userDocument, creditCardToken, value FROM users 
            WHERE id = ?
        ");
        $stmt->execute([$id]);

        return $stmt->fetch();
    }

    public static function update(int|string $id, array $data)
    {
        $pdo = self::getConnection();

        $stmt = $pdo->prepare("
            UPDATE users 
            SET userDocument = ?, creditCardToken = ?, value = ?
            WHERE id = ?
        ");
        $stmt->execute([
            $data['userDocument'],
            $data['creditCardToken'],
            $data['value'],
            $id,
        ]);

        return $stmt->rowCount() > 0 ? true : false;
    }

    public static function delete(int|string $id)
    {
        $pdo = self::getConnection();

        $stmt = $pdo->prepare("
            DELETE FROM users 
            WHERE id = ?
        ");
        $stmt->execute([$id]);

        return $stmt->rowCount() > 0 ? true : false;
    }
}
