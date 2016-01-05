<?php
/**
 * ownCloud - Files ConoHa
 *
 * @copyright 2015 Stylez Corp. <owncloud@begood-tech.com>
 * This file is licensed under the Affero General Public License version 3 or
 * later.
 * See the COPYING-README file.
 */

if (\OC_App::isEnabled('files_external')) {
	$l = \OC_L10N::get('files_conoha');

	OC::$CLASSPATH['OC\Files\Storage\ConoHa'] = 'files_conoha/lib/conoha.php';
	OC::$CLASSPATH['OC_Mount_Config'] = 'files_external/lib/config.php';

	$user = OC_User::getUser();

		OC_Mount_Config::registerBackend('\OC\Files\Storage\ConoHa', array(
		'backend' => (string)$l->t('ConoHa Object Storage'),
		'priority' => 100,
		'configuration' => array(
			'user' => (string)$l->t('Username'),
			'password' => '&*'.$l->t('Password (required for ConoHa Object Storage)'),
			'region' => '&'.$l->t('Region (optional for ConoHa Object Storage)'),
			'url' => '&'.$l->t('URL of identity endpoint (required for ConoHa Object Storage)'),
			'tenant' => '&'.$l->t('Tenantname (required for ConoHa Object Storage)'),
			'service_name' => '&'.$l->t('Service Name (required for ConoHa Object Storage)'),
			'bucket' => (string)$l->t('Bucket'),
			'timeout' => '&'.$l->t('Timeout of HTTP requests in seconds'),
		),
		'has_dependencies' => true));
}
