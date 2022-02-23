<?php
//  ------------------------------------------------------------------------ //
// $Id: admin.php 0003 12:31 2008/04/09 avtx30 $
// Tradu��o para o Brasil: Miraldo Antoninho Ohse
// Site: http://investbizu.com
//  ------------------------------------------------------------------------ //

// D3DOWNLOADS FILEMANAGER
define("_MD_D3DOWNLOADS_H2FILEMANAGER","Arquivos");
define("_MD_D3DOWNLOADS_NEWADDFILE","Adicionar um download");
define("_MD_D3DOWNLOADS_TH_VISIBLE","Visivel");
define("_MD_D3DOWNLOADS_TH_CANCOMMENT","Comentar");
define("_MD_D3DOWNLOADS_TH_CATEGORY","Categoria");
define("_MD_D3DOWNLOADS_TH_BROKEN","Arquivo com erro");
define("_MD_D3DOWNLOADS_TH_HITS","Hits");
define("_MD_D3DOWNLOADS_TH_RATING","Avaliação");
define("_MD_D3DOWNLOADS_TH_COMMENTS","Comentários");
define("_MD_D3DOWNLOADS_VOTES"," votos");
define("_MD_D3DOWNLOADS_LABEL_FILECHECKED","Downloads checados");
define("_MD_D3DOWNLOADS_CONFIRM_DELETE","Tem a certeza que deseja deletar?");
define("_MD_D3DOWNLOADS_LABEL_CATEGORYSELECT","Selecionar a categoria");
define("_MD_D3DOWNLOADS_TOTAL_FIlE_NUM","Existem %s relatorios totais");
define("_MD_D3DOWNLOADS_CATEGORY_FIlE_NUM","Existem %s downloads sob esta categoria");
define("_MD_D3DOWNLOADS_BTN_MOVE","Mover");
define("_MD_D3DOWNLOADS_MOVEED","Mudança feita");
define("_MD_D3DOWNLOADS_NO_MOVEED","Selecionar a categoria de destino");
define("_MD_D3DOWNLOADS_CONFIRM_MOVE","Você tem certeza que deseja mover? Note que, se você usar este item, você tem de mover manualmente o screenshot da categoria. ");

// D3DOWNLOADS APPROVALMANAGER
define("_MD_D3DOWNLOADS_H2APROVALLIST","Novos downloads aguardando por aprovação");
define("_MD_D3DOWNLOADS_H2MODFILELIST","Downloads editados aguardando aprovação");
define("_MD_D3DOWNLOADS_APPROVAL","Aprovação");
define("_MD_D3DOWNLOADS_SUBMIT_APPROVAL","Download para aprovação");
define("_MD_D3DOWNLOADS_SUBMIT_APPROVED","Aprovados");
define("_MD_D3DOWNLOADS_UNAPROVALNUM","Downloads não aprovados: %s");
define("_MD_D3DOWNLOADS_NOWDATA","Conteção antes da aprovação");

