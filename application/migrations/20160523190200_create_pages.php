<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Create_pages extends CI_Migration {

/*
        This process is used whenever we want to do a Migration a.k.a Creating a Table.
*/
        public function up()
        {
                $this->dbforge->add_field(array(
                        'id' => array(
                                'type' => 'INT',
                                'constraint' => 11,
                                'unsigned' => TRUE,
                                'auto_increment' => TRUE
                        ),
                        'title' => array(
                                'type' => 'VARCHAR',
                                'constraint' => '100',
                        ),
                        'slug' => array(
                                'type' => 'VARCHAR',
                                'constraint' => '100',
                        ),
                        'page_order' => array(
                                'type' => 'INT',
                                'constraint' => '11',
                        ),
                        'body' => array(
                                'type' => 'TEXT',
                        ),
                ));

                $this->dbforge->add_key('id', TRUE);

                $this->dbforge->create_table('pages');
        }

/*
        This process is used whenever we want to do a Rollback a.k.a Dropping a Table.
*/

        public function down()
        {
                $this->dbforge->drop_table('pages');
        }
}