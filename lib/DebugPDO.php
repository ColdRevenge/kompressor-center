<?php

class DebugPDO extends PDO {

    protected
            $query_count = 0,
            $exec_time = 0;
    private
            $logger_callback = NULL;

    public function __construct($dsn, $username = null, $password = null, $driver_options = array(), $logger_callback = NULL) {
        parent::__construct($dsn, $username, $password, $driver_options);
        $this->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        if (!$this->getAttribute(PDO::ATTR_PERSISTENT)) {
            $this->setAttribute(PDO::ATTR_STATEMENT_CLASS, array('DebugPDOStatement', array($this)));
        }
        $this->logger_callback = $logger_callback;
    }

    public function increment_query_count() {
        $this->query_count++;
    }

    public function get_query_count() {
        return $this->query_count;
    }

    public function add_exec_time($time) {
        $this->exec_time += $time;
    }

    public function get_exec_time_ms() {
        return $this->exec_time;
    }

    public function log() {
        if (!is_null($this->logger_callback)) {
            $args = func_get_args();
            call_user_func_array($this->logger_callback, $args);
        }
    }

    public function exec($sql) {
        $this->log($sql, 'Query (PDO->exec())');
        $this->increment_query_count();
        $start = microtime(true);
        $return = parent::exec($sql);
        $finish = microtime(true);
        $this->add_exec_time($finish - $start);
        return $return;
    }

    public function query() {
        $this->increment_query_count();
        $args = func_get_args();
        $this->log($args, 'Query (PDO->query())');
        $start = microtime(true);
        $return = call_user_func_array(array($this, 'parent::query'), $args);
        $finish = microtime(true);
        $this->add_exec_time($finish - $start);

        return $return;
    }

}

class DebugPDOStatement extends PDOStatement {

    protected
            $pdo;
    private
            $params = array();
    protected static $type_map = array(
        PDO::PARAM_BOOL => "PDO::PARAM_BOOL",
        PDO::PARAM_INT => "PDO::PARAM_INT",
        PDO::PARAM_STR => "PDO::PARAM_STR",
        PDO::PARAM_LOB => "PDO::PARAM_LOB",
        PDO::PARAM_NULL => "PDO::PARAM_NULL"
    );

    protected function __construct(DebugPDO $pdo) {
        $this->pdo = $pdo;
    }

    public function execute($input_parameters = null) {
        echo $this->queryString . "<br/>\n----\n<br/>";
        $this->pdo->log($this->queryString, 'Query (PDOStatement->execute())');
        if (!empty($this->params)) {
            $this->pdo->log($this->params, 'Parameters');
        }
        if (!empty($input_parameters)) {
            $this->pdo->log($input_parameters, 'Parameters');
        }
        $this->pdo->increment_query_count();

        $start = microtime(true);
        try {
            $return = parent::execute($input_parameters);
        } catch (Exception $e) {
            return null;
        }
        $finish = microtime(true);
        $this->pdo->add_exec_time($finish - $start);

        return $return;
    }

    public function bindValue($pos, $value, $type = PDO::PARAM_STR) {
        $type_name = isset(self::$type_map[$type]) ? self::$type_map[$type] : '(default)';
        $this->params[] = array($pos, $value, $type_name);
        $return = parent::bindValue($pos, $value, $type);
        return $return;
    }

}
