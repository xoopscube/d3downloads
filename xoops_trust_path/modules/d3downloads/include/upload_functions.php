<?php

if ( ! function_exists('d3download_return_bytes') ) {
    function d3download_return_bytes( $val )
    {
        $val = trim( $val );
        $last = strtolower( substr( $val, -1, 1 ) );
        switch( $last ) {
            case 'g':
                $val *= 1024;
            case 'm':
                $val *= 1024;
            case 'k':
                $val *= 1024;
        }
        return intval( $val );
    }
}

if ( ! function_exists('d3download_upload_config_check') ) {
	function d3download_upload_config_check( $mydirname )
	{
		$error = 0 ;

		if( ! ini_get( 'file_uploads' ) ) return 'not_file_uploads' ;
		if( ! is_dir( XOOPS_TRUST_PATH.'/uploads/' ) ) return _MD_D3DOWNLOADS_UPLOADDIR_NOT_IS_DIR ;

		$uploads_dir = XOOPS_TRUST_PATH.'/uploads/'.$mydirname.'/';
		$safe_mode = ini_get( 'safe_mode' ) ;
		if( ! is_dir( $uploads_dir ) ) {
			if( $safe_mode ) {
				$error = _MD_D3DOWNLOADS_UPLOADDIR_NOT_IS_DIR ;
			}
			$mrs = mkdir( $uploads_dir , 0777 ) ;
			if( ! $mrs ) {
				$error = _MD_D3DOWNLOADS_UPLOADDIR_NOT_MKDIR ;
			} else @chmod( $uploads_dir , 0777 ) ;
		}
		if( ! is_writable( $uploads_dir ) || ! is_readable( $uploads_dir ) ) {
			$mrs = chmod( $uploads_dir , 0777 ) ;
			if( ! $mrs ) {
				$error = _MD_D3DOWNLOADS_UPLOADDIR_NOT_IS_WRITEABLE ;
			}
		}
		return $error ;
	}
}



if ( ! function_exists('d3download_file_error_message') ) {
	function d3download_file_error_message( $file_error )
	{
		switch( $file_error ) {
			case 1 :
				return _MD_D3DOWNLOADS_UPLOAD_ERR_INI_SIZE ;
			case 2 :
				return _MD_D3DOWNLOADS_FILELARGE ;
			case 3 :
				return _MD_D3DOWNLOADS_UPLOADERROR ;
			case 4 :
				return _MD_D3DOWNLOADS_UPLOADERROR ;
			case 5 :
				return _MD_D3DOWNLOADS_UPLOADERROR ;
			default :
				return _MD_D3DOWNLOADS_UPLOADERROR ;
		}
	}
}

// ��ʐݒ�̍ő�t�@�C���T�C�Y���擾
if ( ! function_exists('d3download_get_maxsize') ) {
    function d3download_get_maxsize( $mydirname )
    {
        $module_handler =& xoops_gethandler('module');
        $config_handler =& xoops_gethandler('config');
        $module =& $module_handler->getByDirname( $mydirname );
        $mod_config =& $config_handler->getConfigsByCat( 0, $module->getVar('mid') );

        if( empty( $mod_config['maxfilesize'] ) ) {
            $maxsize = 1000 * 1024 ;
        } else {
            $maxsize = intval( $mod_config['maxfilesize'] ) * 1024 ;
        }
        return $maxsize ;
    }
}


// �A�b�v���[�h�\�Ȋg���q���擾
if ( ! function_exists('d3download_get_allowed_extension') ) {
	function d3download_get_allowed_extension( $mydirname )
	{
		include_once dirname(__FILE__, 2) .'/class/upload_validate.php' ;
		$upload_validate = new Upload_Validate() ;
		$allowed_extension = array_diff( $upload_validate->allowed_extension( $mydirname ), $upload_validate->deny_extension() );
		return sprintf( _MD_D3DOWNLOADS_SUBMIT_EXTENSION , implode( ',',$allowed_extension ) ) ;
	}
}

// �t�@�C���A�b�v���[�h����
if ( ! function_exists('d3download_file_upload') ) {
	function d3download_file_upload( $mydirname, $upload_arr, $maxsize, $id, $uid )
	{
		// ���`�F�b�N
		$config_error = "" ;
		$config_error = d3download_upload_config_check( $mydirname );
		if( ! empty( $config_error ) ){
			redirect_header( XOOPS_URL."/modules/$mydirname/" , 10 , $config_error ) ;
			exit();
		}
		for( $loop = 0 ; $loop <= 1 ; $loop++ ) {
			$name = $upload_arr['name'][$loop] ;
			$tmp_name = $upload_arr['tmp_name'][$loop] ;
			$error = $upload_arr['error'][$loop] ;
			if( ! empty( $name ) ){
				$result[] = d3download_upload_execution( $mydirname, $name, $tmp_name, $error, $maxsize, $id, $uid, $loop ) ;
			} else {
				$result[] = array(
					'url'  => '' ,
					'file_name'  => '',
					'ext'  => '' ,
					'size' => '' ,
					'error' => '' ,
				) ;
			}
		}
		return $result ;
	}
}