// D3DOWNLOADS CATEGORY MANAGER
define("_MD_D3DOWNLOADS_H2CATEGORYMANAGER","Categorias");
define("_MD_D3DOWNLOADS_NEWCATEGORY","Adicionar uma nova categoria");
define("_MD_D3DOWNLOADS_TH_ID","ID");
define("_MD_D3DOWNLOADS_TH_TITLE","Titulo");
define("_MD_D3DOWNLOADS_TH_WEIGHT","Peso");
define("_MD_D3DOWNLOADS_TH_CONTENTSACTIONS","Ação");
define("_MD_D3DOWNLOADS_LABEL_CATEGORYCHECKED","Checar categorias");
define("_MD_D3DOWNLOADS_BTN_DELETE","Deletar");
define("_MD_D3DOWNLOADS_CATEGORYEDITTITLE","Editar Categoria");
define("_MD_D3DOWNLOADS_CATEGORYTITLE","Titulo");
define("_MD_D3DOWNLOADS_CATEGORYIMGURL","URL da imagem da categoria");
define("_MD_D3DOWNLOADS_CATEGORYIMGURLDESC","A largura da Imagem será configurada para 70 pixels.");
define("_MD_D3DOWNLOADS_CATEGORYSHOTSDIR","Diretorio para screenshots");
define("_MD_D3DOWNLOADS_CATEGORYSHOTSDIRDESC","Configurar o percurso depois da  url do XOOPS.<br>Por exemplo: images/shots/ (sem o primeiro /, com o ultimo /)");
define("_MD_D3DOWNLOADS_CATEGORYSHOTSDIRHELP","Opcional. Se pular, as imagens sob o diretorio %s serão usadas como screenshots.");
define("_MD_D3DOWNLOADS_CATWEIGHT","Peso");
define("_MD_D3DOWNLOADS_MAINCATEGORY","Categoria Principal");
define("_MD_D3DOWNLOADS_HELP_CATEGORY_DEL","Nota: Se você deletar uma categoria, todos os dados e suas subcategorias serão deletados.");
define("_MD_D3DOWNLOADS_CONFIRM_CATEGORY_DEL","Você tem certeza que deseja deletar esta categoria? Todos os dados e sub categorias serão deletados!");
define("_MD_D3DOWNLOADS_SUBMIT_MESSAGE","Descrição do formulario de envio");
define("_MD_D3DOWNLOADS_SUBMIT_MESSAGE_HELP","Informe a descrição que será mostrada no topo do formulario de envio pelos usuarios que não sejam webmasters. A informação é opcional. Se você deixar em branco, a descrição padrão será mostrada.");

// D3DOWNLOADS USER ACCESS
define("_MD_D3DOWNLOADS_H2USERACCESS","Permissçãs da Categoria");
define("_MD_D3DOWNLOADS_TH_GROUPID","ID do Grupo");
define("_MD_D3DOWNLOADS_TH_GROUPNAME","Nome do Grupo");
define("_MD_D3DOWNLOADS_TH_CAN_READ","Ler");
define("_MD_D3DOWNLOADS_TH_CAN_POST","Postar");
define("_MD_D3DOWNLOADS_TH_CAN_EDIT","Editar");
define("_MD_D3DOWNLOADS_TH_CAN_DELETE","Deletar");
define("_MD_D3DOWNLOADS_TH_POST_AUTO_APPROVED","Aprovação automática (Envio)");
define("_MD_D3DOWNLOADS_TH_EDIT_AUTO_APPROVED","Aprovação automática (Editat)");
define("_MD_D3DOWNLOADS_TH_CAN_HTML","Permitir Html");
define("_MD_D3DOWNLOADS_HELP_USERACCESS","Nota: As configuraçõe de editar, deletar, aprovação automática e Html para usuários convidados serão ignoradas mesmo que você as configure.<br>  Essas configurações são aplicadas apenas a usuários registrados.<br>&#8251;  Os webmasters podem editar, deletar e enviar, independentemente destas configurações.");
define("_MD_D3DOWNLOADS_HELP_USERACCESS_PID","Nota: Veja que as configurações serão herdadas da categoria pai.");

// D3DOWNLOADS IMPORT
define("_MD_D3DOWNLOADS_H2_IMPORTFROM","Importar");
define("_MD_D3DOWNLOADS_BTN_DOIMPORT","Fazer importação");
define("_MD_D3DOWNLOADS_LABEL_SELECTMODULE","Selecionar modulo");
define("_MD_D3DOWNLOADS_CONFIRM_DOIMPORT","Você tem certeza que deja importar?");

