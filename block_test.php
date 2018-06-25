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

defined('MOODLE_INTERNAL') || die();

class block_test extends block_base {

    function init() {
        $this->title = get_string('pluginname', 'block_test');
    }

    function get_content() {
        global $CFG;
        if ($this->content !== null) {
            return $this->content;
        }

        $this -> content = new stdClass();
        $this -> content -> text = "<li> <a href= {$CFG->wwwroot}/blocks/test/pie_chart.php
                                    target=_blank>" . get_string('students', 'block_test') . "</a> </li>";
        //$this -> content -> footer = "Footer";
        return $this -> content;
    }

    // my moodle can only have SITEID and it's redundant here, so take it away
    public function applicable_formats() {
        return array('all' => false,
                     'site' => true,
                     'site-index' => true,
                     'course-view' => true, 
                     'course-view-social' => false,
                     'mod' => true, 
                     'mod-quiz' => false);
    }

    public function instance_allow_multiple() {
          return true;
    }

    function has_config() {
        return true;
    }

    public function cron() {
        mtrace( "Hey, my cron script is running" );
        return true;
    }
}
