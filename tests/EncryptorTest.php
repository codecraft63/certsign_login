<?php

namespace Codecraft63\CertsignLogin;

const TEST_KEY_2 =
"MIICdwIBADANBgkqhkiG9w0BAQEFAASCAmEwggJdAgEAAoGBANOUWEgmVqVWLktFJpO36xqXZnNNbt/LiZrZUHEgJdmiNqqXbBA0Lmbg5uHqbF8f2rXLYFX0S4+lutu4L3AVtsPc1JQsVjDDKB91/K+5vOS3I4I9oPFOOlOejhqCqRwwG1gAYj4/ZhrS561BUne5k48xKGjCWFJ2SG7ZOAvYQ8slAgMBAAECgYAWrsawJXwQiaa45xb1qzgHR8fyAJEsaPO9qCKZniqwpFVcAJPTQOTgnqfh/HHV2OJnrwAK9v/KzKe1uo9LYuiO8PgV6+p/kll+szHIKeOKFjOoHLJc7y2T2D7yGe+Y4s95lOrjnIlRsbQkPmZC6wyckGErVjbCMVAD0nrYwkz9GQJBAPZvG+Q03yFUtGkGWkEU2Kp6UMIWkEtSCuSuIj/wPp2563RbO+XhC5Tu7X/FDipX/YwQbB6epz9SHbvS/iAl65cCQQDbyuAf47ALKQE3EJdcGfJ7ElYf2Zq+K5SqUwW1ubXEy4L6MWbJ2tJbRbQ4+LR/SnLt+cFYFJk2ccs7B4NwWMajAkEA8MCXxRkKLCvunPRB1HcjPVmF8DfO/GbIkaS1fTWeVsU+DEzddbWodPX/POYs8p1H7UBWAIwK5Me6mLaG4q1pPQJAS11dTJH+I1WEHSWLQQGEq7612WX8MYkwCNc+9fkf4sMFvlSCMmTeDH3yNjbRbXRRxFgHe/RUNN8AGNWStEs8kQJBALx5PAhmYLfIZP9TAHJIn5rqdaEWAC7BRnwCREaVXeQxNlD5XJhJqVxqFkFYZvlcFkp2JaBuq8wOCIWpBosiwog=";
class EncryptorTest extends \PHPUnit_Framework_TestCase
{
    public function testEncrypt()
    {
        $original_data = "CertSign Login";
        $encrypted = Encryptor::encrypt($original_data, TEST_KEY_2);

        $this->assertNotEquals($original_data, $encrypted);

        $data = Decryptor::decrypt($encrypted, TEST_KEY_2);
        $this->assertSame($original_data, $data);
    }
}
