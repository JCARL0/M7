<?php

use PHPUnit\Framework\TestCase;

class LoginTest extends TestCase
{
    private $pdo;

    protected function setUp(): void
    {
        // Create a new PDO instance for testing
        $this->pdo = new PDO('mysql:host=localhost;dbname=final_project', 'root', '');
        $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Create users table for testing
        $this->pdo->exec("CREATE TABLE IF NOT EXISTS usuaris (
            id INT AUTO_INCREMENT PRIMARY KEY,
            nom_usuari VARCHAR(255) UNIQUE NOT NULL,
            contrasenya VARCHAR(255) NOT NULL,
            rol VARCHAR(50) NOT NULL
        )");

        // Insert a test user
        $this->pdo->exec("INSERT INTO usuaris (nom_usuari, contrasenya, rol)
            VALUES ('testuser', '" . password_hash('password123', PASSWORD_DEFAULT) . "', 'Usuari')");
    }

    protected function tearDown(): void
    {
        // Drop the users table after tests
        $this->pdo->exec("DROP TABLE IF EXISTS usuaris");
        $this->pdo = null;
    }

    public function testValidLogin()
    {
        $username = 'testuser';
        $password = 'password123';

        $stmt = $this->pdo->prepare("SELECT * FROM usuaris WHERE nom_usuari = :username");
        $stmt->bindValue(':username', $username, PDO::PARAM_STR);
        $stmt->execute();

        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        $this->assertNotNull($user, 'User should exist');
        $this->assertTrue(password_verify($password, $user['contrasenya']), 'Password should match');
    }

    public function testInvalidLogin()
    {
        $username = 'nonexistentuser';
        $password = 'wrongpassword';

        $stmt = $this->pdo->prepare("SELECT * FROM usuaris WHERE nom_usuari = :username");
        $stmt->bindValue(':username', $username, PDO::PARAM_STR);
        $stmt->execute();

        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        // Change the assertion to check for false instead of null
        $this->assertFalse($user, 'User should not exist');
    }

}
