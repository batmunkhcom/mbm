<?php

namespace M\Test;

class Model {

    private $db = NULL;
    private $table = 'users';

// constructor

    public function __construct(MySQL $db, $table = '') {

        $this->db = $db;

        if ($table !== '') {

            $this->table = $table;
        }
    }

// get all rows from the specified table

    public function fetchAll() {

        $rows = array();

        $this->db->query('SELECT * FROM ' . $this->table);

        while ($row = $this->db->fetch()) {

            $rows[] = $row;
        }

        return $rows;
    }

// update/insert row

    public function save(array $data, $id = NULL) {

        if (!empty($data)) {

            foreach ($data as $field => $value) {

                $value = mysql_escape_string($value);

                if (!is_numeric($value)) {

                    $data[$field] = '\'' . $value . '\'';
                }
            }

            if ($id !== NULL) {

                $set = '';

                foreach ($data as $field => $value) {

                    $set .= $field . '=' . $value . ',';
                }

                $set = substr($set, 0, -1);

                $this->db->query('UPDATE ' . $this->table . ' SET ' . $set . ' WHERE id=' . (int) $id);
            } else {

                $fields = implode(',', array_keys($data));

                $values = implode(',', array_values($data));

                $this->db->query('INSERT INTO ' . $this->table . ' (' . $fields . ')' . ' VALUES (' . $values . ')');
            }
        }
    }

// delete row

    public function delete($id = NULL) {

        if ($id !== NULL) {

            $this->db->query('DELETE FROM ' . $this->table . ' WHERE id=' . (int) $id);
        }
    }

}

// End Model class