// �t�@�C���A�b�v���[�h���s
if ( ! function_exists('d3download_upload_execution') ) {
	function d3download_upload_execution( $mydirname, $file_name, $file_tmp_name, $file_error, $maxsize, $id, $uid, $second=0 )
	{
		include_once dirname(__FILE__, 2) .'/class/upload_validate.php' ;
		$upload_validate = new Upload_Validate( $mydirname ) ;

		$uploads_dir = XOOPS_TRUST_PATH.'/uploads/'.$mydirname.'/';

		// PHP 4.3.6 �ȑO�̃o�[�W�����ւ̑΍�( .. �� / ���܂܂�Ă���ꍇ�����I�� )
		$upload_validate->check_doubledot( $file_name ) ;

		// �A�b�v���[�h���ꂽ�t�@�C���́A�g���q�͂Ȃ��A�t�@�C������ς��ĕۑ�����
		$site_salt = substr( md5( XOOPS_URL ) , -4 ) ;
		$uploads_filename = $id.'_'.$site_salt.'_'.$uid.'_'.time() ;
		if ( ! empty( $second ) ) $uploads_filename .= '_1' ;
		$uploads_path = $uploads_dir.$uploads_filename ;
		$uploads_url = 'XOOPS_TRUST_PATH/uploads/'.$mydirname.'/'.$uploads_filename ;

		// �G���[�`�F�b�N
		if ( $file_error > 0 ){
			return array(
				'file_name'  => $file_name,
				'error'  => d3download_file_error_message( $file_error ) ,
			) ;
			exit();
		}

		if( is_uploaded_file( $file_tmp_name ) ){
			$f_info = pathinfo( $file_name );
			$f_ext  = ( ! empty( $f_info['extension'] ) ) ? strtolower( $f_info['extension'] ) : '' ;
			$f_size = intval( filesize( $file_tmp_name ) ) ;
			if( $f_size > $maxsize ) {
				return array(
					'file_name'  => $file_name,
					'error'  => _MD_D3DOWNLOADS_FILELARGE ,
				) ;
				exit();
			}

			// �g���q�`�F�b�N
			if( ! $upload_validate->check_allowed_extensions( $f_ext ) ){
				redirect_header( XOOPS_URL."/modules/$mydirname/", 2, sprintf( _MD_D3DOWNLOADS_UPLOADERROR_EXT , $f_ext ) ) ;
				exit() ;
			} else {
				// php �ȂǊ댯�Ȋg���q�̃t�@�C���̃A�b�v���[�h��h��
				$upload_validate->check_deny_extensions( $f_ext ) ;

				// multiple dot file �̃`�F�b�N���s�����ǂ���
				$check_multiple_dot = $upload_validate->config_check_multiple_dot() ;
				// multiple dot file �̃`�F�b�N
				if( ! empty( $check_multiple_dot ) ){
					$upload_validate->check_multiple_dot( $file_name ) ;
				}

				// �摜�t�@�C����ΏۂɊg���q�U���̃`�F�b�N
				$upload_validate->check_image_extensions( $f_ext, $file_tmp_name, $file_name ) ;

				// �w�b�_�̃`�F�b�N���s�����ǂ���
				$check_of_head = $upload_validate->config_validate_of_head() ;
				// �t�@�C���̐擪�����m�F���Ċg���q�U���̃`�F�b�N
				if( ! empty( $check_of_head ) ){
					$upload_validate->Validate_of_head( $file_tmp_name, $file_name, $f_ext ) ;
				}

				$urs = @move_uploaded_file( $file_tmp_name , $uploads_path ) ;
				if ( $urs === TRUE ) {
					return array(
						'url'  => $uploads_url ,
						'file_name'  => $file_name,
						'ext'  => $f_ext ,
						'size' => $f_size ,
						'error' => '' ,
					) ;
				} else {
					redirect_header( XOOPS_URL."/modules/$mydirname/", 2, _MD_D3DOWNLOADS_UPLOADERROR ) ;
					exit();
				}
			}
		} else {
			redirect_header( XOOPS_URL."/modules/$mydirname/", 2, _MD_D3DOWNLOADS_UPLOADERROR ) ;
			exit();
		}
	}
}

