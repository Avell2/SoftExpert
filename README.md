# SoftExpert
Desenvolvido em php 7.4
design patterns: Strategy
Bootstrap
Jquery
HTML
CSS
ATENÇÃO

1 - O script do banco de dados se encontra na raiz do projeto.
2 - criar o banco de dados no MSSQLSERVER
3 - criar um usuário novo para acessar o banco(utilizar script):

USE [master];
GO
CREATE LOGIN epp 
    WITH PASSWORD    = N'drag1Q2W',
    CHECK_POLICY     = OFF,
    CHECK_EXPIRATION = OFF;
GO
EXEC sp_addsrvrolemember 
    @loginame = N'epp', 
    @rolename = N'sysadmin';


Após o Banco criado não esquecer de substituir o host de conexão no arquivo: src/conexao/Connection.php
