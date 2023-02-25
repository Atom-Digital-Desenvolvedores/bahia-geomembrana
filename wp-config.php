<?php
/**
 * As configurações básicas do WordPress
 *
 * O script de criação wp-config.php usa esse arquivo durante a instalação.
 * Você não precisa usar o site, você pode copiar este arquivo
 * para "wp-config.php" e preencher os valores.
 *
 * Este arquivo contém as seguintes configurações:
 *
 * * Configurações do MySQL
 * * Chaves secretas
 * * Prefixo do banco de dados
 * * ABSPATH
 *
 * @link https://codex.wordpress.org/pt-br:Editando_wp-config.php
 *
 * @package WordPress
 */

// ** Configurações do MySQL - Você pode pegar estas informações com o serviço de hospedagem ** //
/** O nome do banco de dados do WordPress */
define('DB_NAME', 'bahiageomembra');

/** Usuário do banco de dados MySQL */
define('DB_USER', 'bahiageomembra');

/** Senha do banco de dados MySQL */
define('DB_PASSWORD', '2CZymq8xEVli');

/** Nome do host do MySQL */
define('DB_HOST', 'mysql11-farm76.kinghost.net');

/** Charset do banco de dados a ser usado na criação das tabelas. */
define('DB_CHARSET', 'utf8mb4');

/** O tipo de Collate do banco de dados. Não altere isso se tiver dúvidas. */
define('DB_COLLATE', '');

/**#@+
 * Chaves únicas de autenticação e salts.
 *
 * Altere cada chave para um frase única!
 * Você pode gerá-las
 * usando o {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org
 * secret-key service}
 * Você pode alterá-las a qualquer momento para invalidar quaisquer
 * cookies existentes. Isto irá forçar todos os
 * usuários a fazerem login novamente.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         'ikll_v7k*A-jduq(lpdg/bP?hjmzcZ[lr~}=L(Ei `$oSYW[k&b<xQoJF+ yoZlf');
define('SECURE_AUTH_KEY',  'z]l;UMV<%L+{)j0na(iP~<-?F=QJ;H+ZwjdG7qcyI:O!F0!|+M=A<ph{;534W.w4');
define('LOGGED_IN_KEY',    'A,TZ~0,@+LR-:$N*`l1<rG?vw[=!fCG_2wuW|>m%W -Udf$]bZWpmo$gNbKo8Kl:');
define('NONCE_KEY',        'db#S0=s7y>6,(eY/h*x#^kztBJ=bD $EIW]:vu7!qE<z$n*1aMBaZSo,3Sx(:qkR');
define('AUTH_SALT',        'z~O*DTo9-6i=74T=NiiVk*95W.8D_K$czu9RM={^o4@EkT%tY^mdI<,YUPaU9,yD');
define('SECURE_AUTH_SALT', '3:!QA[}_4Vt[?fg8<kxpnz4/qa{BL9JmNmiC>IL5Et]B0.yUN:be5l}&cYvSC&~v');
define('LOGGED_IN_SALT',   '[rB@}K;AYfmeH:{:[G%zp%og)Zga_f.Gkg@ ?]M%R;gTgr{(keFu C*iXw3CsygM');
define('NONCE_SALT',       'sL/sM9U7,[}l,Da98_`,2gNJY;eN,kRzQP^L?sV/fLuIm{C[UDxpU9_cuPC;FPhF');

/**#@-*/

/**
 * Prefixo da tabela do banco de dados do WordPress.
 *
 * Você pode ter várias instalações em um único banco de dados se você der
 * um prefixo único para cada um. Somente números, letras e sublinhados!
 */
$table_prefix  = 'eng_';

/**
 * Para desenvolvedores: Modo de debug do WordPress.
 *
 * Altere isto para true para ativar a exibição de avisos
 * durante o desenvolvimento. É altamente recomendável que os
 * desenvolvedores de plugins e temas usem o WP_DEBUG
 * em seus ambientes de desenvolvimento.
 *
 * Para informações sobre outras constantes que podem ser utilizadas
 * para depuração, visite o Codex.
 *
 * @link https://codex.wordpress.org/pt-br:Depura%C3%A7%C3%A3o_no_WordPress
 */
define('WP_DEBUG', false);

/* Isto é tudo, pode parar de editar! :) */

/** Caminho absoluto para o diretório WordPress. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Configura as variáveis e arquivos do WordPress. */
require_once(ABSPATH . 'wp-settings.php');
