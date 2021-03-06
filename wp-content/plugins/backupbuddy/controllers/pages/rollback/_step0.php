<?php
// Incoming vars: $backupFile, $step
if ( ! current_user_can( pb_backupbuddy::$options['role_access'] ) ) {
	die( 'Error #473623. Access Denied.' );
}
pb_backupbuddy::load_script( 'jquery' );


require_once( pb_backupbuddy::plugin_path() . '/classes/rollback.php' );
$rollback = new backupbuddy_rollback();
$status = $rollback->start( backupbuddy_core::getBackupDirectory() . $backupFile );
if ( false === $status ) {
	$errors = $rollback->getErrors();
	if ( count( $errors ) > 0 ) {
		pb_backupbuddy::alert( 'Errors were encountered: ' . implode( ', ', $errors ) . ' If seeking support please click to Show Advanced Details above and provide a copy of the log.' );
	}
	return;
}
$restoreData = $rollback->getState();
?>


<?php _e( "This will roll back this site's database to the state contained within the selected backup file. Verify the backup details below to make sure this is the correct backup to roll back to and then follow the instructions on screen to roll back. This typically only takes a few minutes and you will be given the opportunity to test the changes and undo them before making them permanent. Tip: Create a Database or Full Backup before proceeding.", 'it-l10n-backupbuddy' ); ?>
<br><br>


<?php
if ( isset( $restoreData['dat']['wordpress_version'] ) ) {
	$wp_version = $restoreData['dat']['wordpress_version'];
} else {
	$wp_version = 'Unknown';
}


// Backup type.
$pretty_type = array(
	'full'	=>	'Full',
	'db'	=>	'Database',
	'files' =>	'Files',
);


$backupInfo = array(
	array( 'Backup Type', pb_backupbuddy::$format->prettify( $restoreData['dat']['backup_type'], $pretty_type ) ),
	array( 'Backup Date', pb_backupbuddy::$format->date( pb_backupbuddy::$format->localize_time( $restoreData['dat']['backup_time'] ) ) . ' <span class="description">(' . pb_backupbuddy::$format->time_ago( $restoreData['dat']['backup_time'] ) . ' ago)</span>' ),
	array( 'Site URL', $restoreData['dat']['siteurl'] ),
	array( 'Blog Name', $restoreData['dat']['blogname'] ),
	array( 'Blog Description', $restoreData['dat']['blogdescription'] ),
	array( 'BackupBuddy Version', $restoreData['dat']['backupbuddy_version'] ),
	array( 'WordPress Version', $wp_version ),
	array( 'Active Plugins', $restoreData['dat']['active_plugins'] ),
);
if ( isset( $restoreData['dat']['posts'] ) ) {
	$backupInfo[] = array(
		'Total Posts / Pages / Comments / Users', 
		$restoreData['dat']['posts'] . ' / ' .
		$restoreData['dat']['pages'] . ' / ' .
		$restoreData['dat']['comments'] . ' / ' .
		$restoreData['dat']['users']
	);
}
pb_backupbuddy::$ui->list_table(
	$backupInfo,
	array(
		'columns'		=>	array( __( 'Backup Information', 'it-l10n-backupbuddy' ), 'Value' ),
		'css'			=>	'width: 100%; min-width: 200px;',
		)
);
?>


<br>
<form id="pb_backupbuddy_rollback_form" method="post" action="?action=pb_backupbuddy_rollback&step=1&archive=<?php echo basename( $restoreData['archive'] ); ?>">
	<?php pb_backupbuddy::nonce(); ?>
	<input type="hidden" name="restoreData" value="<?php echo base64_encode( serialize( $restoreData ) ); ?>">
	<input type="submit" name="submitForm" class="button button-primary" value="<?php echo __('Begin Rollback') . ' &raquo;'; ?>">
</form>
