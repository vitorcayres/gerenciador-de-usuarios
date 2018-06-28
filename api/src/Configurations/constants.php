<?php
switch (APPLICATION_ENV) {
    /**
    * Configuração em Desenvolvimento
    **/	
    case 'development': 
    	# Banco de Dados
        define('HOSTNAME', 'localhost');
        define('DATABASE', 'portal_de_operacoes');
        define('USERNAME', 'root');
        define('PASSWORD', '');
        define('CHARSET', 'utf8');
        define('COLLATION', 'utf8_unicode_ci');
		# SecretKey API
	    define('SECRET_KEY', 'Fsas123@');
    break;
    
    /**
    * Configuração em Homologação
    **/
    case 'homologation': 
        # Banco de Dados
        define('HOSTNAME', '');
        define('DATABASE', '');
        define('USERNAME', '');
        define('PASSWORD', '');
        define('CHARSET', 'utf8');
        define('COLLATION', 'utf8_unicode_ci');
        # SecretKey API
        define('SECRET_KEY', 'Fsas123@');
    break;

    /**
    * Configuração em Produção
    **/
    case 'production':
        # Banco de Dados
        define('HOSTNAME', '');
        define('DATABASE', '');
        define('USERNAME', '');
        define('PASSWORD', '');
        define('CHARSET', 'utf8');
        define('COLLATION', 'utf8_unicode_ci');
        # SecretKey API
        define('SECRET_KEY', 'Fsas123@');
    break;
}