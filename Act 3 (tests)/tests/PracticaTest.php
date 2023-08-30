<?php declare(strict_types = 1);

use PHPUnit\Framework\TestCase;
use GuzzleHttp\Client;

final class PracticaTest extends TestCase
{
    public function testFilesExistence(): void
    {
        $this->assertFileExists('/var/www/html/index.php');
        $this->assertFileExists('/var/www/html/tablas.php');
        $this->assertFileExists('/var/www/html/config.php');
    }

    public function testForm(): void
    {
        $form = file_get_contents('/var/www/html/index.php');
        $this->assertStringContainsStringIgnoringCase('method="post"', $form, $message = 'No está asignado el método post');
    }

    public function testPost(): void
    {
        $client = new Client();
        $response = $client->post('http://127.0.1.1/index.php', [
                'form_params' => [
                    'id' => '1',
                    'nombre' => 'cesar',
                ]
            ]);

        $code = $response->getStatusCode();

    }
}
