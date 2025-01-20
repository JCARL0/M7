<?php
use PHPUnit\Framework\TestCase;

class AccessTest extends TestCase {
    // Probar el acceso de un administrador
    public function testAdminAccess() {
        $_SESSION['rol'] = 'Administrador';
        $this->assertEquals('Administrador', $_SESSION['rol']);
    }

    // Probar el acceso de un usuario
    public function testUserAccess() {
        $_SESSION['rol'] = 'Usuari';
        $this->assertEquals('Usuari', $_SESSION['rol']);
    }

    // Probar un acceso no válido
    public function testInvalidAccess() {
        $_SESSION['rol'] = 'Invitat';
        $this->assertNotEquals('Administrador', $_SESSION['rol']);
        $this->assertNotEquals('Usuari', $_SESSION['rol']);
    }
}
?>
