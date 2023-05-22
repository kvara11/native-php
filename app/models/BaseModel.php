<?php
/**
 * @author    Chris Neal
 * @version   1.0
 * @copyright Copyright (c) 2014, Analog Republic
 **/

class BaseModel {

    public static function build($params, $instance = null) {
        if (!$instance) {
            $class = get_called_class();
            $instance = new $class;
        }
        foreach ($params as $key => $value) {
            $instance->{$key} = $value;
        }
        return $instance;
    }

    public static function getImageFolder($size, $type = 'partial') {
        $class = get_called_class();
        eval('$folder = '.$class.'::$image_folder;');
        $folder_size = $folder.'-'.$size;
        if ($type == 'path') {
            return DIR_ROOT . FOLDER_ASSETS . DS . FOLDER_IMG . DS . $folder_size . DS;
        } elseif ($type == 's3path') {
            return FOLDER_IMG . '/' . $folder_size . '/';
        } elseif (awsEnabled === true) {
            return awsURL . FOLDER_IMG . '/' . $folder_size . '/';
        } elseif ($type == 'full') {
            return HTTP_URL_BASE . FOLDER_ASSETS . '/' . FOLDER_IMG . '/' . $folder_size . '/';
        } else {
            return URL_BASE . FOLDER_ASSETS . '/' . FOLDER_IMG . '/' . $folder_size . '/';
        }
    }

    public static function getTableName() {
        $class = get_called_class();
        eval('$table_name = '.$class.'::$table_name;');
        return $table_name;
    }

    public static function find($where = array(), $bound_values = array(), $extra = '') {
        $where = (isset($where[0])?' where '.implode(' and ', $where):'');
        $query = 'select * from '.self::getTableName(). $where.' '.$extra;
        $db = Database::getInstance();
        if (!empty($bound_values)) {
            $stmt = $db->prepare($query);
            $stmt->execute($bound_values);
        } else {
            $stmt = $db->query($query);
        }
        $objects = array();
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $objects[] = self::build($row);
        }
        return $objects;
    }

    public static function count($where = array(), $bound_values = array()) {
        $where = (isset($where[0])?' where '.implode(' and ', $where):'');
        $query = 'select count(*) from '.self::getTableName(). $where;
        $db = Database::getInstance();
        if (!empty($bound_values)) {
            $stmt = $db->prepare($query);
            $stmt->execute($bound_values);
        } else {
            $stmt = $db->query($query);
        }
        return $stmt->fetchColumn();
    }

    public static function findById($id = 0, $id_field = 'id', $where = array(), $bound = null, $extra = 'limit 1')
    {
        $default_where = array($id_field . ' = ' . (int)$id);
        $where = array_merge($default_where, $where);
        return current(self::find($where, $bound, $extra));
    }

    public static function all() {
        return self::find();
    }
}
