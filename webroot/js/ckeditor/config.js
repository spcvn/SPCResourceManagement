/**
 * @license Copyright (c) 2003-2016, CKSource - Frederico Knabben. All rights reserved.
 * For licensing, see LICENSE.md or http://ckeditor.com/license
 */
CKEDITOR.editorConfig = function( config ) {
	// Define changes to default configuration here. For example:
	// config.language = 'fr';
	// config.uiColor = '#AADC6E';
    
    config.height   = '500px';
    
    config.extraPlugins = 'insertpre';
	config.filebrowserBrowseUrl         = baseUrl + 'webroot/js/kcfinder/browse.php?opener=ckeditor&type=files';
	config.filebrowserImageBrowseUrl    = baseUrl + 'webroot/js/kcfinder/browse.php?opener=ckeditor&type=images';
	config.filebrowserFlashBrowseUrl    = baseUrl + 'webroot/js/kcfinder/browse.php?opener=ckeditor&type=flash';
	config.filebrowserUploadUrl         = baseUrl + 'webroot/js/kcfinder/upload.php?opener=ckeditor&type=files';
	config.filebrowserImageUploadUrl    = baseUrl + 'webroot/js/kcfinder/upload.php?opener=ckeditor&type=images';
	config.filebrowserFlashUploadUrl    = baseUrl + 'webroot/js/kcfinder/upload.php?opener=ckeditor&type=flash';
};
