<?php
/**
 * Для установки действия  
 */
interface IUploadAction {
    private $_width = 100; //Ширина модального окна
    private $_height = 100; //Высота модального окна
    private $_url = null; //Путь ссылки
    
    public function upAction();
}