//_MD_D3DOWNLOADS_HELP_IMPORTFROM
define("_MD_D3DOWNLOADS_HELP_IMPORTFROM","A presente versão pode importar de de outros d3downloads, mydownloads, wfdownloads v3.10 ou superior. Nós tentamos melhorar o código para que seja importado tudo corretamente mas é possivel que o processo não seja completo. Note que ao efetuar a importação, <b>os dados atuais deste modulo serão deletados completamente!</b> E se você importar do mydownloads ou wfdownloads, as permissões da categorias serão zeradas. Não esqueça de configurar as permissões manualmente depois da importação.");
define("_MD_D3DOWNLOADS_FILE_IMPORT_HELP","Se você importar de outra instancia de d3downloads, crie um diretorio <i>%s</i> primeiro com permissão de escrita. Os arquivos enviados serão copiados para ele com o melhor esforço. Os arquivos enviados podem não ser copiados completamente dependendo do ambiente. Por favor, cheque isso cuidadosamente após a importação.");
define("_MD_D3DOWNLOADS_FILE_CONFIGERROR_HELP","Se você importar de outra instancia de d3downloads, crie um diretorio <i>%s</i> primeiro com permissão de escrita. Os arquivos enviados serão copiados para ele.");
define("_MD_D3DOWNLOADS_FILE_CONFIGERROR","Crie um diretorio para envio com permissão de escrita primeiro!");
define("_MD_D3DOWNLOADS_IMPORTDONE","Importação feita");
define("_MD_D3DOWNLOADS_ERR_INVALIDMID","Não foi possivel importar deste moduulo");
define("_MD_D3DOWNLOADS_SQLONIMPORT","A importaçãoo falhou. As tabelas de origem e as tabelas de destino podem ter estruturas diferentes. Por favor, atualize seus modulos para as modificações mais recentes ou verifique manualmente as tabelas.");
define("_MD_D3DOWNLOADS_FILE_NO_IMPORT","Somente o banco de dados foi importado. Os aquivos enviados não poderam ser importados.");
define("_MD_D3DOWNLOADS_H2_UPDATEFROM","Atualização (0.01 -> 0.02)");
define("_MD_D3DOWNLOADS_BTN_UPDATE","Atualizado");
define("_MD_D3DOWNLOADS_HELP_UPDATEFROM","Da versão 0.02 opções para um topico downloads (Html, smileys, quebra de linha, BB Code) foram selecionados mas se voce atualizar das versão 0.01 aquelas opções não estarão disponiveis. Por favor, pressione o botão Atualizar uma vez para ter disponivel as opções de smileys, quebra de linha e BB Code. Apenas a opçõo de Html não estará disponivel, se você precisar, configure-as na edição dos formulários. Lamentamos este inconveniente.");
define("_MD_D3DOWNLOADS_UPDATEDONE","Atualização feita");
define("_MD_D3DOWNLOADS_SQLONUPDATE","Atualização falhou");

// D3DOWNLOADS CONFIG_CHECK
define("_MD_D3DOWNLOADS_H2_CONFIG_CHECK","Checar ambiente de Envio");
define("_MD_D3DOWNLOADS_MAXFILESIZE","Tamano máximo do arquivo para envio %s (bytes)");
// define("_MD_D3DOWNLOADS_MAXFILESIZE","Max size of file for uploading %s (KB)");
// define("_MD_D3DOWNLOADS_MAXFILESIZE","Upload Size (KB)");
define("_MD_D3DOWNLOADS_PHPINI_CHECK","Checar as diretivas do php.ini");
define("_MD_D3DOWNLOADS_UPLOADDIR_CHECK","Checar o diretorio de envio");
define("_MD_D3DOWNLOADS_UPLOADDIR_CONFIFG","Diretorio de Envio");

