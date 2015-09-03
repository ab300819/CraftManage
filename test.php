<?php
/**
 * Created by PhpStorm.
 * User: Think
 * Date: 2015/8/31
 * Time: 15:51
 */

require_once './sql/mysql.php';
require_once './sql/user_config.php';

$db = new \sql\MysqlPDO(0);

$id = 12;
$data['cr_num'] = '15';
$data['cr_name'] = '333333';
$data['cr_content'] = '334';
$data['cr_room'] = '444444';
$data['cr_machine'] = '678';

$update = $db->get_update_db_sql(CRAFT_CONTENT, $data, "id='$id'");
$insert = $db->get_insert_db_sql(CRAFT_CONTENT, $data);
$delete = $db->get_delete_db_sql(CRAFT_CONTENT, $data);

$id = 12;
$cr_num = '15';
$cr_name = '333333';
$cr_content = '334';
$cr_room = '444444';
$cr_machine = '678';

$sq = "UPDATE craft_test SET cr_num='$cr_num',cr_name='$cr_name',cr_content='$cr_content',cr_room='$cr_room',cr_machine='$cr_machine' WHERE id='$id'";


echo $insert . '<br>' . $update . '<br>' ;


