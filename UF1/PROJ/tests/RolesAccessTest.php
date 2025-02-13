<?php

use PHPUnit\Framework\TestCase;

class RolesAccessTest extends TestCase
{
    private $pdo;

    protected function setUp(): void
    {
        // Create a new PDO instance for testing
        $this->pdo = new PDO('mysql:host=localhost;dbname=final_project', 'root', '');
        $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Create roles table for testing
        $this->pdo->exec("CREATE TABLE IF NOT EXISTS roles (
            id INT AUTO_INCREMENT PRIMARY KEY,
            role_name VARCHAR(255) UNIQUE NOT NULL
        )");

        // Insert a test role
        $this->pdo->exec("INSERT INTO roles (role_name)
            VALUES ('Administrator'), ('User')");
    }

    protected function tearDown(): void
    {
        // Drop the roles table after tests
        $this->pdo->exec("DROP TABLE IF EXISTS roles");
        $this->pdo = null;
    }

    public function testRoleAccess()
    {
        $stmt = $this->pdo->prepare("SELECT * FROM roles WHERE role_name = :role_name");
        $stmt->bindValue(':role_name', 'Administrator', PDO::PARAM_STR);
        $stmt->execute();

        $role = $stmt->fetch(PDO::FETCH_ASSOC);

        $this->assertNotNull($role, 'Role should exist');
        $this->assertEquals('Administrator', $role['role_name'], 'Role name should be Administrator');
    }
}