if ( ! function_exists('d3download_convert_for_newid') ) {
	function d3download_convert_for_newid( $mydirname, $newid, $url, $file2, $uid )
	{
		include_once dirname(__FILE__, 2) .'/include/common_functions.php' ;
		$db =& Database::getInstance() ;

		$uploads_dir = XOOPS_TRUST_PATH.'/uploads/'.$mydirname ;
		$site_salt = substr( md5( XOOPS_URL ) , -4 ) ;
		$filepath = d3download_real_path( $mydirname, $url ) ;
		$filepath2 = d3download_real_path( $mydirname, $file2 ) ;

		if ( file_exists( $filepath ) ){
			$uploads_filename = $newid.'_'.$site_salt.'_'.$uid.'_'.time() ;
			$new_file = $uploads_dir.'/'.$uploads_filename ;
			$uploads_url = 'XOOPS_TRUST_PATH/uploads/'.$mydirname.'/'.$uploads_filename ;
			if ( copy( $filepath, $new_file ) ) {
				@unlink( $filepath );
			} else {
				redirect_header( XOOPS_URL."/modules/$mydirname/" , 3 , _MD_D3DOWNLOADS_UPLOADERROR ) ;
				exit();
			}
			$nrs = $db->query( "UPDATE ".$db->prefix( $mydirname."_downloads" )." SET url = '".$uploads_url."' WHERE lid = '".$newid."'");
			if( ! $nrs ){
				redirect_header( XOOPS_URL."/modules/$mydirname/" , 3 , _MD_D3DOWNLOADS_UPLOADERROR ) ;
				exit();
			}
		}
		if ( file_exists( $filepath2 ) ){
			$uploads_filename = $newid.'_'.$site_salt.'_'.$uid.'_'.time().'_1' ;
			$new_file = $uploads_dir.'/'.$uploads_filename ;
			$uploads_url2 = 'XOOPS_TRUST_PATH/uploads/'.$mydirname.'/'.$uploads_filename ;
			if ( copy( $filepath2, $new_file ) ) {
				@unlink( $filepath2 );
			} else {
				redirect_header( XOOPS_URL."/modules/$mydirname/" , 3 , _MD_D3DOWNLOADS_UPLOADERROR ) ;
				exit();
			}
			$nrs = $db->query( "UPDATE ".$db->prefix( $mydirname."_downloads" )." SET file2 = '".$uploads_url2."' WHERE lid = '".$newid."'");
			if( ! $nrs ){
				redirect_header( XOOPS_URL."/modules/$mydirname/" , 3 , _MD_D3DOWNLOADS_UPLOADERROR ) ;
				exit();
			}
		}
	}
}

if ( ! function_exists('d3download_convert_for_unapproval') ) {
	function d3download_convert_for_unapproval( $mydirname, $newid, $url, $file2, $uid )
	{
		include_once dirname(__FILE__, 2) .'/include/common_functions.php' ;

		$db =& Database::getInstance() ;

		$uploads_dir = XOOPS_TRUST_PATH.'/uploads/'.$mydirname ;
		$site_salt = substr( md5( XOOPS_URL ) , -4 ) ;

		$filepath = d3download_real_path( $mydirname, $url ) ;
		$filepath2 = d3download_real_path( $mydirname, $file2 ) ;

		if ( file_exists( $filepath ) ){
			$uploads_filename = $newid.'_'.$site_salt.'_'.$uid.'_'.time() ;
			$new_file = $uploads_dir.'/'.$uploads_filename ;
			$uploads_url = 'XOOPS_TRUST_PATH/uploads/'.$mydirname.'/'.$uploads_filename ;
			if ( copy( $filepath, $new_file ) ) {
				@unlink( $filepath );
			} else {
				redirect_header( XOOPS_URL."/modules/$mydirname/" , 3 , _MD_D3DOWNLOADS_UPLOADERROR ) ;
				exit();
			}
			$nrs = $db->query( "UPDATE ".$db->prefix( $mydirname."_unapproval" )." SET url = '".$uploads_url."' WHERE requestid = '".$newid."'");
			if( ! $nrs ){
				redirect_header( XOOPS_URL."/modules/$mydirname/" , 3 , _MD_D3DOWNLOADS_UPLOADERROR ) ;
				exit();
			}
		}
		if ( file_exists( $filepath2 ) ){
			$uploads_filename = $newid.'_'.$site_salt.'_'.$uid.'_'.time().'_1' ;
			$new_file = $uploads_dir.'/'.$uploads_filename ;
			$uploads_url2 = 'XOOPS_TRUST_PATH/uploads/'.$mydirname.'/'.$uploads_filename ;
			if ( copy( $filepath2, $new_file ) ) {
				@unlink( $filepath2 );
			} else {
				redirect_header( XOOPS_URL."/modules/$mydirname/" , 3 , _MD_D3DOWNLOADS_UPLOADERROR ) ;
				exit();
			}
			$nrs = $db->query( "UPDATE ".$db->prefix( $mydirname."_unapproval" )." SET file2 = '".$uploads_url2."' WHERE requestid = '".$newid."'");
			if( ! $nrs ){
				redirect_header( XOOPS_URL."/modules/$mydirname/" , 3 , _MD_D3DOWNLOADS_UPLOADERROR ) ;
				exit();
			}
		}
	}
}
