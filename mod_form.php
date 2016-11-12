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
 * The main collaborativefolders configuration form
 *
 * It uses the standard core Moodle formslib. For more info about them, please
 * visit: http://docs.moodle.org/en/Development:lib/formslib.php
 *
 * @package    mod_collaborativefolders
 * @copyright  2016 Your Name <your@email.address>
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

require_once($CFG->dirroot.'/course/moodleform_mod.php');

/**
 * Module instance settings form
 *
 * @package    mod_collaborativefolders
 * @copyright  2016 Your Name <your@email.address>
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class mod_collaborativefolders_mod_form extends moodleform_mod {

    /**
     * Defines forms elements
     */
    public function definition() {
        global $CFG, $PAGE;

        $mform = $this->_form;

        // Adding the "general" fieldset, where all the common settings are showed.
        $mform->addElement('header', 'general', get_string('general', 'form'));

        // Adding the standard "name" field.
        $mform->addElement('text', 'name', get_string('collaborativefoldersname', 'collaborativefolders'), array('size' => '64'));
        if (!empty($CFG->formatstringstriptags)) {
            $mform->setType('name', PARAM_TEXT);
        } else {
            $mform->setType('name', PARAM_CLEANHTML);
        }
        $mform->addRule('name', null, 'required', null, 'client');
        $mform->addRule('name', get_string('maximumchars', '', 255), 'maxlength', 255, 'client');
        $mform->addHelpButton('name', 'collaborativefoldersname', 'collaborativefolders');

        // Adding the standard "intro" and "introformat" fields.
        if ($CFG->branch >= 29) {
            $this->standard_intro_elements();
        } else {
            $this->add_intro_editor();
        }

        // Adding the rest of collaborativefolders settings, spreading all them into this fieldset
        // ... or adding more fieldsets ('header' elements) if needed for better logic.
        $mform->addElement('text', 'label1', 'sometext');

        $mform->addElement('header', 'groupmodus', get_string('fieldsetgroups', 'collaborativefolders'));
        $renderer = $PAGE->get_renderer('mod_collaborativefolders');
        $arrayofgroups = $this->get_relevant_fields();
        $tableofgroups = $renderer->render_table_of_existing_groups($arrayofgroups);
        $htmltableofgroups = html_writer::table($tableofgroups);
        $mform->addElement('static', 'table', $htmltableofgroups);

        $mform->addElement('text', 'label3', get_string('fieldsetgroups', 'collaborativefolders'));

        // TODO do we need Grades for colaborative Folders?
        $this->standard_grading_coursemodule_elements();

        // Add standard elements, common to all modules.
        $this->standard_coursemodule_elements();

        // Add standard buttons, common to all modules.
        $this->add_action_buttons();
    }
    public function get_all_groups(){
        global $DB;
        //TODO for Performance reasons only get neccessary record
        return $DB->get_records('groups');
    }
    public function get_relevant_fields(){
        $allgroups = $this->get_all_groups();
        $relevantinformation = array();
        foreach($allgroups as $key => $group){
            $relevantinformation[$key]['name']= $group->name;
            $relevantinformation[$key]['id'] = $group->id;
            $numberofparticipants = count(groups_get_members($group->id));
            $relevantinformation[$key]['numberofparticipants'] = $numberofparticipants;
        }
        return $relevantinformation;

    }
}