// add photosite
define("_MD_D3DOWNLOADS_TH_CAN_UPLOAD","Permitir UPLOAD");
define('_MD_D3DOWNLOADS_TH_UID','ID do usuário');
define('_MD_D3DOWNLOADS_TH_UNAME','Nome do Uusário');
define('_MD_D3DOWNLOADS_IMGURL_CHECK','URL da imagem da categoria não é valida');
define('_MD_D3DOWNLOADS_IMGURL_TOOLONG','Por favor, informe a URL da imagem da categoria em caracteres one-byte com o comprimento máximo de %s');
define('_MD_D3DOWNLOADS_SHOTSDIR_CHECK','O diretorio pra screenshots não é válido');
define('_MD_D3DOWNLOADS_SHOTSDIR_TOOLONG','Por favor, informe o directory para screenshots em caracteres one-byte com o comprimento máximo de %s');
define('_MD_D3DOWNLOADS_CAT_WEIGHT_TOOLONG','Por favor, informe o peso em em caracteres one-byte com o comprimento máximo de %s');
define('_MD_D3DOWNLOADS_INVISIBLEINFO','Invisivel');
define('_MD_D3DOWNLOADS_WAITINGRELEASEINFO','aguardando lançamento');
define('_MD_D3DOWNLOADS_EXPIREDINFO','Expirou');
define('_MD_D3DOWNLOADS_CATDESCRIPTION','Configurar as descrições da categoria');
define('_MD_D3DOWNLOADS_H2BROKENMANAGER','Informar erros');
define('_MD_D3DOWNLOADS_BROKENNUM',' %s ');
define('_MD_D3DOWNLOADS_TH_SENDERNAME','Quem enviou');
define('_MD_D3DOWNLOADS_TH_IP','Endereço de IP');
define('_MD_D3DOWNLOADS_TH_REPORTDATE','Reportar data');
define('_MD_D3DOWNLOADS_TH_BROKENDEL','Ignorar o relatorio');
define('_MD_D3DOWNLOADS_TOTAL_INVISIBLE_NUM','Existem um total %s de arquivos invisiveis');
define('_MD_D3DOWNLOADS_CATEGORY_INVISIBLE_NUM','Existem %s arquivos invisiveis sob esta categoria');
define('_MD_D3DOWNLOADS_LABEL_BROKENCHECK','Checar erros no envio de arquivos');
define('_MD_D3DOWNLOADS_UPLOAD_TMP_DIR_IS_NOTWRITEABLE','Não foi possivel escrever para upload_tmp_dir');
define('_MD_D3DOWNLOADS_SYSTEM_CHECK','Ambiente de uso');
define('_MD_D3DOWNLOADS_CACHEDIR_CHECK','Checar diretorio de cache');
define('_MD_D3DOWNLOADS_CACHEDIR_CONFIFG','Diretorio de Cache');
define('_MD_D3DOWNLOADS_CACHEDIR_NOT_IS_DIR','Criar diretorio cache e configurar as permissões de escrita para ele');
define("_MD_D3DOWNLOADS_CACHEDIR_NOT_MKDIR","Não foi possivel criar o diretorio de cache. Por favor, check as permissçõs de escrita do diretorio pai");
define("_MD_D3DOWNLOADS_CACHEDIR_NOT_IS_WRITEABLE","Não foi possivel escrever no diretorio de cache. Por favor, check as permissões de escrita");
define('_MD_D3DOWNLOADS_TABLE_CHECK','Checar tabela');
define('_MD_D3DOWNLOADS_NOLINK_CHECK','Enviar arquivos que não estejam lincados');
define('_MD_D3DOWNLOADS_HELP_BROKENCHECK','Nota: Não no ambiente que pode usar cron, é possivel a checagem de um arquivo ou link regular errado checado na linha de comando. <br>[ Exemplo de configuração de crontab ] :<br /><ul><li>0 0 1 * * /usr/local/bin/php php -q -f home/***/html/modules/(dirname)/bin/broken_check.sh pass=password limit=100 offset=0</li><li>A senha pode ser configurada e alterada indispensavelmente nas preferencias. Por favor, configure o limite e offset, se necessário indispensavelmente. </li></ul>');
define('_MD_D3DOWNLOADS_HISTORY_RESTORE','Os conteudos registrados são reconstruidos com esses conteudos');
define('_MD_D3DOWNLOADS_CONFIRM_HISTORY_RESTORE','Possivel reconstrução com este conteudo? Quando isto for executado, o presente conteudoo registrado será reconstruido depois de retaining, como ultimo registro. No entanto, não é o caso disto poder restaurar todos os dados. Após a execução, por favor verifique se o conteudo registrado está corretode acordo com a necessidade.');
define('_MD_D3DOWNLOADS_NEWCATEGORYEDITTITLE','Adicionar nova categoria');
define('_MD_D3DOWNLOADS_CATEGORY_TREE','Arvore da Categoria');
define('_MD_D3DOWNLOADS_SUBCATEGORY_SUM','Numero de sub categorias');
define('_MD_D3DOWNLOADS_FILES_SUM','Numero de registros');
define('_MD_D3DOWNLOADS_MAKESUBCATEGORY','Adicionar uma nova sub categoria');
define('_MD_D3DOWNLOADS_MYTPLSFORM_BTN_MODIFYCONT','Modificar');
define('_MD_D3DOWNLOADS_CATEGORY_MOVE','Move como sub categoria da categoria da qual �selecionada');
define('_MD_D3DOWNLOADS_CONFIRMCATEGORY_MOVE','Truly, moving as sub category it may, is?');
define('_MD_D3DOWNLOADS_CATEGORY_TOP_MOVE','It makes top category');
define('_MD_D3DOWNLOADS_CONFIRMCATEGORY_TOP_MOVE','Verdadeiramente, é possivel mover como a categoria top, é isso?');
define('_MD_D3DOWNLOADS_H2USERACCESS_INFO','Permissões da Categoria ( %s )');
define('_MD_D3DOWNLOADS_NEWCID_USERACCESS','Permissões da Categoria');
define('_MD_D3DOWNLOADS_NEWCID_USERACCESS_INFO','Permissões da Categoria');
define('_MD_D3DOWNLOADS_HELP_USERACCESS_USER','Nota: Por favor, informe cada uid ou uname quando você adicionar o novo usuario.<br />O usuario pode apagar ele da lista, removendo a leitura. ');
define('_MD_D3DOWNLOADS_USERACCESS_COPY','Copiar esta configuração de permissão em outra categoria');
define('_MD_D3DOWNLOADS_CONFIRM_USERACCESS_COPY','Copiando, é possivel?');
define('_MD_D3DOWNLOADS_COPYDONE','A copia foi concluida');
define('_MD_D3DOWNLOADS_ALL_USERACCESS_COPY','Copiar esta configuração de permissão em todas as categorias');
define('_MD_D3DOWNLOADS_CONFIRM_ALL_USERACCESS_COPY','Copiando verdadeiramente é possivel? A configuração da permissão de todas as categorias foram modificadas com os conteudos que foram selecionados.');
define('_MD_D3DOWNLOADS_HISTORY_DELETE','O registro anterior foi deletado');
define('_MD_D3DOWNLOADS_CATEGORYIMG','Imagem da Categoria');
define('_MD_D3DOWNLOADS_SEL_SUBMITTER','Selecionar quem envia');
define('_MD_D3DOWNLOADS_ERROR_SEL_FILSE','Selecionar o arquivo de destino');
define('_MD_D3DOWNLOADS_CATEGORY_CHECK','Execute isso se as suas categorias mostrarem informações contraditoria.');
define('_MD_D3DOWNLOADS_CATEGORY_CHECK_DONE','Processamento concluido');
define('_MD_D3DOWNLOADS_SEL_GROUP','Selecionar grupo');
define('_MD_D3DOWNLOADS_SEL_USER','Selecionar usuário');
define('_MD_D3DOWNLOADS_LABEL_GROUP_CHECKED','Checar grupos');
define('_MD_D3DOWNLOADS_LABEL_USER_CHECKED','Checar usuário');
define('_MD_D3DOWNLOADS_ERROR_SEL_CATEGORY','Selecionar a categoria de destino');
define('_MD_D3DOWNLOADS_ERROR_SEL_GROUP','Selecionar o grupo de destino');
define('_MD_D3DOWNLOADS_ERROR_SEL_USER','Selecionar o usuário de destino');
define('_MD_D3DOWNLOADS_ERROR_SEL_REPORT','Selecionar o relatário de destino');
define('_MD_D3DOWNLOADS_TH_MYLINK','Meu link');
define('_MD_D3DOWNLOADS_SELECT_IMGURL','Selecionar a imagem da categoria');
define('_MD_D3DOWNLOADS_SELECT_IMGURLDESC','Possivel selecionar o diretorio do screenshot ou o modulo de administração de imagens.');
define('_MD_D3DOWNLOADS_TH_REPORT','Informar erro');
define('_MD_D3DOWNLOADS_BTN_INVISIBLE','Invisivel');
define('_MD_D3DOWNLOADS_CONFIRM_INVISIBLE','Você tem certeza que deseja tornar invisivel?');
define('_MD_D3DOWNLOADS_INVISIBLE_DONE','Foi configurado para invisivel');
