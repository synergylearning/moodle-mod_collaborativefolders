<?php
// This file is part of Moodle - http://moodle.org/
//
// Moodle is free software: you can redistribute it and/or modify
// it under the terms of the GNU General Public License as published by
// the Free Software Foundation, either version 3 of the License, or
// (at your option) any later version.
//
// Moodle is distributed in the hope that it will be useful,
// but WITHOUT ANY WARRANTY; without even the implied warranty of
// MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
// GNU General Public License for more details.
//
// You should have received a copy of the GNU General Public License
// along with Moodle.  If not, see <http://www.gnu.org/licenses/>.

/**
 * English strings for collaborativefolders module.
 *
 * @package    mod_collaborativefolders
 * @copyright  2017 Project seminar (Learnweb, University of Münster)
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

// General.
$string['modulename'] = 'Collaborative folders';
$string['modulenameplural'] = 'Collaborative folders';
$string['modulename_help'] = 'Use collaborative folders to create folders in ownCloud for students for collaborative work. The folder is shared individually with members of the chosen groups as soon as they like. You do not need to collect ownCloud email addresses from your participants, everything is automated!';
$string['collaborativefolders:addinstance'] = 'Add a new collaborative folder';
$string['collaborativefolders:view'] = 'View a collaborative folder';
$string['collaborativefolders:isteacher'] = 'When viewing, be considered a non-student (with restricted access)';
$string['collaborativefolders'] = 'Collaborative folders';
$string['nocollaborativefolders'] = 'No instance of collaborative folders is active in this course.';
$string['pluginadministration'] = 'Administration of collaborative folders';
$string['pluginname'] = 'Collaborative folders';

// View: Overview.
$string['activityoverview'] = 'Collaborative folder';
$string['overview'] = 'Overview';
$string['foldernotcreatedyet'] = 'The folder has not been created in ownCloud, yet. Please contact the administrator if this message persists more than a few hours.';
$string['creationstatus'] = 'Folder status';
$string['creationstatus_created'] = 'Folder(s) created';
$string['creationstatus_pending'] = 'Folder(s) will be created soon';
$string['teacheraccess_yes'] = 'Teachers have access to all folders';
$string['teacheraccess_no'] = 'Folders remain private from teachers';
$string['groupmode'] = 'Mode';
$string['groupmode_on'] = 'One folder per group';
$string['groupmode_off'] = 'One folder for the entire course';
$string['groups'] = 'Groups';
$string['teachersnotallowed'] = 'Sorry, teachers are not allowed to view this content.';

// View: remote system (+authorise.php).
$string['remotesystem'] = 'Connection to ownCloud';
$string['btnlogin'] = 'Login';
$string['btnlogout'] = 'Logout';
$string['logoutsuccess'] = 'Successfully logged out from ownCloud.';
$string['loginsuccess'] = 'Successfully authorised to connect to ownCloud.';
$string['loginfailure'] = 'A problem occurred: Not authorised to connect to ownCloud.';

// View: access folders.
$string['accessfolders'] = 'Folder access';
$string['grouplabel'] = 'Group: {$a}';

// View: name_form.
$string['namefield'] = 'Name';
$string['namefield_explanation'] = 'Choose a name under which the shared folder will be stored in your ownCloud.';
$string['getaccess'] = 'Get access';
$string['error_illegalpathchars'] = 'A valid folder or path name must be entered. Use \'/\' (slash) to delimit directories of a path.';
$string['foldershared'] = 'The folder was successfully shared to your ownCloud.';

// View: information about shared folder.
$string['sharedtoowncloud'] = 'This folder has already been shared to your ownCloud.';
$string['folder'] = 'Folder';
$string['cannotaccessheader'] = 'No access?';
$string['cannotaccess'] = 'If the above link does not work, and you cannot find the folder, click the button on the left to reset the share. This helps you regain access without making changes to the files within that folder.';
$string['openinowncloud'] = 'Open in ownCloud';
$string['solveproblems'] = 'Solve problems';
$string['resetpressed'] = 'Share reset. You can now obtain access to your folder again.';

// Systemic error messages.
$string['problem_nosystemconnection'] = 'The system account is unable to connect to ownCloud, so folders for this activity will not be created. Please inform the administrator about this.';
$string['problem_misconfiguration'] = 'The plugin is not configured correctly or the server is not reachable. Please contact your administrator to resolve this issue.';
$string['problem_sharessuppressed'] = 'The system account is unable to connect to ownCloud, so {$a} folders were not displayed. Please inform the administrator about this.';

// Configuration/connection error messages.
$string['usernotloggedin'] = 'You are currently not logged in at ownCloud.';
$string['webdaverror'] = 'WebDAV error code {$a}';
$string['socketerror'] = 'The WebDAV socket could not be opened.';
$string['ocserror'] = 'An error with the OCS sharing API occurred.';
$string['notcreated'] = 'Folder {$a} not created. ';
$string['unexpectedcode'] = 'An unexpected response status code ({$a}) was received.';
$string['technicalnotloggedin'] = 'The system account is not logged in or does not have authorisation in the remote system.';
$string['incompletedata'] = 'Please check the module settings. Either no OAuth 2 issuer is selected or no corresponding system account is connected.';

// Settings.
$string['chooseissuer'] = 'Issuer';
$string['oauth2serviceslink'] = '<a href="{$a}" title="Link to OAuth 2 services configuration">OAuth 2 services configuration</a>';
$string['issuervalidation_without'] = 'You have not selected an ownCloud server as the OAuth 2 issuer yet.';
$string['issuervalidation_valid'] = 'Currently the {$a} issuer is valid and active.';
$string['issuervalidation_invalid'] = 'Currently the {$a} issuer is active, however it does not implement all necessary endpoints. The repository will not work. Please choose a valid issuer.';
$string['issuervalidation_notconnected'] = 'Currently the valid {$a} issuer is active, but no system account is connected. The repository will not work. Please connect a system account.';
$string['right_issuers'] = 'The following issuers implement the required endpoints: {$a}';
$string['no_right_issuers'] = 'None of the existing issuers implement all required endpoints. Please register an appropriate issuer.';
$string['issuer_choice_unconfigured'] = '(unconfigured)';

// Adding an instance (mod_form).
$string['collaborativefoldersname'] = 'Collaborative folder name';
$string['collaborativefoldersname_help'] = 'Enter a new name that will be shown in the course homepage.';
$string['teacher_access'] = 'Teacher access';
$string['teacher_mode'] = 'Enable the teacher to have access to the folder.';
$string['teacher_mode_help'] = 'Usually only students have access to their folders. However, if this checkbox is checked, teachers will also be granted access. Note that this setting cannot be changed after creation.';
$string['edit_after_creation'] = 'Please consider that teacher access and group-related settings cannot be changed after this activity is created.';

// Events.
$string['eventfolderscreated'] = 'The ad-hoc task successfully created all necessary folders for a collaborativefolders instance.';
$string['eventlinkgenerated'] = 'A user-specific share to a collaborative folder was created successfully.';

// Exceptions.
$string['configuration_exception'] = 'An error in the configuration of the OAuth 2 client occurred: {$a}';
$string['webdav_response_exception'] = 'WebDAV responded with an error: {$a}';
$string['share_failed_exception'] = 'Unable to share the folder with you: {$a}';
$string['share_exists_exception'] = 'The folder is already shared with you. {$a}';
