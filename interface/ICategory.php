<?php
interface ICategory {
    function isChildCategory($category_id);
    function getChildCategory($category_id, $is_visible);
}
