<?php
/**
 * ownCloud - Files ConoHa
 *
 * @copyright 2015 Stylez Corp. <owncloud@begood-tech.com>
 * This file is licensed under the Affero General Public License version 3 or
 * later.
 * See the COPYING-README file.
 */

if (\OC_App::isEnabled('files_external') && \OC_App::isEnabled('files_external_conoha')) {
	$l = \OC::$server->getL10N('files_external_conoha');

	$user = OC_User::getUser();

	OC::$CLASSPATH['OC\Files\Storage\ConoHa'] = 'files_external_conoha/lib/conoha.php';
	OC::$CLASSPATH['OC_Mount_Config'] = 'files_external/lib/config.php';

	$version = OC_Util::getVersion();

	// Support for ver 8.2 higher
	if ($version[0] >= 8 && $version[1] >= 2) {
		OC::$CLASSPATH['OCA\Files\External\Api'] = 'files_external/lib/api.php';
		OC::$CLASSPATH['OCA\Files_External\Lib\Backend\ConoHa'] = 'files_external_conoha/lib/backend/conoha.php';

		$container = OC_Mount_Config::$app->getContainer();
		$container->registerService('L10n', function ($c) use ($l) {
			return $l;
		});
		$service = $container->query('OCA\Files_External\Service\BackendService');

		$service->registerBackend(
			$container->query('OCA\Files_External\Lib\Backend\ConoHa')
		);
	} else {
		OC_Mount_Config::registerBackend('\OC\Files\Storage\ConoHa', array(
			'backend' => (string)$l->t('ConoHa Object Storage'),
			'priority' => 100,
			'configuration' => array(
				'user' => (string)$l->t('Username'),
				'password' => '&*' . $l->t('Password (required for ConoHa Object Storage)'),
				'region' => '&' . $l->t('Region (optional for ConoHa Object Storage)'),
				'url' => '&' . $l->t('URL of identity endpoint (required for ConoHa Object Storage)'),
				'tenant' => '&' . $l->t('Tenantname (required for ConoHa Object Storage)'),
				'service_name' => '&' . $l->t('Service Name (required for ConoHa Object Storage)'),
				'bucket' => (string)$l->t('Bucket'),
				'timeout' => '&' . $l->t('Timeout of HTTP requests in seconds'),
			),
			'has_dependencies' => true));
	}
}
