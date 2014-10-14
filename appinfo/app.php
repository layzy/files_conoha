<?php
/**
 * ownCloud - Files Softlayer
 *
 * @copyright 2014 Begood Technology Corp. <owncloud@begood-tech.com>
 * This file is licensed under the Affero General Public License version 3 or
 * later.
 * See the COPYING-README file.
 */

if (\OC_App::isEnabled('files_external')) {
	$l = \OC_L10N::get('files_external');

	OC::$CLASSPATH['OC\Files\Storage\Softlayer'] = 'files_softlayer/lib/softlayer.php';

	OC_Mount_Config::registerBackend('\OC\Files\Storage\Softlayer', array(
		'backend' => (string)$l->t('Softlayer Object Storage'),
		'priority' => 100,
		'configuration' => array(
			'user' => (string)$l->t('Username (required)'),
			'root' => (string)$l->t('Bucket (required)'),
			'token' => '*'.$l->t('Password (required for OpenStack Object Storage)'),
			'host' => '&'.$l->t('URL of identity endpoint (required for OpenStack Object Storage)'),
		),
		'has_dependencies' => true));
}
