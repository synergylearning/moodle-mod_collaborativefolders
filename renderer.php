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
 * Renderer for the Web interface of collaborativefolders module.
 *
 * @package    mod_collaborativefolders
 * @copyright  2017 Project seminar (Learnweb, University of Münster)
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

use core\output\notification;
use mod_collaborativefolders\name_form;
use mod_collaborativefolders\output\statusinfo;

defined('MOODLE_INTERNAL') || die;

/**
 * Class of the mod_collaborativefolders renderer.
 *
 * @package    mod_collaborativefolders
 * @copyright  2017 Project seminar (Learnweb, University of Münster)
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class mod_collaborativefolders_renderer extends plugin_renderer_base {
    /**
     * Render a status table that is the intro to user-facing pages of collaborative folder instances.
     *
     * @param statusinfo $statusinfo
     * @return string
     */
    public function render_statusinfo(statusinfo $statusinfo) {
        $exported = $statusinfo->export_for_template($this);
        return $this->render_from_template('mod_collaborativefolders/statusinfo', $exported);
    }

    /**
     * Render a login button (needed because of MDL-59902)
     *
     * @param \moodle_url $loginurl URL of the remote system that handles login
     * @return string
     */
    public function render_widget_login(\moodle_url $loginurl) {
        /* TODO change to the following line as soon as MDL-59902 is resolved.
         * $this->render(new \single_button($loginurl, '@login'));
         * ... Maybe this function can even be inlined and removed then.
         */
        return html_writer::link($loginurl, '@login', ['class' => 'btn btn-primary']);
    }

    public function render_widget_notcreatedyet() {
        $notification = new notification(get_string('foldernotcreatedyet', 'mod_collaborativefolders'), notification::NOTIFY_INFO);
        $notification->set_show_closebutton(false);
        return $this->render($notification);
    }

    public function render_widget_teachermaynotaccess() {
        $notification = new notification('@teachermaynotaccess', notification::NOTIFY_INFO);
        $notification->set_show_closebutton(false);
        return $this->render($notification);
    }

    public function render_widget_noconnection() {
        $notification = new notification('@noconnection (may affect creation of folders/ability to access. talk to admin!)',
            notification::NOTIFY_WARNING);
        $notification->set_show_closebutton(false);
        return $this->render($notification);
    }

    public function render_widget_noconnection_suppressed_share(int $sharessuppressed) {
        $notification = new notification(sprintf('@noconnection (cannot create %s shares. talk to admin!)', $sharessuppressed),
            notification::NOTIFY_WARNING);
        $notification->set_show_closebutton(false);
        return $this->render($notification);
    }

    /**
     * @param name_form $form
     */
    public function output_name_form($group, name_form $form) {
        echo $this->output->heading(get_string('grouplabel', 'mod_collaborativefolders', $group->name), 4,
            null, 'folder-'.$group->id);
        echo $this->output->box(get_string('namefield_explanation', 'mod_collaborativefolders'));
        $form->display();
    }

    /**
     * Render information about a folder that had been shared successfully.
     *
     * @param stdClass $group Group object containing ID and name
     * @param int $cmid Course module ID
     * @param string $foldername Chosen (and assumed) name of the folder
     * @param string $link Link into ownCloud instance
     * @return bool|string rendered template.
     */
    public function output_shared_folder($group, $cmid, $foldername, $folderlink) {
        $solveproblemsurl = new \moodle_url('/mod/collaborativefolders/resetshare.php', [
                'id' => $cmid,
                'groupid' => $group->id,
                'sesskey' => sesskey()
            ]);
        $openfolder = html_writer::link($folderlink, get_string('openinowncloud', 'mod_collaborativefolders'),
            ['class' => 'btn btn-primary']);
        $solveproblems = html_writer::link($solveproblemsurl, get_string('solveproblems', 'mod_collaborativefolders'),
            ['class' => 'btn']);

        $groupfolderinfo = new \stdClass();
        $groupfolderinfo->foldername = $foldername;
        $groupfolderinfo->folderlink = $folderlink;
        $groupfolderinfo->group = $group;
        $groupfolderinfo->cmid = $cmid;
        $groupfolderinfo->solveproblems = $solveproblems;
        $groupfolderinfo->openfolder = $openfolder;
        $groupfolderinfo->icon = $this->render(new pix_icon('i/folder', '@folder'));

        return $this->render_from_template('mod_collaborativefolders/groupfolderinfo', $groupfolderinfo);

    }

}