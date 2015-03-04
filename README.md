# jxmb


    Where is the IMAP support for PHP?

    As default, the IMAP support for PHP is deactivated in XAMPP, because there were some mysterious initialization errors with some home versions like Windows 98. Who works with NT systems, can open the file "\xampp\php\php.ini" to active the php exstension by removing the beginning semicolon at the line ";extension=php_imap.dll". Should be: extension=php_imap.dll

    Now restart Apache and IMAP should work. You can use the same steps for every extension, which is not enabled in the default configuration.

