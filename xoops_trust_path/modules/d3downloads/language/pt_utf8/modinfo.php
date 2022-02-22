<?php
//  ------------------------------------------------------------------------ //
// $Id: modinfo.php 0003 12:32 2008/04/09 avtx30 $
//  ------------------------------------------------------------------------ //
if( defined( 'FOR_XOOPS_LANG_CHECKER' ) ) $mydirname = 'd3downloads' ;
$constpref = '_MI_' . strtoupper( $mydirname ) ;

if( defined( 'FOR_XOOPS_LANG_CHECKER' ) || ! defined( $constpref.'_LOADED' ) ) {

define( $constpref.'_LOADED' , 1 ) ;

// The name of this module
define($constpref."_NAME","Modulo Duplic��el V3(D3) para downloads");

// A brief description of this module
define($constpref."_DESC","Cria uma se��o de downloads onde os usuarios podem baixar, enviar e avaliar os diversos arquivos.");

// admin menus
define($constpref.'_ADMENU_FILEMANAGER',"Downloads") ;
define($constpref.'_ADMENU_APPROVALMANAGER',"Aprovação") ;
define($constpref.'_ADMENU_CATEGORYMANAGER',"Categorias") ;
define($constpref.'_ADMENU_USER_ACCES','Permissões das Categorias') ;
define($constpref.'_ADMENU_IMPORT',"Importar e Atualizar") ;
define($constpref.'_ADMENU_CONFIG_CHECK',"Verificar configuração") ;
define($constpref.'_ADMENU_MYLANGADMIN',"Linguagens") ;
define($constpref.'_ADMENU_MYTPLSADMIN',"Modelos") ;
define($constpref.'_ADMENU_MYBLOCKSADMIN',"Blocos e Permissões") ;
define($constpref.'_ADMENU_MYPREFERENCES',"Preferenccias") ;

// blocks
define($constpref.'_BNAME_RECENT',"Ultimos Downloads") ;
define($constpref.'_BNAME_TOPRANK',"Top Downloads") ;
define($constpref.'_BNAME_DOWNLOAD',"Informações do Download") ;
define($constpref.'_BNAME_LIST',"Lista de Downloads") ;
define($constpref.'_BNAME_PICKUP',"Pickup Downloads") ;
define($constpref.'_BNAME_CATEGORY','Categories') ;

// Sub menu titles
define($constpref.'_SMNAME1',"Popular");
define($constpref.'_SMNAME2',"Melhor Avaliado");
define($constpref.'_SMNAME3','Lista de Arquivos');
define($constpref.'_MYPOST_VIEW','Meu Post');

// Title of config items
define($constpref.'_POPULAR',"Numero de hits para um download ser considerado como popular");
define($constpref.'_NEWDLS',"Numero máximo de novos downloads a serem mostrados na páina principal");
define($constpref.'_NEWMARK',"Numero de dias para mostrar como 'Novo'");
define($constpref.'_PERPAGE',"Listar contador de Download");
define($constpref.'_ORDER','Ordenar padrão download');
define($constpref.'_ORDERSC','Selecionar a ordem padrão para o download listado.');
define($constpref.'_POPULARITYLTOM','Popularidade (Do hit mais baixo para o mais alto)');
define($constpref.'_POPULARITYMTOL','Popularidade (Do hit mais alto para o mais baixo');
define($constpref.'_TITLEATOZ','Titulo (A para Z)');
define($constpref.'_TITLEZTOA','Titulo (Z para A)');
define($constpref.'_DATEOLD','Data (Arquivos mais antigos listados primeiro)');
define($constpref.'_DATENEW','Date (Arquivos mais novos listados primeiro)');
define($constpref.'_RATINGLTOH','Avaliação (Do mais baixo escore para o mais alto)');
define($constpref.'_RATINGHTOL','Avaliação (Do mais alto escore para o mais baixo)');
define($constpref.'_POSTNAME','Mostrar o nome de quem enviou na listagem do download');
define($constpref.'_MYPOST','Mostrar minhas fotos no sub menu');
define($constpref.'_USESHOTS',"Mostrar imagens do screenshot");
define($constpref.'_USEALBUM',"Utilizar o modulo administrador de envio de imagens para as imagens screenshot");
define($constpref.'_USEALBUMDSC',"Quando 'Mostrar Imagens Screenshot' for configurado Sim, o modulo de administração de envio de imagem pode ser usado para as imagens do screenshot.");
define($constpref.'_ALBUMSELECT',"Nome do diretorio do related myAlbum-P");
define($constpref.'_ALBUMSELECTDSC',"Por favor, informe o nome do diretorio do modulo de administração de imagens (exemplo: myalbum)");
define($constpref.'_SHOTSSELECT',"Usar thumbnail web service para criar imagens screenshot");
define($constpref.'_SHOTSSELECTDSC',"Se 'Mostrar Imagens Screenshot' for selecionado e não existirem imagens screenshot, utilize thumbnail web service para criar imagens alternativas.");
define($constpref.'_SHOTWIDTH',"Mostrar largura da Imagem");
define($constpref.'_CHECKURL',"Desalbilitar downloads da mesma URL");
define($constpref.'_CHECKHOST',"Desabilitar download linkado direto (parasita)");
define($constpref.'_REFERERS',"Sites que podem linkar diretamente para seus arquivos <br>Separado com | ");
define($constpref.'_PER_HISTORY',"Numero de gerações para o historico");
define($constpref.'_EXTENSION',"Extensõess permitidadas");
define($constpref.'_EXTENSIONDSC',"Listar as extensões permitidas separadas por |. Letras pequenas sem espaços ou pontos. php ou html será ignorado.");
define($constpref.'_MAXFILESIZE',"Tamanho máximo do arquivo para envio (in bytes)");
define($constpref.'_MULTIDOT',"Verifica multi-dot quando do envio");
define($constpref.'_MULTIDOTDSC',"Configurar permissão de envio para nome do arquivos com multiplos pontos (nome de aquivos com dois ou mais pontos). Por padrão, arquivos com múltiplos pontos serão apagados razões de segurança.");
define($constpref.'_CHECKHEAD',"Verificar o cabeçalho do arquivo quando do envio");
define($constpref.'_PURIFIER',"Remover palavras fraudulentas quando o Html estiver ativado");
define($constpref.'_PURIFIERDSC',"Quando o Html estiver ativado, o filtro Html será validado por padrão para remover algumas palavras fraudulentas. As publicações são limitados para usuários de confiança. Por favor, selecione 'Sim' na maioria dos casos, exceto quando os filtros de Html provocam alguns efeitos colaterais.");
define($constpref.'_PLATFORM',"Plataforma");
define($constpref.'_PLATFORMDSC',"Listar a plataforma (OS, application, etc), separada com | . Elas serão mostradas na caixa de seleção do formulário de envio.");
define($constpref.'_TELLAFRINED',"Usar o Modulo 'Recomende a um amigo'");
define($constpref.'_PER_RSS',"Numero de itens de RSS");
define($constpref.'_COM_DIRNAME',"Integração de comentários: nome do diretorio do d3forum");
define($constpref.'_COM_FORUM_ID',"Integração de comentários: ID do forum");
define($constpref.'_COM_VIEW',"Integração de comentários: Modo de vizualizaçõo");
define($constpref.'_COM_ORDER','Ordem da Integração de comentários');
define($constpref.'_COM_POSTSNUM','Numero máximo de post mostrados na Integração de comentários');
define($constpref.'_CRON_PASS','Senha de um arquivo errado / checar link quebrado para cron');
define($constpref.'_CRONPASSDSC','Quando usar uma função de checagem running out do arquivo quebrado ou linha de comando no link, por favor use a senha configurada aqui. Utilize apenas caracteres alfa-numéricos. Por favor, não deixe em branco.');

define($constpref.'_POPULARDSC',"Numero de hits antes do status do Download ser considerado como popular.");
define($constpref.'_NEWDLSDSC',"Por favor, configure o Numero de downloads para serem mostrados no topo da página dos ultimos Downloads");
define($constpref.'_PERPAGEDSC',"Numero de Downloads a serem mostrados na lista de cada categoria.");
define($constpref.'_SHOTWIDTHDSC',"Digite a largura máxima (em pixels) das imagens screenshot");
define($constpref.'_REFERERSDSC',"Por favor, relacione os sites os quais podem linkar diretamente seus arquivos");

// Notify Categories
define($constpref.'_NOTCAT_CAT',"Categorias disponiveis");
define($constpref.'_NOTCAT_CATDSC',"Configuração das notificações para as categorias diponiveis");
define($constpref.'_NOTCAT_GLOBAL',"Todo o Moduto");
define($constpref.'_NOTCAT_GLOBALDSC',"Configurações das notificações globais para este Modulo");
define($constpref.'_NOTCAT_FILE', 'Página atual');
define($constpref.'_NOTCAT_FILEDSC', 'Opções de notificação aplicaveis a página atual.');

// Each Notifications
define($constpref.'_NOTIFY_CAT_NEWPOST',"Novo post na categoria");
define($constpref.'_NOTIFY_CAT_NEWPOSTCAP',"Notifique-me quando houver um novo post nesta categaria.");
define($constpref.'_NOTIFY_CAT_NEWPOSTSBJ',"[{X_SITENAME}] {X_MODULE}:{CAT_TITLE} novo post");

define($constpref.'_NOTIFY_CAT_NEWPOSTFULL',"Todo o post nesta categoria");
define($constpref.'_NOTIFY_CAT_NEWPOSTFULLCAP',"Notifique-me com todo o post quando houver um novo post nesta cagegoria.");
define($constpref.'_NOTIFY_CATL_NEWPOSTFULLSBJ',"[{X_SITENAME}] {X_MODULE}:{CAT_TITLE} todo o post");

define($constpref.'_NOTIFY_CAT_NEWFORUM',"Novo forum nesta categoria");
define($constpref.'_NOTIFY_CAT_NEWFORUMCAP',"Notifique-me quando houver um novo forum nesta cagegoria.");
define($constpref.'_NOTIFY_CAT_NEWFORUMSBJ',"[{X_SITENAME}] {X_MODULE}:{CAT_TITLE} novo forum");

define($constpref.'_NOTIFY_GLOBAL_NEWPOST',"Novo Post");
define($constpref.'_NOTIFY_GLOBAL_NEWPOSTCAP',"Notifique-me quando houver um novo post neste Modulo.");
define($constpref.'_NOTIFY_GLOBAL_NEWPOSTSBJ',"[{X_SITENAME}] {X_MODULE}: novo post");

define($constpref.'_NOTIFY_GLOBAL_NEWCATEGORY',"Todo o Modulo");
define($constpref.'_NOTIFY_GLOBAL_NEWCATEGORYCAP',"Notifique-me quando houver uma nova categoria neste Modulo.");
define($constpref.'_NOTIFY_GLOBAL_NEWCATEGORYSBJ',"[{X_SITENAME}] {X_MODULE}: nova categoria");

define($constpref.'_NOTIFY_GLOBAL_WAITING',"Aguardando Aprovação");
define($constpref.'_NOTIFY_GLOBAL_WAITINGCAP',"Notifique-me quando houver um download enviado ou editado aguardando Aprovação.");
define($constpref.'_NOTIFY_GLOBAL_WAITINGSBJ',"[{X_SITENAME}] {X_MODULE}: aguardando");

define($constpref.'_NOTIFY_GLOBAL_BROKEN',"Comunicação de arquivo errado");
define($constpref.'_NOTIFY_GLOBAL_BROKENCAP',"Notifique-me quando houver uma Comunicação de erro. (Somente para os webmasters)");
define($constpref.'_NOTIFY_GLOBAL_BROKENSBJ',"[{X_SITENAME}] {X_MODULE}: Comunicação de download errado");

define($constpref.'_NOTIFY_GLOBAL_APPROVE',"Aprovação de Download");
define($constpref.'_NOTIFY_GLOBAL_APPROVECAP',"Notifique-me quando este download for aprovado.");
define($constpref.'_NOTIFY_GLOBAL_APPROVECAPSBJ',"[{X_SITENAME}] {X_MODULE}: arquivo aprovado");

// add photosite
define($constpref.'_CHECKHEADDSC','Por padrão, a primeira parte de um arquivo é verificado quando do envio.') ;
define($constpref.'_ADMENU_BROKENMANAGER','Comunicações de erro') ;
define($constpref.'_TOP_MESSAGE','Descrição da categoria TOP');
define($constpref.'_TOP_MESSAGEDEFAULT','');
define($constpref.'_BREADCRUMBS','Mostrar breadcrumbs');
define($constpref.'_EDITOR','Corpo do editor');
define($constpref.'_EDITORDSC','o fckeditor será habilitado apenas sob a categoria que for permito o HTML. Nesta categoria , os caracteres especiais de escape do HTML do xoopsdhtml serão mostrados automaticamente.');
define($constpref.'_USELICENSE','Mostrar Licença');
define($constpref.'_LICENSE','Licença');
define($constpref.'_LICENSEDSC','Listar Licença separada com | . Elas serão mostradas na caixa de seleção do formulário de envio.');
define($constpref."_PLUSPOSTS","Computar os posts no contador de post dos usuario");
define($constpref."_PLUSPOSTSDSC", "Quando os downloads mais novos forem publicados, os 'Posts' dos usuarios serão aumentados.");
define($constpref.'_BNAME_MYLINK','Listar meu Link') ;
define($constpref.'_MYLINK','Meu Link');
define($constpref.'_MODULESELECT','O Modulo de administração de imagem usado em conjunto é selecionado. ');
define($constpref.'_ALBUMMODULEDSC','Agora isso corresponde ao myAlbum-P, GnaviD3 e webphoto.');
define($constpref.'_NOTIFY_FILE_COMMENT', 'novo comentário');
define($constpref.'_NOTIFY_FILE_COMMENTCAP', 'Notifique-me quando um novo comentário for postado.');
define($constpref.'_NOTIFY_FILE_COMMENTSBJ', '[{X_SITENAME}] {X_MODULE} : novo comentário');
define($constpref.'_CSS_URI','URI do arquivo CSS para este Modulo');
define($constpref.'_CSS_URIDSC','o percurso absoluto ou relativo pode ser configurado. padrão: {mod_url}/index.php?page=module_header&src=main.css');
define($constpref.'_LIVE_URI','URI do arquivo CSS para livevalidation');
define($constpref.'_LIVE_URIDSC','o percurso absoluto ou relativo pode ser configurado. padrão: {mod_url}/index.php?page=module_header&src=livevalidation.css');
define($constpref.'_HTMLPR_EXCEPT','Grupos que podem evitar purificação por Html estiver ativado');
define($constpref.'_HTMLPR_EXCEPTDSC','Posts de usuarios que não pertencem a esses serão forçados a purificação com o sanitized HTML pelo Html estiver ativado');

}
