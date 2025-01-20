<?php
use PHPUnit\Framework\TestCase;

class LoginTest extends TestCase {
    private $conn;

    // Configuración de la conexión a la base de datos antes de cada test
    protected function setUp(): void {
        $host = 'localhost';
        $user = 'admin';
        $password = 'admin';
        $db = 'm7uf1projecte';
        $this->conn = new mysqli($host, $user, $password, $db);
    }

    // Probar un inicio de sesión válido
    public function testValidLogin() {
        $username = 'admin';
        $password = 'admin123';

        $stmt = $this->conn->prepare("SELECT * FROM usuaris WHERE nom_usuari = ?");
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $result = $stmt->get_result();
        $user = $result->fetch_assoc();

        $this->assertTrue(password_verify($password, $user['contrasenya']));
    }

    // Probar un inicio de sesión inválido
    public function testInvalidLogin() {
        $username = 'fakeuser';
        $password = 'fakepassword';

        $stmt = $this->conn->prepare("SELECT * FROM usuaris WHERE nom_usuari = ?");
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $result = $stmt->get_result();
        
        $this->assertEquals(0, $result->num_rows);
    }
}
?>
